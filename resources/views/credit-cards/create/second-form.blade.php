@extends('layouts.hackaton')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center subtitle" style="margin-top: 40px">
                <a href="{{route('credit_cards.first-form')}}" style="text-decoration: none">
                    <h4>Regresar a la página anterior</h4>
                </a>
            </div>
        </div>

        <h1 class="main-title" style="font-weight: normal; margin-top: 30px">¡Ya estamos por terminar!</h1>

        <div style="margin-top: 40px">
            <h4 class="text-center mb-4" style="font-size: 30px; font-weight: bold; font-family: 'Gotham'">Sube una foto de tu INE por ambos lados</h4>

            <div class="row">
                <div class="col-12 col-md-6 ">
                    <div class="ine-card text-center">
                        <img src="{{asset('images/Rectangle 32.png')}}" alt="" class="mb-3">
                        <button class="btn btn-rojo" style="height: 47px; width: 230px; font-size: 18px; margin-bottom: 14px">Subir frontal INE</button>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="ine-card text-center">
                        <img src="{{asset('images/Group 47.png')}}" alt="" class="mb-3">
                        <button class="btn btn-rojo" style="height: 47px; width: 230px; font-size: 18px; margin-bottom: 14px">Subir reverso INE</button>
                    </div>
                </div>
            </div>

            <h4 class="text-center mb-4" style="font-size: 30px; font-weight: bold; font-family: 'Gotham'; margin-top: 40px">Sube una foto de tu comprobante de domicilio más reciente</h4>
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{asset('images/image 10.png')}}" alt="">
                    <button class="btn btn-rojo" style="height: 47px; width: 340px; font-size: 18px; margin-bottom: 14px">Subir comprobante de domicilio</button>
                </div>
            </div>

            <div class="row" style="margin-top: 60px">
                <div class="col-12 text-center">
                    <button class="btn btn-rojo" style="height: 47px; width: 240px; font-size: 18px; margin-bottom: 14px">Finalizar</button>
                </div>
            </div>
        </div>
    </div>
@endsection