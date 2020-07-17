@extends('layouts.app')
@section('content')
<div class="container">
    <div  id="video">
        <video autoplay muted width="100%" poster="{{ asset('storage/cortina-video.jpg') }}">
            <source src="{{ asset('storage/intro mp4.mp4') }}" type="video/mp4">
        </video>
   </div>
    <div class="border-top border-warning mt-3"></div>
    <div class="border-top border-warning w-75 mx-auto my-2"></div>
    <div class="border-top border-warning w-50 mx-auto mb-3"></div>
   <div class="row mt-3 text-center">
       <div class="col-12 col-md-6 col-lg-6">
           <img class="w-100" src="{{ asset('storage/deja de buscar.jpeg') }}" alt="">
       </div>
       <div class="col-12 col-md-6 col-lg-6 ml-auto">
           <h2><strong>¿Porque trabajar con nosotros?</strong></h2>
           <ul id="lista-index">
               <li>Somos emprendedores, profesionales, entusiastas y comprometidos</li>
               <li>
                   Nuestro modelo de negocio basado en una red de profesionales independientes, nos permite brindar 
                   soluciones a medida y atencion personalizada
                </li>
                <li>Ofrecemos soluciones de posicionamiento a traves de distintas estrategias de Marketing Digital</li>
            </ul>
        </div>
   </div>
   <section class="text-center">
        <div class="border-top border-warning mt-3"></div>
        <div class="border-top border-warning w-75 mx-auto my-2"></div>
        <div class="border-top border-warning w-50 mx-auto mb-3"></div>
       <h2 ><strong>¿Estas comenzando tu negocio y no sabes como hacerte conocido?</strong></h2>
       <img class="w-100" src="{{ asset('storage/activate.png') }}" alt="image de activate">
       <button onclick="whatsapp('activate')" class="my-1 btn btn-lg btn-block btn-outline-dark" >Quiero saber mas!</button>
   </section>
</div>
@endsection
