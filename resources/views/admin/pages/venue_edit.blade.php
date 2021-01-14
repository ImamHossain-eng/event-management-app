@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Edit Venue</h4>
</div>
<br>
{{Form::open(['route' => ['admin.venue_update', $venue->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
{{method_field('PUT')}}
<div class="from-group">
<input type="text" name="name" class="form-control" Placeholder="Enter Venue Name" value="{{$venue->name}}">
</div><br>
<div class="from-group">
	<input type="text" name="capacity" class="form-control" Placeholder="Capacity" value="{{$venue->capacity}}">
</div><br>
<div class="from-group">
	<input type="text" name="pricing" class="form-control" Placeholder="Pricing" value="{{$venue->pricing}}">
</div><br>
<div class="form-group">
	<label for="">Category</label>
<div class="from-group">
	<select name="venues_tag">
		<option value="poor">Poor</option>
		<option value="middle">Middle Class</option>
		<option value="rich">Rich</option>
	</select>
</div><br>

<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image">
</div><br>
<div class="form-group">
    <textarea class="textarea" name="body" id="ckview" cols="30" rows="10" placeholder="Description" value="{{$venue->body}}"></textarea>
</div><br>

<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}


@endsection