@extends('admin.master')

@section('title', 'Crear la Sección: Amenazas')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/amenazas') }}">
    <i class="fab fa-accusoft"></i> Listar Amenazas
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/amenazas/create') }}">
        <i class="fab fa-accusoft"></i> Crear Amenaza
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.amenazas.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <label for="threatTitle">Amenaza*</label>
                    <input type="text" name="threatTitle" class="form-control" id="threatTitle" placeholder="Amenaza..." value="{{ old('threatTitle') }}">
                    @if ($errors->has('threatTitle'))
                    <span class="form-text text-danger">{{ $errors->first('threatTitle') }}</span>
                    @endif 
                </div> 
              </div> 
              <div class="col-sm-6">
                <label>Título y Banner*</label>
                <select name="analysis_id" id="analysis_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione el título--</option>
                  @foreach($analysistitles as $analysistitle)
                    <option value="{{ $analysistitle->id }}">
                      {{ $analysistitle->title  }}</option>
                  @endforeach
                </select>
                @if ($errors->has('analysis_id'))
                <span class="form-text text-danger">{{ $errors->first('analysis_id') }}</span>
                @endif
              </div> 
            </div>
            
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">   
                    <label>Tipo de amenaza*</label>
                    <select name="type_id" id="type_id" class="form-control " style="width: 100%;">
                        <option value="">--Seleccione el tipo de amenaza--</option>
                      @foreach($typesthreats as $typesthreat)
                        <option value="{{ $typesthreat->id }}">
                          {{ $typesthreat->typeThreat  }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                    <span class="form-text text-danger">{{ $errors->first('type_id') }}</span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="subType">Subtipo de amenaza</label>
                    <input type="text" name="subType" class="form-control" id="subType" 
                    placeholder="Se debe digitar solo si el tipo de amenaza es: Antropico..." value="{{ old('subType') }}">
                    <br>
                  </div>
                </div>
              </div>
             {{-- <div class="form-group">
                <label for="subtype">Subtipo amenazas</label>
                {!! Form::select('subtype', getTypeArray(), 0, ['class' =>  
               'custom-select']) !!}
                @if ($errors->has('subtype'))
                <small class="form-text text-danger">{{ $errors->first('subtype') }}</small>
                @endif 
              </div>--}}
           
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
                <input    
                :disabled = "deshabilitar_boton==1"                             
                type="submit" value="Guardar" class="btn btn-primary">
              </div> 
              <!-- /.BOTONES -->               
            </div>
          </div>
        </div>
        <div class="card-footer">
          SECCIÓN: Amenazas
        </div>
      </div>
    </div>
  </section>          
</form>
<script>
  CKEDITOR.replace( 'content' );
</script>  
@endsection
