@extends('principal.blog')
@section('title', 'Fases-Evacuación')
@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
   <a class="banner" href="{{ url('/plan-emergencias-unimar/fases-evacuacion') }}">Fases de Evacuación</a>
</li> 
@endsection
@endsection

@section('image')
  @foreach (  $evacuationplantitles as   $evacuationplantitle )
    <img alt="no-existe" src="{{ asset('/storage/images/imagPlan/'. $evacuationplantitle['image']) }}" 
    class="page-header parallaxie center-block">                
  @endforeach
@endsection   
@section('content1')
<!--BLOQUES-->  
<section id="our-feature" class="padding_top_half single-feature">
    @foreach ( $evacuationplantitles as  $evacuationplantitle )
    <div class="col-md-12 text-md-left text-center">
      <h3 class="darkcolor bottom20 text-center" style="text-transform: uppercase;">
        {{ $evacuationplantitle['title'] }}
      </h3> 
      <div class="news_desc text-left bottom60">
        <p class="heading_space">{!! $evacuationplantitle['content'] !!}</p>
      </div>   
    </div>            
    @endforeach
    <div class="container">
       <div class="row">
     
             <div class="col-md-6 col-sm-7 text-md-left text-center">
                <div class="heading-title">
                   <span style="text-transform: capitalize;">{{ $blocks['block'] }}</span> 
                </div>
                 <p class="bottom35">{!! $blocks['content'] !!}</p>
             </div>
       
       </div>
    </div>
</section>
<h2></h2>
{{--<section id="our-team" class="padding bglight">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
           <div id="ourteam-slider" class="owl-carousel">
            @foreach (  $blocks  as   $block )
              <div class="item">
                 <div class="team-box wow fadeInUp" data-wow-delay="300ms">
                    <a class="image" href="/plan-emergencias-unimar/fases-evacuacion/{{$block['id']}}">
                      <img alt="no-existe" class="imagenAme" src="{{ asset('/storage/images/imagThreats/'.$block['image']) }}" class="img-responsive">
                    </a>
                    <div class="team-content gradient_bg whitecolor">
                       <h3>{{ $block['phase'] }}</h3>
                       <br>
                       <br>
                       <p class="bottom40">{!! getShorterString($block['content'], 80) !!}</p>
                    </div>
                 </div>
              </div>
            @endforeach          
           </div>
        </div>
     </div>
  </div>
</section>--}}
<!--FINAL BLOQUES-->  
@endsection

