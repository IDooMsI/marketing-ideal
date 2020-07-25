@extends('layouts.app')
@section('content')
<div class="container">
    <div id="div-admin-buttons" class="row mt-3 justify-content-center">
        <div class="col-2">
            <a href="{{route('service.index')}}"><button class="btn btn-block btn-outline-dark">Servicios</button></a>
        </div>
        <div class="col-2">
            <a href="{{route('spec.index')}}"><button class="btn btn-block btn-outline-dark">Especificaciones</button></a>
        </div>
        <div class="col-2">
            <a href="{{route('job.index')}}"><button class="btn btn-block btn-outline-dark">Trabajos</button></a>
        </div>
        <div class="col-2">
            <a href="{{route('subcategory.index')}}"><button class="btn btn-block btn-outline-dark">Subcategorias</button></a>
        </div>
        <div class="col-2">
            <a href="{{route('sponsor.index')}}"><button class="btn btn-block btn-outline-dark">Publicidades</button></a>
        </div>
    </div>
</div>
@endsection