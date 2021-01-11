@extends('layouts.home')
@section('content')
<head>
	<style type="text/css">
	.container{
		margin-top:5rem;
		min-height:60vh
	}
	#img{
        width:100%;
        height: 35vh;
    }

	</style>
</head>
<body>
	<div class="container" >
		<div class="row">
			<div class="col-sm-5">
				<img id="img" src="/images/venues/{{$venue->image}}" alt="food_item_picture">				
			</div>
			<div class="col-sm-7">
				<h2" style="font-size:3rem;"> <small>Venue:</small> {{$venue->name}} </h2>
				<h5 style="font-size:2rem;">Price: {{$venue->pricing}} BDT</h5>
				<p style="font-size:2rem;">Capacity: {{$venue->capacity}} persons</p>
				<p style="font-size:2rem;">Quality: {{$venue->venue_tag}} </p>				
			</div>
		</div>
	</div>
</body>
@endsection