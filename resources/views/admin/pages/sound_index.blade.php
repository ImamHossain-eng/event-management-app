@extends('admin.layouts.home')
@section('content')

	<h4>Sound System & Lighting</h4>
<a href="sounds/create" class="btn btn-primary">Add New</a>
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
    	@foreach($sounds as $sound)
    		<tr>
    			<td> {{$sound->name}} </td>
    			<td> {{$sound->price}} </td>
    			<td> {{$sound->category}} </td>
    			<td> {{$sound->created_at->diffForHumans()}}


    				<a href="sounds/{{$sound->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>


    				{{Form::open(['method'=>'DELETE', 'route'=>['admin.sounds_destroy', $sound->id], 'style'=>'display:inline;'])}}
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