<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PLAN DE EMERGENCIAS - @yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="routeName" content="{{ Route::currentRouteName() }}">

 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("static/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("static/dist/css/adminlte.min.css")}}">
  <!-- ESTILO -->
  <link rel="stylesheet" href="{{ asset("static/dist/admin.css")}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("static/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{ asset("static/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{ asset("static/plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!--CKEditor Plugin-->
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>


 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{ asset("static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}"/>



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
  <div class="wrapper"> 
          <!-- Inicio Header -->
          @include("admin.header")
          <!-- Fin Header -->

          <!-- Inicio Aside -->
          @include("admin.aside")
          <!-- Fin Aside -->
          
             <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                   <!-- Content Header (Page header) -->
                  <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('administrador') }}">
                              <i class="fas fa-home"></i> Inicio </a>
                            </li>              
                            @section('breadcrumb')
                            @section('breadcrumb1')
                            @show
                          </ol>
                        </div><!-- /.col -->
                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>
                  <!-- /.content-header -->
                  <!-- /.content-wrapper -->
                  @section('content')
                  @show
                </div>

                    <!--Inicio Footer -->
                    @include("admin.footer")
                    <!-- Fin Footer -->

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                      <!-- Control sidebar content goes here -->
                    </aside>
                    <!-- /.control-sidebar -->
    </div>
          {{--    @if(Session::has('message'))
               <div class="container">
                 <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                  {{ Session::get('message') }}
                  @if ($errors->any())
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  @endif

                  <script>
                    $('.alert').slideDown();
                    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                  </script>
                 </div>
               </div>
              @endif--}}






<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="/static/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/static/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/static/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/static/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/static/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/static/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/static/plugins/moment/moment.min.js"></script>
<script src="/static/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/static/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/static/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/static/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App IMPORTANTE-->
<script src="{{ asset("static/dist/js/adminlte.js")}}"></script>


{{-- jQuery 
<script src="{{ asset("static/plugins/jquery/jquery.min.js")}}"></script>--}}
<!-- Bootstrap 4 -->
<script src="{{ asset("static/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("static/dist/js/demo.js")}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset("static/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{ asset("static/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{ asset("static/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{ asset("static/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{ asset("static/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>

<!-- Summernote -->
<script src="{{ asset("static/plugins/summernote/summernote-bs4.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@yield('scripts')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $('#example4').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    $("#example5").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

 



</body>
</html>
