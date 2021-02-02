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
use App\Stage;
use App\Package;
use App\Order;
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
        return redirect()->route('admin.staffs')->with('success', 'Successfully Inserted');

    }
    public function staff_destroy($id){
        $staff = Staff::find($id);
        $oldImg = $staff->image;
        if($oldImg != 'no_image.jpg'){
            File::delete( public_path('/images/staffs/'.$oldImg));
        }
        $staff->delete();
        return redirect()->route('admin.staffs')->with('error', 'Successfully Deleted');
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
        return redirect()->route('admin.staffs')->with('warning', 'Successfully Updated');
    }
    //show all feedbacks
    public function feedback_index(){
        $feeds = Feedback::all();
        return view('admin.pages.feedback_index', compact('feeds'));
    }
    //destroy feedback
    public function feedback_destroy($id){
        Feedback::find($id)->delete();
        return redirect()->route('admin.feedback_index')->with('error', 'Deleted one feedback');
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
            'price' => 'required',
            'capacity' => 'required'
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
        $venue->price = $request->input('price');
        $venue->body = $request->input('body');
        $venue->image = $file_name;

        $venue->save();

        return redirect()->route('admin.venue')->with('success', 'Successfully Inserted a Venue');

    }
    public function venue_destroy($id){
        $venue = Venue::find($id);
        $venue->delete();
        return redirect()->route('admin.venue')->with('error', 'Successfully Removed a Venue');
    }
    public function venue_edit($id){
        $venue = Venue::find($id);
        return view('admin.pages.venue_edit', compact('venue'));
    }
    public function venue_update(Request $request, $id){
        //validation
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'capacity' => 'required'
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
        $venue->price = $request->input('price');
        $venue->body = $request->input('body');
        $venue->image = $file_name;

        $venue->save();

        return redirect()->route('admin.venue')->with('warning', 'Successfully Updated');
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
            'price' => 'required'
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
        $food->details = $request->input('details');
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.food_index')->with('success', 'Successfully Created a Food Package');
    }
    public function food_destroy($id){
        $food = Food::find($id);
        //delete food old image
        $old = $food->image;
        if($old != 'no_image.jpg'){
            File::delete(public_path('/images/food/'.$old));
        }
        $food->delete();
        return redirect()->route('admin.food_index')->with('error', 'Deleted a Food Package');
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
            'price' => 'required'
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
        $food->details = $request->input('details');
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.food_index')->with('warning', 'Updated a Food Package');
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
            'price' => 'required'
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
        $food->body = $request->input('body'); 
        $food->image = $file_name;

        $food->save();
        return redirect()->route('admin.photos_index')->with('success', 'Successfully Created a Photography Service');
    }
    public function photos_destroy($id){
        $photo = Photography::find($id);
        //delete old pic
        $old = $photo->image;
        if($old != 'no_image.jpg'){
            File::delete(public_path('/images/photography/'.$old));
        }
        $photo->delete();
        return redirect()->route('admin.photos_index')->with('error', 'Deleted a Photography Service');
    }
    public function photos_edit($id){
        $photo = Photography::find($id);
        return view('admin.pages.photos_edit', compact('photo'));
    }
    public function photos_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
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
        $photo->body = $request->input('body'); 
        $photo->image = $file_name;

        $photo->save();
        return redirect()->route('admin.photos_index')->with('warning', 'Updated a Photography Service');
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
            'price' => 'required'
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
        $sound->body2 = $request->input('body2');
        $sound->image = $file_name;

        $sound->save();
        return redirect()->route('admin.sounds_index')->with('success', 'Successfully Created a Service');
    }
    public function sounds_destroy($id){
        $sound = Sound::find($id);
        //Old image delete
        $oldImg = $sound->image;
        if($oldImg != 'no_image.jpg'){
            File::delete(public_path('images/sound/'.$oldImg));
        }
        $sound->delete();
        return redirect()->route('admin.sounds_index')->with('error', 'Successfully Deleted a Service');
    }
    public function sounds_edit($id){
        $sound = Sound::find($id);
        return view('admin.pages.sounds_edit', compact('sound'));
    }
    public function sounds_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
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
        $sound->body2 = $request->input('body2');
        $sound->image = $file_name;

        $sound->save();
        return redirect()->route('admin.sounds_index')->with('warning', 'Successfully Updated a Service');

    }
    //decoration crud
    public function stages_index(){
        $stages = Stage::all();
        return view('admin.pages.stages_index', compact('stages'));
    }
    public function stages_create(){
        return view('admin.pages.stages_create');
    }
    public function stages_store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/decoration/'.$file_name));
        }
        else{
            $file_name = 'no_image.jpg';
        }

        $stage = new Stage;

        $stage->name = $request->input('name');
        $stage->price = $request->input('price');
        $stage->body = $request->input('body');
        $stage->image = $file_name;

        $stage->save();
        return redirect()->route('admin.stages_index')->with('success', 'Successfully Created a Decoration Service');
    }
    public function stages_destroy($id){
        $stage = Stage::find($id);
        $oldImg = $stage->image;
        if($oldImg != 'no_image.jpg'){
            File::delete(public_path('images/decoration/'.$oldImg));
        }
        $stage->delete();
        return redirect()->route('admin.stages_index')->with('error', 'Deleted a Decoration Service');
    }
    public function stages_edit($id){
        $stage = Stage::find($id);
        return view('admin.pages.stages_edit', compact('stage'));
    }
    public function stages_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required'
        ]);

        $stage = Stage::find($id);
        $old = $stage->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(1000, 400)->save(public_path('images/decoration/'.$file_name));
            if($old != 'no_image.jpg'){
                File::delete(public_path('images/decoration/'.$old));
            }
        }
        else{
            $file_name = $old;
        }

        $stage->name = $request->input('name');
        $stage->price = $request->input('price');
        $stage->body = $request->input('body');
        $stage->image = $file_name;

        $stage->save();
        return redirect()->route('admin.stages_index')->with('warning', 'Updated a Decoration Service');
    }
    public function package_index(){
        $packages = Package::orderBy('created_at', 'desc')->get();
        return view('admin.pages.package_index', compact('packages'));
    }
    public function package_create(){
        $foods = Food::all();
        $venues = Venue::all();
        $photos = Photography::all();
        $sounds = Sound::all();
        $stages = Stage::all();
        return view('admin.pages.package_create', compact('foods', 'venues', 'photos', 'stages', 'sounds'));
    }
    //calculate amount and store the package
    public function package_store(Request $request){
        $this->validate($request, [
            'people' => 'required'
        ]);
        //receive data to calculate
        $venue_id = $request->input('venue_id');
        $food_id = $request->input('food_id');
        $photo_id = $request->input('photography_id');
        $sound_id = $request->input('sound_id');
        $stages_id = $request->input('stages_id');
        $total_people = $request->input('people');

       //Persons Validation
        if ($total_people > 25) {
            $people = $total_people;
        }else{
          return redirect()->route('admin.package_create')->with('error', 'Minimum 25 Persons Required');
        }

         //Fetch data from database
        if($venue_id != 0){
            $venue = Venue::find($venue_id);
            $venue_price = $venue->pricing;
        }else{
            $venue_price = 0;
        }
        
        if($food_id != 0){
            $food = Food::find($food_id); 
            $food_p = $food->price;
            $food_price = $food_p * $people;
        }else{
            $food_price = 0;
        }
        
        if($photo_id){
            $photography = Photography::find($photo_id);
            $photography_price = $photography->price;
        }else{
            $photography_price = 0;
        }

        if($sound_id != 0){
            $sound = Sound::find($sound_id);
            $sound_price = $sound->price;
        }else{
            $sound_price = 0;
        }

        if($stages_id != 0){
            $stage = Stage::find($stages_id);
            //todo
            $stage_price = $stage->price;
        }else{
            $stage_price = 0;
        }

        //calculate the total price
        $price = $venue_price + $food_price + $photography_price + $sound_price + $stage_price;

        if($price != 0){
            $package = new Package;

            $package->food_id = $food_id;
            $package->venue_id = $venue_id;
            $package->photography_id = $photo_id;
            $package->sound_id = $sound_id;
            $package->stages_id = $stages_id;
            $package->people = $people;
            $package->creator = 'admin';
            $package->body = $request->input('body');
            $package->type = '';
            $package->amount = $price;
        
            $package->save();
            return redirect()->route('admin.package_index')->with('success', 'Created New Package');
        }else{
            return redirect()->route('admin.package_create')->with('error', 'Please Select any Service for this Package');
        }
    }
    public function package_destroy($id){
        Package::find($id)->delete();
        return redirect()->route('admin.package_index')->with('error', 'Deleted a package');
    }
    public function payment_info(){
        $orders = Order::orderBy('id', 'desc')->simplePaginate(10);
        return view('admin.pages.payment_info', compact('orders'));
    }
}