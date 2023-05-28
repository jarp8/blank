<nav class="navbar navbar-expand-lg navbar-light bg-light " style="
box-shadow: 0px 3px 5px 0px rgba(207,145,145,0.75);
-webkit-box-shadow: 0px 3px 5px 0px rgba(207,145,145,0.75);
-moz-box-shadow: 0px 3px 5px 0px rgba(207,145,145,0.75);">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <a class="navbar-brand" href="{{route('/')}}">
            <img src="{{ URL::asset('/images/Logo_de_Banorte 1.png') }}" alt="" width="290" height="40"
                class="d-inline-block align-text-top">
        </a>




        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class=" me-auto mb-2 mb-lg-0">

            </div>
            <form class="d-flex">

                <div id="search" class="input-group mb-3 px-2">
                    <input type="text" class="form-control" style="width: 45vh"
                        placeholder="Buscar
                    " aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <button style="background-color: red" class="input-group-text" id="basic-addon2">
                        <box-icon color="white" name='search'></box-icon>
                    </button>
                </div>
            </form>

            <button onclick="slideBar(true)" class="btn mb-2 toggle-button">
                <box-icon class="mbt-4" size="sm" name='menu'></box-icon>
            </button>

            <div id="slider" class="slider  text-white">
                <button onclick="slideBar(false)" class="btn  toggle-button">
                    <box-icon name='x' color="white"></box-icon>
                </button>


                <div class="input-group mb-3 px-2">
                    <input type="text" class="form-control" placeholder="Buscar
                    "
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <button style="background-color: red" class="input-group-text" id="basic-addon2">
                        <box-icon color="white" name='search'></box-icon>
                    </button>
                </div>


                <div class="slide d-flex  justify-content-between align-items-center ">
                    <p class="p-0 m-0 d-flex align-items-center">
                        <box-icon color="white" type='solid' name='location-plus'></box-icon> Sucursales
                    </p>
                    <box-icon class="text-end" color="white" size="md" name='chevron-right'></box-icon>
                </div>
                <div class="slide  d-flex justify-content-between align-items-center ">
                    <p class="p-0 m-0 d-flex align-items-center">
                        <box-icon color="white" name='bar-chart-alt-2' type='solid'></box-icon>Indicadores
                        Finiancieros
                    </p>
                    <box-icon class="text-end" color="white" size="md" name='chevron-right'></box-icon>
                </div>
                <div class="slide  d-flex justify-content-between align-items-center ">
                    <p class="p-0 m-0 d-flex align-items-center">
                        <box-icon color="white" name='plus'></box-icon>Seguros
                    </p>
                    <box-icon class="text-end" color="white" size="md" name='chevron-right'></box-icon>
                </div>
                <div class="slide  d-flex justify-content-between align-items-center ">
                    <p class="p-0 m-0 d-flex align-items-center">
                        <box-icon color="white" name='calculator'></box-icon>Cotizador en línea
                    </p>
                    <box-icon class="text-end" color="white" size="md" name='chevron-right'></box-icon>
                </div>
                <div class="slide  d-flex justify-content-between align-items-center ">
                    <p class="p-0 m-0 d-flex align-items-center">
                        <box-icon color="white" name='money'></box-icon>Creditos
                    </p>
                    <box-icon class="text-end" color="white" size="md" name='chevron-right'></box-icon>
                </div>

            </div>
        </div>
    </div>
</nav>

@push('scripts')
    <script>
        window.slideBar = (isOpen) => {
            if (isOpen) {
                slider.style.width = "300px";
                $('#search').hide('slow');

                isOpen = false;
            } else {
                slider.style.width = "0";
                isOpen = true;
                $('#search').show('slow');
            }
        };
    </script>
@endpush
