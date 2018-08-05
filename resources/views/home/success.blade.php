@extends('common.master')
@section('title', $title)

@section('content')
<div style="padding: 2% 15%;">
	<div class="alert alert-success" align="center">
		<span>Your order was successfull. Our delivery personnel will deliver it to you shortly.</span>
		<span>Below is your order receipt.</span>
	</div>

	<div class="table-responsive">
		<table class="table table-hover table-bordered table-condensed">
			<thead>
				<th colspan="3" style="text-align:center;background-color:#eb2141;color:#ffffff;">Order Details</th>
			</thead>
			<tbody>
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Name</strong></td>
					<td colspan="2">{{ $name }}</td>
				</tr>
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Email</strong></td>
					<td colspan="2">{{ $email }}</td>
				</tr>
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Address</strong></td>
					<td colspan="2">{{ $address }}</td>
				</tr>
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Transaction ID</strong></td>
					<td colspan="2">{{ $transaction_id }}</td>
				</tr>
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Items</strong></td>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Quantity</strong></td>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Price</strong></td>
				</tr>
				@foreach($cart as $cartItems)
					<tr>
						@php
							$quantity[] = $cartItems['quantity'];
						@endphp
						<td>{{ ucwords($cartItems['item']) }}</td>
						<td>{{ $cartItems['quantity'] }}</td>
						<td>$ {{ number_format($cartItems['price'] * $cartItems['quantity'], 2) }}</td>
					</tr>
				@endforeach
				<tr>
					<td style="background-color:#eb2141;color:#ffffff;"><strong>Total</strong></td>
					<td><strong>{{ array_sum($quantity) }}</strong></td>
					<td><strong>$ {{ number_format($total_amount, 2) }}</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection