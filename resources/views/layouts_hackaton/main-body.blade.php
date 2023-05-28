@extends('layouts.hackaton')

@section('content')
    <div class="main">
        <div class="container mb-5">
            <main>
                <h1 class="main-title">¿En qué producto estás interesado?</h1>
    
                <div class="row cards">
                    @foreach ($cards as $key => $card)
                        <div class="col-12 col-md-4 card-item">
                            <h3 
                                class="card-title
                                @if ($key == 0)
                                    negro-credito
                                @endif
                                @if ($key == 1)
                                    rojo-banorte
                                @endif
                                @if ($key == 2)
                                    gris-nomina
                                @endif
                                ">
                                {{$card->name}}
                            </h3>
                            <div class="card-image-container">
                                <a href="{{route('credit_cards.index')}}">
                                    <img src="https://www.cpxproject.com/{{($card->image)}}" alt="Tarjeta de crédito">
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="col-12 col-md-4 card-item">
                        <h3 class="card-title negro-credito">Tarjeta de crédito</h3>
                        <div class="card-image-container">
                            <a href="{{route('credit_cards.index')}}">
                                <img src="{{asset('images/image 3.png')}}" alt="Tarjeta de crédito">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 card-item">
                        <h3 class="card-title rojo-banorte">Tarjeta de débito</h3>
                        <div class="card-image-container">
                            <img src="{{asset('images/image 4.png')}}" alt="Tarjeta de débito">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 card-item">
                        <h3 class="card-title gris-nomina">Tarjeta de nómina</h3>
                        <div class="card-image-container">
                            <img src="{{asset('images/image 5.png')}}" alt="Tarjeta de nómina">
                        </div>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-transparent">¡Ya soy cliente!</button>
                    </div>
                </div>
            </main>
    
            <div class="btn-floating-container-help">
                <div class="btn-floating-container-text">
                    <span class="btn-floating-text">¿Necesitas ayuda?</span>
                </div>
                
                <div class="btn-floating-help">
                    <img src="{{asset('images/Logo.png')}}" alt="logo">
                </div>
            </div>
        </div>
    
        <section class="carousel-two mb-5">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="d-block w-100 d-flex carousel-container">
                        <div class="carousel-item-container-text">
                            <div>
                                <p>¿Aún sin tarjeta de crédito?</p>
    
                                <div class="carousel-item-titles">
                                    <h3>Te presentamos...</h3>
                                    <h2>Tu nueva compañera</h2>
                                    <button class="btn btn-rojo">¡Ya soy cliente!</button>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('images/Group 25.png')}}" alt="Tarjetas">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="d-block w-100 d-flex carousel-container">
                        <div class="carousel-item-container-text">
                            <div>
                                <p>¿Aún sin tarjeta de crédito?</p>
    
                                <div class="carousel-item-titles">
                                    <h3>Te presentamos...</h3>
                                    <h2>Tu nueva compañera</h2>
                                    <button class="btn btn-rojo">¡La quiero!</button>
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('images/Group 25.png')}}" alt="Tarjetas">
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <div class="hackaton-prev"></div>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <div class="hackaton-next"></div>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </section>

        <section class="container">
            <p class="banorte-image-title">
                ¿Por qué 
                <img src="{{asset('images/Nombre.png')}}" alt="logo">
                ?
            </p>

            <div class="why-banorte row align-items-center">
                <div class="col-12 col-md-6">
                    <p class="why-banorte-text">

                        {!! $text->description ?? 'Banorte, con una trayectoria de más de <span class="why-banorte-span">100 años</span>, se ha convertido en uno de los bancos 
                        más importantes de todo el país, llevando a las empresas, familias, 
                        y personas en general de México a tener un control total de sus finanzas, 
                        y por supuesto de su dinero de una forma fácil y segura.' !!}
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <div>
                        <img src="
                        @if ($text->image ?? false)
                        https://www.cpxproject.com/{{($text->image)}}
                        @else
                        {{asset('images/KS25TURC7JFSVCDJLDAR42KAEA 1.png')}}
                        @endif" alt="¿Por qué banorte? imagen">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="mobile-section">
        <div class="mobile-title text-center">
            <h2>Un banco al alcance de <span class="why-banorte-span">todos</span></h2>
        </div>
        <div class="mobile-mobile">
            <div class="mobile-item">
                <img src="{{asset('images/Group 48.png')}}" alt="app">
            </div>
            <div class="mobile-item mobile-description text-center">
                <p style="margin-bottom: 90px">Con nuestra <span class="why-banorte-span">aplicación móvil</span>, tendrás acceso a tu cuenta bancaria estés donde estés.</p>

                <div class="mobile-images">
                    <img src="{{asset('images/get in on google play 1.png')}}" alt="Aplicación para dispositivos android" class="mb-5">
                    <img src="{{asset('images/download-on-the-app-store-apple-logo-svgrepo-com 1.png')}}" alt="Aplicación para dispositivos iOS">
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.card-item').hover(
                function(){
                    $('.card-item').css('opacity', '1');
                    $('.card-item').not(this).css('opacity', '0.5');
                },
                function(){
                    $('.card-item').css('opacity', '1');
                }
            );
        });
    </script>
@endpush