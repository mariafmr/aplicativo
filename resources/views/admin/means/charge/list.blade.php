@extends('admin.master')

@section('title', 'Recursos del Plan de Emergencias-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/amenazas') }}">
      <i class="fab fa-accusoft"></i> Listar Oficios 
  </a>
</li>
@endsection
@section('content')
   <!--OFICIOS -->
   @if( session('cancelar1') )
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('cancelar1') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
   @endif
   @if(Session::has('messagecharge'))
   <div class="container">
     <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
      {{ Session::get('messagecharge') }}
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
              LISTAR LA SECCIÓN: Oficios
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>                                  
              <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/cargos/create') }}">Crear Oficio</a>
            </div>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRES-APELLIDOS</th>
                    <th>CARGOS</th>
                    <th>ÁREAS</th>
                    <th>OPCIONES</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach (  $charges  as   $charge)
                  <tr>
                    <td>{{   $charge->id }}</td>
                    <td>{{   $charge->names }} {{   $charge->lastnames }}</td>
                    <td>{{   $charge->charge }}</td>
                    <td>{{   $charge->area }}</td>
                    <td>
                      <p align="center">
                        <form method="POST" action="{{ url('/administrador/cargos/'. $charge->id) }}">
                          <a class="btn btn-primary" href="{{ url('administrador/cargos/'.  $charge->id.'/edit') }}" role="button">Editar</a>                        
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

    <!--TIPO AMENAZA -->

  {{--  @if( session('cancelar2') )
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
                     LISTAR LA SECCIÓN: Áreas de la Empresa
                     <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                     <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/areas/create') }}">Crear Área</a>  
                   </div>
                   <div class="card-body">
                     <table id="example5" class="table table-bordered table-striped">
                       <thead>
                         <tr>
                           <th>ID</th>
                           <th>ÁREAS</th>
                           <th>OPCIONES</th>
                         </tr>
                       </thead>
                       <tbody>    
             
                    @foreach ( $areas as $area )
                         <tr>
                           <td>{{ $area->id }}</td>
                           <td>{{ $area->area }}</td>
                           <td>
                            <p align="center">
                              <form method="POST" action="{{ url('/administrador/areas/'.   $area->id) }}">
                                <a class="btn btn-primary" href="{{ url('administrador/areas/'.   $area->id.'/edit') }}" role="button">Editar</a>                        
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
    </section>--}}

 @endsection
 