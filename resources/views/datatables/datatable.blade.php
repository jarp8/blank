@extends('adminlte::page')

@section('content_header')
    <h1>@yield('title')</h1>

    {{-- Errores que pueden ser retornados --}}
    @include('helpers.messages')
@stop

@section('content')
    {{-- Modal para eliminar registros del dataTable --}}
    @include('datatables.modal')
@stop

@section('css')
    {{-- Bootstrap4 --}}
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
    {{-- Bootstrap4 responsive --}}
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/responsive.bootstrap4.min.css')}}">
    {{-- Bootstrap4 buttons --}}
    <link rel="stylesheet" href="{{asset('vendor/datatables/css/buttons.bootstrap4.min.css')}}">
@stop

@section('js')
    {{-- deleteDataTableItem --}}
    @vite('resources/js/app.js')

    {{-- DataTable jquery --}}
    <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    
    {{-- Bootstrap4 --}}
    <script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>

    {{-- DataTable responsive --}}
    <script src="{{asset('vendor/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/responsive.bootstrap4.min.js')}}"></script>

    {{-- DataTable buttons --}}
    <script src="{{asset('vendor/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/buttons.server-side.js')}}"></script>
    <script src="{{asset('vendor/datatables/js/buttons.colVis.min.js')}}"></script>
@stop
