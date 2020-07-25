@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="mx-auto text-center col-12">
        <h2>Publicidades</h2>
        <a href="{{route('admin')}}" style="text-decoration: none; color:black"><i class="fas fa-arrow-circle-left"></i> Volver</a>
    </div>
    <div class="row justify-content-center mx-auto mb-3 col-12 col-md-8 col-lg-6 col-xl-4">
        <div class="my-3 col-6 col-md-4">
            <a href="{{route('sponsor.create')}}"><button class="btn btn-outline-dark w-100">Nueva</button></a>
        </div>
    </div>
    <div class="mx-auto text-center col-6">
        <a href="{{route('sponsor.calculate')}}"><button class="btn btn-outline-dark">Calcular vencimientos</button></a>
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
                <th scope="col">Nombre</th>
                <th scope="col">Direccion</th>
                <th scope="col">Pagina N°</th>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col">Vencido?</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sponsors as $sponsor => $data)
            <tr class="text-center">
                <th scope="row">{{$data->id}}</th>
                <th>{{$data->name}}</th>
                @if($data->address)
                <th>{{$data->address->street." ".$data->address->number." (".$data->address->locality->name.")"}}</th>
                @else
                <th>No tiene direccion</th>
                @endif
                <th>{{$data->page}}</th>
                <th>{{Str::limit($data->expiration,10)}}</th>
                @if($data->expirated)
                <th>SI</th>
                @else
                <th>NO</th>
                @endif
                 <th>
                    <a href="{{route('sponsor.edit',['sponsor'=>$data->id])}}">editar</a>
                    ||
                    <a href="{{route('sponsor.delete',['id'=>$data])}}">eliminar</a>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection