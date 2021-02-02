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
		@foreach($venues as $venue)

		<div class="card" style="width: 18rem;">
  			<img src="{{asset('images/venues/'.$venue->image)}}" class="card-img-top" alt="{{$venue->image}}">
  			<div class="card-body">
    			<h5 class="card-title"> {{$venue->name}} </h5>
    			<p class="card-text">Capacity: {{$venue->capacity}}</p>
    			<p class="card-text">BDT: {{number_format($venue->price, 2)}}</p>
    			<a href="/venues/{{$venue->id}}" class="btn btn-primary">Show Details</a>
  			</div>
		</div>	
      	@endforeach   
    
	</div>
</div>
</body>

@endsection