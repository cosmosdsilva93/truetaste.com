<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;


class Home extends Model
{
    public function saveMessage($request)
    {
    	$request['created_at'] = date('Y-m-d H:i:s');
    	DB::beginTransaction();
    	try {
    	    DB::table('contact_us')->insert($request);
    	    DB::commit();
    	    $response['success'] = 1;
    	    $response['msg'] = 'We have received your message. Someone from our team will get back to you shortly.';
    	} catch (\Exception $e) {
    	    DB::rollback();
    	    $response['success'] = 0;
    	    $response['msg'] = ERROR_MSG;
    	}
    	return $response;
    }

    public function getMenu()
    {
        $menu = DB::table('menu')->select('id', 'category', 'item', 'price')
                ->where('status', '!=', '0')
                ->get()->toArray();
        $menu = json_decode(json_encode($menu), true);
        return $menu;
    }

    public function getItems($itemIds)
    {
        $cart = DB::table('menu')->select('id', 'category', 'item', 'price')
                ->whereIn('id', $itemIds)
                ->get()->toArray();
        $cart = json_decode(json_encode($cart), true);
        return $cart;
    }

    public function saveOrderDetails($request)
    {
        $request['created_at'] = date('Y-m-d H:i:s');
        DB::beginTransaction();
        try {
            $response['insert_id'] = DB::table('orders')->insertGetId($request);
            DB::commit();
            $response['success'] = 1;
            $response['msg'] = '';
        } catch (\Exception $e) {
            DB::rollback();
            // echo "Line No: " . __LINE__ . "<br/>";
            // echo "Filename: " .  __FILE__ . "<br/>";
            // echo "<pre><br/>";
            // print_r($e->getMessage());
            // echo "</pre>";
            // exit();
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function updateOrderDetails($orderId, $transactionId)
    {
        DB::beginTransaction();
        try {
            $response['insert_id'] = DB::table('orders')->where('id', '=', $orderId)->update(['transaction_id' => $transactionId, 'status' => '1']);
            DB::commit();
            $response['success'] = 1;
            $response['msg'] = '';
        } catch (\Exception $e) {
            DB::rollback();
            // echo "Line No: " . __LINE__ . "<br/>";
            // echo "Filename: " .  __FILE__ . "<br/>";
            // echo "<pre><br/>";
            // print_r($e->getMessage());
            // echo "</pre>";
            // exit();
            $response['success'] = 0;
            $response['msg'] = ERROR_MSG;
        }
        return $response;
    }

    public function getOrderDetails($orderId)
    {
        $order = DB::table('orders')->select('*')
                ->where('id', '=', $orderId)
                ->get()->toArray();
        $order = json_decode(json_encode($order), true);
        return $order;
    }

    public function saveUser($request)
    {
        $getUser = DB::table('users')->select('id', 'first_name', 'last_name', 'email')->where('email', '=', $request['email'])->get()->toArray();
        if (!count($getUser)) {
            DB::beginTransaction();
            try {
                $request['created_at'] = date('Y-m-d H:i:s');
                DB::table('users')->insert($request);
                DB::commit();
                $response['success'] = 1;
            } catch (\Exception $e) {
                DB::rollback();
                $response['success'] = 0;
                // $response['msg'] = ERROR_MSG;
            }
        } else {
            $response['success'] = 1;
        }
        return $response;
    }
}
