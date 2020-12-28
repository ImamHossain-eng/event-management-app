@extends('layouts.home')
@section('content')
<head>
    <style>
        #profile{
            margin-top: 3rem;
        }
    </style>
</head>
<div class="row" id="profile">
	<div class="col-md-3">
		<img src="/images/staffs/{{$staff->image}}" alt="Staff Profile Picture" style="width:90%;">
	</div>
	<div class="col-md-9"><br>
		<h3>{{$staff->name}}</h3><br>
		<h5></i>{{$staff->designation}}</h5><br>
		<h6></i>{{$staff->responsibility}}</h6><br>
		<h6>
		{{$staff->email}}</h6><br>
		<h6>+880{{$staff->mobile}}</h6><br>	
		
		
	</div>
</div><br>
@endsection