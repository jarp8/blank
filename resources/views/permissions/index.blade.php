@extends('layouts.admin')

@section('title', 'Permissions')

@section('content')
    <form action="{{route($route['route'], $route['variable'])}}" method="POST">
        @csrf
        <div>
            @include('permissions.tabs')
        </div>

        <div class="row">
            <div class="col-12 text-right">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </div>
    </form>
@stop