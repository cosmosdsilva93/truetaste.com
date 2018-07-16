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
		            		<!-- <a href=""> -->
		            			<!-- <button type="button" class="btn btn-primary" title="Add Helipad">Add</button> -->
		            		<!-- </a> -->
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
			                				<th>Name</th>
			                				<th>Email</th>
			                				<th>Message</th>
			                				<th>Date</th>
			                				{{-- <th>Actions</th> --}}
			                			</tr>
			                		</thead>
			                		<tbody>
			                			@foreach($queries as $indx => $queryData)
			                			<tr>
			                				<td>{{ $indx+1 }}</td>
			                				<td>{{ ucwords($queryData['name']) }}</td>
			                				<td><a href="mailto:{{ $queryData['email'] }}">{{ $queryData['email'] }}</a></td>
			                				<td>{{ $queryData['message'] }}</td>
			                				<td>{{ date('Y-m-d', strtotime($queryData['created_at'])) }}</td>
			                				{{-- <td>--</td> --}}
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