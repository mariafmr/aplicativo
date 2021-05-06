@extends('admin.master')

@section('title', 'Crear la Sección: Comité de Emergencia')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/comite-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Comité-Emergencia  
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/comite-emergencia/create') }}">
        <i class="fab fa-accusoft"></i> Crear Comité-Emergencia 
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.comite-emergencia.store') }}" method="POST" enctype="multipart/form-data" >
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
            <div class="col-sm-6">
              <div class="form-group">
                <label for="names">Nombres*</label>
                <input type="text" name="names" class="form-control" id="names" placeholder="Nombres..." value="{{ old('names') }}">
                @if ($errors->has('names'))
                <span class="form-text text-danger">{{ $errors->first('names') }}</span>
                @endif 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Cargo de la empresa*</label>
                <select name="charge_id" id="charge_id" class="form-control " style="width: 100%;">
                  @foreach($charges as $charge)
                
                  @if ($loop->first)
                      <option value="{{ $charge->id }}" selected="selected">{{ $charge->charge  }}</option>
                  @else
                      <option value="{{ $charge->id }}">{{ $charge->charge  }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <!-- /.IMAGENES -->
          <div class="form-group">
            <label for="image">Añadir imagen*</label>              
            <input type="file" class="form-control-file" name="image" id="image" value="" >
            @if ($errors->has('image'))
            <span class="form-text text-danger">{{ $errors->first('image') }}</span>
            @endif
            <div class="description">
              <br>
              Tipos permitidos: jpeg, png, jpg, gif, svg.
              <br>
            </div>
          </div>
          <!-- /.IMAGENES -->  

          <!-- /.BOTONES --> 
          <div class="form-group">
            <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.comite-emergencia.index') }}">Cancelar</a>
            <input type="submit" value="Guardar" class="btn btn-primary">
          </div> 
          <!-- /.BOTONES -->  
        </div>
      <div class="card-footer">
        SECCIÓN: Comité de Emergencia
      </div>
    </div>
  </div>
</section>              
                        
</form>
<script>
  CKEDITOR.replace( 'content' );
</script>  
@endsection
