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
            <td> {{$admin->created_at->diffForHumans()}} </td>
        </tr>
    @endforeach
    </tbody>
    </table>

@endsection