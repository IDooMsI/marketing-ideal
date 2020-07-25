@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Nueva Publicidad</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('sponsor.update',['sponsor'=>$sponsor])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ $sponsor->name }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nuevo nombre de la publicidad</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Direccion</label></h4>
                <input name="street" class="form-control" type="text" value="{{ $sponsor->address->street }}" required>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nueva calle del negocio</b></small>
                <input name="number" class="form-control" type="number" value="{{ $sponsor->address->number }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nueva altura</b></small>
                @error('street')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
                @error('number')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
             <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Localidad</label></h4>
                <select name="locality" class="form-control" id="" required>
                    <option value="">Elija una nueva localidad</option>
                    @foreach ($localities as $locality)
                        <option <?php if($locality->id == $sponsor->address->locality_id) echo "selected"; ?> value="{{ $locality->id }}">{{ $locality->name }}</option>
                    @endforeach
                </select>
                <a href="{{ route('locality.create') }}"><button class="btn btn-success btn-block mt-4" type="button">Agrega Localidad</button></a>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-3">
                <h4><label for="">Pagina N°</label></h4>
                <input name="page" class="form-control" type="number" value="{{ $sponsor->page }}">
                @error('page')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Fecha de vencimiento</label></h4>
                <input name="expiration" class="form-control" type="date">
            </div>
           <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Facebook</label></h4>
                <input name="facebook" class="form-control" type="text" value="{{ $sponsor->facebook }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Usuario de facebook</b></small>
                <input name="facebook-link" class="form-control" type="text" value="{{ $sponsor->facebook_link }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Link de facebook</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Instagram</label></h4>
                <input name="instagram" class="form-control" type="text" value="{{ $sponsor->instagram }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Usuario de instagram</b></small>
                <input name="instagram-link" class="form-control" type="text" value="{{ $sponsor->facebook_link }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Link de instagram</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Twitter</label></h4>
                <input name="twitter" class="form-control" type="text" value="{{ $sponsor->twitter }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Usuario de twitter</b></small>
                <input name="twitter-link" class="form-control" type="text" value="{{ $sponsor->twitter_link }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Link de twitter</b></small>
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Pagina Web</label></h4>
                <input name="web" class="form-control" type="text" value="{{ $sponsor->web }}">
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Email</label></h4>
                <input name="email" class="form-control" type="text" value="{{ $sponsor->email }}">
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
                <textarea name="description" class="form-control" id="" cols="15" rows="5" required>{{ $sponsor->description }}</textarea>
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Editar</button>
            <a href="{{route('sponsor.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection