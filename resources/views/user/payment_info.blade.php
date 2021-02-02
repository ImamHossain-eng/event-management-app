@extends('layouts.user')
@section('content')
<head>
	
</head>
<body>
	<table class="table table-striped">
		<thead>
			<th>Paid Amount</th>
			<th>Due Amount</th>
			<th> Total amount </th>
			<th> status of Payment</th>
		</thead>
		<tbody>
			@foreach($orders as $order)
			<tr>
				<td> {{$order->amount}} </td>
				<td> {{$order->due}} </td>
				<td> {{ $order->amount+$order->due }} </td>
				<td> {{$order->status}} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>

@endsection