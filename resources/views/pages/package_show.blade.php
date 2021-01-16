@extends('layouts.home')
@section('content')
<head>
	<style type="text/css">
	img{
		width:100%;
	}
	

		
	</style>
</head>
<body>
	<br>
	<div class="row">
		<div class="col-md-4">
			<img src="/images/venues/{{$venue->image}}" alt="image">
		</div>
		<!--food div-->
		<div class="col-md-2">
			<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
  				<div class="card-header">Food Item</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$food->name}} </h5>
    				<p class="card-text">BDT: {{$food->price}} /= per person</p>
    				<a href="/food_item/{{$food->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		<!--venue div-->
		<div class="col-md-2">
			<div class="card bg-light mb-3" style="max-width: 18rem;">
  				<div class="card-header">Venue</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$venue->name}} </h5>
    				<p class="card-text">BDT: {{$venue->pricing}} /= per day</p>
    				<p class="card-text">Capacity: {{$venue->capacity}} persons</p>
    				<a href="/venues/{{$venue->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		<!--photography div-->
		<div class="col-md-2">
			<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
  				<div class="card-header">Photography Service</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$photography->name}} </h5>
    				<p class="card-text">BDT: {{$photography->price}} /= per day</p>
    				<a href="/photography/{{$photography->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
		<!--Decoration div-->
		<div class="col-md-2">
			<div class="card text-white bg-secondary mb-3" style="max-width: 18rem;margin-right:2rem;">
  				<div class="card-header">Decoration Service</div>
  				<div class="card-body">
    				<h5 class="card-title"> {{$stage->name}} </h5>
    				<p class="card-text">BDT: {{$stage->price}} /= per day</p>
    				<a href="/decoration/{{$stage->id}}" class="btn btn-primary">Show more</a>
  				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p style="padding:2rem;">
				{{$package->body}}	
			</p>		
		</div>
		<div class="col-md-4">
			<div class="card border-success mb-3" style="max-width: 18rem;margin-left:2rem;">
  				<div class="card-header">Package Info</div>
  				<div class="card-body text-success">
   	 				<h5 class="card-title">Type: {{$package->type}} </h5>
   	 				<p class="card-text">Persons: {{$package->people}} </p>
   					<p class="card-text">BDT: {{number_format($package->amount, 2)}} </p>
   					<a href="/login" class="btn btn-primary">Purchase now</a>
 			 	</div>
			</div>
		</div>
		<div class="col-md-4">

		</div>
	</div>
</body>
@endsection