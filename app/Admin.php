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

    public function getQueries()
    {
        $response = array();
        try {
            $getQueries = DB::table('contact_us')->select('id', 'name', 'email', 'message', 'created_at')
                          ->orderBy('id', 'DESC')->get()->toArray();
            $getQueries = json_decode(json_encode($getQueries), true);
            if (count($getQueries) > 0) {
                $response['success'] = 1;
                $response['msg'] = '';  
                $response['queries'] = $getQueries; 
            }  
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function getMenu()
    {
        $response = array();
        try {
            $getMenu = DB::table('menu')->select('id', 'category', 'item', 'price', 'status')->where('status', '=', '1')->get()->toArray();
            $getMenu = json_decode(json_encode($getMenu), true);
            if (count($getMenu) > 0) {
                $response['success'] = 1;
                $response['msg'] = '';  
                $response['menu'] = $getMenu; 
            }  
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function getOrders()
    {
        $response = array();
        try {
            $getOrders = DB::table('orders')->select('*')->where('status', '=', '1')
                          ->orderBy('id', 'DESC')->get()->toArray();
            $getOrders = json_decode(json_encode($getOrders), true);
            if (count($getOrders) > 0) {
                $response['success'] = 1;
                $response['msg'] = '';  
                $response['orders'] = $getOrders; 
            }  
        } catch (\Exception $e) {
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function saveMenu($request)
    {
        if(isset($request['id']))
        {
            $request['updated_at'] = date('Y-m-d H:i:s');
        } else {
            $request['created_at'] = date('Y-m-d H:i:s');
        }
        DB::beginTransaction();
        try {
            if(isset($request['id']))
            {
                $item_id = $request['id']; 
                unset($request['id']);
                DB::table('menu')->where('id', '=', $item_id)->update($request);
                DB::commit();                
                $response['msg'] = 'Item has been updated successfully.';
            } else {
                $response['insertId'] = DB::table('menu')->insertGetId($request);
                DB::commit();
                $response['msg'] = 'Item has been added to the menu successfully.';
            }
            $response['success'] = 1;
            
        } catch (\Exception $e) {
            DB::rollback();
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function getItems($itemIds)
    {
        $cart = DB::table('menu')->select('id', 'category', 'item', 'price')
                ->whereIn('id', $itemIds)
                ->get()->toArray();
        $cart = json_decode(json_encode($cart), true);
        return $cart;
    }

    public function deleteMenu($id)
    {
        DB::beginTransaction();
        try {
            DB::table('menu')->where('id', $id)->update(['status' => '0']);
            DB::commit();
            $response['success'] = 1;
            $response['msg'] = 'Item has been successfully deleted.';
        } catch (\Exception $e) {
            DB::rollback();
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }


}
