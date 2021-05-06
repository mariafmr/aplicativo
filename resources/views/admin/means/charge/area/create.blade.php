@extends('admin.master')

@section('title', 'Crear la Sección: Areas de la Empresa')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/cargos') }}">
    <i class="fab fa-accusoft"></i>  Listar Oficios
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/areas/create') }}">
        <i class="fab fa-accusoft"></i> Crear Área
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.areas.store') }}" method="POST" enctype="multipart/form-data" >
@csrf
@if(Session::has('message'))
<div class="container">
  <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
   {{ Session::get('message') }}
   <script>
     $('.alert').slideDown();
     setTimeout(function(){ $('.alert').slideUp(); }, 10000);
   </script>
  </div>
</div>           
@endif

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">DATOS</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">               
           <div class="form-group">
              <label for="area">Área de la empresa*</label>
              <input type="text" name="area" class="form-control" id="area" placeholder="Área de la empresa..." value="{{ old('area') }}">
              @if ($errors->has('area'))
              <span class="form-text text-danger">{{ $errors->first('area') }}</span>
              @endif 
           </div>  
            <!-- /.BOTONES --> 
            <div class="form-group">
              <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.cargos.index') }}">Cancelar</a>
              <input    
              :disabled = "deshabilitar_boton==1"                             
              type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->               
          </div>
        </div>
      </div>
      <div class="card-footer">
        SECCIÓN:  Areas de la Empresa
      </div>
    </div>
  </div>
</section>       
           
</form>
<script>
  CKEDITOR.replace( 'content' );
</script>   
@endsection
