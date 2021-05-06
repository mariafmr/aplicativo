@extends('admin.master')

@section('title', 'Análisis de Vulnerabilidad-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-amenazas') }}">
    <i class="fab fa-accusoft"></i> Listar Títulos 
  </a>
</li>

@endsection

@section('content')
  <!--TITULOS PAGINA PRINCIPAL -->
  @if( session('cancelar1') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar1') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messagetitle'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagetitle') }}
     <script>
       $('.alert').slideDown();
       setTimeout(function(){ $('.alert').slideUp(); }, 10000);
     </script>
    </div>
  </div>           
  @endif
<section class="content">
  <span style="display:none;" id="urlbase"></span>
  <div class="card-body table-responsive p-0" >
    <div class="card mb-3">
        <div class="card-header">         
          <i class="fab fa-accusoft"></i>
          LISTAR LOS TÍTULOS DE LA SECCIÓN: Amenazas                                   
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
          <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-amenazas/create') }}">Crear Título </a>
        </div>
        <div class="card-body">
          <table id="example3" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>TÍTULOS</th>
                <th>DESCRIPCIONES</th>
                <th>OPCIONES</th>
              </tr>
            </thead>
            <tbody>
  
              @foreach ( $threatstitles as  $threatstitle)
              <tr>
                <td>{{  $threatstitle->id }}</td>
                <td>{{  $threatstitle->title }}</td>
                <td>{!!  $threatstitle->content !!}</td>
                {{--<td><img src="{{ asset('/storage/images/imagThreats/'.$threatstitle['image']) }}" alt="no-existe" width="100px"  height="100px"></td>--}}
                <td>
                  <a class="btn btn-primary" href="{{ url('/administrador/titulos-amenazas/'. $threatstitle->id.'/edit') }}" role="button">Editar</a>                        
                  <br>
                  <br>
                  <form method="POST" action="{{ url('/administrador/titulos-amenazas/'. $threatstitle->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach             
            </tfoot>
          </table>
        </div>
    </div>
  </div>               
 </section>   

   <!--TITULOS PAGINA BLOG -->
  {{--- @if( session('cancelar2') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar2') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messagesubtitle'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messagesubtitle') }}
      <script>
        $('.alert').slideDown();
        setTimeout(function(){ $('.alert').slideUp(); }, 10000);
      </script>
     </div>
   </div>           
   @endif
   <section class="content">
    <div id="confirmareliminar" class="row">
      <span style="display:none;" id="urlbase"></span>
            <div class="card-body table-responsive p-0" >
              <div class="card mb-3">
                  <div class="card-header">         
                    <i class="fab fa-accusoft"></i>
                    LISTAR LOS TÍTULOS DE LA SECCIÓN: Análisis de Vulnerabilidad - Página: Tipos-Amenazas
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                    <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/subtitulos-amenazas/create') }}">Crear Título</a>  
                  </div>
  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example5" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>TÍTULOS</th>
                          <th>DESCRIPCIONES</th>
                          <th>OPCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
            
                      @foreach (  $threatsubtitles as   $threatsubtitle)
                        <tr>
                          <td>{{   $threatsubtitle->id }}</td>
                          <td>{{   $threatsubtitle->title }}</td>
                          <td>{!!  $threatsubtitle->content !!}</td>
                          <td>
                            <a class="btn btn-primary" href="{{ url('administrador/subtitulos-amenazas/'.  $threatsubtitle->id.'/edit') }}" role="button">Editar</a>                        
                            <br>
                            <br>
                            <form method="POST" action="{{ url('/administrador/subtitulos-amenazas/'. $threatsubtitle->id) }}">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form> 
                          </td>
                        </tr>
                      @endforeach             
                      </tfoot>
                    </table>
                  </div>
              </div>
            </div>     
    </div>
   </section>  --}}  
@endsection
