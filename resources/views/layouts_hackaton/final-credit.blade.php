@extends('layouts.hackaton')

{{-- @section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<div class="container container-credit-card">
    @include('layouts_hackaton.credit-card1')
   
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center" style="
        font-size: 65px;
    ">¡Hemos terminado!</h1>
        <img src="{{ URL::asset('./images/Group 68.png') }}" width="20%" alt="Descripción de la imagen" class="img-fluid">
        <h1 class="text-center">En unos días recibirás un correo con tu resultado</h1>

    </div>
    
  
</div>
@stop

{{-- @section('css')

@stop

@section('js')
    <script> 

    </script>
@stop --}}
