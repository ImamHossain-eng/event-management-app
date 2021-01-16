@extends('layouts.user')
@section('content')
<body><br><br><br>
	<center>
	@foreach($packages as $pack)	
	<div class="card" style="width: 18rem;">
  		<div class="card-body">
    		<h5 class="card-title">Cost: {{$pack->amount}} =/ BDT</h5>
    		<h6 class="card-subtitle mb-2 text-muted">People: {{$pack->people}}</h6>
    		<p class="card-text">You need paid minimum 50%.</p>
    		<a href="/home/payment/{{$pack->id}}" class="btn btn-primary">Paid to Confirm</a>
    		<a href="#" class="btn btn-danger">Cancel</a>
  		</div>
	</div>
	@endforeach
	</center>
</body>

@endsection