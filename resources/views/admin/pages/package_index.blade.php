@extends('admin.layouts.home')
@section('content')

	<h4>All Package List</h4>
<a href="packages/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Package_id</th>
			<th>No of People</th>
			<th>Total Amount</th>
            <th>Created by</th>
            <th>Date</th>
			<th>Created at</th>
            <th>Option</th>
		</tr>
    </thead>
    <tbody>
    	@foreach($packages as $package)
    		<tr>
    			<td> {{$package->id}} </td>
    			<td> {{$package->people}} </td>
    			<td> {{ number_format($package->amount, 2) }}
    			</td>
                <td> {{$package->creator}} </td>
                <td> {{$package->type}} </td>
    			<td> {{$package->created_at->diffForHumans()}}</td>
                <td>
                    <a href="/package/{{$package->id}}" class="btn btn-success">View</a>

    				{{Form::open(['method'=>'DELETE', 'route'=>['admin.package_destroy', $package->id], 'style'=>'display:inline;'])}}
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