@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="col-12 text-center mb-5">
        <h2>Editar Subcategoria</h2>
    </div>
    <form class="col-12 mx-auto" action="{{route('subcategory.update' ,['subcategory'=>$subcategory])}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-4 mx-auto">
                <h4><label for="">Nombre</label></h4>
                <input name="name" class="form-control" type="text" value="{{ $subcategory->name }}">
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Nuevo nombre de la subcategoria</b></small>
                @error('name')
                <div id="error" class="alert alert-danger mx-auto col-11 col-sm-4 col-lg-12"><span>{{ $message }}</span></div>
                @enderror
            </div>
            <div class="form-group col-md-4 mx-auto">
                <h4><label for="">Categoria</label></h4>
               <select class="form-control mb-1" name="category" value="{{ old('category') }}" required id="">
                    <option value="">Elija una categoria</option>
                    @foreach($categories as $category)
                    <option <?php if ($category->id == $subcategory->category_id) echo "selected"; ?> value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <small id="passwordHelpBlock" class="form-text text-muted"><b>Categoria a la que pertenece</b></small>
            </div>
        </div>
        <div id="buttons" class="text-center col-12">
            <button class="mx-2 btn btn-outline-dark" type="submit">Agregar</button>
            <a href="{{route('subcategory.index')}}"><button class="btn btn-outline-dark" type="button">Cancelar</button></a>
        </div>
    </form>
</div>
@endsection