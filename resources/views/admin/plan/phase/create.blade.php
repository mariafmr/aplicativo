@extends('admin.master')

@section('title', 'Crear la Sección: Fases de Evacuación')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/fases-evacuacion') }}">
    <i class="fab fa-accusoft"></i> Listar Fases 
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/fases-evacuacion/create') }}">
        <i class="fab fa-accusoft"></i> Crear Fase
    </a>
</li>
@endsection
@endsection

@section('content')
<div class="apithreats">
<form action="{{ route('admin.fases-evacuacion.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
            <!-- Datos -->
            <br>
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
                              <label for="phase">Título Principal*</label>
                              <input type="text" name="phase" class="form-control" id="phase" placeholder="Fases de evacuación..." value="{{ old('phase') }}">
                              @if ($errors->has('phase'))
                              <span class="form-text text-danger">{{ $errors->first('phase') }}</span>
                              @endif 
                          </div> 
                        </div> 
                        <div class="col-sm-6">
                          <label>Título y Banner*</label>
                          <select name="evacuation_id" id="evacuation_id" class="form-control " style="width: 100%;">
                              <option value="">--Seleccione el título--</option>
                            @foreach($evacuations as $evacuation)
                              <option value="{{ $evacuation->id }}">
                                {{ $evacuation->title  }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('evacuation_id'))
                          <span class="form-text text-danger">{{ $errors->first('evacuation_id') }}</span>
                          @endif
                        </div> 
                      </div>
                     
                     
                        <div class="form-group">
                          <label for="content">Descripción*</label>
                          <textarea name="content" id="content">{{ old('content') }}</textarea>
                          @if ($errors->has('content'))
                          <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                          @endif 
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
                          <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.amenazas.index') }}">Cancelar</a>
                          <input type="submit" value="Guardar" class="btn btn-primary">
                        </div> 
                        <!-- /.BOTONES -->               
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-footer">
                    SECCIÓN: Fases de Evacuación 
                  </div>
                </div>
                <!-- /.card -->
              </div><!-- /.container-fluid -->
            </section>
           
            <!-- Datos de las amenazas -->     
</form>
</div> 
<script>
  CKEDITOR.replace( 'content' );
</script>   
@endsection
