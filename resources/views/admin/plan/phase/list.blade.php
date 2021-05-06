@extends('admin.master')

@section('title', 'Plan de Evacuación-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-fases-evacuacion') }}">
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
  @if(Session::has('messagephasetitle'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagephasetitle') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Fases del Plan de Evacuación
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>                                   
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-fases-evacuacion/create') }}">Crear Título</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TÍTULOS</th>
                    <th>DESCRIPCIONES</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($phasetitles as  $phasetitle)
                  <tr>
                    <td>{{  $phasetitle->id }}</td>
                    <td>{{  $phasetitle->title }}</td>
                    <td>{!!  $phasetitle->content !!}</td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('/administrador/titulos-fases-evacuacion/'. $phasetitle->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/titulos-fases-evacuacion/'. $phasetitle->id) }}">
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

  @if( session('cancelar1') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar1') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messagephase'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagephase') }}
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
              LISTAR LA SECCIÓN: Fases del Plan de Evacuación                               
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/fases-evacuacion/create') }}">Crear Fase </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>FASES</th>
                    <th>TÍTULO-BANNER</th>
                    <th>DESCRIPCIONES</th>
                    <th>IMÁGENES</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($phases as  $phase)
                  <tr>
                  
                   
                    <td>{{  $phase->id }}</td>
                    <td>{{  $phase->phase }}</td>
                    <td>{{  $phase->evacuationtitle->title }}</td>
                    <td>{!! getShorterString($phase['content'], 180) !!}</td>
                    <td><img src="{{ asset('/storage/images/imagPlan/'.$phase['image']) }}" alt="no-existe" width="100px"  height="100px"></td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('/administrador/fases-evacuacion/'. $phase->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/fases-evacuacion/'. $phase->id) }}">
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

  
@endsection
