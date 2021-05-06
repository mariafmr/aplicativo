<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>XeOne | Blog</title>
<link href="/principal/images/favicon.png" rel="icon">
<link rel="stylesheet" href="/principal/css/plugins.css">
<link rel="stylesheet" href="/principal/css/style.css">

</head>
<body>

<!--PreLoader-->
<div class="loader">
   <div class="loader-inner">
      <div class="loader-blocks">
         <span class="block-1"></span>
         <span class="block-2"></span>
         <span class="block-3"></span>
         <span class="block-4"></span>
         <span class="block-5"></span>
         <span class="block-6"></span>
         <span class="block-7"></span>
         <span class="block-8"></span>
         <span class="block-9"></span>
         <span class="block-10"></span>
         <span class="block-11"></span>
         <span class="block-12"></span>
         <span class="block-13"></span>
         <span class="block-14"></span>
         <span class="block-15"></span>
         <span class="block-16"></span>
      </div>
   </div>
</div>
<!--PreLoader Ends-->


<!-- header -->
<header class="site-header">
   <nav class="navbar navbar-expand-lg transparent-bg static-nav">
      <div class="container">
         <a class="navbar-brand" href="index.html">
         <img src="/principal/images/logo-transparent.png" alt="logo">
         </a>
         <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#xenav">
            <span> </span>
            <span> </span>
            <span> </span>
         </button>
         <div class="collapse navbar-collapse" id="xenav">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.html#banner-main" data-text="Home">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-process" data-text="Features">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-team" data-text="Team">Team</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#portfolio_top" data-text="Portfolio">Portfolio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-pricings" data-text="Packages">Packages</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-testimonial" data-text="Clients">Clients</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-blog" data-text="Blog">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#contactus" data-text="contact">contact</a>
               </li>
            </ul>
         </div>
      </div>

      <!--side menu open button-->
      <a href="javascript:void(0)" class="d-none d-lg-inline-block sidemenu_btn" id="sidemenu_toggle">
          <span></span> <span></span> <span></span>
       </a>
   </nav>

   <!-- side menu -->
   <div class="side-menu">
      <div class="inner-wrapper">
         <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
         <nav class="side-nav">
            <ul class="navbar-nav w-100">
               <li class="nav-item active">
                  <a class="nav-link" href="index.html#banner-main">Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-process">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-team">Team</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#portfolio_top">Portfolio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-pricings">Packages</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-testimonial">Clients</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#our-blog">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.html#contactus">contact</a>
               </li>
            </ul>
         </nav>

         <div class="side-footer w-100">
            <ul class="social-icons-simple white top40">
            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
         </ul>
         <p class="whitecolor">&copy; 2018 XeOne. Made With Love by themesindustry</p>
         </div>
      </div>
   </div>
   <a id="close_side_menu" href="javascript:void(0);"></a>
   <!-- End side menu -->
</header>
<!-- header -->   


<!--page Header-->
<section class="page-header parallaxie padding_top center-block">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-titles text-center">
               <h2 class="whitecolor font-light bottom30">latest Blog</h2>
               <ul class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">latest Blog</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!--page Header ends-->


<!--Some Feature -->  
{{--<header class="masthead" style="background-image: url('')">
   <div class="overlay"></div>
   <div class="container">
       <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto">
           <div class="page-heading">
           <h1>{{$titles['title']}}</h1>YYYYY
           <h1>{{$titles['subtitle']}}</h1>
          
           </div>
       </div>
       </div>
   </div>
</header>--}}

<!--ANÁLISIS DE VULNERABILIDAD-->  
@foreach (  $articls   as   $articl )
{{ $articl['title'] }}
<div class="heading-title">
</div>
@endforeach
<section id="our-feature" class="padding_top_half single-feature">
   <h2 class="darkcolor bottom20 text-center">ANÁLISIS DE VULNERABILIDAD</h2>             
   <div class="container">
      <div class="row">
        @foreach ( $articls  as  $articl )
            <div class="col-md-6 col-sm-7 text-md-left text-center">
               <div class="heading-title">
                  <span style="text-transform: capitalize;">PRUEBA{{ $articl['title'] }}</span> 
               </div>
                <p class="bottom35">ssssssssss{{ $articl['subtitle'] }}</p>
            </div>
        @endforeach 
      </div>
   </div>
</section>
<!--Some Feature ends-->

<!-- Our Blogs -->  

      {{--  <div class="cbp-item">
            <div class="news_item shadow">
               <a class="image" href="blog-detail.html">
                  <img src="/principal/images/blog-measonry2.jpg" alt="Latest News" class="img-responsive">
               </a>
               <div class="news_desc">
                  <h3 class="text-capitalize font-light darkcolor"><a href="#" style="text-transform: uppercase;">Amenazas de tipo natural</a></h3>
                  <ul class="meta-tags top20 bottom20">
                     <div class="heading-title">
                        <span style="text-transform: capitalize;">Erupción volcánica</span> 
                     </div>
                  </ul>
                  <p class="bottom35" style="text-align: justify;">Estando la SEDE PRINCIPA DE LA UNIVERSIDAD
                     MARIANA ubicada en el municipio de Pasto; el cual está muy próximo al Volcán
                     Galeras, el cual ha manifestado en los últimos años un aumento en su actividad
                     volcánica, se han clasificado diversas zonas de amenaza, por la ubicación
                     proximal a este Volcán, desde Zona de amenaza alta; la cual esta con las zonas
                     más cercanas al volcán, una zona de amenaza media y una zona de amenaza
                     baja. Si bien es cierto el municipio de Pasto y particularmente la SEDE
                     PRINCIPAL DE LA UNIVERSIDAD MARIANA se encuentran dentro de una zona
                     de amenaza media al noroccidente de la capital de Nariño, podría llevar a que las
                     instalaciones de la sede sufra de algunas fallas que a su vez pondrían en alto
                     riesgo a sus ocupantes. 
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item">
            <div class="news_item shadow">
               <a class="image" href="blog-detail.html">
                  <img src="/principal/images/blog-measonry3.jpg" alt="Latest News" class="img-responsive">
               </a>
               <div class="news_desc">
                  <h3 class="text-capitalize font-light darkcolor"><a href="#" style="text-transform: uppercase;">Amenazas de tipo tecnológico</a></h3>
                  <ul class="meta-tags top20 bottom20">
                     <div class="heading-title">
                        <span style="text-transform: capitalize;">Incendio Estructural</span> 
                     </div>
                  </ul>
                  <p class="bottom35" style="text-align: justify;">Considerando el uso de material combustible como papel,
                     cartón, plásticos, textiles; el uso de equipos eléctricos, la posibilidad de
                     cortocircuitos o recalentamiento de cables debido a sus instalaciones eléctricas
                     antiguas y sobre todo, por la alta carga de material combustible de madera, harían
                     que sea posible un incendio estructural en esta sede.
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item">
            <div class="news_item shadow">
               <a class="image" href="blog-detail.html">
                  <img src="/principal/images/blog-measonry5.jpg" alt="Latest News" class="img-responsive">
               </a>
               <div class="news_desc">
                  <h3 class="text-capitalize font-light darkcolor"><a href="#" style="text-transform: uppercase;">Amenazas de tipo natural</a></h3>
                  <ul class="meta-tags top20 bottom20">
                     <div class="heading-title">
                        <span style="text-transform: capitalize;">Falla estructural en planta física:</span> 
                     </div>
                  </ul>
                  <p class="bottom35" style="text-align: justify;">Amenazas como los incendios estructurales,
                     vientos fuertes y sismos, son las razones para considerar la falla estructural como
                     una amenaza de posible colapso estructural.
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item">
            <div class="news_item shadow">
               <a class="image" href="blog-detail.html">
                  <img src="/principal/images/blog-measonry4.jpg" alt="Latest News" class="img-responsive">
               </a>
               <div class="news_desc">
                  <h3 class="text-capitalize font-light darkcolor"><a href="#" style="text-transform: uppercase;">Amenazas de tipo Social</a></h3>
                  <ul class="meta-tags top20 bottom20">
                     <div class="heading-title">
                        <span style="text-transform: capitalize;">Sismo / terremoto</span> 
                     </div>
                  </ul>
                  <p class="bottom35" style="text-align: justify;">El departamento de Nariño es considerado como una zona
                     de alta sismicidad por la ubicación geográfica en la que se encuentra el
                     departamento, por lo tanto el municipio de Pasto también presenta una alta
                     susceptibilidad sísmica que relaciona con la probabilidad de sufrir daños en
                     estructuras y en edificaciones. La proximidad al Litoral pacífico con el municipio de
                     Pasto y la cercanía que tiene esta sede con la zona de amenaza volcánica que
                     genera el Volcán Galeras y otros volcanes del sur del departamento como
                     Cumbal, Azufral y Cerro Negro que también se encuentran activos aunque en
                     grado de alerta baja. Todo lo anterior hace que se considere esta situación de
                     sismo/terremoto como una amenaza para la sede.
                  </p>
               </div>
            </div>
         </div>
         <div class="cbp-item">
            <div class="news_item shadow">
               <a class="image" href="blog-detail.html">
                  <img src="/principal/images/blog-measonry6.jpg" alt="Latest News" class="img-responsive">
               </a>
               <div class="news_desc">
                  <h3 class="text-capitalize font-light darkcolor"><a href="blog-detail.html">Next Large Social Network</a></h3>
                  <ul class="meta-tags top20 bottom20">
                     <li><a href="#."><i class="fa fa-calendar"></i>Jan 14</a></li>
                     <li><a href="#."> <i class="fa fa-user-o"></i> peter </a></li>
                     <li><a href="#."><i class="fa fa-comment-o"></i>5 </a></li>
                  </ul>
                  <p class="bottom35">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                  <a href="blog-detail.html" class="button btnsecondary">Read more</a>
               </div>
            </div>
         </div>
      </div>--}} 
    {{-- <div class="row">
         <div class="col-sm-12">
            <!--Pagination-->
            <ul class="pagination justify-content-center top50">
               <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
               <li class="page-item active"><a class="page-link" href="#">1</a></li>
               <li class="page-item"><a class="page-link" href="#">2</a></li>
               <li class="page-item"><a class="page-link" href="#">3</a></li>
               <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
         </div>
      </div>--}} 
   </div>
</section>
<!--Our Blogs Ends-->
                        
      
<!--Site Footer Here-->
<footer id="site-footer" class="padding_half">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 text-center">
            <ul class="social-icons bottom25">
               <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
               <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
               <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i> </a> </li>
               <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i> </a> </li>
               <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a> </li>
               <li><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i> </a> </li>
            </ul>
             <p class="copyrights"> &copy; 2019 XeOne. made with love by <a href="http://www.themesindustry.com/" target="_blank">themesindustry</a> </p>
         </div>
      </div>
   </div>
</footer>
<!--Footer ends-->   



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/principal/js/jquery-3.1.1.min.js"></script>

<!--Bootstrap Core-->
<script src="/principal/js/popper.min.js"></script>
<script src="/principal/js/bootstrap.min.js"></script>

<!--to view items on reach-->
<script src="/principal/js/jquery.appear.js"></script>

<!--Equal-Heights-->
<script src="/principal/js/jquery.matchHeight-min.js"></script>

<!--Owl Slider-->
<script src="/principal/js/owl.carousel.min.js"></script>

<!--number counters-->
<script src="/principal/js/jquery-countTo.js"></script>
 
<!--Parallax Background-->
<script src="/principal/js/parallaxie.js"></script>
  
<!--Cubefolio Gallery-->
<script src="/principal/js/jquery.cubeportfolio.min.js"></script>

<!--FancyBox popup-->
<script src="/principal/js/jquery.fancybox.min.js"></script>        
      
<!-- Video Background-->
<script src="/principal/js/jquery.background-video.js"></script>

<!--TypeWriter-->
<script src="/principal/js/typewriter.js"></script>    
      
<!--Particles-->
<script src="/principal/js/particles.min.js"></script>
  
<!--WOw animations-->
<script src="/principal/js/wow.min.js"></script>              
   
<!--Revolution SLider-->
<script src="/principal/js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="/principal/js/revolution/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/principal/js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/principal/js/revolution/extensions/revolution.extension.video.min.js"></script>
  
<script src="/principal/js/functions.js"></script>

</body>
</html>