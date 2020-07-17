@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center mb-3">
            <h1 id="title-job">CLIENTES SATISFECHOS</h1>
        </div>
        <div class="border-top border-warning mt-3"></div>
        <div class="border-top border-warning w-75 mx-auto my-2"></div>
        <div class="border-top border-warning w-50 mx-auto mb-3"></div>
        <section class="row">
            @foreach ($jobs as $job)
            <div class="col-12 col-md-6 col-lg-4 text-center h-100">
                <div class="border boder-dark p-2">
                    <h3>{{ $job->title }}</h3>
                    @if(strpos($job->image,'mp4') !== false)
                    <video class="w-100" id="video-job" controls poster="">
                        <source src="{{ asset('storage/'.$job->image) }}" type="video/mp4">
                    </video>
                    @else
                    <img class="w-100" src="{{ asset('storage/'.$job->image) }}" alt="">
                    @endif
                    <p>{{ $job->description }}</p>
                    <a href="{{ $job->link }}">{{ $job->link }}</a>
                </div>
            </div>
            @endforeach
        </section>
    </div>
@endsection