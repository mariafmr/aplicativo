@extends('admin.master')

@section('title', 'Análisis de Vulnerabilidad-Administrador')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/bloques') }}">
    <i class="fab fa-accusoft"></i> Listar Planta Física
  </a>
</li>

@endsection

@section('content')

   <!--TITULOS DE PLANTA FISICA -->
   @if( session('cancelar1') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar1') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messageblocktitle'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messageblocktitle') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Descripción de la Planta Física
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-bloques/create') }}">Crear Título</a>  
            </div>
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
                  @foreach (  $blocktitles as  $blocktitle )
                      <tr>
                        <td>{{   $blocktitle->id }}</td>
                        <td>{{   $blocktitle->title }}</td>
                        <td>{!!   $blocktitle->content !!}</td>
                        <td>
                          <a class="btn btn-primary" href="{{ url('administrador/titulos-bloques/'. $blocktitle->id.'/edit') }}" role="button">Editar</a>                        
                          <br>
                          <br>
                          <form method="POST" action="{{ url('/administrador/titulos-bloques/'. $blocktitle->id) }}">
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
   </section>

 <!-- PLANTA FISICA -->
  @if( session('cancelar2') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar2') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messageblock'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messageblock') }}
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
                    LISTAR LA SECCIÓN: Bloques Internos sede Principal Universidad Mariana
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>                                
                    <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/bloques/create') }}">Crear Bloque</a>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr> 
                          <th>ID</th>
                          <th>BLOQUES</th>
                          <th>TÍTULO-BANNER</th>
                          <th>DESCRIPCIONES</th>
                          <th>ENLACE</th>
                          <th>IMÁGENES</th>
                          <th>OPCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach (  $blocks as   $block)
                        <tr>
                          <td>{{   $block->id }}</td>
                          <td>{{   $block->block }}</td>
                          <td>{{   $block->evacuationti->title }}</td>
                          <td>{!! getShorterString($block['content'], 80) !!}</td>
                          <td>{{   $block->link }}</td>
                          <td><img src="{{ asset('/storage/images/imagPlan/'. $block['image']) }}" alt="no-existe" width="100px"  height="100px"></td>
                                                     
                          <td>
                            <a class="btn btn-primary" href="{{ url('administrador/bloques/'.  $block->id.'/edit') }}" role="button">Editar</a>                        
                            <br>
                            <br>
                            <form method="POST" action="{{ url('/administrador/bloques/'. $block->id) }}">
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
                  <!-- /.card-body -->
              </div>
            </div> 
            <!-- /.card -->
    </div>
  </section>   
     
@endsection
