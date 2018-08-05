<div>
	<span>Your order was successfull. Our delivery personnel will deliver it to you shortly.</span>
	<span>Below is your order receipt.</span>
</div>
<div style="padding: 2% 15%;">
	<div class="table-responsive">
		<table style="border: 1px solid black; border-collapse: collapse;">
			<thead>
				<th colspan="3" style="border: 1px solid black;text-align:center;background-color:#eb2141;color:#ffffff;">Order Details</th>
			</thead>
			<tbody>
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Name</strong></td>
					<td style="border: 1px solid black;" colspan="2">{{ $name }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Email</strong></td>
					<td style="border: 1px solid black;" colspan="2">{{ $email }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Address</strong></td>
					<td style="border: 1px solid black;" colspan="2">{{ $address }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Transaction ID</strong></td>
					<td style="border: 1px solid black;" colspan="2">{{ $transaction_id }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Items</strong></td>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Quantity</strong></td>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Price</strong></td>
				</tr>
				@foreach($cart as $cartItems)
					<tr>
						@php
							$quantity[] = $cartItems['quantity'];
						@endphp
						<td style="border: 1px solid black;">{{ ucwords($cartItems['item']) }}</td>
						<td style="border: 1px solid black;">{{ $cartItems['quantity'] }}</td>
						<td style="border: 1px solid black;">$ {{ number_format($cartItems['price'] * $cartItems['quantity'], 2) }}</td>
					</tr>
				@endforeach
				<tr>
					<td style="border: 1px solid black;background-color:#eb2141;color:#ffffff;"><strong>Total</strong></td>
					<td style="border: 1px solid black;"><strong>{{ array_sum($quantity) }}</strong></td>
					<td style="border: 1px solid black;"><strong>$ {{ number_format($total_amount, 2) }}</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>