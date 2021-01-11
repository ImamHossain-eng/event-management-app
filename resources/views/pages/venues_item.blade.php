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
		@foreach($venues as $value)
		<div class="col-sm-4" style="padding-bottom:18px;">
				<div class="news_from_db">
					<img src="/images/venues/{{$value->image}}" style="width:100%;height:200px;">
										
					<h6>
						<br>
						<strong>
							<a href="/venues/{{$value->id}}">
						       {{$value->name}}
					         </a>
				        </strong>
				    </h6>
				    <br>
				    <p><i class="fa fa-dollar">  </i>
							{{$value->pricing}}
					</p>
					<p><i class="fa fa-building">  </i>
							{{$value->capacity}}
					</p>				
			
				<p>
					<a href="/venues/{{$value->id}}" class="btn btn-primary">Read More <i class="fa fa-arrow-circle-right"> </i></a>
					<a href="#" class="btn btn-success">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</p><br>
			</div>
			</div>
		@endforeach
	</div>
	{{$venues->links()}}
</div>
</body>



@endsection