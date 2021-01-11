@extends('layouts.home')
@section('content')

<head>
	<style type="text/css">
	.container{
		margin-top:5rem;
		min-height:60vh
	}		
	</style>
	
</head>
<body>
	<div class="container">
	<div class="row">
		@foreach($sounds as $value)
		<div class="col-sm-4" style="padding-bottom:18px;">
				<div class="news_from_db">
					<img src="/images/sound/{{$value->image}}" style="width:100%;height:200px;">
										
					<h6>
						<br>
						<strong>
							<a href="/sounds/{{$value->id}}">
						       {{$value->name}}
					         </a>
				        </strong>
				    </h6>
				    <br>
				    <p><i class="fa fa-taka">  </i>
						BDT:	{{$value->price}}
					</p>			
			
				<p>
					<a href="/sounds/{{$value->id}}" class="btn btn-primary">Read More <i class="fa fa-arrow-circle-right"> </i></a>
					<a href="#" class="btn btn-success">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</p><br>
			</div>
			</div>
		@endforeach
	</div>
	{{$sounds->links()}}
</div>
</body>



@endsection