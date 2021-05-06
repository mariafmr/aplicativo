@extends('admin.master')

@section('title', 'Crear la Sección: Tipos de Amenazas')

@section('breadcrumb')
@section('breadcrumb1')
<li class="breadcrumb-item">
  <a href="{{ url('/administrador/amenazas') }}">
    <i class="fab fa-accusoft"></i> Listar Amenazas
  </a>
</li> 
<li class="breadcrumb-item">
    <a href="{{ url('/administrador/tipos-amenazas/create') }}">
        <i class="fab fa-accusoft"></i> Crear Tipo-Amenaza
    </a>
</li>
@endsection
@endsection

@section('content')
<div class="apithreats">
<form action="{{ route('admin.tipos-amenazas.store') }}" method="POST" enctype="multipart/form-data" >
     @csrf
      <!-- Datos de las tipos-amenazas -->
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
                  <div class="form-group">
                      <label for="typeThreat">Tipo de amenaza*</label>
                      <input type="text" name="typeThreat" class="form-control" id="typeThreat" placeholder="Tipo de amenaza..." value="{{ old('typeThreat') }}">
                      @if ($errors->has('typeThreat'))
                      <span class="form-text text-danger">{{ $errors->first('typeThreat') }}</span>
                      @endif 
                  </div>  
           {{--   <div class="form-group">   
                    <label>Tipo de amenaza*</label>
                    <select name="threats_titles_id" id="threats_titles_id" class="form-control " style="width: 100%;">
                      @foreach( $threatstitles  as  $threatstitle )
                    
                       @if ($loop->first)
                          <option value="{{  $threatstitle ->id }}" selected="selected">{{  $threatstitle ->title  }}</option>
                       @else
                          <option value="{{  $threatstitle->id }}">{{  $threatstitle ->title  }}</option>
                       @endif
                      @endforeach
                    </select>
                  </div>--}}    
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
                    <a class="btn btn-danger" href="{{ route('cancelar2', 'admin.amenazas.index') }}">Cancelar</a>
                    <input    
                    :disabled = "deshabilitar_boton==1"                             
                    type="submit" value="Guardar" class="btn btn-primary">
                  </div> 
                  <!-- /.BOTONES -->               
                </div>
              </div>
            </div>
            <div class="card-footer"> 
              SECCIÓN: Tipos de Amenazas
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
