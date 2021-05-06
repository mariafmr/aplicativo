@extends('admin.master')

@section('title', 'Crear el Título de la Sección: Organismos de Socorro')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/organismos-socorro') }}">
    <i class="fab fa-accusoft"></i> Listar Organismos
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/titulos-organismos-socorro/create') }}">
        <i class="fab fa-accusoft"></i> Crear Títulos 
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.titulos-organismos-socorro.store') }}" method="POST" enctype="multipart/form-data" >
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
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">              
            <div class="form-group">
                <label for="title">Título Principal</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Título..." value="{{ old('title') }}">
                @if ($errors->has('title'))
                <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                @endif 
            </div>  
            <div class="form-group">
              <label for="content">Descripción*</label>
              <textarea name="content" id="content">{{ old('content') }}</textarea>
              @if ($errors->has('content'))
              <span class="form-text text-danger">{{ $errors->first('content') }}</span>
              @endif 
            </div>  
            <!-- /.BOTONES --> 
            <div class="form-group">
              <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.organismos-socorro.index') }}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->               
          </div>
        </div>
      </div>
      <div class="card-footer">
        SECCIÓN: Organismos de Socorro
      </div>
    </div>
  </div>
</section>                      
</form> 
<script>
  CKEDITOR.replace( 'content' );
</script> 
@endsection
