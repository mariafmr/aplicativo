@extends('admin.master')

@section('title', 'Crear la Sección: Brigada de Emergencia')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/brigada-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Brigada
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/brigada-emergencia/create') }}">
        <i class="fab fa-accusoft"></i> Crear Brigada-Emergencia
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.brigada-emergencia.store') }}" method="POST" enctype="multipart/form-data" >
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
            <div class="row">
              <div class="col-sm-6">               
                <div class="form-group">
                  <label for="names">Nombres y Apellidos*</label>
                  <select name="names_id" id="names_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione los Nombres y Apellidos--</option>
                    @foreach($chargesnames as $chargesname)
                        <option value="{{ $chargesname->id }}">
                        {{ $chargesname->names }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('names_id'))
                  <span class="form-text text-danger">{{ $errors->first('names_id') }}</span>
                  @endif
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">   
                  <label>Cargo de la empresa*</label>
                  <select name="charge_id" id="charge_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione el Cargo--</option>
                    @foreach($charges as $charge)
                        <option value="{{ $charge->id }}">{{ $charge->charge }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('charge_id'))
                  <span class="form-text text-danger">{{ $errors->first('charge_id') }}</span>
                  @endif
                </div>
              </div>
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
            <!-- /.IMAGENES -->
            <div class="form-group">
                <label for="image">Añadir imagen*</label>              
                <input type="file" class="form-control-file" name="image" id="image" value="">
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
              <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.brigada-emergencia.index') }}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->               
          </div>
        </div>
      </div>
      <div class="card-footer">
        SECCIÓN: Brigada de Emergencia
      </div>
    </div>
  </div>
</section>           
</form>
@endsection
