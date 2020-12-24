<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
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
            if($old != 'no_image.jpg'){
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


}