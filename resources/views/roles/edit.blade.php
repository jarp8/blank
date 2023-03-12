@extends('layouts.admin')

@section('title', 'Role')

@section('content')
    <form action="{{route('roles.update', $role)}}" method="POST">
        @csrf
        @method('PUT')
        @include('roles.fields')
    </form>
@stop