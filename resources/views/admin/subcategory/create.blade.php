@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Subcategoria</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4 mx-auto">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nombre de la nueva subcategoria</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Agregar</button>
            <a href="{{route('subcategory.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection