@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/organismos-socorro') }}">
    <i class="fab fa-accusoft"></i> Listar Organismos 
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
  @if(Session::has('reliefagencytitle'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('reliefagencytitle') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Organismos de Socorro 
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>                                  
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-organismos-socorro/create') }}">Crear Título</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TÍTULO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (  $reliefagencytitles as $reliefagencytitle)
                    <tr>
                      <td>{{   $reliefagencytitle->id }}</td>
                      <td>{{   $reliefagencytitle->title }}</td>
                      <td>{!!   $reliefagencytitle->content !!}</td>
                      <td>
                        <a class="btn btn-primary" href="{{ url('/administrador/titulos-organismos-socorro/'.  $reliefagencytitle->id.'/edit') }}" role="button">Editar</a>                        
                        <br>
                        <br>
                        <form method="POST" action="{{ url('/administrador/titulos-organismos-socorro/'.  $reliefagencytitle->id) }}">
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
  @if( session('cancelar2') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar2') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
  @endif
  @if(Session::has('reliefagency'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('reliefagency') }}
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
              LISTAR LA SECCIÓN: Organismos de Socorro y Otras Entidades de Apoyo 
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/organismos-socorro/create') }}">Crear Organismos-Socorro</a>  
            </div>
            <div class="card-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>INSTITUCIÓN</th>
                    <th>TELS. EMERGENCIA</th>
                    <th>FIJO</th>
                    <th>CELULAR</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (  $reliefagencys as    $reliefagency)
                  <tr>
                    <td>{{    $reliefagency->id }}</td>
                    <td>{{    $reliefagency->institution}}</td>
                    <td>{{    $reliefagency->telephone }}</td>
                    <td>{{    $reliefagency->landline }}</td>
                    <td>{{    $reliefagency->cellphone }}</td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('/administrador/organismos-socorro/'.  $reliefagency->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/organismos-socorro/'.  $reliefagency->id) }}">
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
