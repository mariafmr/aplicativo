@extends('admin.master')

@section('title', 'Eventos Antiguos-Página Principal')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/eventos-antiguos') }}">
    <i class="fab fa-accusoft"></i> Listar Eventos 
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
  @if(Session::has('messageanevent'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messageanevent') }}
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
              LISTAR LOS EVENTOS ANTIGUOS    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>             
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/eventos-antiguos/create') }}">Crear Evento</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TÍTULOS</th>
                    <th>FECHA</th>
                    <th>HORA-INICIO</th>
                    <th>HORA-FINAL</th>
                    <th>IMÁGENES</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ( $ancientevents as  $ancientevent)
                  <tr>
                    <td>{{  $ancientevent->id }}</td>
                    <td>{{  $ancientevent->title }}</td>
                    <td>{{  $ancientevent->fecha }}</td>
                    <td>{{  $ancientevent->hora_inicio }}</td>
                    <td>{{  $ancientevent->hora_final }}</td>
                    <td>
                      @if ($ancientevent->images->count()<=0 )
                      <img style="height: 100px;    width: 100px;" src="/imagenes/avatar.png"><!--class="rounded-circle"-->
                      @else
                          <img style="height: 100px;    width: 100px;" src="{{ $ancientevent->images->random()->url }}">   
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('/administrador/eventos-antiguos/'. $ancientevent->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/eventos-antiguos/'. $ancientevent->id) }}">
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
