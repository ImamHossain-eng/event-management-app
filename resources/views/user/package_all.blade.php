@extends('layouts.user')
@section('content')
<h3 class="heading">All Available Packages</h3>
		<div class="row">
			
				@foreach($packages as $package)
				<div class="col-md-3">
					<div class="card border-info mb-3" style="width: 18rem;">
  					<div class="card-header">
    					Type: {{$package->type}}
  					</div>
  					<ul class="list-group list-group-flush">
  					  <li class="list-group-item">Package_id: {{$package->id}}</li>
  					  <li class="list-group-item">No of People: {{number_format($package->people)}}</li>
  					  <li class="list-group-item">BDT: {{ number_format($package->amount, 2)}}</li>
					</ul>
					<div class="card-body">
   						 <a href="/package/{{$package->id}}" class="btn btn-primary">Show Details</a>
 					</div>
				</div>
				</div>
				@endforeach
			
		</div>
		{{$packages->links()}}

@endsection