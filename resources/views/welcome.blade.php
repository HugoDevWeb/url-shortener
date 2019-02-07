@extends('layouts.base')

@section('content')
    <h1>The best URL Shortener !</h1>

    <form action=""  method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="url" placeholder="Please enter your original URL here" value="{{old('url')}}">
        {!! $errors->first('url', '<p class = "error-msg">:message</p>') !!}
    </form>
@endsection
