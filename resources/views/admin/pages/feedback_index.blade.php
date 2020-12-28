@extends('admin.layouts.home')
@section('content')

<div class="container">
	<table class="table table-bordered table-striped">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th>Message</th>
			<th>Received On</th>
        </thead>
        <tbody>
            @foreach($feeds as $feed)
            <tr>
                <td> {{$feed->name}} </td>
                <td> {{$feed->email}} </td>
                <td> {{$feed->message}} </td>
                <td> {{$feed->created_at->diffForHumans()}} 

                    {{Form::open(['method'=>'DELETE', 'route'=>['admin.feedback_destroy',$feed->id],'style'=>'display:inline;']) }}
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