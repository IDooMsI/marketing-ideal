@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="text-center mb-3">
            <h1 id="title-service">SERVICIOS PARA CADA TIPO DE CLIENTE</h1>
        </div>
        <div class="border-top border-warning mt-3"></div>
        <div class="border-top border-warning w-75 mx-auto my-2"></div>
        <div class="border-top border-warning w-50 mx-auto mb-3"></div>
        <div class="row">
            @foreach ($services as $service)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="col-12">
                    <img class="w-100" src="{{ asset('storage/'.$service->image) }}" alt="">
                </div>
                <div class="col-12">
                    @switch($service->name)
                        @case('landing page')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('landing page')" class="btn btn-block btn-outline-secondary">Contratar</button>
                            </div>
                            <div class="col-12 text-center">
                                <h3>Valor <strong>$ {{ $service->price }}</strong></h3>
                            </div>
                             <ul class="border border-warning rounded text-white" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                            <div class="text-center">
                                <h3>DESCRIPCION</h3>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        @break
                        @case('static page')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('static page')" class="btn btn-block btn-outline-info">Contratar</button>
                            </div>
                            <div class="col-12 text-center">
                                <h3>Valor <strong>$ {{ $service->price }}</strong></h3>
                            </div>
                            <ul class="border border-warning rounded text-success" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                             <div class="text-center">
                                <h3>DESCRIPCION</h3>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        @break
                        @case('dynamic page')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('dynamic page')" class="btn btn-block btn-outline-warning">Contratar</button>
                            </div>
                            <div class="col-12 text-center">
                                <h3>Valor <strong>$ {{ $service->price }}</strong></h3>
                            </div>
                             <ul class="border border-warning rounded" style="background-color:black; text-color: #ffb35e">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                             <div class="text-center">
                                <h3>DESCRIPCION</h3>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        @break
                        @case('tienda online')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('tienda online')" class="btn btn-block btn-outline-warning">Contratar</button>
                            </div>
                            <div class="col-12 text-center">
                                <h3>Valor <strong>$ {{ $service->price }}</strong></h3>
                            </div>
                             <ul class="border border-warning rounded text-warning" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                             <div class="text-center">
                                <h3>DESCRIPCION</h3>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        @break
                        @case('e-commerce')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('tienda online')" class="btn btn-block btn-outline-warning">Contratar</button>
                            </div>
                            <div class="col-12 text-center">
                                <h3>Valor <strong>$ {{ $service->price }}</strong></h3>
                            </div>
                             <ul class="border border-warning rounded text-warning" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                             <div class="text-center">
                                <h3>DESCRIPCION</h3>
                                <p>
                                    {{ $service->description }}
                                </p>
                            </div>
                        @break
                    @endswitch
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection