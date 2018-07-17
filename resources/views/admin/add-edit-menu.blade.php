@extends('admin.master')
@section('title', $title)
@section('content')
	<div class="col-md-4"></div>
	<div class="col-md-4">
		@if (Session::has('msg'))
			<div class="alert {{ Session::pull('class') }} alert-msgs" align="center">
			    <span>{{ Session::pull('msg') }}</span>
			</div>
		@endif
		<form action="{{ url('/admin/menu/save') }}" method="GET" role="form">	
			<div class="form-group">
				<input type="hidden" name="itemId" id="" class="form-control" value="{{ isset($itemData['id']) ? $itemData['id'] : '' }}">
				<label for="">Item</label>
				<input type="text" name="item" class="form-control" id="" required="required" value="{{ isset($itemData['item']) ? $itemData['item'] : '' }}">
			</div>
			<div class="form-group">
				<label for="">Category</label>
				<select name="category" id="input" class="form-control" required="required">
					@foreach($categories as $id => $name)
						@php
							$selected = (isset($itemData['category']) && $itemData['category'] == $id) ? 'selected' : '';
						@endphp
						<option value="{{ $id }}" {{ $selected }}>{{ ucfirst($name) }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="">Price ($)</label>
				<input type="number" name="price" class="form-control" id="" required="required" value="{{ isset($itemData['price']) ? $itemData['price'] : '' }}">
			</div>	
			<div align="center">
				<button type="submit" class="btn btn-primary">Save</button>				
			</div>
		</form>
	</div>
	<div class="col-md-4"></div>
@endsection