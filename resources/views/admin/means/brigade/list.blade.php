@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/brigada-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Brigada-Emergencia
  </a>
</li>
@endsection

@section('content')

  <!--TITULOS BRIGADA -->
  @if( session('cancelar1') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar1') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messagebrigadetitle'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagebrigadetitle') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Brigada de Emergencia
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>              
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-brigada-emergencia/create') }}">Crear Título </a>
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
                  @foreach ( $brigadetitles as  $brigadetitle)
                  <tr>
                    <td>{{  $brigadetitle->id }}</td>
                    <td>{{  $brigadetitle->title }}</td>
                    <td>{!!  $brigadetitle->content !!}</td>
                    {{--<td><img src="{{ asset('/storage/images/imagMeans/'.$brigadetitle['image']) }}" alt="no-existe-imagen" width="100px" height="100px"></td>--}}
                    <td>
                      <a class="btn btn-primary" href="{{ url('/administrador/titulos-brigada-emergencia/'. $brigadetitle->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/titulos-brigada-emergencia/'. $brigadetitle->id) }}">
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

  <!--BRIGADA -->
   @if( session('cancelar2') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar2') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messagebrigade'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messagebrigade') }}
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
              LISTAR LA SECCIÓN: Brigada de Emergencia
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/brigada-emergencia/create') }}">Crear Brigada-Emergencia</a>  
            </div>
            <div class="card-body">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRES Y APELLIDOS</th>
                    <th>CARGO</th>
                    <th>CELULAR</th>
                    <th>FIJO</th>
                    <th>EXTENSIÓN</th>
                    <th>IMAGÉN</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
      
                @foreach (  $brigades as   $brigade)
                  <tr>
                    <td>{{   $brigade->id }}</td>
                    <td>{{   $brigade->charge->names }} </td>
                    <td>{{   $brigade->charge->charge }}</td>
                    <td>{{   $brigade->cellphone }}</td>
                    <td>{{   $brigade->telephone }}</td>
                    <td>{{   $brigade->landline }}</td> 
                    <td><img src="{{ asset('/storage/images/imagMeans/'.$brigade['image']) }}" alt="{{ $brigade['image'] }}" width="100px" height="100px"></td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('administrador/brigada-emergencia/'. $brigade->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/brigada-emergencia/'. $brigade->id) }}">
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
