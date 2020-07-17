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
                        @case('starting')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('starting')" class="btn btn-block btn-outline-secondary">Contratar</button>
                            </div>
                             <ul class="border border-warning rounded text-white" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                            @break
                        @case('advanced')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('advanced')" class="btn btn-block btn-outline-success">Contratar</button>
                            </div>
                            <ul class="border border-warning rounded text-success" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                            @break
                        @case('expert')
                            <div class="col-12 text-center my-3">
                                <button onclick="whatsapp('expert')" class="btn btn-block btn-outline-warning">Contratar</button>
                            </div>
                             <ul class="border border-warning rounded text-warning" style="background-color:black">
                                @foreach ($service->specs as $spec)
                                    <li class="my-3" style="list-style:circle ">{{ $spec->description }}</li>
                                @endforeach
                            </ul>
                            @break
                    @endswitch
                </div>
                <div class="col-12 text-center">
                    <h3>$ {{ $service->price }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection