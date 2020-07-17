@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Especificacion</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('spec.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12 text-center">
                <h4><label for="">Descripcion</label></h4>
                <textarea name="description" id="" cols="50" rows="5" required></textarea>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Detalle de la especificacion</b></small>
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Agregar</button>
            <a href="{{route('spec.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection