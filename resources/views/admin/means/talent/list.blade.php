@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-talento-humano') }}">
      <i class="fab fa-accusoft"></i> Listar Títulos
  </a>
</li>
@endsection
@section('content')
   <!--TITULOS-TALENTO-HUMANO -->
   @if( session('cancelar1') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar1') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messagetalent'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messagetalent') }}
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
                LISTAR LOS TÍTULOS DE LA SECCIÓN: Talento Humano 
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>                               
                <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-talento-humano/create') }}">Crear Título</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>TÍTULOS</th> 
                      <th>TÍTULO-BANNER</th>
                      <th>DESCRIPCIONES</th>
                      <th>IMÁGENES</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach (  $talents  as   $talent)
                      <tr>
                        <td>{{   $talent->id }}</td>
                        <td>{{   $talent->title }}</td>
                        <td>{{ $talent->means->title }}</td> 
                        <td>{!! getShorterString( $talent['content'], 150) !!}</td>
                        <td><img src="{{ asset('/storage/images/imagMeans/'. $talent['image']) }}" alt="no-existe" width="100px"  height="100px"></td>                     
                        <td>
                          <a class="btn btn-primary" href="{{ url('administrador/titulos-talento-humano/'.  $talent->id.'/edit') }}" role="button">Editar</a>                        
                          <br>
                          <br>
                          <form method="POST" action="{{ url('/administrador/titulos-talento-humano/'. $talent->id) }}">
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
 @endsection
 