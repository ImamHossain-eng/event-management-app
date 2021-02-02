@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Add New Photo</h4>
</div>
<br>
{{Form::open(['route' => 'admin.photo_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}

<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image" class="form-control">
</div><br>
<div class="form-group">
	<label>Category</label>
	<select name="type" class="btn btn-primary">
		<option value="slider"> Slider </option>
	</select>
</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection