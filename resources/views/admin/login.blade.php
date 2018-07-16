@extends('admin.master')
@section('title', $title)
@section('content')
<div id="login-page">
    <div id="login-form-view">
        <div class="login-form-box">
            @if (Session::has('msg'))
            <div class="alert alert-danger alert-msgs" align="center">
                <span>{{ Session::pull('msg') }}</span>
            </div>
            @endif
            {!! Form::open(['id' => 'login-form']) !!}
                <input name="email" type="email" required="required" placeholder="Email"/>
                <input name="password" type="password" required="required" placeholder="Password"/>
                <button type="submit" id="login-submit-button">login</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection