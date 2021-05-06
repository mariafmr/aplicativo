@extends('admin.master')

@section('title', 'Análisis de Vulnerabilidad-Administrador')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/puntos-encuentro') }}">
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
                {{--  @foreach (  $blocktitles as  $blocktitle )
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
                  @endforeach --}}           
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
                    LISTAR LA SECCIÓN: Bloques Internos sede Principal Universidad 
                    Mariana Priorización de Riesgos Eminentes.
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>                                
                    <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/puntos-encuentro/create') }}">Crear</a>
                  </div>
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr> 
                          <th>ID</th>
                          <th>BLOQUES</th>
                          <th>RESPONSABLE</th>
                          <th>EQUIPO-APOYO</th>
                          <th>DESCRIPCIONES</th>
                          <th>IMÁGENES</th>
                          <th>OPCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach (  $evacuationpoints as   $evacuationpoint)
                        <tr>
                          <td>{{ $evacuationpoint->id }}</td>
                          <td>{{ $evacuationpoint->block->block }}</td>
                          <td>{{ $evacuationpoint->brigade->names }}</td>
                          <td>{{ $evacuationpoint->brigade1->names }} <br>
                              {{ $evacuationpoint->brigade2->names }} <br>
                              {{ $evacuationpoint->brigade3->names }}  <br>
                              {{ $evacuationpoint->brigade4->names }} <br>
                              {{ $evacuationpoint->brigade5->names }} 
                          </td>
                          <td>{!! $evacuationpoint->content !!}</td>
                         {{-- <td>{{   $evacuationpoint->link }}     <td> {{$evacuationpoint->images->count()}} </td></td>
                          <td><img src="{{ asset('/storage/imagenes/plan/'. $evacuationpoint['image']) }}" alt="no-existe" width="100px"  height="100px"></td>--}}
                       
                          <td> 
                            
                          @if ($evacuationpoint->images->count()<=0 )
                          <img style="height: 100px;    width: 100px;" src="/imagenes/avatar.png" class="rounded-circle">
                          @else
                              <img style="height: 100px;    width: 100px;" src="{{ $evacuationpoint->images->random()->url }}" class="rounded-circle">   
                          @endif
                          </td>                         
                          <td>
                            <a class="btn btn-primary" href="{{ url('administrador/puntos-encuentro/'.  $evacuationpoint->id.'/edit') }}" role="button">Editar</a>                        
                            <br>
                            <br>
                            <form method="POST" action="{{ url('/administrador/puntos-encuentro/'. $evacuationpoint->id) }}">
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
