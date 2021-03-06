@extends('admin.layouts.home')
@section('content')

	<h4>All Foods List</h4>
<a href="foods/create" class="btn btn-primary">Add New</a>
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
    	@foreach($foods as $food)
    		<tr>
    			<td> {{$food->name}} </td>
    			<td> {{$food->price}} </td>
    			<td> {{$food->category}} </td>
    			<td> {{$food->created_at->diffForHumans()}}


    				<a href="foods/{{$food->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>


    				{{Form::open(['method'=>'DELETE', 'route'=>['admin.food_destroy', $food->id], 'style'=>'display:inline;'])}}
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