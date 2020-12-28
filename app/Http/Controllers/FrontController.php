<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Feedback;

class FrontController extends Controller
{
    public function index(){
        $staffs = Staff::orderBy('created_at', 'asc')->get()->take(4);
        return view('homepage', compact('staffs'));
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
}
