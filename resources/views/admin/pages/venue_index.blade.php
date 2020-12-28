@extends('admin.layouts.home')
@section('content')

<h4>Venue List</h4>
<a href="venues/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Capacity</th>
			<th>Pricing</th>
		</tr>
    </thead>
    <tbody>
        @foreach($venues as $venue)
        <tr>
            <td> {{$venue->name}} </td>
            <td> {{$venue->capacity}} </td>
            <td> {{$venue->pricing}} </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection