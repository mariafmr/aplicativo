@extends('admin.master')

@section('title', 'Análisis de Vulnerabilidad-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/amenazas') }}">
      <i class="fab fa-accusoft"></i> Listar Amenazas 
  </a>
</li>
@endsection
@section('content')
  <!--TIPO AMENAZA -->
  @if( session('cancelar2') )
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('cancelar2') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  @if(Session::has('messagelegalfra'))
  <div class="container">
    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
     {{ Session::get('messagelegalfra') }}
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
            LISTAR LA SECCIÓN: Tipos-Amenazas
            <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
           </div>
            <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/tipos-amenazas/create') }}">Crear  Tipos-Amenazas</a>  
          </div>
          <div class="card-body">
            <table id="example5" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TIPOS-AMENAZAS</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tbody>    
    
              @foreach ( $typesthreats as $typesthreat )
                <tr>
                  <td>{{ $typesthreat->id }}</td>
                  <td>{{ $typesthreat->typeThreat }}</td>
                 {{-- <td><img src="{{ asset('/storage/images/imagThreats/'.$typesthreat['image']) }}" alt="no-existe" width="100px"  height="100px"></td>--}}
                  <td>
                    <p align="center">
                      <form method="POST" action="{{ url('/administrador/tipos-amenazas/'. $typesthreat->id) }}">
                        <a class="btn btn-primary" href="{{ url('/administrador/tipos-amenazas/'. $typesthreat->id.'/edit') }}" role="button">Editar</a>                        
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
   </div>
</section>
    
   <!--AMENAZAS -->
   @if( session('cancelar1') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar1') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messagetitle'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messagetitle') }}
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
              LISTAR LA SECCIÓN: Amenazas
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>                                  
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/amenazas/create') }}">Crear Amenaza</a>
            </div>
            <div class="card-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>AMENAZAS</th>
                    <th>TIPOS-AMENAZAS</th>
                    <th>SUBTIPOS-AMENAZAS</th>
                   <th>TÍTULO-BANNER</th>
                    <th>DESCRIPCIONES</th>
                    <th>IMÁGENES</th>
                    <th>OPCIONES</th>

                  </tr>
                </thead>
                <tbody>
                 @foreach (  $threats  as   $threat)
                  <tr>
                    <td>{{ $threat->id }}</td>
                    <td>{{ $threat->threatTitle }}</td>
                     <td>{{ $threat->type->typeThreat }} </td>
                    <td>{{ $threat->subType }}</td>
                    <td>{{ $threat->analysis->title }}
                      </td>
                    <td>{!! getShorterString($threat['content'], 150) !!}</td>
                    <td><img src="{{ asset('/storage/images/imagThreats/'. $threat['image']) }}" alt="no-existe" width="100px"  height="100px"></td>                      
                    <td>
                      <a class="btn btn-primary" href="{{ url('administrador/amenazas/'.  $threat->id.'/edit') }}" role="button">Editar</a>                        
                      <br>
                      <br>
                      <form method="POST" action="{{ url('/administrador/amenazas/'. $threat->id) }}">
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
 