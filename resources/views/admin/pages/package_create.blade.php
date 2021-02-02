@extends('admin.layouts.home')
@section('content')
<head>
	<style type="text/css">
		
	</style>
</head>
<body>
	<div class="card-header m-b-15">
		<h4>Add New Package</h4>
	</div>
	<br>

	{{Form::open(['route' => 'admin.package_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
	
	<div class="form-group">
		<input type="number" name="people" placeholder="Enter the number of People" class="form-control">
	</div><br>
	<div class="from-group">
		<label>Available Food + Price:</label>
		<select name="food_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($foods as $food)					
						<option value="{{$food->id}}"> {{$food->name}}  + 
							<small>{{$food->price}}</small> 
						</option>
				@endforeach				
		</select>	
	</div><br>
	<div class="from-group">
		<label>Available Venues + Capacity + Price:</label>
		<select name="venue_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($venues as $venue)					
						<option value="{{$venue->id}}"> {{$venue->name}}  + 
							{{ $venue->capacity }} +
							<small>{{$venue->price}}</small> 						
						</option>
				@endforeach				
		</select>	
	</div><br>
	<div class="from-group">
		<label>Photography Services + Price:</label>
		<select name="photography_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($photos as $photo)					
						<option value="{{$photo->id}}"> {{$photo->name}}  + 
							<small>{{$photo->price}}</small> 
						</option>
				@endforeach				
		</select>	
	</div><br>
	<div class="from-group">
		<label>Sound System & Lighting + Price:</label>
		<select name="sound_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($sounds as $sound)					
						<option value="{{$sound->id}}"> {{$sound->name}}  + 
							<small>{{$sound->price}}</small> 
						</option>
				@endforeach
		</select>	
	</div><br>
	<div class="from-group">
		<label>Decoration Services + Price:</label>
		<select name="stages_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($stages as $stage)					
						<option value="{{$stage->id}}"> {{$stage->name}}  + 
							<small>{{$stage->price}}</small> 
						</option>
				@endforeach				
		</select>	
	</div><br>
	<div class="form-group">
    	<textarea class="textarea" name="body" id="ckview" cols="30" rows="10" placeholder="Description"></textarea>
	</div><br>
	<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
	{{Form::close()}}


</body>


@endsection