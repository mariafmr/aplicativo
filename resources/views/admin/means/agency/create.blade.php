@extends('admin.master')

@section('title', 'Crear la Sección: Organismos de Socorro')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/organismos-socorro') }}">
    <i class="fab fa-accusoft"></i> Listar Organismos 
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/organismos-socorro/create') }}">
        <i class="fab fa-accusoft"></i> Crear Organismo
    </a>
</li>
@endsection
@endsection

@section('content')
<div class="apithreats">
<form action="{{ route('admin.organismos-socorro.store') }}" method="POST" enctype="multipart/form-data" >
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
              <label for="institution">Título Principal*</label>
              <input type="text" name="institution" class="form-control" id="institution" placeholder="Institución..." value="{{ old('institution') }}">
              @if ($errors->has('institution'))
              <span class="form-text text-danger">{{ $errors->first('institution') }}</span>
              @endif 
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cellphone">Celular*</label>
                  <input type="text" name="cellphone" class="form-control" id="cellphone" placeholder="Celular..." value="{{ old('cellphone') }}">
                  @if ($errors->has('cellphone'))
                  <span class="form-text text-danger">{{ $errors->first('cellphone') }}</span>
                  @endif 
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telephone">Teléfono de Fijo*</label>
                  <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Teléfono de fijo..." value="{{ old('telephone') }}">
                  @if ($errors->has('telephone'))
                  <span class="form-text text-danger">{{ $errors->first('telephone') }}</span>
                  @endif 
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="landline">Teléfono de Emergencia o Extensión</label>
                  <input type="text" name="landline" class="form-control" id="landline" placeholder="Teléfono de emergencia..." value="{{ old('landline') }}">
                  @if ($errors->has('landline'))
                  <span class="form-text text-danger">{{ $errors->first('landline') }}</span>
                  @endif 
                </div>
              </div>
            </div>

            <!-- /.BOTONES --> 
            <div class="form-group">
              <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.organismoSocorro.index') }}">Cancelar</a>
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
@endsection
