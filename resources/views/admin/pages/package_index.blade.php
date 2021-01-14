@extends('admin.layouts.home')
@section('content')

	<h4>All Package List</h4>
<a href="packages/create" class="btn btn-primary">Add New</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Package_id</th>
			<th>Type</th>
			<th>Total Amount</th>
			<th>Created at</th>
		</tr>
    </thead>
    <tbody>
    	@foreach($packages as $package)
    		<tr>
    			<td> {{$package->id}} </td>
    			<td> {{$package->type}} </td>
    			<td> BDT: {{ number_format($package->amount, 2) }}
    			</td>
    			<td> {{$package->created_at->diffForHumans()}}

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