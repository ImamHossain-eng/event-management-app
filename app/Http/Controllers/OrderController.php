<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Venue;
use Image;
use File;

class OrderController extends Controller
{
	//All necessary view for only user
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function order_index(){
    	$orders = Order::all();
    	return view('user.order_index', compact('orders'));
    }
    public function order_create(){
    	$venues = Venue::all();
    	return view('user.order_create', compact('venues'));
    }
    public function order_store(Request $request){
    	$this->validate($request, [
    		'user_id' => 'required',
    		'product_id' => 'required',
    		''
    	]);
    }
}
