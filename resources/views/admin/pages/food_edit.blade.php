@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Edit Food</h4>
</div>
<br>
{{Form::open(['route' => ['admin.food_update', $food->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
{{method_field('PUT')}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Food Name" value="{{$food->name}}">
</div><br>
<div class="from-group">
	<input type="text" name="price" class="form-control" Placeholder="Enter Price" value="{{$food->price}}">
</div><br>
<div class="from-group">
	<select name="category" default value="{{$food->category}}">
		<option value="poor">Poor</option>
		<option value="middle">Middle Class</option>
		<option value="rich">Rich</option>
	</select>
</div>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image">
</div>
<div class="form-group">
    <textarea class="textarea" name="details" id="ckview" cols="30" rows="10" value={{$food->details}} placeholder="Description"></textarea>
</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection