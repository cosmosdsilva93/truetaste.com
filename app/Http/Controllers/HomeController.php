<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(Request $request)
    {
    	$this->request = $request;
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
}
