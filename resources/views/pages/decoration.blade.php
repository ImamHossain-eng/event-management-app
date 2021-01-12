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
		@foreach($stages as $value)
		<div class="col-sm-4" style="padding-bottom:18px;">
				<div class="news_from_db">
					<img id="img" src="/images/decoration/{{$value->image}}" style="width:100%;height:200px;">
										
					<h6>
						<br>
						<strong>
							<a href="/decoration/{{$value->id}}">
						       {{$value->name}}
					         </a>
				        </strong>
				    </h6>
				    <br>
				    <p>BDT:
							{{$value->price}}
					</p>			
			
				<p>
					<a href="/decoration/{{$value->id}}" class="btn btn-primary">Read More <i class="fa fa-arrow-circle-right"> </i></a>
					<a href="#" class="btn btn-success">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</p><br>
			</div>
			</div>
		@endforeach
	</div>
</div>
</body>



@endsection