@extends('layouts.home')
@section('content')

<head>
	<style type="text/css">
	.container{
		margin-top:5rem;
		min-height:60vh
	}	
	#img{
        width:100%;
        height: 30vh;
    }	
	</style>
	
</head>
<body>
	<div class="container">
	<div class="row">
		@foreach($photos as $value)
		<div class="col-sm-4" style="padding-bottom:18px;">
				<div class="news_from_db">
					<img id="img" src="/images/photography/{{$value->image}}" style="width:100%;height:200px;">
										
					<h6>
						<br>
						<strong>
							<a href="/photography/{{$value->id}}">
						       {{$value->name}}
					         </a>
				        </strong>
				    </h6>
				    <br>
				    <p>BDT:
							{{ number_format($value->price, 2) }}
					</p>			
			
				<p>
					<a href="/photography/{{$value->id}}" class="btn btn-primary">Read More <i class="fa fa-arrow-circle-right"> </i></a>
					<!--<a href="#" class="btn btn-success">
						<i class="fa fa-shopping-cart"></i>
					</a>-->
				</p><br>
			</div>
			</div>
		@endforeach
	</div>
	{{$photos->links()}}
</div>
</body>



@endsection