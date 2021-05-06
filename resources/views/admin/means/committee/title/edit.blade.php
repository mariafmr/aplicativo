@extends('admin.master')

@section('title', 'Editar el Título de la Sección: Comité de Emergencia')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/comite-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Comité-Emergencia 
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/titulos-comite-emergencia/'. $committeetitles->id.'/edit') }}">
      <i class="fab fa-accusoft"></i> Editar Título
    </a>
</li>
@endsection
@endsection


@section('content')

<form action="{{ route('admin.titulos-comite-emergencia.update',  $committeetitles->id)  }}" method="POST" enctype="multipart/form-data" >
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
                <input type="text" name="title" class="form-control" id="title" placeholder="Título..." value="{{ $committeetitles->title }}">
                @if ($errors->has('title'))
                <span class="form-text text-danger">{{ $errors->first('title') }}</span>
                @endif 
            </div> 
            <div class="form-group">
              <label for="content">Descripción*</label>
              <textarea name="content" id="content">{{ $committeetitles->content }}</textarea>
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
            <br>
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                 Imagen
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
                      <div class="col-12 col-sm-6 col-lg-3">
                        <img  src="{{ asset('/storage/images/imagMeans/').'/'. $committeetitles->image}}" alt="no-existe" data-target="#carouselExample" data-slide-to="0" width="200px" height="200px">
                      </div>
                    
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div id="carouselExample" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carouselExample" data-slide-to="0" class="active"></li>
                              </ol>
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img class="d-block" src="{{ asset('/storage/images/imagMeans/').'/'. $committeetitles->image}}" alt="no-existe" width="465px" height="418px">
                                </div>
                              </div>
                            
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.IMAGENES -->  

             <!-- /.BOTONES --> 
            <div class="form-group">
              <a class="btn btn-danger" href="{{ route('cancelar1','admin.titulos-comite-emergencia.index') }}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->               
          </div>
        </div>
      </div>
      <div class="card-footer">
        SECCIÓN: Comité de Emergencia
      </div>
    </div>
  </div>
</section>                                  
</form> 
<script>
  CKEDITOR.replace( 'content' );
</script>    
@endsection

