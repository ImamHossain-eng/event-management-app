@extends('admin.layouts.home')
@section('content')

	<h4>All Staffs List</h4>
<a href="staffs/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Designation</th>
			<th>Email</th>
		</tr>
    </thead>
    <tbody>
        @foreach($staffs as $staff)
        <tr>
            <td> {{$staff->name}} </td>
            <td> {{$staff->designation}} </td>
            <td> {{$staff->email}} 

                <a href="staffs/{{$staff->id}}/edit" class="btn btn-primary">
					<i class="fa fa-pen"></i>
				</a>

                {{Form::open(['method'=>'DELETE', 'route'=>['admin.staff.destroy', $staff->id], 'style'=>'display:inline;'])}}
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