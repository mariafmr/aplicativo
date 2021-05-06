@extends('admin.master')

@section('title', 'Crear Evento Antiguo')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/eventos-antiguos') }}">
    <i class="fab fa-accusoft"></i> Listar Eventos
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/eventos-antiguos/create') }}">
        <i class="fab fa-accusoft"></i> Crear Evento
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.eventos-antiguos.store') }}" method="POST" enctype="multipart/form-data" >
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
                <div class="col-sm-5">
                  <div class="form-group">
                      <label for="title">Título Principal*</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Título..." value="{{ old('title') }}">
                      @if ($errors->has('title'))
                      <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                      @endif 
                  </div> 
                </div> 
                <div class="col-sm-4">
                  <div class="form-group">
                      <label for="subtitle ">Subtítulo</label>
                      <input type="text" name="subtitle" class="form-control" id="subtitle" placeholder="Subtítulo..." value="{{ old('subtitle') }}">
                    </div> 
                </div> 
                <div class="col-sm-3">
                  <label>Título y Banner*</label>
                  <select name="eventan_id" id="eventan_id" class="form-control " style="width: 100%;">
                      <option value="">--Seleccione el título--</option>
                    @foreach( $eventstitles as   $eventstitle)
                      <option value="{{   $eventstitle->id }}">
                        {{  $eventstitle->title  }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('eventan_id'))
                  <span class="form-text text-danger">{{ $errors->first('eventan_id') }}</span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="link">Enlace</label>
                    <input type="text" name="link" class="form-control" id="link" placeholder="Enlace..." value="{{ old('link') }}">
                  </div> 
                </div> 
                <div class="col-sm-4">
                  <div class="form-group">
                    {{--<label for="fecha">Fecha</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="text" name="fecha" class="form-control" id="fecha" placeholder= "mm-dd-yyyy"
                      value="{{ old('fecha') }}">
                    </div>--}}
                    <label>Fecha</label>
                    <input type="date" class="form-control" name="fecha">
                  </div> 
                </div>
                <div class="col-sm-2">            
                    <div class="form-group">
                       <label for="hora_inicio">Hora Inicio</label>
                        <input type="time" name="hora_inicio" class="form-control" id="hora_inicio"  
                         value="{{ old('hora_inicio') }}">
                    </div>
                </div> 
                <div class="col-sm-2">            
                  <div class="form-group">
                     <label for="hora_final">Hora Final</label>
                      <input type="time" name="hora_final" class="form-control" id="hora_final"  
                       value="{{ old('hora_final', time('H-i')) }}">
                  </div>

              </div> 
              <div class="col-md-12"> 
                <div class="form-group">
                  <label for="content">Descripción*</label>
                  <textarea name="content" id="content">{{ old('content') }}</textarea>
                  @if ($errors->has('content'))
                  <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                  @endif 
                </div>
              </div>
              
               <!-- /.IMAGENES -->
              <div class="form-group">
                <label for="imagenes">Añadir imágenes*</label>             
                  <input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]" multiple 
                  accept="image/*" >
                  @if ($errors->has('imagenes'))
                  <span class="form-text text-danger">{{ $errors->first('imagenes') }}</span>
                  @endif 
                  <div class="description">
                    <br>
                    Tipos permitidos: jpeg, png, jpg, gif, svg.
                    <br>
                  </div>
                </div>
              <!-- /.IMAGENES -->  
            </div>     
            <!-- /.BOTONES --> 
            <div class="form-group">
              <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.eventos-antiguos.index') }}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->     
          </div>
        </div>  
      </div>
      <div class="card-footer">
        SECCIÓN: Eventos Antiguos
      </div>
    </div> 
 </section>
</form> 
<script>
  CKEDITOR.replace( 'content' );
</script>  
@endsection
