@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Editar Trabajo</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('job.update' ,['job'=>$job])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Titulo</label></h4>
                <input name="title" class="form-control" type="text" value="{{ $job->title }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Titulo del trabajo</b></small>
                @error('title')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-12 col-md-6 col-lg-4">
                <h4><label for="">Link</label></h4>
                <input name="link" class="form-control" type="text" value="{{ $job->link }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Link del trabajo</b></small>
                @error('job')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-md-4 mx-auto">
                <h4><label for="">Subategoria</label></h4>
               <select class="form-control mb-1" name="subcategory" value="{{ old('subcategory') }}" required id="">
                    <option value="">Elija una subcategoria</option>
                    @foreach($subcategories as $subcategory)
                    <option <?php if ($subcategory->id == $job->subcategory_id) echo "selected"; ?> value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Categoria a la que pertenece</b></small>
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
                <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $job->description }}</textarea>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Descripcion del trabajo</b></small>
                @error('description')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Agregar</button>
            <a href="{{route('job.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection