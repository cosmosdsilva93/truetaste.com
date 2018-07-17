<?php

namespace App\Http\Controllers;
use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct(Request $request, Admin $admin)
	{
		$this->request = $request;
	    $this->admin = $admin;
	}    

    public function showLogin()
    {
        $data['title'] = 'Admin';
        return view('admin.login', $data);   
    }

    public function login() 
    {
    	$posted_data = $this->request->all();
		$posted_data['email'] = strip_tags(trim($posted_data['email']));
		$posted_data['password'] = strip_tags(trim($posted_data['password']));
		$response = $this->admin->login($posted_data);	
		if (count($response) > 0 && $response['success'] == 1) {
			$this->request->Session()->put('user_details', $response['userdetails']);
			$this->request->Session()->put('msg', $response['msg']);
			$data['url'] = url('/admin/orders');
		} else {
			$this->request->Session()->put('msg', $response['msg']);
			$data['url'] = url('/admin');
		}
		echo json_encode($data);
    }

	public function logout() {
		$this->request->session()->flush();
		return redirect()->route('login');
	}

	public function showOrders()
	{
		$response = $this->admin->getOrders();
		if (count($response) > 0 && $response['success'] == 1) {
			$data['orders'] = $response['orders'];
		}
		$menu = $this->admin->getMenu();
		if (count($menu) > 0 && $menu['success'] == 1) {
			foreach ($menu['menu'] as $itemDetails) {
				$menuArr[$itemDetails['id']] = $itemDetails['item'];
			}
			$data['menu'] = $menuArr;
		}
		$data['title'] = "Orders";
	    return view('admin.show_orders', $data);
	}

	public function showQueries()
	{
		$data['queries'] = array();
		$response = $this->admin->getQueries();
		if (count($response) > 0 && $response['success'] == 1) {
			$data['queries'] = $response['queries'];
		}
		$data['title'] = 'Queries';
		return view('admin.queries', $data);
	}

	public function showMenu()
	{
		$data['menu'] = array();
		$data['categories'] = unserialize(CATEGORIES);
		$response = $this->admin->getMenu();
		if (count($response) > 0 && $response['success'] == 1) {
			$data['menu'] = $response['menu'];
		}
		$data['title'] = 'Menu';
		return view('admin.menu', $data);
	}

	public function addMenu()
	{
		$data['itemData'] = array();
		session_start();
		if (isset($_SESSION['itemData'])) {
			$data['itemData'] = $_SESSION['itemData'];
		}
		session_destroy();
		$data['categories'] = unserialize(CATEGORIES);
		$data['title'] = 'Add Item';
		return view('admin.add-edit-menu', $data);
	}

	public function saveMenu()
	{
		if ($this->request->all()) {
			if ($this->request->input('itemId') != '') {
				$request['id'] = $this->request->input('itemId');
			}
			$request['item'] = trim(strip_tags($this->request->input('item')));
			$request['category'] = $this->request->input('category');
			$request['price'] = trim(strip_tags($this->request->input('price')));
			$response = $this->admin->saveMenu($request);
			$class = ($response['success']) ? 'alert-success' : 'alert-danger';
			$this->request->Session()->put('class', $class);
			$this->request->Session()->put('msg', $response['msg']);
			if ($response['success']) { 
				return \Redirect::route('edit_menu', [($this->request->input('itemId') != '') ? $this->request->input('itemId') : $response['insertId']]);
			} else {
				session_start();
				$_SESSION['itemData'] = $request;
				return \Redirect::route('add_menu');
			}
		}
	}

	public function editMenu($item)
	{
		$data['itemData'] = $this->admin->getItems([$item])[0];
		$data['categories'] = unserialize(CATEGORIES);
		$data['title'] = 'Edit Item';
		return view('admin.add-edit-menu', $data);
	}

	public function deleteMenu($id)
	{
		$postedData = $this->request->all();
		$response = $this->admin->deleteMenu($id);
		$class = "alert-danger";
		if (count($response) > 0 && $response['success'] == 1) {
			$class = "alert-success";
		}
		$this->request->Session()->put('class', $class);
		$this->request->Session()->put('msg', $response['msg']);
		return \Redirect::route('menu');
	}
}
