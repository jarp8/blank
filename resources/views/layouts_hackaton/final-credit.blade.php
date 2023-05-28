@extends('layouts.hackaton')

{{-- @section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop --}}

@section('content')
<div class="container container-credit-card" style="
height: 100vh;
">
    @include('layouts_hackaton.credit-card1')
   
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-center" style="
        font-size: 65px;
    ">¡Hemos terminado!</h1>
        <img src="{{ URL::asset('./images/Group 68.png') }}" width="20%" alt="Descripción de la imagen" class="img-fluid">
        <h1 class="text-center">En unos días recibirás un correo con tu resultado</h1>
        <a href="{{route('/')}}" style="text-decoration: none">
            <button class="btn btn-rojo mt-5" style="height: 47px; width: 340px; font-size: 18px; margin-bottom: 14px">Volver a la página de inicio</button>
        </a>
    </div>
    

</div>
@stop

{{-- @section('css')

@stop

@section('js')
    <script> 

    </script>
@stop --}}
