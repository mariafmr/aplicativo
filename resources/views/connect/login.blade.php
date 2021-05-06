@extends('connect.master')

@section('title', 'Login')

@section('content')


  <div class="box box_login shadow">
   <div class="header">
     <a href="{{ url('/') }}">
       <img src="{{ url('/static/imagen/login.png') }}" class="imagenLogo">
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
    {!! Form::open(['url' => '/login']) !!}
    <label for="email" ><b>Correo Electrónico:</b></label>
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

     {!! Form::submit('Ingresar', ['class' => 'btn btn-primary mtop16']) !!}
     {!! Form::close() !!}
  </div>
     <div class="footer mtop16">
       <a href="{{ url('/register') }}">¿No tienes una cuenta?, Registrate</a>
       <br>
       <a href="{{ url('/register') }}">Recuperar contraseña</a>
     </div>
</div>
@stop
