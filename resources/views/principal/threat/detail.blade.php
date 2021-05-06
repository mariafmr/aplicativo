@extends('principal.blog')
@section('title', 'Amenazas')
@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">   
   <a class="banner" href="{{ url('/plan-emergencias-unimar/amenazas' ) }}">{{  $threat['threatTitle'] }}</a>
</li>
{{--<li class="breadcrumb-item">
   <a  class="banner" href="{{ url('/plan-emergencias-unimar/amenazas/'. $threat->id) }}">{{  $threat['threatTitle'] }}</a>
</li> --}}
@endsection
@endsection
@section('image')
    <img alt="no-existe" src="{{ asset('/storage/images/imagThreats/'.$threat->analysis['image']) }}" 
    class="page-header parallaxie center-block banner">                
  {{--<h3 class="text-capitalize font-light darkcolor center">{{ $threat->type->typeThreat }}</a></h3>
<img alt="imagenPrin" src="{{ asset('/storage/images/imagThreats/'.$threat['image']) }}" 
class="page-header parallaxie center-block banner">   --}}
@endsection 
@section('content1')
<section id="our-feature" class="padding_top_half single-feature">
    <h3 class="darkcolor bottom20 text-center" style="text-transform: uppercase;">
      {{ $threat->analysis->title }}
    </h3>             
    <div class="container">
       <div class="row">
         @foreach (  $threatstitles  as  $threatstitle )
             <div class="col-md-6 col-sm-7 text-md-left text-center">
                <div class="heading-title">
                   <span style="text-transform: capitalize;">{{ $threatstitle['title'] }}</span> 
                </div>
                 <p class="bottom35">{!! $threatstitle['content'] !!}</p>
             </div>
         @endforeach 
       </div>
    </div>
</section>
<section id="our-blog" class="padding bglight">
   <div class="container">
       <div class="row">
          <div class="col-md-8">
             <div class="news_item shadow">
                <div class="image hover-effect img-container img-ta page-header parallaxie center-block">
                    <img alt="no-existe" src="{{ asset('/storage/images/imagThreats/'.$threat['image']) }}" class="img-responsive" width="10px">
                </div>
                <div class="news_desc text-left">
                   <h3 class="text-capitalize font-light darkcolor center">{{ $threat->type->typeThreat }}</a></h3>
                   <ul class="meta-tags top30 bottom10">
                      <li>
                        <h4 class="subtitle">{{ $threat['subType'] }}</h4>
                        <br>
                        <a href="/plan-emergencias-unimar/amenazas/{{$threat['id']}}">
                        {{  $threat['threatTitle'] }}</a>
                      </li>
                   </ul>
                   <p class="heading_space">{!! $threat['content'] !!}</p>
                </div>
             </div>
          </div>
          <div class="col-md-4">
             <aside class="sidebar whitebox">
                <div class="widget heading_space">
                   <h4 class="text-capitalize darkcolor bottom20">Recent Posts</h4>
                   <div class="single_post bottom15">
                      <a href="#." class="post"><img src="images/team-3.jpg" alt="post image"></a>
                      <div class="text">
                         <a href="#.">About Invesment Management</a>
                         <span>September 22,2018</span>
                      </div>
                   </div>
                   <div class="single_post bottom15">
                      <a href="#." class="post"><img src="images/team-3.jpg" alt="post image"></a>
                      <div class="text">
                         <a href="#.">We Conduct Share Holders Meet</a>
                         <span>September 22,2018</span>
                      </div>
                   </div>
                </div>
                <div class="widget heading_space">
                   <h4 class="text-capitalize darkcolor bottom20">Categories</h4>
                   <ul class="webcats">
                      <li><a href="#.">web design <span>(20)</span></a></li>
                      <li><a href="#.">network <span>(05)</span></a></li>
                      <li><a href="#.">marketing <span>(11)</span></a></li>
                      <li><a href="#.">event (<span>(20)</span></a></li>
                      <li><a href="#.">website <span>(07)</span></a></li>
                      <li><a href="#.">themeforest<span>(19)</span></a></li>
                   </ul>
                </div>
                <div class="widget heading_space">
                   <h4 class="text-capitalize darkcolor bottom20">Tags</h4>
                   <ul class="webtags">
                      <li><a href="#.">web design</a></li>
                      <li><a href="#.">network</a></li>
                      <li><a href="#.">marketing</a></li>
                      <li><a href="#.">posts</a></li>
                      <li><a href="#.">event</a></li>
                      <li><a href="#.">website</a></li>
                      <li><a href="#.">social</a></li>
                      <li><a href="#.">themeforest</a></li>
                      <li><a href="#.">creative</a></li>
                      <li><a href="#.">best solutions</a></li>
                   </ul>
                </div>
             </aside>
          </div>
       </div>
    </div>
 </section>
 @endsection
@section('content2')

 @endsection
