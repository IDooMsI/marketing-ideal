<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Marketing Ideal</title>
    <link rel="Shortcut Icon" class="w-100" href="{{asset('storage/foco realweb.png')}}" type="image/x-icon" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/Arenq.otf') }}">
    <link rel="stylesheet" href="{{ asset('fonts/Arenq.ttf') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/service.css') }}" rel="stylesheet">
    <link href="{{ asset('css/job.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: black">
            <div class="container">
                <div class="col-8 col-md-4 col-lg-3">
                    <a class="navbar-brand" href="{{ url('/#video') }}">
                        <img class="w-75" src="{{ asset('storage/marketing-ideal-2.png') }}" alt="logo de de marketin ideal">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon bg-white"></span>
                </button>
                <div class="collapse navbar-collapse mx-auto" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto text-white">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:white">Nuestros Servicios</a>
                            <div class="dropdown-menu text-dark bg-light col-2 p-2" aria-labelledby="navbarDropdown3">
                                @if(isset($service))
                                @foreach ($service->subcategories as $subcategory)
                                    <a href="{{ route('show.services',['id'=>$subcategory->id]) }}" class="nav-link">{{ ucfirst($subcategory->name) }}</a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none; color:white">Nuestros Trabajos</a>
                            <div class="dropdown-menu text-dark bg-light col-2 p-2" aria-labelledby="navbarDropdown2">
                                @if(isset($work))
                                @foreach ($work->subcategories as $subcategory)
                                    <a href="{{ route('show.jobs',['id'=>$subcategory->id]) }}" class="nav-link">{{ ucfirst($subcategory->name) }}</a>
                                @endforeach
                                @endif
                            </div>
                        </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('show.sponsors',['page'=>1]) }}" style="text-decoration:none; color:white">Espacio Publicitario</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('contact') }}" style="text-decoration:none; color:white">Contacto</a>
                        </li>
                        @auth
                        @if (Auth::user()->admin == 777)
                        <li class="nav-item dropdow">
                             <a class="nav-link" style="color:white !important;" href="{{route('admin')}}">Panel</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer id="footer" class="footer mt-auto pt-2 pb-0 bg-dark">
            <div class="col-12 mx-auto">
                <div class="row justify-content-around">
                    <div class="col-12 col-md-6 col-lg-4  p-3 order-2 text-center align-self-center ">
                        <div class="row">
                            <img src="{{ asset('storage/gmail.svg') }}" style="width: 8%" alt=""><a href="mailto:info@marketingideal.com" class="text-white">info@marketing-ideal.com</a></h5>
                        </div>
                        <div class="row">
                            <img src="{{ asset('storage/facebook.svg') }}" style="width: 8%" alt=""><h5 class="ml-1 my-auto"><a href="https://m.facebook.com/marketingidealoficial/" class="text-white">Marketingidealoficial</a></h5>
                        </div>
                        <div class="row">
                            <img src="{{ asset('storage/instagram.svg') }}" style="width: 8%" alt=""><h5 class="ml-1 my-auto"><a href="https://www.instagram.com/marketingidealok/" class="text-white">@marketingidealok</a></h5>
                        </div>
                        <div class="row">
                            <img src="{{ asset('storage/world.svg') }}" style="width: 8%" alt=""><h5 class="ml-1 my-auto"><a href="https://marketing-ideal.com/" target="_blank" class="text-white">www.marketing-ideal.com</a></h5>
                        </div>
                        <div class="row">
                            <img src="{{ asset('storage/whatsapp.svg') }}" style="width: 8%" class="my-auto" alt=""><h5 class="ml-1 my-auto"><a target="_blank" class="text-white">11 3665-9229</a></h5>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-4 d-lg-block d-xl-block p-3 order-1 text-center align-self-center">
                        <img class="w-75" src="{{ asset('storage/marketing-ideal-2.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row w-100 justify-content-center text-center" style="color:white">
                <p class="p-0 m-0">
                    Powered
                    <strong><a style="color:white" href="https://www.instagram.com/bykingos_web/" target="new_blank">ByKINGos Web</a></strong>
                    &
                    Design by
                    <a href="https://www.instagram.com/marketingidealok/" target="new_blank" style="color:white">
                        <strong>Marketing Ideal</strong>
                        <img src="{{ asset('storage/marketing-ideal-2.png') }}" alt="" style="width:4%">
                    </a>
                </p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/wtp.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
