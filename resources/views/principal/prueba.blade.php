@extends('principal.blog')

@section('title', 'Crear Sección de las Lineas Vitales')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/lineasVitales') }}">
    <i class="fab fa-accusoft"></i>  Listar Lineas Vitales
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/lineasVitales/create') }}">
        <i class="fab fa-accusoft"></i> Crear Lineas Vitales
    </a>
</li>
@endsection
@endsection

@section('content')
<H1>HOLA MUNDO</H1>
@endsection

<br>
<br>



   <section class="half-section">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6 nopadding">
           {{--    <div class="image hover-effect img-container">
                  <img alt="no-existe" src="{{ asset('/storage/images/imagThreats/'.$type['image']) }}" class="equalheight">
               </div>--}}
            </div>
            <div class="col-lg-6 nopadding">
               <div class="split-box text-center center-block container-padding equalheight">
                <div class="heading-title padding">
                 
                  {{ $types->threats_titles_id }}
                  {{ $types['typeThreat'] }}
                 <a class="btn btn-primary top30" href="/plan-emergencias-unimar/prueba/{{$types['id']}}" role="button">Leer más</a>
                </div>
               </div>
            </div>
          </div>
         </div>
      </div>
   </section>


{{--<div id="twocopies"> 
    <section class="half-section">
       <div class="container-fluid">
          <div class="row">
             <div class="col-lg-6 nopadding">
                <div class="image hover-effect img-container">
                   <img alt="" src="{{ asset('/storage/imagenes/imagAmenazas/'. $threat['image']) }}" class="equalheight">
                </div>
             </div>
             <div class="col-lg-6 nopadding">
                <div class="split-box text-center center-block container-padding equalheight">
                   <div class="heading-title padding">
                   <span class="wow fadeInUp" data-wow-delay="500ms">DEFINICIÓN DE AMENAZAS</span>
                   <h2 class="darkcolor bottom20 wow fadeInUp" data-wow-delay="400ms" style="text-transform: uppercase;">{{  $threat['threatTitle'] }}</h2>
                   <p class="heading_space wow fadeInUp" data-wow-delay="500ms">{{  $threat['content'] }} </p>
                   <H1>{{ $threat->type_id->typeThreat }}FG</H1> 
                </div>
                </div>
             </div>
           </div>
          </div>
       </div>
    </section>
 </div> --}}