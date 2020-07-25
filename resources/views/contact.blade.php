@extends('layouts.app')
@section('content')
<div class="container">
    <div class="form-group mx-auto col-6 col-md-6 col-lg-4">
        <label for="">Nombre</label>
        <input id="name" type="text" class="form-control" required>

        <label for="">Apellido</label>
        <input id="lastname" type="text" class="form-control" required>
        
        <label for="">Email</label>
        <input id="email" type="email" class="form-control" placeholder="example@email.com" required>
        
        <label for="">Consulta</label>
        <textarea id="message" class="form-control" name="" cols="5" rows="5" required></textarea>
        
        <button onclick="contacto()" class="btn btn-block btn-outline-secondary mt-2">Enviar</button>
    </div>
</div>
@endsection