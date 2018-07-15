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
}    