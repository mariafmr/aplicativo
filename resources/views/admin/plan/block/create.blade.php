@extends('admin.master')

@section('title', 'Crear la Sección: Descripción Planta Física')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/bloques') }}">
    <i class="fab fa-accusoft"></i>  Listar Planta Física
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/bloques/create') }}">
        <i class="fab fa-accusoft"></i> Crear Planta Física
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.bloques.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <label for="block">Bloque*</label>
                    <input type="text" name="block" class="form-control" id="block" placeholder="Bloque..." value="{{ old('block') }}">
                    @if ($errors->has('block'))
                    <span class="form-text text-danger">{{ $errors->first('block') }}</span>
                    @endif 
                  </div> 
                </div> 
                <div class="col-sm-6">
                  <label>Título y Banner*</label>
                  <select name="evacu_id" id="evacu_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione el título--</option>
                    @foreach($evacuationplantitles as $evacuationplantitle)
                        <option value="{{ $evacuationplantitle->id }}">{{ $evacuationplantitle->title }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('evacu_id'))
                  <span class="form-text text-danger">{{ $errors->first('evacu_id') }}</span>
                  @endif
                </div> 
              </div>
           
                 <div class="form-group">
                  <label for="link">Enlace</label>
                  <input type="text" name="link" class="form-control" id="link" placeholder="Enlace..." value="{{ old('link') }}">
                </div>
                 <div class="form-group">
                  <label for="content">Descripción</label>
                  <textarea name="content" id="content">{{ old('content') }}</textarea>
                  @if ($errors->has('content'))
                  <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                  @endif
                </div>
                <!-- /.IMAGENES -->
                <div class="form-group">
                  <label for="image">Añadir imagen</label>              
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
                   <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.descripcion-planta.index') }}">Cancelar</a>
                   <input    
                   :disabled = "deshabilitar_boton==1"                             
                   type="submit" value="Guardar" class="btn btn-primary">
                 </div> 
                 <!-- /.BOTONES -->               
               </div>
             </div>
           </div>
           <div class="card-footer">
             SECCIÓN: Descripción de la Planta Física
           </div>
         </div>
       </div>
     </section>
</form>

<script>
  CKEDITOR.replace( 'content' );
</script>   
@endsection
