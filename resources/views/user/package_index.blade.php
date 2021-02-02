@extends('layouts.user')
@section('content')
<body><br><br><br>
	<center>
	@foreach($packs as $pack)	
	<div class="card" style="width: 28rem;">
  		<div class="card-body">
    		<h5 class="card-title">Cost: {{number_format($pack->amount)}} =/ BDT</h5>
    		<h6 class="card-subtitle mb-2 text-muted">People: {{$pack->people}}</h6>
    		<p class="card-text">You need paid minimum 50%.</p>
    		<a href="/home/payment/{{$pack->id}}" class="btn btn-primary">Paid to Confirm</a>
        <a href="/package/{{$pack->id}}" class="btn btn-success">Show</a>
        {{Form::open(['method'=>'DELETE', 'route'=>['user.package_destroy', $pack->id], 'style'=>'display:inline;'])}}
        <button type="submit" style="display:inline;" class="btn btn-danger">Cancel
        </button>
        {{Form::close()}}
  		</div>
	</div>
	@endforeach
	</center>
</body>

@endsection