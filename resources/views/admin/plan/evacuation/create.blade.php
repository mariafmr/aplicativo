@extends('admin.master')

@section('title', 'Crear la Sección: Descripción Planta Física')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/puntos-encuentro') }}">
    <i class="fab fa-accusoft"></i>  Listar Planta Física
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/puntos-encuentro/create') }}">
        <i class="fab fa-accusoft"></i> Crear Planta Física
    </a>
</li>
@endsection
@endsection

@section('content')

<form action="{{ route('admin.puntos-encuentro.store') }}" method="POST" enctype="multipart/form-data" >
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
             <h3 class="card-title">DATOS DE LA SECCIÓN: Descripción de la Planta Física</h3>       
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
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
                  <label for="link">Enlace*</label>
                  <input type="text" name="link" class="form-control" id="link" placeholder="Enlace..." value="{{ old('link') }}">
                </div>            

                <div class="form-group">   
                  <label>Bloques*</label>
                  <select name="block_id" id="block_id" class="form-control " style="width: 100%;">
                    @foreach($blocks as $block)
                     @if ($loop->first)
                        <option value="{{ $block->id }}" selected="selected">{{ $block->block }}</option>
                     @else
                        <option value="{{ $block->id }}">{{ $block->block }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Bridatista "Responsable"*</label>
                  <select name="brigade_id" id="brigade_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Brigadista "Equipo de Apoypo"*</label>
                  <select name="brigade1_id" id="brigade1_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Brigadista "Equipo de Apoypo"*</label>
                  <select name="brigade2_id" id="brigade2_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Brigadista "Equipo de Apoypo"*</label>
                  <select name="brigade3_id" id="brigade3_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Brigadista "Equipo de Apoypo"*</label>
                  <select name="brigade4_id" id="brigade4_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div> 
                <div class="form-group">   
                  <label>Brigadista "Equipo de Apoypo"*</label>
                  <select name="brigade5_id" id="brigade5_id" class="form-control " style="width: 100%;">
                    @foreach($brigades as $brigade)
                     @if ($loop->first)
                        <option value="{{ $brigade->id }}" selected="selected">{{ $brigade->names }}</option>
                     @else
                        <option value="{{ $brigade->id }}">{{ $brigade->names }}</option>
                     @endif
                    @endforeach
                  </select>
                </div>
                
           
           
           {{-- <select multiple class="form-control" id="Example"  name="miembro_investidura.investidura_id">
              @foreach($brigades as $brigade)
              <option value="{{ $brigade->id }}">{{$brigade->names}}</option>
              @endforeach 
            </select>--}} 
           
        
                 <div class="form-group">
                  <label for="content">Descripción</label>
                  <textarea name="content" id="content">{{ old('content') }}</textarea>
                  @if ($errors->has('content'))
                  <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                  @endif
                </div>
                <!-- /.IMAGENES -->
                <div class="form-group">
                <label for="imagenes">Añadir imágenes</label> 
                                 
                  <input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]" multiple 
                  accept="image/*" >
                  
                  <div class="description">
                    <br>
                    Tipos permitidos: jpeg, png, jpg, gif, svg.
                    <br>
                  </div>
                </div>
                <!-- /.IMAGENES -->  
                 <!-- /.BOTONES --> 
                 <div class="form-group">
                   <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.puntos-encuentro.index') }}">Cancelar</a>
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


{{--<script type="text/javascript">
  $(document).ready(function() {
      $('#Example').multiselect({
          buttonWidth: '400px'
      });
  });
</script>
<select name="tag_list[]" id="Example"  multiple = "multiple" >  
  @foreach($brigades as $brigade)
  <option value="{{ $brigade->id }}">{{$brigade->names}}</option>
  @endforeach 
</section>--}}
@endsection
