@extends('admin.master')

@section('title', 'Análisis de Vulnerabilidad-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-analisis-vulnerabilidad') }}">
    <i class="fab fa-accusoft"></i> Listar Títulos 
  </a>
</li>

@endsection

@section('content')
 <!--TITULO PRINCIPAL DE ANALISIS-VULNERABILIDAD -->
 @if( session('cancelar1') )
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ session('cancelar1') }}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 @endif
 @if(Session::has('messagetitleprin'))
 <div class="container">
   <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
    {{ Session::get('messagetitleprin') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Análisis de Vulnerabilidad (banner)
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-analisis-vulnerabilidad/create') }}">Crear Título </a>  
            </div>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TÍTULOS</th>
                    <th>IMÁGENES</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (  $threatstitlesprincipals as   $threatstitlesprincipal)
                  <tr>
                    <td>{{   $threatstitlesprincipal->id }}</td>
                    <td>{{   $threatstitlesprincipal->title }}</td>
                    <td><img src="{{ asset('/storage/images/imagThreats/'.$threatstitlesprincipal['image']) }}" alt="no-existe" width="100px" height="100px"></td>
                    <td>                      
                      <p align="center">
                        <form method="POST" action="{{ url('/administrador/titulos-analisis-vulnerabilidad/'. $threatstitlesprincipal->id) }}">
                          <a class="btn btn-primary" href="{{ url('/administrador/titulos-analisis-vulnerabilidad/'. $threatstitlesprincipal->id.'/edit') }}" role="button">Editar</a>                        
                          <span lang="es">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Eliminar</button>
                          </form>
                        </form>
                      </p>
                    </td>
                  </tr>
                @endforeach             
                </tfoot>
              </table>
            </div>
        </div>
     </div>          
</section>

@endsection
