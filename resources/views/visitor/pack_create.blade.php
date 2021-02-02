<head>
	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
	<style type="text/css">
		.btn{
			width:100%;
		}
		
	</style>
</head>
<body>
	<div class="container">
		<div class="card-header m-b-15">
		<h4>Add New Customized Package</h4>
	</div>
	<br>

	{{Form::open(['route' => 'visitor.package_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
	<div class="form-group">
		<input type="number" name="people" placeholder="Enter the number of People" class="form-control">
	</div><br>
	<div class="form-group">
		<input type="email" name="email" placeholder="Enter your email" class="form-control" required>
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
							<small>{{$food->price}}</small> 
						</option>
				@endforeach				
		</select>	
			</div>
			<div class="col-md-3"><br>
				<a href="/payment/create/food-view" class="btn btn-primary">Show All Foods</a>
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
				<a href="/payment/create/venue-view" class="btn btn-primary">Show All Venues</a>
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
				<a href="/payment/create/photography-view" class="btn btn-primary">Show All Photography Services</a>			
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
				<a href="/payment/create/sound-view" class="btn btn-primary">All Sounds & Lighting Services</a>
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
				<a href="/payment/create/decoration-view" class="btn btn-primary">All Decoration Services</a>
			</div>
		</div>	
	</div><br>
	<div class="form-group">
    	<textarea class="textarea form-control" name="body" id="ckview" cols="30" rows="10" placeholder="Description"></textarea>
	</div><br>
	<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
	{{Form::close()}}
	</div>


	<script type="text/javascript">
		$(document).ready(function () {
        $('input[id$=tbDate]').datepicker({
            dateFormat: 'DD, d MM, yy',
            minDate: 0			// Date Format "dd-mm-yy"
        });
    });
	</script>

</body>