@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="row justify-content-around">
        <div class="col-12 col-lg-6 text-center">
            <img id="principal" class="w-75" src="{{asset('storage/'.$sponsor->image) }}" alt="{{$sponsor->name}}">
        </div>
        <section class="mr-auto col-12 col-lg-5">
            <div class="col-12">
                <h1><strong id="">{{ucwords($sponsor->name)}}</strong><span class="">
            </div>
            <div class="col-12 col-md-10 col-lg-10 ">
                <h4>{{ $sponsor->description }}</h4>
            </div>
            <ul>
                @if($sponsor->address)
                <li><b>Direccion: </b>{{ ucwords($sponsor->address->addressComplete($sponsor->address_id)) }}</li>
                @else
                <li>No posee</li>
                @endif
                @if($sponsor->facebook)
                <li><b>Facebook: </b><a class="text-dark" href="{{ $sponsor->facebook_link }}" target="_blanc">{{ $sponsor->facebook }}</li></a>
                @else
                <li><b>Facebook: </b>No posee</li>
                @endif
                @if($sponsor->instagram)
                <li><b>Instagram: </b><a class="text-dark" href="{{ $sponsor->instagram_link }}">{{ $sponsor->instagram }}</li></a>
                @else
                <li><b>Instagram: </b>No posee</li>
                @endif
                @if($sponsor->twitter)
                <li><b>Twitter: </b><a class="text-dark" href="{{ $sponsor->twitter_link }}">{{ $sponsor->twitter }}</a></li>
                @else
                <li><b>Twitter: </b>No posee</li>
                @endif
                @if($sponsor->web)
                <li><b>Web: </b><a class="text-dark" href="{{ $sponsor->web }}">{{ $sponsor->web }}</a></li>
                @else
                <li><b>Web: </b>No posee</li>
                @endif
                @if($sponsor->email)
                <li><b>Email: </b><a class="text-dark" href="{{ $sponsor->email }}">{{ $sponsor->email }}</a></li>
                @else
                <li><b>Email: </b>No posee</li>
                @endif
            </ul>
            <div class="col">
                <a href="{{ route('show.sponsors',['page'=>$sponsor->page]) }}"><button class="btn btn-outline-dark">Volver</button></a>
            </div>           
        </section>
    </div>
</div>
@endsection