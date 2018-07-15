<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class Admin extends Model
{
    public function login($request)
    {
        try {
            $getCreds = DB::table('users')->select('id', 'first_name', 'last_name', 'email', 'admin_login')->where(['email' => $request['email'], 'password' => md5($request['password']), 'status' => 1])->get()->toArray();
            $getCreds = json_decode(json_encode($getCreds), true);
            if (count($getCreds) > 0) {
                $getCreds = array_values($getCreds);
                if ($getCreds[0]['admin_login']) {
                    $response['success'] = 1;
                    $response['msg'] = '';  
                    $response['userdetails'] = $getCreds[0]; 
                } else {
                    $response['success'] = 0;
                    $response['msg'] = 'Sorry. You are not authorized to login.';
                }   
            } else {
                $response['success'] = 0;
                $response['msg'] = 'Invalid Email Id or Password. Please try again.';
            }   
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }
}
