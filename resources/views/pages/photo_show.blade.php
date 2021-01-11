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
        height: 40vh;
      }

	
		
	</style>
</head>
<body>
	<div class="container" >
		<div class="row">
			<div class="col-sm-5">
				<img id="img" src="/images/photography/{{$photo->image}}" alt="food_item_picture">				
			</div>
			<div class="col-sm-7">
				<h2" style="font-size:3rem;"> <small>Service:</small> {{$photo->name}} </h2>
				<h5 style="font-size:2rem;">Price: {{$photo->price}} BDT</h5>
				<p style="font-size:2rem;">Class: {{$photo->category}} </p>				
			</div>
		</div>
	</div>
</body>
@endsection