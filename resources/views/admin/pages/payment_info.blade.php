@extends('admin.layouts.home')
@section('content')
<head>
	
</head>
<body>
	<table class="table">
		<thead>
			<th>Paid Amount</th>
			<th>Due Amount</th>
			<th> Status of Payment</th>
			<th> Package_id </th>
			<th> Email </th>
			<th> Mobile No </th>
			<th> Address </th>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td> {{$order->amount}} </td>
				<td> {{$order->due}} </td>
				<td> {{$order->status}} </td>
				<td> {{$order->pack_id}} </td>
				<td> {{$order->email}} </td>
				<td> {{$order->phone}} </td>
				<td> {{$order->address}} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{$orders->links()}}
</body>


@endsection