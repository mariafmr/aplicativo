@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-recusos') }}">
    <i class="fab fa-accusoft"></i> Listar Títulos 
  </a>
</li>

@endsection

@section('content')
 @if( session('cancelar1') )
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
   {{ session('cancelar1') }}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>
 @endif
 @if(Session::has('messagemeantitle'))
 <div class="container">
   <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
    {{ Session::get('messagemeantitle') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Recursos del Plan de Emergencias (banner) 
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-recursos/create') }}">Crear Título </a>  
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
                  @foreach (   $meanstitles as    $meanstitle)
                  <tr>
                    <td>{{    $meanstitle->id }}</td>
                    <td>{{   $meanstitle->title }}</td>
                    <td><img src="{{ asset('/storage/images/imagMeans/'. $meanstitle['image']) }}" alt="no-existe" width="100px" height="100px"></td>
                    <td>
                      <p align="center">
                        <form method="POST" action="{{ url('/administrador/titulos-recursos/'. $meanstitle->id) }}">
                          <a class="btn btn-primary" href="{{ url('/administrador/titulos-recursos/'. $meanstitle->id.'/edit') }}" role="button">Editar</a>                        
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
