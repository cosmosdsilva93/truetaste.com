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
}
