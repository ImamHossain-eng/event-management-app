@extends('admin.layouts.home')
@section('content')

<h4>Venue List</h4>
<a href="venues/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
            <th>Capacity</th>
            <th>Category</th>
            <th>Pricing</th>            
		</tr>
    </thead>
    <tbody>
        @foreach($venues as $venue)
        <tr>
            <td> {{$venue->name}} </td>
            <td> {{$venue->capacity}} </td>
            <td> {{$venue->venue_tag}} </td>
            <td> {{$venue->pricing}} 

                <a href="venues/{{$venue->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>


                {{Form::open(['method'=>'DELETE', 'route'=>['admin.venue_destroy', $venue->id], 'style'=>'display:inline;'])}}
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