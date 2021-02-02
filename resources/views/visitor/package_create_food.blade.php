@extends('layouts.home')
@section('content')

<head>
	<style type="text/css">
		#heading{
			margin-top: 2rem;
		}
	</style>
	
</head>
<body>
	<div class="row" id="heading">
	<div class="col-md-8">
		@include('visitor.pack_create')
	</div>
	<div class="col-md-4">
		@foreach($foods as $food)

		<div class="card" style="width: 18rem;">
  			<img src="{{asset('images/food/'.$food->image)}}" class="card-img-top" alt="{{$food->image}}">
  			<div class="card-body">
    			<h5 class="card-title"> {{$food->name}} </h5>
    			<p class="card-text">{!!$food->details!!}</p>
    			<a href="/food_item/{{$food->id}}" class="btn btn-primary">Show Details</a>
  			</div>
		</div>	

      	@endforeach   
    
	</div>
</div>
</body>

@endsection