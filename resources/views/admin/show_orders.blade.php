@extends('admin.master')
@section('title', $title)
@section('content')
	@if (Session::has('msg'))
	<div class="alert {{ Session::pull('class') }} alert-msgs" align="center">
	    <span>{{ Session::pull('msg') }}</span>
	</div>
	@endif
	<div class="row">
		<div class="col-lg-12 col-sm-12">
		    <div class="card">
		        <div class="content">
		            <div class="row">
		            	<div class="col-md-12" align="right">
		            		{{-- <a href="">
		            			<button type="button" class="btn btn-primary" title="Add Item">Add Item</button>
		            		</a> --}}
		            	</div>
		            </div>
		            <br>
		            <div class="row">
		            	<div class="col-md-12">
			                <div class="table-responsive">
			                	<table class="datatables table table-hover table-bordered table-condensed">
			                		<thead>
			                			<tr class="table-header">
			                				<th rowspan="2">Id</th>
			                				<th rowspan="2">Transaction ID</th>
			                				<th rowspan="2">Name</th>
			                				<th rowspan="2">Email</th>
			                				<th rowspan="2">Address</th>
			                				<th rowspan="2">Date</th>
			                				<th colspan="2" style="text-align:center;">Order</th>
			                				<th rowspan="2">Price</th>
			                			</tr>
			                			<tr class="table-header">
			                				<th>Item</th>
			                				<th>Quantity</th>
			                			</tr>
			                		</thead>
			                		<tbody>
			                			@foreach($orders as $orderDetails)
				                			@php
				                				$itemCount = explode('|', $orderDetails['items']);
				                				$rowspan = count($itemCount);
				                			@endphp
				                			<tr>
				                				<td rowspan="{{ $rowspan }}">#{{ ucwords($orderDetails['id']) }}</td>
				                				<td rowspan="{{ $rowspan }}">{{ $orderDetails['transaction_id'] }}</td>
				                				<td rowspan="{{ $rowspan }}">{{ ucwords($orderDetails['name']) }}</td>
				                				<td rowspan="{{ $rowspan }}"><a href="mailto:{{ $orderDetails['email'] }}">{{ $orderDetails['email'] }}</a></td>
				                				<td rowspan="{{ $rowspan }}">{{ ($orderDetails['address']) ? ucwords($orderDetails['address']) : "-" }}</td>
				                				<td rowspan="{{ $rowspan }}">{{ date('Y-m-d', strtotime($orderDetails['created_at'])) }}</td>
				                				@php
				                					$splitArr = explode('-', $itemCount[0]);
				                					unset($itemCount[0]);
				                				@endphp
				                				<td>{{ ucwords($menu[$splitArr[0]]) }}</td>
				                				<td>{{ $splitArr[1] }}</td>
				                				<td rowspan="{{ $rowspan }}">$ {{ number_format($orderDetails['total_amount'], 2) }}</td>
				                			</tr>
				                			@foreach($itemCount as $itemDetails)
					                			@php
					                				$splittArr = explode('-', $itemDetails);
					                			@endphp
					                			<tr>
					                				<td>{{ ucwords($menu[$splittArr[0]]) }}</td>
					                				<td>{{ $splittArr[1] }}</td>
					                			</tr>
				                			@endforeach
			                			@endforeach
			                		</tbody>
			                	</table>
			                </div>
		                </div>
		            </div>
		            <div class="footer"></div>
		        </div>
		    </div>
		</div>
	</div>
@endsection