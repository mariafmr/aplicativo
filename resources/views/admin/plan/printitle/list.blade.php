@extends('admin.master')

@section('title', 'Plan de Evacuación-Página Principal')

@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-plan-evacuacion') }}">
    <i class="fab fa-accusoft"></i> Listar Títulos 
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
@if(Session::has('evacuationtitle'))
<div class="container">
  <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
   {{ Session::get('evacuationtitle') }}
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
            LISTAR LOS TÍTULOS DE LA SECCIÓN: Plan de Evacuación (banner) 
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>                                   
            <a class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true"  href="{{ url('/administrador/titulos-plan-evacuacion/create') }}">Crear Título</a>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>TÍTULOS</th>
                  <th>IMÁGENES</th>
                  <th>OPCIONES</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($evacuationplantitles as  $evacuationplantitle)
                <tr>
                  <td>{{  $evacuationplantitle->id }}</td>
                  <td>{{  $evacuationplantitle->title }}</td>
                  {{--<td>{!!  $evacuationplantitle->content !!}</td>--}}
                  <td><img src="{{ asset('/storage/images/imagPlan/'.$evacuationplantitle['image']) }}" alt="{{ $evacuationplantitle['image'] }}" width="100px"  height="100px"></td>
                  <td>
                    <a class="btn btn-primary" href="{{ url('/administrador/titulos-plan-evacuacion/'. $evacuationplantitle->id.'/edit') }}" role="button">Editar</a>                        
                    <br>
                    <br>
                    <form method="POST" action="{{ url('/administrador/titulos-plan-evacuacion/'. $evacuationplantitle->id) }}">
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
