@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <form action="{{route('users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        @include('users.fields')
    </form>
@stop