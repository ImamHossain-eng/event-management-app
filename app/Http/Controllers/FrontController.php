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

class FrontController extends Controller
{
    public function index(){
        $staffs = Staff::orderBy('created_at', 'asc')->get()->take(4);
        $packages = Package::orderBy('created_at', 'desc')->get()->take(3);
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
        $foods = Food::orderBy('created_at', 'desc')->simplePaginate(3);
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
        $venue = Venue::find($venue_id);
        $food_id = $package->food_id;
        $food = Food::find($food_id);
        $photography_id = $package->photography_id;
        $photography = Photography::find($photography_id);
        $stage_id = $package->stages_id;
        $stage = Stage::find($stage_id);
        return view('pages.package_show', compact('package', 'venue', 'food', 'photography', 'stage'));
    }
    public function contact(){
        return view('pages.contact');
    }
}
