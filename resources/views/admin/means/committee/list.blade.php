@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/comite-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Comité-Emergencia 
  </a>
</li>

@endsection

@section('content')
  <!--TITULO-COMITE-EMERGENCIA -->
  @if( session('cancelar2') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar2') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messageCommittee'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messageCommittee') }}
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
              LISTAR LOS TÍTULOS DE LA SECCIÓN: Comité de Emergencia - Página: Comité-Emergencia (banner)
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-comite-emergencia/create') }}">Crear Título </a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>TÍTULOS</th>
                    <th>DESCRIPCIONES</th>
                    <th>IMÁGENES</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (  $committeetitles as   $committeetitle)
                  <tr>
                    <td>{{   $committeetitle->id }}</td>
                    <td>{{   $committeetitle->title }}</td>
                    <td>{!! getShorterString($committeetitle['content'], 220) !!}</td>
                    <td><img src="{{ asset('/storage/images/imagMeans/'.  $committeetitle['image']) }}" alt="no-existe" width="100px" height="100px"></td>
                    <td>
                      <a class="btn btn-primary" href="{{ url('administrador/titulos-comite-emergencia/'.  $committeetitle->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/titulos-comite-emergencia/'. $committeetitle->id) }}">
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



  <!--COMITE DE EMERGENCIA -->
  @if( session('cancelar3') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar3') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messagerequi'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagerequi') }}
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
                    LISTAR LA SECCIÓN: Comité de Emergencia - Página: Comité-Emergencia  
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>                            
                    <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/comite-emergencia/create') }}">Crear Comité-Emergencia </a>
                  </div>
  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NOMBRES</th>
                          <th>CARGO-EMPRESA</th>
                          <th>IMÁGENES</th>
                          <th>OPCIONES</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach (  $committees as   $committee )
                        <tr>
                          <td>{{ $committee->id }}</td>
                          <td>{{ $committee->names }}</td>
                          <td>{{ $committee->charge->charge }} </td>
                          <td><img src="{{ asset('/storage/images/imagMeans/'.  $committee['image']) }}" alt="no-existe" width="100px" height="100px"></td>
                          <td>
                            <a class="btn btn-primary" href="{{ url('administrador/comite-emergencia/'.  $committee->id.'/edit') }}" role="button">Editar</a>                        
                            <br>
                            <br>
                            <form method="POST" action="{{ url('/administrador/comite-emergencia/'. $committee->id) }}">
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
