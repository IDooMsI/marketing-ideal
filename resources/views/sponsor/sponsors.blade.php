@extends('layouts.app')
@section('content')
<div class="container">
    <section class="row">
        @foreach ($sponsors as $sponsor)    
        <div  class="border-bottom pb-3 col-12 col-md-4 col-lg-4 text-center mb-3">
            <a href="#{{ $sponsor->id }}"><img src="{{ asset('storage/'.$sponsor->image) }}" class="w-100" alt=""></a>
            <a href="{{ route('show.sponsor',['id'=>$sponsor->id]) }}"><button class="btn btn-outline-secondary mt-2">Ver mas!</button></a>
        </div>
        @endforeach
    </section>
    <div class="col-12 text-center mt-3">
        <span>Paginas</span>
        <ul class="list-inline col-2 mx-auto">
            <li class="list-inline-item active">
                <a href="{{ route('show.sponsors',['page'=>1]) }}">1</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('show.sponsors',['page'=>2]) }}">2</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('show.sponsors',['page'=>3]) }}">3</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('show.sponsors',['page'=>4]) }}">4</a>
            </li>
            <li class="list-inline-item">
                <a href="{{ route('show.sponsors',['page'=>5]) }}">5</a>
            </li>
        </ul>
    </div>
</div>
@endsection