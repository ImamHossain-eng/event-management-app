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
				<img id= "img" src="/images/food/{{$food->image}}" alt="food_item_picture">				
			</div>
			<div class="col-sm-7">
				<h2" style="font-size:3rem;">Name: {{$food->name}} </h2>
				<h5 style="font-size:2rem;">Price: {{$food->price}} BDT</h5>				
			</div>
		</div>
		<div style="padding:2rem;">
			{!!$food->details!!}
		</div>
		

	</div>
</body>
@endsection