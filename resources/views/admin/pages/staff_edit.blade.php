@extends('admin.layouts.home')
@section('content')
{{Form::open(['route' => ['admin.staff.update', $staff->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
{{method_field('PUT')}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Enter Full Name"  value="{{$staff->name}}">
</div><br>
<div class="from-group">
	<input type="text" name="designation" class="form-control" Placeholder="Designation / Post"  value="{{$staff->designation}}">
</div><br>
<div class="from-group">
	<input type="email" name="email" class="form-control" Placeholder="Enter Email"  value="{{$staff->email}}">
</div><br>
<div class="from-group">
	<input type="text" name="mobile" class="form-control" Placeholder="Enter Mobile Number"  value="{{$staff->mobile}}">
</div><br>
<div class="from-group">
	<input type="text" name="responsibility" class="form-control" Placeholder="Responsibilities"  value="{{$staff->responsibility}}">
</div><br>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image">
</div>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection