@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Add New Decoration Service</h4>
</div>
<br>
{{Form::open(['route' => 'admin.stages_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Enter Service Name">
</div><br>
<div class="from-group">
	<input type="text" name="price" class="form-control" Placeholder="Price">
</div><br>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image" class="form-control">
</div><br>
<div class="form-group">
    <textarea class="textarea" name="body" id="ckview" cols="30" rows="10" placeholder="Description"></textarea>
</div><br>

<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}


@endsection