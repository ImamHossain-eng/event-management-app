@extends('layouts.user')
@section('content')
<div class="card-header m-b-15">
	<h4>Add New order</h4>
</div>
<br>
{{Form::open(['route' => 'user.order_store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])}}
{{csrf_field()}}
<div class="from-group">
	<input type="hidden" name="user_id" value="{{Auth::user()->email}}">
</div><br>

<div class="from-group">
	<select name="product_id">
		@foreach($venues as $venue)
		<option value="{{$venue->id}}"> {{$venue->name}} </option>

		@endforeach
	</select>
</div><br>
<div class="from-group">
	<input type="number" name="amount" class="form" plaeholder="">
</div><br>
<input type="submit" name="Submit" value="Save" class="btn btn-primary"><br>
{{Form::close()}}

@endsection