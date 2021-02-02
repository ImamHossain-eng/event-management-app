@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>edit photography service</h4>
</div>
<br>
{{Form::open(['route' => ['admin.photos_update', $photo->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
{{method_field('PUT')}}
<div class="from-group">
	<input type="text" name="name" class="form-control" Placeholder="Enter Photography type" value="{{$photo->name}}">
</div><br>
<div class="from-group">
	<input type="text" name="price" class="form-control" Placeholder="Service Price" value="{{$photo->price}}">
</div><br>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image" class="form-control">
</div><br>

<div class="form-group">
			{{ Form::label('body', 'Body')}}
			{{ Form::textarea('body',$photo->body, ['class'=>'form-control', 'id'=>'ckview' , 'placeholder'=>'Body Text']) }}		
		</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection