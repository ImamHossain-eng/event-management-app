<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Feedback;
use App\Venue;
use App\Photo;
use App\Food;
use App\Photography;
use App\Stage;
use App\Sound;
use App\Package;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index(){
        $staffs = Staff::orderBy('created_at', 'asc')->get()->take(4);
        $packages = Package::orderBy('created_at', 'desc')->where('creator', 'admin')->get()->take(3);
        $photos = Photo::all();
        return view('homepage', compact('staffs', 'packages', 'photos'));
    }
    public function staff_show($id){
        $staff = Staff::find($id);
        return view('pages.staff', compact('staff'));
    }
    public function feedback_message(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

    //initiate a new feedback message 
    $feedback = new Feedback;
    $feedback->name = $request->input('name');
    $feedback->email = $request->input('email');
    $feedback->message = $request->input('message');
    $feedback->save();
    return redirect()->route('index');
    }
    public function food_item(){
        $foods = Food::orderBy('created_at', 'asc')->simplePaginate(3);
        return view('pages.food_item', compact('foods'));
    }
    public function food_show($id){
        $food = Food::find($id);
        return view('pages.food_show', compact('food'));
    }
    public function venues_item(){
        $venues = Venue::orderBy('created_at', 'desc')->simplePaginate(3);
        return view('pages.venues_item', compact('venues'));
    }
    public function venues_show($id){
        $venue = Venue::find($id);
        return view('pages.venues_show', compact('venue'));
    }
    public function photo_item(){
        $photos = Photography::orderBy('created_at', 'desc')->simplePaginate(3);
        return view('pages.photos_item', compact('photos'));
    }
    public function photo_show($id){
        $photo = Photography::find($id);
        return view('pages.photo_show', compact('photo'));
    }
    public function sound_item(){
        $sounds = Sound::orderBy('created_at', 'desc')->simplePaginate(3);
        return view('pages.sounds_item', compact('sounds'));
    }
    public function sound_show($id){
        $sound = Sound::find($id);
        return view('pages.sounds_show', compact('sound'));
    }
    public function decoration(){
        //$stages = Stage::orderby('created_at', 'desc')->where('type', 'stage')->get();
        $stages = Stage::orderby('created_at', 'desc')->simplePaginate(3);
        return view('pages.decoration', compact('stages'));
    }
    public function decoration_show($id){
        $stage = Stage::find($id);
        return view('pages.stage_show', compact('stage'));
    }
    public function packages_all(){
        $packages = Package::orderBy('created_at', 'desc')->where('creator', 'admin')->simplePaginate(4);
        return view('pages.packages_all', compact('packages'));
    }
    public function package_show($id){
        $package = Package::find($id);
        //fetch all table info
        $venue_id = $package->venue_id;
        if($venue_id != 0){
            $venue = Venue::find($venue_id);
        }else{
            $venue = '';
        }
        
        $food_id = $package->food_id;

        if($food_id != 0){
            $food = Food::find($food_id);
        }else{
            $food = '';
        }
        
        $photography_id = $package->photography_id;
        if($photography_id != 0){
            $photography = Photography::find($photography_id);
        }else{
            $photography = '';
        }
       
        $sound_id = $package->sound_id;
        if($sound_id != 0){
            $sound = Sound::find($sound_id);
        }else{
            $sound = '';
        }
        
        $stage_id = $package->stages_id;
        if($stage_id != 0){
            $stage = Stage::find($stage_id);
        }else{
            $stage = '';
        }
        
        return view('pages.package_show', compact('package', 'venue', 'food', 'photography', 'sound', 'stage'));
    }
    public function contact(){
        return view('pages.contact');
    }
    public function Package_create(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
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
        foreach($packs as $pack){
            if($pack->type != $user_date){
                $date_today = Carbon::now();
                if($user_date > $date_today){
                    $date = $user_date;
                }else{
                    return redirect()->route('visitor.package_create')->with('error', 'ERROR: You choose an old date');
                }
            }else{
                if($pack->venue_id != $venue_id){
                    $date_today = Carbon::now();
                    if($user_date > $date_today){
                        $date = $user_date;
                    }else{
                        return redirect()->route('visitor.package_create')->with('error', 'ERROR: You choose an old date');
                    }
                }else{
                    return redirect()->route('visitor.package_create')->with('error', 'ERROR: This Venue has taken on this date');
                }
            }
        }

        //Person validation
        if ($total_people >= 25) {
            $people = $total_people;
        }else{
            return redirect()->route('visitor.package_create')->with('error', 'ERROR: Minimum 25 persons required');
        }

        //initiate an empty array
        $products = array();

        //Fetch data from database
        if($venue_id != 0){
            $venue = Venue::find($venue_id);
            $venue_price = $venue->price;
            $products['venue'] = $venue;
        }else{
            $venue_price = 0;
        }        

        if($food_id != 0){
            $food = Food::find($food_id);
            $products['food'] = $food;
            $food_p = $food->price;
        //todo
            $food_price = $food_p * $people;
        }else{
            $food_price = 0;
        }

        if($photo_id != 0){
            $photography = Photography::find($photo_id);
            $products['photo'] = $photography;
        //todo
            $photography_price = $photography->price;
        }else{
            $photography_price = 0;
        }

        if($sound_id != 0){
            $sound = Sound::find($sound_id);
            $products['sound'] = $sound;
            $sound_price = $sound->price;
        }else{
            $sound_price = 0;
        }

        if($stages_id != 0){
            $stage = Stage::find($stages_id);
            $products['stage'] = $stage;
        //todo
            $stage_price = $stage->price;
        }else{
            $stage_price = 0;
        }
        //Calculate the total price
        $price = $venue_price + $food_price + $photography_price + $sound_price + $stage_price;

        //price validation
        if($price != 0){
            $package = new Package;

        $package->food_id = $food_id;
        $package->venue_id = $venue_id;
        $package->photography_id = $photo_id;
        $package->sound_id = $sound_id;;
        $package->stages_id = $stages_id;
        $package->people = $people;
        $package->creator = $request->input('email');
        $package->body = $request->input('body');
        $package->type = $date;
        $package->amount = $price;
        
        $package->save();

        return view('visitor.payment', compact('package', 'products'));

        }else{
            return redirect()->route('visitor.package_create')->with('error', 'ERROR: You did not select any service');
        }

    }
    public function package_create_food(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create_food', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    public function package_create_venue(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create_venue', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    public function package_create_photo(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create_photo', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    public function package_create_sound(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create_sound', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    public function package_create_stage(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $stages = Stage::all();
        $sounds = Sound::all();
        return view('visitor.package_create_stage', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }

}
