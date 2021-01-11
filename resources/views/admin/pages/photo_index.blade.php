@extends('admin.layouts.home')
@section('content')
<head>
	<style type="text/css">
		#pic_small{
			height:4rem;
			width:6rem;
		}
	</style>
</head>
<a href="images/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<td>Image</td>
			<th>Image Name</th>
			<th>Type</th>
			<th>Inserted</th>
		</tr>
    </thead>
    <tbody>
    	@foreach($photos as $photo)
    	<tr>
    		<td> <img id="pic_small" src="/images/slider/{{$photo->image}}"> </td>
    		<td> {{$photo->image}} </td>
    		<td> {{$photo->type}} </td>
    		<td> {{$photo->created_at->diffForHumans()}} 


    			{{Form::open(['method'=>'DELETE', 'route'=>['admin.photo_destroy', $photo->id], 'style'=>'display:inline;'])}}
				<button type="submit" style="display:inline;" class="btn btn-danger">
					<i class="fa fa-trash"></i>
				</button>
				{{Form::close()}}



    		</td>	
    	</tr>
    	@endforeach
    </tbody>

@endsection