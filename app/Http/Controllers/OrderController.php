<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Venue;
use App\Food;
use App\Photography;
use App\Stage;
use App\Package;
use App\User_pack;
use Image;
use File;
use Auth;

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
    public function package_all(){
        $packages = Package::orderBy('created_at', 'desc')->where('creator', 'admin')->simplePaginate(4);
        return view('user.package_all', compact('packages'));
    }
    public function package_create(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        return view('user.package_create', compact('foods', 'venues', 'photos', 'stages'));
    }
    public function package_store(Request $request){
        $this->validate($request, [
            'type' => 'required',
            'food_id' => 'required',
            'venue_id' => 'required'
        ]);
        //receive data to calculate
        $venue_id = $request->input('venue_id');
        $food_id = $request->input('food_id');
        $photo_id = $request->input('photography_id');
        $stages_id = $request->input('stages_id');
        $total_people = $request->input('people');

        //Fetch data from database
        $venue = Venue::find($venue_id);
        if ($total_people != '') {
            $people = $total_people;
        }else{
          $people = $venue->capacity;
        }
        
        //todo
        $venue_price = $venue->pricing;

        $food = Food::find($food_id); 
        $food_p = $food->price;
        //todo
        $food_price = $food_p * $people;

        $photography = Photography::find($photo_id);
        //todo
        $photography_price = $photography->price;

        $stage = Stage::find($stages_id);
        //todo
        $stage_price = $stage->price;

        $price = $venue_price + $food_price + $photography_price + $stage_price;

        $user_email = Auth::user()->email;

        $package = new Package;

        $package->type = $request->input('type');
        $package->food_id = $food_id;
        $package->venue_id = $venue_id;
        $package->photography_id = $photo_id;
        $package->stages_id = $stages_id;
        $package->people = $people;
        $package->creator = $user_email;
        $package->body = $request->input('body');
        $package->amount = $price;
        
        $package->save();

        return redirect()->route('user.package_index');
    }
    public function package_index(){
        $abc = Auth::user()->email;
        $packages = Package::orderBy('created_at', 'desc')->where('creator', $abc)->get()->take(2);
        return view('user.package_index', compact('packages'));
    }
    //payment 
    public function payment_create($id){
        $user = Auth::user()->email;
        $package = Package::find($id);
        return view('user.payment_create', compact('package'));
    }
    public function order_store(Request $request){
    	$this->validate($request, [
    		'user_id' => 'required',
    		'product_id' => 'required'
    	]);
    }
}
