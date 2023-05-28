@extends('layouts.hackaton')

@section('content')
    @include('layouts_hackaton.credit-card2')

    <div class="container" style="margin-bottom: 40px">
        <section>
            <h1 class="main-title" style="font-weight: normal;">¿Primera tarjeta de crédito?</h1>

            <div class="row align-items-center" style="margin-top: 40px">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 text-center subtitle">
                            <h4>Clásica</h4>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('images/image 4.png')}}" alt="Tarjeta">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <ul class="benefit-items">
                        <li>
                            <p>
                                Primero año de anualidad <span class="why-banorte-span">sin costo</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                Puntos de <span class="why-banorte-span">recompensa</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                Primeros <span class="why-banorte-span">6 meses sin interéses</span> de regalo
                            </p>
                        </li>
                        <li>
                            <p>
                                <span class="why-banorte-span">Primeros 12 meses</span> con interés bajo
                            </p>
                        </li>
                    </ul>
                </div>
    
                <div class="col-12 text-center">
                    <a href="{{route('credit_cards.first-form')}}">
                        <button class="btn btn-rojo" style="height: 67px">Solicitar</button>
                    </a>
                </div>

                
                <div class="col-12 text-center subtitle" style="margin-top: 90px">
                    <h4>Ver más opciones</h4>
                </div>
            </div>
        </section>

        <section>
            <h2 class="main-title" style="font-weight: normal; margin-top: 60px">¡Calma! Tenemos una para ti</h2>

            <div class="row" style="margin-top: 60px">
                <div class="col-12 col-lg-4 p-4">
                    <div class="row credit-card-item">
                        <div class="col-12 text-center subtitle" style="margin-top: 10px;">
                            <h4>Oro</h4>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('images/Rectangle 20.png')}}" alt="Tarjeta de crédito">
                        </div>
                        <div class="col-12 mt-3">
                            <ul class="benefit-items">
                                <li>
                                    <p style="font-size: 22px">6 meses sin interéses en fines educativos</p>
                                </li>
                                <li>
                                    <p style="font-size: 22px">
                                        Puntos de <span class="why-banorte-span">recompensa</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-rojo" style="height: 47px; width: 130px; font-size: 18px; margin-bottom: 14px">Solicitar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-4">
                    <div class="row credit-card-item">
                        <div class="col-12 text-center subtitle" style="margin-top: 10px">
                            <h4>Mujer BANORTE</h4>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('images/Rectangle 20 (1).png')}}" alt="Tarjeta de crédito">
                        </div>
                        <div class="col-12 mt-3">
                            <ul class="benefit-items">
                                <li>
                                    <p style="font-size: 22px">6 meses sin interéses en salud</p>
                                </li>
                                <li>
                                    <p style="font-size: 22px">
                                        Seguros médicos <span class="why-banorte-span">sin costo</span> adicional
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-rojo" style="height: 47px; width: 130px; font-size: 18px; margin-bottom: 14px">Solicitar</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 p-4">
                    <div class="row credit-card-item">
                        <div class="col-12 text-center subtitle" style="margin-top: 10px">
                            <h4>Platinum</h4>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('images/Rectangle 20 (2).png')}}" alt="Tarjeta de crédito">
                        </div>
                        <div class="col-12 mt-3">
                            <ul class="benefit-items">
                                <li>
                                    <p style="font-size: 22px">6 meses sin interéses en giro educativo</p>
                                </li>
                                <li>
                                    <p style="font-size: 22px">
                                        Anualidad <span class="why-banorte-span">sin costo de por vida</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-rojo" style="height: 47px; width: 130px; font-size: 18px; margin-bottom: 14px">Solicitar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection