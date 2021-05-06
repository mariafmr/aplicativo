@extends('admin.master')

@section('title', 'Crear Título de la Sección: Amenazas')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/titulos-amenazas') }}">
    <i class="fab fa-accusoft"></i> Listar Títulos 
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/titulos-amenazas/create') }}">
        <i class="fab fa-accusoft"></i> Crear Título
    </a>
</li>
@endsection
@endsection

@section('content')
<div class="apithreats">
<form action="{{ route('admin.titulos-amenazas.store') }}" method="POST" enctype="multipart/form-data" >
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
                            <label for="title">Título Principal*</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Título..." value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                            @endif 
                        </div>  
                        <div class="form-group">
                          <label for="content">Descripción*</label>
                          <textarea name="content" id="content">{{ old('content') }}</textarea>
                          @if ($errors->has('content'))
                          <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                          @endif 
                        </div> 
                        <!-- /.IMAGENES -->
                        {{--<div class="form-group">
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
                        </div>--}}
                        <!-- /.IMAGENES -->  

                        <!-- /.BOTONES --> 
                        <div class="form-group">
                          <a class="btn btn-danger" href="{{ route('cancelar1', 'admin.titulos-amenazas.index') }}">Cancelar</a>
                          <input type="submit" value="Guardar" class="btn btn-primary">
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
</div> 
<script>
  CKEDITOR.replace( 'content' );
</script>   
@endsection
