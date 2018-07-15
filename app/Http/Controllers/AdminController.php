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
			$data['url'] = url('/admin/customer-orders');
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
}
