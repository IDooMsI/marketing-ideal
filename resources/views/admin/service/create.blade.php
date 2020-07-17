@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nuevo Servicio</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nombre del servicio</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Precio</label></h4>
                <input name="price" class="form-control" type="number" value="#{{ old('price') }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Precio del servicio</b></small>
                @error('price')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Imagen</label></h4>
                <input name="image" class="form-control-file" type="file">
                @error('image')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Descripcion</label></h4>
                <textarea name="description" id="" cols="30" rows="5"></textarea>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Descripcion del servicio</b></small>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-8">
                <h4>Especificaciones</h4>
                <div class="row">
                    @foreach ($specs as $spec)
                    <div class="col-6">
                        <input type="checkbox" name="specs[]" value="{{ $spec->id }}"> {{ucfirst($spec->description)}}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Agregar</button>
            <a href="{{route('service.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection