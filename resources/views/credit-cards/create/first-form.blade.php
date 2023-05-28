@extends('layouts.hackaton')

@section('content')
    <div class="container">
        <section>
            <h1 class="main-title" style="font-weight: normal;">¡Nos encanta tu entusiasmo!</h1>
            <div class="row" style="margin-top: 40px">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 text-center subtitle">
                            <h4>Tarjeta seleccionada: Clásica</h4>
                        </div>
                        <div class="col-12 text-center">
                            <img src="{{asset('images/image 4.png')}}" alt="Tarjeta">
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{route('credit_cards.index')}}" class="link">Elegir otra tarjeta</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container" style="margin-top: 40px">
            {{-- <form action=""> --}}
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Escribe en el siguiente recuadro tu(s) nombre(s)</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo: Juan Alonso" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ahora escribe tu(s) apellido(s)</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo: Prado Rodríguez" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ingresa tu fecha de nacimiento</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Escribe en el siguiente recuadro tu CURP</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="CURP" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ahora escribe un correo electrónico</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Ejemplo: roberto@hotmail.com" required>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ahora clic en el recuadro para seleccionar tu país de origen</label>
                        <select name="" id="" class="form-control">
                            <option value="1">México</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ahora clic en el recuadro para seleccionar tu estado nacimiento</label>
                        <select name="" id="" class="form-control">
                            <option value="1">Tamaulipas</option>
                        </select>
                    </div>
                    <div class="col-12 text-end mt-4">
                        <a href="{{route('credit_cards.first-form2')}}">
                            <button class="btn btn-rojo" style="height: 47px; width: 230px; font-size: 18px; margin-bottom: 14px">Siguiente paso</button>
                        </a>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
@endsection