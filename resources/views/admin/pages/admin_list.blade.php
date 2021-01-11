@extends('admin.layouts.home')
@section('content')
 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Join</th>
    </tr>
  </thead>
  <tbody>
    @foreach($admins as $admin)
        <tr>
            <th scope="row"> {{$admin->id}} </th>
            <td> {{$admin->name}} </td>
            <td> {{$admin->email}} </td>
            <td> {{$admin->created_at->diffForHumans()}} 

@if(Auth::user()->id===7)

              {{Form::open(['method'=>'DELETE', 'route'=>['admin.admin_destroy', $admin->id], 'style'=>'display:inline;'])}}
        <button type="submit" style="display:inline;" class="btn btn-danger">
          <i class="fa fa-trash"></i>
        </button>
        {{Form::close()}}
        @endif

            </td>
        </tr>
    @endforeach
    </tbody>
    </table>

@endsection