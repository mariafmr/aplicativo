@extends('admin.master')

@section('title', 'Editar la Sección: Descripción Planta Física')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/descripcion-planta') }}">
    <i class="fab fa-accusoft"></i>  Listar Planta Física
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/descripcion-planta/'. $blocks->id.'/edit')  }}">
        <i class="fab fa-accusoft"></i> Editar Planta Física
    </a>
</li>
@endsection
@endsection

@section('content')
<div class="apithreats">
<form action="{{ route('admin.descripcion-planta.update', $blocks->id) }}" method="POST" enctype="multipart/form-data" >
     @csrf
     @method('PUT')
 
            <!-- Datos de las amenazas -->
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
               </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                     <!-- /.row -->
                    <div class="row">
                      <div class="col-md-12">               
                        <div class="form-group">
                            <label for="block">Bloque*</label>
                            <input type="text" name="block" class="form-control" id="block" placeholder="Bloque..." value="{{ $blocks->block }}">
                            @if ($errors->has('block'))
                            <span class="form-text text-danger">{{ $errors->first('block') }}</span>
                            @endif 
                        </div>  
                        <div class="form-group">
                          <label for="risk">Riesgo*</label>
                          <textarea name="risk" id="risk">{{ $blocks->risk }}</textarea>
                          @if ($errors->has('risk'))
                          <span class="form-text text-danger">{{ $errors->first('risk') }}</span>
                          @endif
                        </div>
 

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
                    <!-- /.row -->
                  </div>
                  <!-- /.card-header -->
                  <div class="card-footer">
                    SECCIÓN: Descripción de la Planta Física
                  </div>
                </div>
                <!-- /.card -->
              </div><!-- /.container-fluid -->
            </section>
           
            <!-- Datos de las amenazas -->     
</form>
</div>   
<script>
  CKEDITOR.replace( 'risk' );
</script>  
@endsection
