@extends('layouts.user')
@section('content')
<head>
	<style type="text/css">
	.btn{
		width: 100%;
	}
		
	</style>
</head>
<body>
	<div class="card-header m-b-15">
		<h4>Add New Customized Package</h4>
	</div>
	<br>

	{{Form::open(['route' => 'user.package_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
	<div class="form-group">
		<input type="number" name="people" placeholder="Enter the number of People" class="form-control">
	</div><br>
	<div class="form-group">
		<input type="text" name="type" placeholder="Select a date" id="tbDate" class="form-control" required>
	</div><br>
	<div class="from-group">
		<div class="row">
			<div class="col-md-9">
				<label>Available Food + Price: </label>
		<select name="food_id" class="btn btn-secondary form-control">
			<option value="0">Choose...</option>
				@foreach($foods as $food)					
						<option value="{{$food->id}}"> {{$food->name}}  + 
							<small>{{$food->price}}</small>  {!!$food->details!!} 
						</option>
				@endforeach				
		</select>	
			</div>
			<div class="col-md-3"><br>
				<a href="/food_item" class="btn btn-primary">Show All Foods</a>
			</div>
		</div>

	</div><br>
	<div class="from-group">
		<div class="row">
			<div class="col-md-9">
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
			</div>
			<div class="col-md-3"><br>
				<a href="/venues" class="btn btn-primary">Show All Venues</a>
			</div>
		</div>	
	</div><br>
	<div class="from-group">
		<div class="row">
			<div class="col-md-9">
				<label>Photography Services + Price:</label>
				<select name="photography_id" class="btn btn-secondary form-control">
					<option value="0">Choose...</option>
						@foreach($photos as $photo)					
						<option value="{{$photo->id}}"> {{$photo->name}}  + 
							<small>{{$photo->price}}</small> 
						</option>
						@endforeach				
				</select>				
			</div>
			<div class="col-md-3"><br>
				<a href="/photography" class="btn btn-primary">Show All Photography Services</a>			
			</div>
		</div>	
	</div><br>
	<div class="from-group">
		<div class="row">
			<div class="col-md-9">
				<label>Sound System & Lighting + Price:</label>
				<select name="sound_id" class="btn btn-secondary form-control">
					<option value="0">Choose...</option>
					@foreach($sounds as $sound)					
						<option value="{{$sound->id}}"> {{$sound->name}}  + 
							<small>{{$sound->price}}</small> 
						</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-3"><br>
				<a href="/sounds" class="btn btn-primary">All Sounds & Lighting Services</a>
			</div>
		</div>	
	</div><br>
	<div class="from-group">
		<div class="row">
			<div class="col-md-9">
				<label>Decoration Services + Price:</label>
				<select name="stages_id" class="btn btn-secondary form-control">
					<option value="0">Choose...</option>
					@foreach($stages as $stage)					
						<option value="{{$stage->id}}"> {{$stage->name}}  + 
							<small>{{$stage->price}}</small> 
						</option>
					@endforeach				
				</select>
			</div>
			<div class="col-md-3"><br>
				<a href="/decoration" class="btn btn-primary">All Decoration Services</a>
			</div>
		</div>	
	</div><br>
	<div class="form-group">
    	<textarea class="textarea form-control" name="body" id="ckview" cols="30" rows="10" placeholder="Description"></textarea>
	</div><br>
	<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
	{{Form::close()}}

	<script type="text/javascript">
		$(document).ready(function () {
        $('input[id$=tbDate]').datepicker({
            dateFormat: 'DD, d MM, yy',
            minDate: 0		// Date Format "DD, d MM, yy"
        });
    });
	</script>

</body>


@endsection