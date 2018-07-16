<?php

namespace App\Http\Controllers;
use App\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Request $request, Home $home)
    {
    	$this->request = $request;
        $this->home = $home;
    }

    public function index() 
    {	
    	$data['title'] = 'Home';
    	return view('home.index', $data);
    }

    public function contactUs()
    {
    	$data['title'] = 'Contact Us';
    	return view('home.contact-us', $data);
    }

    public function menu()
    {
        $data['categories'] = unserialize(CATEGORIES);
        $menu = $this->home->getMenu();
        foreach ($menu as $menuData) {
            $data['menu'][$menuData['category']][] = $menuData;
        }
        $data['title'] = 'Menu';
        session_start();
        return view('home.menu', $data);
    }

    public function getMessage()
    {
        if ($this->request->all()) {           
            $postedData = $this->request->all();
            $request['name'] = trim(strip_tags($postedData['name']));
            $request['email'] = trim(strip_tags($postedData['email']));
            $request['message'] = trim(strip_tags($postedData['message']));
            $response = $this->home->saveMessage($request);
            echo json_encode($response);
        }
    }

    public function addToCart()
    {
        // $cartCount = 0;
        if ($this->request->all()) {
            session_start();
            if (isset($_SESSION['cart'][$this->request->input('productId')])) {
                $_SESSION['cart'][$this->request->input('productId')] = $_SESSION['cart'][$this->request->input('productId')] + 1;
            } else {
                $_SESSION['cart'][$this->request->input('productId')] = 1;
            }
            $cartCount = array_sum($_SESSION['cart']);
        }
        echo $cartCount;
    }        

    public function getCart()
    {
        session_start();
        $data = array();
        $jsonArr['noData'] = 1;
        if (isset($_SESSION['cart'])) {
            $itemIds = array_keys($_SESSION['cart']);
            $getItems = $this->home->getItems($itemIds);
            if (count($getItems) > 0) {
                foreach ($getItems as $items) {
                    $items['quantity'] = $_SESSION['cart'][$items['id']];
                    $data['cart'][$items['id']] = $items;
                }
                $jsonArr['noData'] = 0;
            }
        }
        $jsonArr['view'] = view('home.cart-view', $data)->render();
        echo json_encode($jsonArr);
    }

    public function paymentSuccess()
    {
        if ($this->request->all()) {
            if ($this->request->input('st') == 'Completed') {
                session_start();
                // $orderId = 192;
                if (isset($_SESSION['orderId'])) {
                    $orderId = $_SESSION['orderId'];   
                } else {
                   return redirect()->route('home'); 
                }
                session_destroy();
                $response = $this->home->updateOrderDetails($orderId, $this->request->input('tx'));
                if ($response['success']) {
                    $getOrderDetails = $this->home->getOrderDetails($orderId)[0];
                    $data['name'] = $getOrderDetails['name'];
                    $data['email'] = $getOrderDetails['email'];
                    $data['total_amount'] = $getOrderDetails['total_amount'];
                    $data['transaction_id'] = $getOrderDetails['transaction_id'];

                    $items = explode('|', $getOrderDetails['items']);
                    foreach ($items as $items_and_quantity) {
                        $splitArr = explode('-', $items_and_quantity);
                        $itemIds[] = $splitArr[0];
                        $quantities[$splitArr[0]] = $splitArr[1];
                    }
                    $getItems = $this->home->getItems($itemIds);
                    if (count($getItems) > 0) {
                        foreach ($getItems as $itemDetails) {
                            $itemDetails['quantity'] = $quantities[$itemDetails['id']];
                            $data['cart'][$itemDetails['id']] = $itemDetails;
                        }
                    }
                    $recepients['name'] = $data['name'];
                    $recepients['email'] = $data['email'];
        
                    \Mail::send('emails.order-details', $data, function($message) use ($recepients) {
                        $message->to($recepients['email'], $recepients['name'])
                                ->subject('Your True Taste order details');
                        $message->from('truetaste2018@gmail.com','True Taste Admin');
                    });
                    $data['title'] = "Payment Successfull";
                    return view('home.success', $data);
                } else {
                    return redirect()->route('payment_failed');
                }
            }
        } else {
            return redirect()->route('home');
        }
    }

    public function paymentFail()
    {
        $data['title'] = 'Payment Failed';
        return view('home.fail', $data);
    }

    public function aboutUs()
    {
        $data['title'] = 'About Us';
        return view('home.about-us', $data);
    }

    public function events()
    {
        $data['title'] = 'Events';
        return view('home.events', $data);
    }   

    public function checkout()
    {
        if ($this->request->all()) {
            session_start();
            $request['name'] = trim(strip_tags($this->request->input('name')));
            $request['email'] = trim(strip_tags($this->request->input('email')));
            foreach ($this->request->input('items') as $index => $vals) {
                $orderList[] = $vals . '-' . $this->request->input('quantity')[$index];  
            }
            $request['items'] = implode('|', ($orderList));
            $request['total_amount'] = $this->request->input('total_amount');
            $request['currency_code'] = $this->request->input('currency_code');
            $response = $this->home->saveOrderDetails($request);
            if ($response['success']) {
                unset($_SESSION['cart']);
                $_SESSION['orderId'] = $response['insert_id'];
            }
            echo json_encode($response);
        }
    } 
}    