<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class ViewController extends Controller
{
    //All necessary view for only admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function create()
    {
        return view('admin.auth.register');
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

        // store in the database
        $admins = new Admin;
        $admins->name = $request->name;
        $admins->email = $request->email;
        $admins->password=bcrypt($request->password);

        $admins->save();


        return redirect()->route('admin.dashboard');

    }
    //show all available admins
    public function admin_list(){
        $admins = Admin::all();
        return view('admin.pages.admin_list', compact('admins'));
    }
}
