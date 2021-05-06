<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>XeOne | @yield('title')</title>
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
   <nav class="navbar navbar-expand-lg bg-white static-nav">
      <div class="container">
         <a class="navbar-brand" href="index.html">
         <img src="/principal/images/logo-dark.png" alt="logo">
         </a>
         <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#xenav">
            <span> </span>
            <span> </span>
            <span> </span>
         </button>
         <div class="collapse navbar-collapse" id="xenav">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="#banner-inicio">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-feature">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-team">Team</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#portfolio_top">Portfolio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-pricings">Packages</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-testimonial">Clients</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-blog">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#contactus">contact</a>
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
                  <a class="nav-link" href="#banner-inicio">Inicio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-feature">Features</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-team">Team</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#portfolio_top">Portfolio</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-pricings">Packages</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-testimonial">Clients</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#our-blog">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#contactus">contact</a>
               </li>
            </ul>
         </nav>

         <div class="side-footer w-100">
            <ul class="social-icons-simple white top40">
            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i> </a> </li>
            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i> </a> </li>
         </ul>
         <p class="whitecolor">&copy; 2018 XeOne. Made With Love by themesindustry PRUEBA</p>
         </div>
      </div>
   </div>
   <a id="close_side_menu" href="javascript:void(0);"></a>
   <!-- End side menu -->
</header>
<!-- header -->   


<!--page Header  style="background: url(principal/images/page-header.jpg) no-repeat;"-->
<section>

   @section('image')
   @show
  
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="page-titles text-center">
               <h2 class="whitecolor font-light bottom-130"> @yield('title')</h2>
               <ul class="breadcrumb justify-content-center">
                 <li class="breadcrumb-item"><a class="banner" href="/plan-emergencias-unimar">Inicio</a></li>
                 @section('breadcrumb')
                 @section('breadcrumb1')
                 @show
               </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>

  <!-- TITULOS -->
  @section('content1')
  @show
  <!-- Fin  TITULOS -->

<!-- SECCION AMENAZAS -->  
<section id="our-blog" class="bglight padding text-center">
   <div class="container">
      <div id="blog-measonry" class="cbp">
          <!--AMENAZAS -->
            @section('content2')
            @show
          <!-- Fin AMENAZAS  -->
      </div>
   </div>
</section>
<!-- SECCION AMENAZAS -->  
                        
      
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
             <p class="copyrights"> &copy; 2019 XeOne. made with love by prueba <a href="http://www.themesindustry.com/" target="_blank">themesindustry</a> </p>
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
</body>
</html>