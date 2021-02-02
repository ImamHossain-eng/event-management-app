<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Venue;
use App\Food;
use App\Photography;
use App\Sound;
use App\Stage;
use App\Package;
use App\User_pack;
use Image;
use File;
use Auth;
use Carbon\Carbon;


class OrderController extends Controller
{
	//All necessary view for only user
    public function __construct()
    {
        $this->middleware('auth');
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
        $sounds = Sound::all();
        return view('user.package_create', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    public function package_store(Request $request){
        $this->validate($request, [
            'food_id' => 'required',
            'venue_id' => 'required',
            'sound_id' => 'required',
            'type' => 'required',
            'people' => 'required'
        ]);

        //receive data to calculate
        $venue_id = $request->input('venue_id');
        $food_id = $request->input('food_id');
        $photo_id = $request->input('photography_id');
        $sound_id = $request->input('sound_id');
        $stages_id = $request->input('stages_id');
        $total_people = $request->input('people');
        $user_date = $request->input('type');

        //Date validation
        $packs = Package::all();
        //today
        foreach($packs as $pack){
            if($pack->type != $user_date){
                $date_today = Carbon::now();
                if($user_date > $date_today){
                    $date = $user_date;
                }else{
                    return redirect()->route('user.package_create')->with('error', 'ERROR: You choose an old date');
                }
            }else{
                if($pack->venue_id != $venue_id){
                    $date_today = Carbon::now();
                    if($user_date > $date_today){
                        $date = $user_date;
                    }else{
                        return redirect()->route('user.package_create')->with('error', 'ERROR: You choose an old date');
                    }
                }else{
                    return redirect()->route('user.package_create')->with('error', 'ERROR: This Venue has taken on this date');
                }
            }
        }
        //check for old date
        /*if($user_date > $date_today){
            foreach($packs as $pack){
                if($pack->type != $user_date){
                    $date = $user_date;
                }else{
                    if($pack->venue_id != $venue_id){
                        $date = $user_date;
                    }else{
                        return redirect()->route('user.package_create')->with('error', 'ERROR: This Venue has taken on this date');
                    }
                }
            }

        }else{
            return redirect()->route('user.package_create')->with('error', 'ERROR: You choose an old date');
        }*/


        //Person validation
        if ($total_people >= 25) {
            $people = $total_people;
        }else{
            return redirect()->route('user.package_create')->with('error', 'ERROR: Minimum 25 persons required');
        }

        //initiate an empty array
        $products = array();


        
        //Fetch data from database
        if($venue_id != 0){
            $venue = Venue::find($venue_id);
            $products['venue'] = $venue;
            $venue_price = $venue->price;

        }else{
            $venue_price = 0;
        }        
        

        if($food_id != 0){
            $food = Food::find($food_id);
            $food_p = $food->price;
            $products['food'] = $food;
            $food_price = $food_p * $people;
        }else{
            $food_price = 0;
        }

        if($photo_id != 0){
            $photography = Photography::find($photo_id);
            $products['photography'] = $photography;
            $photography_price = $photography->price;
        }else{
            $photography_price = 0;
        }

        if($sound_id != 0){
            $sound = Sound::find($sound_id);
            $sound_price = $sound->price;
            $products['sound'] = $sound;
        }else{
            $sound_price = 0;
        }

        if($stages_id != 0){
            $stage = Stage::find($stages_id);
            $products['stage'] = $stage;
            $stage_price = $stage->price;
        }else{
            $stage_price = 0;
        }

        //Calculate the total price

        $price = $venue_price + $food_price + $photography_price + $sound_price + $stage_price;

        $user_email = Auth::user()->email;

        //price validation
        if($price != 0){
            $package = new Package;

        $package->food_id = $food_id;
        $package->venue_id = $venue_id;
        $package->photography_id = $photo_id;
        $package->sound_id = $sound_id;;
        $package->stages_id = $stages_id;
        $package->people = $people;
        $package->creator = $user_email;
        $package->body = $request->input('body');
        $package->type = $date;
        $package->amount = $price;
        $package->confirmed = 0;
        
        $package->save();

        return redirect()->route('user.package_index')->with('success', 'Successfully Created the package');
    }else{
        return redirect()->route('user.package_create')->with('error', 'ERROR: You didnt select any service');
    }
    }
    public function package_index(){
        $abc = Auth::user()->email;
        $orders = Order::all();        
        $packs = Package::orderBy('created_at', 'desc')->where('creator', $abc)->where('confirmed', 0)->get();
        return view('user.package_index', compact('packs'));
    }
    
    public function package_destroy($id){
        Package::find($id)->delete();
        return redirect()->route('user.package_index')->with('error', 'Successfully Deleted Your Package');
    }
    //payment 
    public function payment_create($id){
        //$user = Auth::user()->email;
        $package = Package::find($id);

        $people = $package->people;
        $venue_id = $package->venue_id;
        $food_id = $package->food_id;
        $photography_id = $package->photography_id;
        $sound_id = $package->sound_id;
        $stages_id = $package->stages_id;


        //initiate an empty array
        $products = array();


        //Fetch data from database
        //Fetch data from database
        if($venue_id != 0){
            $venue = Venue::find($venue_id);
            $products['venue'] = $venue;
            $venue_price = $venue->pricing;

        }else{
            $venue_price = 0;
        }        
        

        if($food_id != 0){
            $food = Food::find($food_id);
            $food_p = $food->price;
            $products['food'] = $food;
            $food_price = $food_p * $people;
        }else{
            $food_price = 0;
        }

        if($photography_id != 0){
            $photography = Photography::find($photography_id);
            $products['photography'] = $photography;
            $photography_price = $photography->price;
        }else{
            $photography_price = 0;
        }

        if($sound_id != 0){
            $sound = Sound::find($sound_id);
            $sound_price = $sound->price;
            $products['sound'] = $sound;
        }else{
            $sound_price = 0;
        }

        if($stages_id != 0){
            $stage = Stage::find($stages_id);
            $products['stage'] = $stage;
            $stage_price = $stage->price;
        }else{
            $stage_price = 0;
        }

        return view('user.payment_create', compact('package', 'products'));
    }

    public function payment_info(){
        $user_email = Auth::user()->email;
        $orders = Order::where('email', $user_email)->get();
        return view('user.payment_info', compact('orders'));
    }
}
