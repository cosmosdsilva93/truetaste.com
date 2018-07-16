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
		            		<a href="">
		            			<button type="button" class="btn btn-primary" title="Add Item">Add Item</button>
		            		</a>
		            	</div>
		            </div>
		            <br>
		            <div class="row">
		            	<div class="col-md-12">
			                <div class="table-responsive">
			                	<table class="datatables table table-hover table-bordered table-condensed">
			                		<thead>
			                			<tr class="table-header">
			                				<th>Id</th>
			                				<th>Item</th>
			                				<th>Category</th>
			                				<th>Price</th>
			                				<th>Status</th>
			                				<th>Actions</th>
			                			</tr>
			                		</thead>
			                		<tbody>
			                			@foreach($menu as $indx => $items)
			                			<tr>
			                				<td>{{ $indx+1 }}</td>
			                				<td>{{ ucwords($items['item']) }}</td>
			                				<td>{{ ucfirst($categories[$items['category']]) }}</td>
			                				<td>$ {{ number_format($items['price'], 2) }}</td>
			                				<td>
			                					@if($items['status'])
			                						<span class="text-success">Active</span>
			                					@else
			                						<span class="text-danger">Inactive</span>
			                					@endif
			                				</td>
			                				<td>
			                					<a href="" title="Edit"><i class="fa fa-pencil text-primary" aria-hidden="true"></i></a>
			                					@if($items['status'])
			                						<a href="javascript:void(0);" onclick="changeStatus('helipad', 0, {{ $items['id'] }})" title="Make Inactive"><i class="fa fa-thumbs-down text-danger" aria-hiden="true"></i></a>
			                					@else
			                						<a href="javascript:void(0);" onclick="changeStatus('helipad', 1, {{ $items['id'] }})" title="Make Active"><i class="fa fa-thumbs-up text-success" aria-hiden="true"></i></a>
			                					@endif
			                				</td>
			                			</tr>
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