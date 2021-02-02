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
        height: 30vh;
      }

	
		
	</style>
</head>
<body>
	<div class="container" >
		<div class="row">
			<div class="col-sm-5">
				<img id="img" src="/images/sound/{{$sound->image}}" alt="food_item_picture">				
			</div>
			<div class="col-sm-7">
				<h2" style="font-size:3rem;">Service: {{$sound->name}} </h2>
				<h5 style="font-size:2rem;">Price: {{$sound->price}} BDT</h5>				
			</div>
		</div>
	</div>
</body>
@endsection