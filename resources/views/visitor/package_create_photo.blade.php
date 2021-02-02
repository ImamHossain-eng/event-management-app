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
		@foreach($photos as $photo)

		<div class="card" style="width: 18rem;">
  			<img src="{{asset('images/photography/'.$photo->image)}}" class="card-img-top" alt="{{$photo->image}}">
  			<div class="card-body">
    			<h5 class="card-title"> {{$photo->name}} </h5>
    			<p class="card-text">BDT: {{number_format($photo->price, 2)}}</p>
    			<a href="/photography/{{$photo->id}}" class="btn btn-primary">Show Details</a>
  			</div>
		</div>	
      	@endforeach   
    
	</div>
</div>
</body>

@endsection