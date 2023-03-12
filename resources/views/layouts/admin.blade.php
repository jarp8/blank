@extends('adminlte::page')

@section('content_header')
    <h1>@yield('title')</h1>

    @include('helpers.messages')
@stop

@section('js')
    @vite('resources/js/app.js')
@stop