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
				<img id= "img" src="/images/decoration/{{$stage->image}}" alt="food_item_picture">				
			</div>
			<div class="col-sm-7">
				<h2" style="font-size:3rem;">Name: {{$stage->name}} </h2>
				<h5 style="font-size:2rem;">Price: {{$stage->price}} BDT</h5>
				<p style="font-size:2rem;">Quality: {{$stage->category}} </p>			
			</div>
		</div>
		<div style="padding:2rem;">
			{!!$stage->body!!}
		</div>
		

	</div>
</body>
@endsection