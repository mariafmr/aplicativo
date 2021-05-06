@extends('admin.master')

@section('title', 'Editar la Sección: Brigada de Emergencia')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/brigada-emergencia') }}">
    <i class="fab fa-accusoft"></i> Listar Brigada
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/brigada-emergencia/'. $brigades->id.'/edit') }}">
        <i class="fab fa-accusoft"></i> Editar Brigada-Emergencia
    </a>
</li>
@endsection
@endsection

@section('content')
<form action="{{ route('admin.brigada-emergencia.update', $brigades->id) }}" method="POST" enctype="multipart/form-data" >
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
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">   
                  <label>Nombres*</label>
                  <select name="names_id" id="names_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione el nombre--</option>
                    @foreach( $charges as  $charge)
                      <option value="{{  $charge->id }}"  {{  $charge->id == $brigades->names_id ?'selected' : '' }}>
                        {{  $charge->names}} 
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">   
                  <label>Cargo de la empresa*</label>
                  <select name="charge_id" id="charge_id" class="form-control " style="width: 100%;">
                    <option value="">--Seleccione el cargo--</option>
                    @foreach( $charges as  $charge)
                      <option value="{{  $charge->id }}"  {{  $charge->id == $brigades->charge_id ?'selected' : '' }}>
                        {{  $charge->charge}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="cellphone">Celular*</label>
                  <input type="text" name="cellphone" class="form-control" id="cellphone" placeholder="Celular..." value="{{ $brigades->cellphone }}">
                  @if ($errors->has('cellphone'))
                  <span class="form-text text-danger">{{ $errors->first('cellphone') }}</span>
                  @endif 
                </div> 
              </div> 
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="telephone">Teléfono de Fijo*</label>
                  <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Teléfono de fijo..." value="{{ $brigades->telephone }}">
                  @if ($errors->has('telephone'))
                  <span class="form-text text-danger">{{ $errors->first('telephone') }}</span>
                  @endif 
                </div>
              </div> 
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="landline">Teléfono de Emergencia o Extensión</label>
                  <input type="text" name="landline" class="form-control" id="landline" placeholder="Teléfono de emergencia..." value="{{ $brigades->landline }}">
                  @if ($errors->has('landline'))
                  <span class="form-text text-danger">{{ $errors->first('landline') }}</span>
                  @endif 
                </div>
              </div> 
            </div>
             <!-- /.IMAGENES -->
             <div class="form-group">
              <label for="image">Añadir imagen</label>              
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
                   Imagen
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    
                    <div class="row" id="gallery" data-toggle="modal" data-target="#exampleModal">
                      <div class="col-12 col-sm-6 col-lg-3">
                        <img  src="{{ asset('/storage/images/imagMeans/').'/'.$brigades->image}}" alt="no-existe" data-target="#carouselExample" data-slide-to="0" width="200px" height="200px">
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
                                  <img class="d-block" src="{{ asset('/storage/images/imagMeans/').'/'.$brigades->image}}" alt="no-existe"  width="465px" height="418px">
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
              <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.brigada-emergencia.index') }}">Cancelar</a>
              <input type="submit" value="Guardar" class="btn btn-primary">
            </div> 
            <!-- /.BOTONES -->               
          </div>
        </div>
      </div>
      <div class="card-footer">
        SECCIÓN: Brigada de Emergencia
      </div>
    </div>
  </div>
</section>           
</form>
@endsection
