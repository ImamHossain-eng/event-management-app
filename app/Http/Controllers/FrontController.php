<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Feedback;
use App\Venue;
use App\Photo;
use App\Food;
use App\Photography;
use App\Sound;

class FrontController extends Controller
{
    public function index(){
        $staffs = Staff::orderBy('created_at', 'asc')->get()->take(4);
        $venues = Venue::orderBy('created_at', 'asc')->get()->take(3);
        $photos = Photo::all();
        return view('homepage', compact('staffs', 'venues', 'photos'));
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
}
