@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Add New Staff</h4>
</div>
<br>
{{Form::open(['route' => 'admin.staff.store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Enter Full Name">
</div><br>
<div class="from-group">
	<input type="text" name="designation" class="form-control" Placeholder="Designation / Post">
</div><br>
<div class="from-group">
	<input type="email" name="email" class="form-control" Placeholder="Enter Email">
</div><br>
<div class="from-group">
	<input type="text" name="mobile" class="form-control" Placeholder="Enter Mobile Number">
</div><br>
<div class="from-group">
	<input type="text" name="responsibility" class="form-control" Placeholder="Responsibilities">
</div><br>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image">
</div>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection