@extends('connect.master')

@section('title', 'Registrarse')

@section('content')
  <div class="box box_register shadow">
   <div class="header">
     <a href="{{ url('/') }}">
       <img src="{{ url('/static/imagen/user.png') }}" class="imagenLogo">
     </a>
   </div>
   <br>
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
    <div class="inside">
      {!! Form::open(['url' => '/register']) !!}
      <label for="name" ><b>Nombres:</b></label>
       <div class="input-group">
         <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-user"></i></div>
         </div>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @endif 
       </div>

       <label for="lastname" class="mtop16"><b>Apellidos:</b></label>
        <div class="input-group">
          <div class="input-group-prepend">
             <div class="input-group-text"><i class="fas fa-user-tag"></i></div>
          </div>
         {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
         @if ($errors->has('lastname'))
         <small class="form-text text-danger">{{ $errors->first('lastname') }}</small>
         @endif 
        </div>

      <label for="email"  class="mtop16" ><b>Correo Electrónico:</b></label>
       <div class="input-group">
         <div class="input-group-prepend">
            <div class="input-group-text"><i class="far fa-envelope-open"></i></div>
         </div>
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        @if ($errors->has('email'))
        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
        @endif 
       </div>

     <label for="password" class="mtop16"><b>Contraseña:</b></label>
      <div class="input-group">
        <div class="input-group-prepend">
           <div class="input-group-text"><i class="fas fa-lock"></i></div>
         </div>
       {!! Form::password('password', ['class' => 'form-control']) !!}
       @if ($errors->has('password'))
       <small class="form-text text-danger">{{ $errors->first('password') }}</small>
       @endif 
      </div>

      <label for="cpassword" class="mtop16"><b>Confirmar Contraseña:</b></label>
       <div class="input-group">
         <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-lock"></i></div>
          </div>
        {!! Form::password('cpassword', ['class' => 'form-control']) !!}
        @if ($errors->has('cpassword'))
        <small class="form-text text-danger">{{ $errors->first('cpassword') }}</small>
        @endif 
       </div>

     {!! Form::submit('Registrarse', ['class' => 'btn btn-primary mtop16']) !!}
     {!! Form::close() !!}
  </div>
     <div class="footer ">
       <a href="{{ url('/login') }}">Ya tengo una cuenta, ingresar</a>

     </div>
</div>
@stop
