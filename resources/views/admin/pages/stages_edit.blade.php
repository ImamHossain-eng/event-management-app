@extends('admin.layouts.home')
@section('content')

<div class="card-header m-b-15">
	<h4>Edit Decoration Service</h4>
</div>
<br>
{{Form::open(['route' => ['admin.stages_update', $stage->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
{{method_field('PUT')}}
<div class="from-group">
	<input type="text" name="name" value="{{$stage->name}}" class="form-control" Placeholder="Enter Service Name">
</div><br>
<div class="from-group">
	<input type="text" name="price" value="{{$stage->price}}" class="form-control" Placeholder="Price">
</div><br>
<div class="form-group">
	<label for="">Upload Profile Picture</label>
	<input type="file" name="image" class="form-control">
</div><br>
<div class="form-group">
			{{ Form::label('body', 'Body')}}
			{{ Form::textarea('body',$stage->body, ['class'=>'form-control', 'id'=>'ckview' , 'placeholder'=>'Body Text']) }}		
		</div><br>

<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}


@endsection