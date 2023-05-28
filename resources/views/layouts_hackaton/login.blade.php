{{-- @extends('layouts.hackaton')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem; margin: 0 auto">
                <div class="card-body">
                   <h5 class="card-title"> <img src="{{ URL::asset('/images/Logo_de_Banorte 1.png') }}" alt="" width="290" height="40"
                    class="d-inline-block align-text-top"></h5> 
                  <h6 class="card-subtitle mb-2 text-muted">Persona Física</h6>
                    
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example2">Ingresa tu usuario</label>
                    <input type="text" id="form2Example2" class="form-control" />
                    
                  </div>    
    
                  <div class="mt-5">
                    <button class="btn btn-outline-danger ">Regresar</button>
                    <button class="btn btn-danger">Regresar</button>
                  </div>
    
                </div>
              </div>
        </div>
    </div>
    
</div>




@endsection --}}


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="home-campusTech">
    </div>
    <header class="fixed-top">
        @include('layouts_hackaton.header')
    </header>

    <div class=" container-campusTech login-hackaton ">
        <div class="container-fluid">
            <div class="row">
                <div class="rounded-pill  border-dark row mb-2"
                    style="border: 1px solid #d6828269; border: 1px solid #d6828269;height: 47px;display: flex;text-align: center;align-items: center;">
                    <div class="col-sm-2 border border-start-0 btn-outline-danger">
                        <button class="btn ">
                            Personal
                        </button>

                    </div>


                    <div class="col-sm-2 border border-start-0 btn-outline-danger">
                        <button class="btn ">
                            Pymes
                        </button>

                    </div>


                    <div class="col-sm-2 border border-start-0 btn-outline-danger">

                        <button class="btn ">
                            Empresas
                        </button>
                    </div>

                    <div class="col-sm-2 border border-start-0 btn-outline-danger">

                        <button class="btn ">
                            Gobierno
                        </button>

                    </div>

                    <div class="col-sm-2 border border-start-0 btn-outline-danger">


                        <button class="btn ">
                            Casa de bolsa
                        </button>
                    </div>
                    <div class="col-sm-2 border-start-0 btn-outline-danger">

                        <button class="btn ">
                            Preferente
                        </button>

                    </div>

                </div>

                <div class="col-2 mt-5 " style="
                margin-left: 95px;
            ">
                    <div class="row d-flex align-items-center">
                        <div class="col-3">Activa tu token</div>
                        <button class="btn btn-danger col-2" style="width: 55px; margin-left: 110px">
                            <box-icon color="white" type='solid' name='key'></box-icon>
                        </button>
                    </div>


                    <div class="row d-flex align-items-center">
                        <div class="col-3">Sincroniza tu token</div>
                        <button class="btn btn-danger col-2" style="width: 55px; margin-left: 110px">
                            <box-icon color="white"  name='sync'></box-icon>
                        </button>
                    </div>
                </div>
                <div class="col-8 pt-5">
                    <div class="card" style="">
                        <div class="card-body">
                            <h5 class="card-title"
                                style="
                            text-align: center;
                        "> <img
                                    src="{{ URL::asset('/images/Logo_de_Banorte 1.png') }}" alt=""
                                    width="290" height="40" class="d-inline-block align-text-top">
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted"
                                style="
                            text-align: center;
                        ">
                                Persona Física</h6>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example2">Ingresa tu usuario</label>
                                <input type="text" id="form2Example2" class="form-control" />

                            </div>

                            <div class="mt-5">
                                <button class="btn btn-outline-danger ">Regresar</button>
                                <button class="btn btn-danger">Regresar</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="btn-floating-container-help">
                    <div class="btn-floating-container-text">
                        <span class="btn-floating-text">¿Necesitas ayuda?</span>
                    </div>

                    <div class="btn-floating-help">
                        <img src="{{ asset('images/Logo.png') }}" alt="logo">
                    </div>
                </div>
            </div>

        </div>





        <footer class="footer-home text-white text-center text-lg-start mt-4" style="
        top: 40vh;
    ">
            @include('layouts_hackaton.footer')
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    @stack('scripts')
</body>

</html>
