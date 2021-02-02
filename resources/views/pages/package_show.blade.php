@extends('layouts.home')
@section('content')
<head>
	<style type="text/css">
	img{
		width:100%;
	}
	#pack{
		justify-content: center;
	}
	.mh-10 > div{
		min-height: 15rem;
	}
	.mh-10 > div > div > a{
		width:100%;
	}
	</style>
</head>
<body>
	<div class="row" id="pack_img" style="margin-top:3rem;align-items:center;">
		<div class="col-md-4">
			<img src="/images/venues/{{$venue->image}}" alt="image">
		</div>
		<div class="col-md-4">
			<div class="card border-success mb-3" style="max-width: 18rem;margin-left:2rem;">
  				<div class="card-header">Package Info</div>
  				<div class="card-body text-success">
   	 				<h5 class="card-title">Date: {{$package->type}} </h5>
   	 				<p class="card-text">Persons: {{$package->people}} </p>
   					<p class="card-text">BDT: {{number_format($package->amount, 2)}} </p>
   					<a href="/home/payment/{{$package->id}}" class="btn btn-primary">Purchase now</a>
 			 	</div>
			</div>			
		</div>
		<div class="col-md-3">
			<p style="padding:2rem;">
				{!!$package->body!!}	
			</p>		
		</div>

	</div><br>
	<div class="row" id="pack">
		@if($food != '')
		<!--food div-->
		<div class="col-md-2 mh-10">
			<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  				<div class="card-header">Food Item</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$food->name}} </h5>
    				<p class="card-text">BDT: {{$food->price}} /= per person</p>
    				<a href="/food_item/{{$food->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		@endif
		@if($venue != '')
		<!--venue div-->
		<div class="col-md-2 mh-10">
			<div class="card bg-light mb-3" style="max-width: 18rem;">
  				<div class="card-header">Venue</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$venue->name}} </h5>
    				<p class="card-text">BDT: {{$venue->price}} /= per day</p>
    				<p class="card-text">Capacity: {{$venue->capacity}} persons</p>
    				<a href="/venues/{{$venue->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		@endif
		@if($photography != '')
		<!--photography div-->
		<div class="col-md-2 mh-10">
			<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
  				<div class="card-header">Photography Service</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$photography->name}} </h5>
    				<p class="card-text">BDT: {{$photography->price}} /= per day</p>
    				<a href="/photography/{{$photography->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		@endif
		@if($stage != '')
		<!--Decoration div-->
		<div class="col-md-2 mh-10">
			<div class="card bg-light mb-3" style="max-width: 18rem;margin-right:2rem;">
  				<div class="card-header">Decoration Service</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$stage->name}} </h5>
    				<p class="card-text">BDT: {{$stage->price}} /= per day</p>
    				<a href="/decoration/{{$stage->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		@endif
		@if($sound != '')
		<!--Decoration div-->
		<div class="col-md-2 mh-10">
			<div class="card text-white bg-dark  mb-3" style="max-width: 18rem;margin-right:2rem;">
  				<div class="card-header">Sound System</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$sound->name}} </h5>
    				<p class="card-text">BDT: {{$sound->price}} /= per day</p>
    				<a href="/sounds/{{$sound->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		@endif
	</div>
</body>
@endsection