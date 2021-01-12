@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Add New Sound and lighting Service Pack</h4>
</div>
<br>
{{Form::open(['route' => 'admin.sounds_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Service Name">
</div><br>
<div class="from-group">
	<input type="text" name="price" class="form-control" Placeholder="Enter Price">
</div><br>
<div class="from-group">
	<select name="category">
		<option value="poor">Poor</option>
		<option value="middle">Middle Class</option>
		<option value="rich">Rich</option>
	</select>
</div>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image">
</div><br>
<div class="form-group">
    <textarea class="textarea" name="body2" id="ckview" cols="30" rows="10" placeholder="Description"></textarea>
</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection