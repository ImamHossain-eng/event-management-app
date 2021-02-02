@extends('layouts.home')
@section('content')
<head>
	<style type="text/css">
	.row{
		min-height:50vh;
	}
	.heading{
		background-color:#212121;
		color:#efefef;
		padding:1rem;
		text-align: center;
	}
	#pack{
		justify-content: center;
		padding:2rem;
	}



	</style>
	
	
</head>
<body>
	
	<div class="main">
	</div><br>
		<h3 class="heading">All Available Packages</h3>
		<div class="row" id="pack">
			
				@foreach($packages as $package)
				<div class="col-md-3">
					<div class="card border-info mb-3" style="width: 18rem;">
  					<div class="card-header">
    					Package_id: {{$package->id}}
  					</div>
  					<ul class="list-group list-group-flush">
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
		<p style="justify-content:center;">
			<center>
			<a href="/packages/create" class="btn btn-primary">Customized Package</a>
			</center>
		</p>
</body>


@endsection