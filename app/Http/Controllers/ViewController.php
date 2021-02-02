<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class ViewController extends Controller
{
    //All necessary view for only admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function create()
    {
        
        if(Auth::user()->id===7){
            return view('admin.auth.register');
        }else{
            return redirect()->route('admin.dashboard')->with('error', 'You are not super admin');
        }
    }
    //store new admin details
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, [
          'name'          => 'required',
          'email'         => 'required',
          'password'      => 'required'

        ]);
        //validate super admin
        if(Auth::user()->id===7){
            // store in the database
            $admins = new Admin;
            $admins->name = $request->name;
            $admins->email = $request->email;
            $admins->password=bcrypt($request->password);
            $admins->save();
            return redirect()->route('admin.list')->with('success', 'New admin created');
        }else{
            return redirect()->route('admin.dashboard')->with('error', 'You are not super admin');
        }       

    }
    //show all available admins
    public function admin_list(){
        $admins = Admin::all();
        return view('admin.pages.admin_list', compact('admins'));
    }
    public function admin_destroy($id){
        if(Auth::user()->id===7){
            $admin = Admin::find($id);
            $admin->delete();
            return redirect()->route('admin.list')->with('error', 'One Admin Removed');
        }else{
            return redirect()->route('admin.list')->with('error', 'You are not super admin');
        }
        
    }
}
