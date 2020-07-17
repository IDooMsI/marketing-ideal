@extends('layouts.app')
@section('content')
<div id="div-all-cat" class="col-12">
    <div class="mx-auto text-center col-12">
        <h2>Especificaciones</h2>
        <a href="{{route('admin')}}" style="text-decoration: none; color:black"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="row justify-content-center mx-auto mb-3 col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3 col-6 col-md-4">
            <a href="{{route('spec.create')}}"><button class="btn btn-outline-dark w-100">Nuevo</button></a>
        </div>
    </div>
    <div class="my-2 col-12 text-center">
        @if(Session::has('notice'))
        <h3 class="my-auto text-success"><strong>{{ Session::get('notice') }}</strong></h3>
        @endif
    </div>
</div>
<div class="table" style="overflow-x:auto;">
    <table class="mx-auto">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specs as $spec => $data)
            <tr>
                <th scope="row">{{$data->id}}</th>
                <th>{{$data->description}}</th>
                 <th>
                    <a href="{{route('spec.edit',['spec'=>$data])}}">editar</a>
                    ||
                    <a href="{{route('spec.delete',['id'=>$data])}}">eliminar</a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection