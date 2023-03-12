@extends('layouts.admin')

@section('title', 'Role')

@section('content')
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
        @include('roles.fields')
    </form>
@stop