@extends('admin.layouts.home')
@section('content')

	<h4>All Decoration Services</h4>
<a href="stages/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name of Service</th>
			<th>Price</th>
			<th>Created</th>
			<th>Option</th>
		</tr>
    </thead>
    <tbody>
        @foreach($stages as $stage)
        <tr>
        	<td> {{$stage->id}} </td>
            <td> {{$stage->name}} </td>
            <td> {{$stage->price}} </td>
            <td> {{ date('F d, Y', strtotime($stage->created_at))}}
		at {{ date('g:ia', strtotime($stage->created_at))}} </td>
            <td> 

            	<a href="stages/{{$stage->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>
				{{Form::open(['method'=>'DELETE', 'route'=>['admin.stages_destroy', $stage->id], 'style'=>'display:inline;'])}}
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