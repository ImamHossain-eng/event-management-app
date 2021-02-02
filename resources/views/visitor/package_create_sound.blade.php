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
		@foreach($sounds as $sound)

		<div class="card" style="width: 18rem;">
  			<img src="{{asset('images/sound/'.$sound->image)}}" class="card-img-top" alt="{{$sound->image}}">
  			<div class="card-body">
    			<h5 class="card-title"> {{$sound->name}} </h5>
    			<p class="card-text">BDT: {{number_format($sound->price, 2)}}</p>
    			<a href="/sounds/{{$sound->id}}" class="btn btn-primary">Show Details</a>
  			</div>
		</div>	
      	@endforeach   
    
	</div>
</div>
</body>

@endsection