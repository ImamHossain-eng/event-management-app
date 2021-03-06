@extends('admin.layouts.home')
@section('content')

	<h4>All Photography Service</h4>
<a href="photos/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Category</th>
			<th>Created</th>
		</tr>
    </thead>
    <tbody>
    	@foreach($photos as $photo)
    		<tr>
    			<td> {{$photo->name}} </td>
    			<td> {{$photo->price}} </td>
    			<td> {{$photo->category}} </td>
    			<td> {{$photo->created_at->diffForHumans()}}


    				<a href="photos/{{$photo->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>



				 {{Form::open(['method'=>'DELETE', 'route'=>['admin.photos_destroy', $photo->id], 'style'=>'display:inline;'])}}
				<button type="submit" style="display:inline;" class="btn btn-danger">
					<i class="fa fa-trash"></i>
				</button>
				{{Form::close()}} 


    				




    			</td>
    		</tr>
    	@endforeach
    </tbody>
</table>


@endsection