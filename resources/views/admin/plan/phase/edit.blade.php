@extends('admin.master')

@section('title', 'Editar Títulos de la Sección de Amenazas')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/fases-evacuacion') }}">
    <i class="fab fa-accusoft"></i> Listar Fases
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/fases-evacuacion'.  $phases->id.'/edit')  }}">
        <i class="fab fa-accusoft"></i> Editar Títulos 
    </a>
</li>
@endsection
@endsection

@section('content')

<form action="{{ route('admin.fases-evacuacion.update',  $phases->id) }}" method="POST" enctype="multipart/form-data" >
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
                  <!-- /.card-header -->
                  <div class="card-body">
                     <!-- /.row -->
                    <div class="row">
                      <div class="col-md-12"> 
                        <div class="row">
                         <div class="col-sm-6">              
                           <div class="form-group">
                               <label for="phase">Título Principal*</label>
                               <input type="text" name="phase" class="form-control" id="phase"  value="{{ $phases->phase }}">
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
                             <option value="{{  $evacuation->id }}"
                             {{ $evacuation->id == $phases->evacuation_id ?'selected' : '' }}>
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
                           <textarea name="content" id="content">{{ $phases->content }}</textarea>
                           @if ($errors->has('content'))
                           <span class="form-text text-danger">{{ $errors->first('content') }}</span>
                           @endif
                         </div> 
                        <!-- /.IMAGENES -->
                        <div class="form-group">
                          <label for="image">Añadir imágenes*</label>              
                          <input type="file" class="form-control-file" name="image" id="image" value="">
                          @if ($errors->has('image'))
                            <span class="form-text text-danger">{{ $errors->first('image') }}</span>
                          @endif
                          <div class="description">
                            <br>
                            Tipos permitidos: jpeg, png, jpg, gif, svg.
                            <br>
                          </div>
                          <br>
                          <div class="card card-primary">
                            <div class="card-header">
                              <div class="card-title">
                               Galería
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
                                  <div class="col-12 col-sm-6 col-lg-3">
                                    <img  src="{{ asset('/storage/images/imagPlan/').'/'.$phases->image}}" alt="First slide" data-target="#carouselExample" data-slide-to="0" width="200px" height="200px">
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
                                              <img class="d-block" src="{{ asset('/storage/images/imagPlan/').'/'.$phases->image}}" alt="First slide" width="460px" height="460px">
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
                        </div>
                        <!-- /.IMAGENES -->  

                        <!-- /.BOTONES --> 
                        <div class="form-group">
                          <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.amenazasTitulo.index') }}">Cancelar</a>
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
                    SECCIÓN: Fases de Evacuación 
                  </div>
                </div>
            
              </div>
              
            </section>
            
</form>
<script>
  CKEDITOR.replace( 'content' );
</script>    
@endsection
