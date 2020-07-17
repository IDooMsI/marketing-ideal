@extends('layouts.app')
@section('content')
<div class="container">
    <form action="">
        @csrf
        <div class="form-group col-4 tex-center mx-auto">
            <label for="">Nombre</label>
            <input type="text" class="form-control">

            <label for="">Apellido</label>
            <input type="text" class="form-control">
            
            <label for="">Email</label>
            <input type="text" class="form-control" placeholder="example@email.com">
            
            <label for="">Consulta</label>
            <textarea class="form-control" name="" id="" cols="5" rows="5"></textarea>
            
            <button type="button" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>
@endsection