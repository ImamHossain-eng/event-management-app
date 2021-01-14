@extends('layouts.user')
@section('content')

	<h4>All Order List</h4>
<a href="order/create" class="btn btn-primary">Add a new Order</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>id</th>
			<th>Product_id</th>
			<th>User_id</th>
			<th>Amount</th>
			<th>Price</th>
			<th>Order_time</th>
		</tr>
    </thead>
    <tbody>
    	@foreach($orders as $order)
    	<tr>
    		<td> {{$order->id}} </td>
    		<td> {{$order->product_id}} </td>
    		<td> {{$order->user_id}} </td>
    		<td> {{$order->amount}} </td>
    		<td> {{$order->price}} </td>
    		<td> {{$order->created}} </td>
    	</tr>

    	@endforeach
    </tbody>
</table>

@endsection