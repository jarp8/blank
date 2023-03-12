@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <form action="{{route('users.store')}}" method="POST">
        @csrf
        @include('users.fields')
    </form>
@stop