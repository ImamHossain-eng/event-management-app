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
use Image;
use File;

class BackController extends Controller
{
    //All necessary view for only admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function staff_index(){
        $staffs = Staff::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.pages.staff_list', compact('staffs'));
    }
    public function staff_create(){
        return view('admin.pages.staff_create');
    }
    public function staff_store(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'designation' => 'required'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(500, 550)->save( public_path('/images/staffs/'.$file_name));
        }
        else {
            $file_name = 'no_image.jpg';
        }

        $staff = new Staff;

        $staff->name = $request->input('name');
        $staff->designation = $request->input('designation');
        $staff->email = $request->input('email');
        $staff->mobile = $request->input('mobile');
        $staff->responsibility = $request->input('responsibility');
        $staff->image = $file_name;

        $staff->save();
        return redirect()->route('admin.staffs')->with('Successfully Inserted');

    }
    public function staff_destroy($id){
        $staff = Staff::find($id);
        $oldImg = $staff->image;
        if($oldImg != 'no_image.jpg'){
            File::delete( public_path('/images/staffs/'.$oldImg));
        }
        $staff->delete();
        return redirect()->route('admin.staffs');
    }
    public function staff_edit($id){
        $staff = Staff::find($id);
        return view('admin.pages.staff_edit', compact('staff'));
    }
    public function staff_update(Request $request, $id){
        $this->validate($request, [
            'name'=>'required',
            'designation' => 'required'
        ]);
        //find the exist info
        $staff = Staff::find($id);
        //Hold the old pic
        $oldImg = $staff->image;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(500, 550)->save( public_path('/images/staffs/'.$file_name));
            if($oldImg != 'no_image.jpg'){
            File::delete( public_path('/images/staffs/'. $oldImg));
            }
        }
        else{
            $file_name = $oldImg;
        }
        $staff->name = $request->input('name');
        $staff->designation = $request->input('designation');
        $staff->email = $request->input('email');
        $staff->mobile = $request->input('mobile');
        $staff->responsibility = $request->input('responsibility');
        $staff->image = $file_name;

        $staff->save();
        return redirect()->route('admin.staffs')->with('Successfully Updated');
    }
    //show all feedbacks
    public function feedback_index(){
        $feeds = Feedback::all();
        return view('admin.pages.feedback_index', compact('feeds'));
    }
    //destroy feedback
    public function feedback_destroy($id){
        Feedback::find($id)->delete();
        return redirect()->route('admin.feedback_index');

    }

    //Venue Crud start from here
    public function venue_index(){
        $venues = Venue::all();
        return view('admin.pages.venue_index', compact('venues'));
    }
    public function venue_create(){
        return view('admin.pages.venue_create');
    }
    public function venue_store(Request $request){
        //validation
        $this->validate($request, [
            'name' => 'required',
            'pricing' => 'required',
            'capacity' => 'required',
        ]);
        //save the image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/images/venues/'.$file_name));
        }
        else{
            $file_name = 'no_image.jpg';
        }
        //Initiate new Venue
        $venue = new Venue;

        $venue->name = $request->input('name');
        $venue->capacity = $request->input('capacity');
        $venue->pricing = $request->input('pricing');
        $venue->venue_tag = $request->input('venue_tag');
        $venue->body = $request->input('body');
        $venue->image = $file_name;

        $venue->save();

        return redirect()->route('admin.venue');

    }
    public function venue_destroy($id){
        $venue = Venue::find($id);
        $venue->delete();
        return redirect()->route('admin.venue');
    }
    public function venue_edit($id){
        $venue = Venue::find($id);
        return view('admin.pages.venue_edit', compact('venue'));
    }
    public function venue_update(Request $request, $id){
        //validation
        $this->validate($request, [
            'name' => 'required',
            'pricing' => 'required',
            'capacity' => 'required',
        ]);

        $venue = Venue::find($id);
        $oldImg = $venue->image; 

        //save the image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(700, 400)->save(public_path('/images/venues/'.$file_name));
            if($oldImg != 'no_image.jpg'){
                File::delete( public_path('/images/venues/'. $oldImg));
            }
        }
        else{
            $file_name = $oldImg;
        }

        $venue->name = $request->input('name');
        $venue->capacity = $request->input('capacity');
        $venue->pricing = $request->input('pricing');
        $venue->venue_tag = $request->input('venue_tag');
        $venue->body = $request->input('body');
        $venue->image = $file_name;

        $venue->save();

        return redirect()->route('admin.venue');
    }
    //Photo Crud
    public function photo_index(){
        $photos = Photo::all();
        return view('admin.pages.photo_index', compact('photos'));
    }
    public function photo_create(){
        return view('admin.pages.photo_create');
    }
    public function photo_store(Request $request){
        $this->validate($request, ['image'=>'required', 'type'=>'required']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;

            Image::make($file)->resize(1000, 400)->save(public_path('images/slider/'.$file_name));
        }
        else{
            return redirect()->route('photo.create')
            ->with('error', 'Please Select any Photo');
        }
         $photo = new Photo;
         $photo->type = $request->input('type');
         $photo->image = $file_name;
         $photo->save();
         return redirect()->route('admin.photo')->with('success', 'Successfully Uploaded');
    }
    public function photo_destroy($id){
        $photo = Photo::find($id);
        $old = $photo->image;
        File::delete(public_path('/images/slider/'.$old));
        $photo->delete();
        return redirect()->route('admin.photo');
    }
    public function food_index(){
        $foods = Food::all();
        return view('admin.pages.food_index', compact('foods'));
    }
    public function food_create(){
        return view('admin.pages.food_create');
    }
    public function food_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/food/'.$file_name));
        }
        else{
            $file_name = 'no_image.jpg';
        }

        $food = new Food;

        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category = $request->input('category');
        $food->details = $request->input('details');
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.food_index');
    }
    public function food_destroy($id){
        $food = Food::find($id);
        //delete food old image
        $old = $food->image;
        if($old != 'no_image.jpg'){
            File::delete(public_path('/images/food/'.$old));
        }
        $food->delete();
        return redirect()->route('admin.food_index');
    }
    public function food_edit($id){
        $food = Food::find($id);
        return view('admin.pages.food_edit', compact('food'));
    }
    public function food_update(Request $request, $id){
        $food = Food::find($id);
        $oldImg = $food->image;

        //validation
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/food/'.$file_name));
            if($oldImg != 'no_image.jpg'){
                File::delete( public_path('/images/venues/'. $oldImg));
            }

        }
        else{
            $file_name = $oldImg;
        }

        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category = $request->input('category');
        $food->details = $request->input('details');
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.food_index');
    }
    //photography crud
    public function photos_index(){
        $photos = Photography::all();
        return view('admin.pages.photos_index', compact('photos'));
    }
    public function photos_create(){
        return view('admin.pages.photos_create');
    }
    public function photos_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/photography/'.$file_name));
        }
        else{
            $file_name = 'no_image.jpg';
        }

        $food = new Photography;

        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->category = $request->input('category');
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.photos_index');
    }
    public function photos_destroy($id){
        $photo = Photography::find($id);
        //delete old pic
        $old = $photo->image;
        if($old != 'no_image.jpg'){
            File::delete(public_path('/images/photography/'.$old));
        }
        $photo->delete();
        return redirect()->route('admin.photos_index');
    }
    public function photos_edit($id){
        $photo = Photography::find($id);
        return view('admin.pages.photos_edit', compact('photo'));
    }
    public function photos_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);
        $photo = Photography::find($id);
        $oldImg = $photo->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/photography/'.$file_name));
            if($oldImg != 'no_image.jpg'){
                File::delete( public_path('/images/photography/'. $oldImg));
            }

        }
        else{
            $file_name = $oldImg;
        }

        $photo->name = $request->input('name');
        $photo->price = $request->input('price');
        $photo->category = $request->input('category');
        $photo->image = $file_name;

        $photo->save();
        return redirect()->route('admin.photos_index');
    }
    public function sounds_index(){
        $sounds = Sound::all();
        return view('admin.pages.sound_index', compact('sounds'));
    }
    public function sounds_create(){
        return view('admin.pages.sound_create');
    }
    public function sounds_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/sound/'.$file_name));
        }
        else{
            $file_name = 'no_image.jpg';
        }

        $sound = new Sound;

        $sound->name = $request->input('name');
        $sound->price = $request->input('price');
        $sound->category = $request->input('category');
        $sound->image = $file_name;

        $sound->save();
        return redirect()->route('admin.sounds_index');
    }
    public function sounds_destroy($id){
        $sound = Sound::find($id);
        //Old image delete
        $oldImg = $sound->image;
        if($oldImg != 'no_image.jpg'){
            File::delete(public_path('images/sound/'.$oldImg));
        }
        $sound->delete();
        return redirect()->route('admin.sounds_index');
    }
    public function sounds_edit($id){
        $sound = Sound::find($id);
        return view('admin.pages.sounds_edit', compact('sound'));
    }
    public function sounds_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'category' => 'required'
        ]);

        $sound = Sound::find($id);
        $oldImg = $sound->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/sound/'.$file_name));
            if($oldImg != 'no_image.jpg'){
                File::delete(public_path('images/sound/'.$oldImg));
            }
        }
        else{
            $file_name = $oldImg;
        }


        $sound->name = $request->input('name');
        $sound->price = $request->input('price');
        $sound->category = $request->input('category');
        $sound->image = $file_name;

        $sound->save();
        return redirect()->route('admin.sounds_index');

    }

}