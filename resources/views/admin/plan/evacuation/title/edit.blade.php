@extends('admin.master')

@section('title', 'Editar Título de la Sección: Descripción Planta Física')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/descripcion-planta') }}">
    <i class="fab fa-accusoft"></i>  Listar Título
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/titulo-descripcion-planta/'. $blocktitles->id.'/edit') }}">
        <i class="fab fa-accusoft"></i> Editar Título
    </a>
</li>
@endsection
@endsection


@section('content')
<form action="{{ route('admin.titulo-descripcion-planta.update',  $blocktitles->id) }}" method="POST" enctype="multipart/form-data" >
     @csrf
     @method('PUT')
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
             <h3 class="card-title">DATOS DE LOS TÍTULOS DE LA SECCIÓN: Descripción de la Planta Física</h3>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
             </div>
           </div>
           <div class="card-body">
             <div class="row">
               <div class="col-md-12">               
                 <div class="form-group">
                     <label for="title">Título Principal*</label>
                     <input type="text" name="title" class="form-control" id="title" placeholder="Título..." value="{{ $blocktitles->title }}">
                     @if ($errors->has('title'))
                     <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                     @endif 
                 </div>  
                 <div class="form-group">
                   <label for="content">Descripción*</label>
                   <textarea name="content" id="content">{{ $blocktitles->content }}</textarea>
                   @if ($errors->has('content'))
                   <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                   @endif
                 </div> 
                 <!-- /.BOTONES --> 
                 <div class="form-group">
                   <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.descripcion-planta.index') }}">Cancelar</a>
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
