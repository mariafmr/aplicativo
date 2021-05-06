@extends('admin.master')

@section('title', 'Usuarios')

@section('breadcrumb')
    <li class="breadcrumb">
      <a href="{{ url('/administrador/usuarios') }}"> <i class="fas fa-user"></i> Usuarios </a>
    </li>
@endsection

@section('content')
  <!-- Main content -->
      <section class="content">
        <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>HOLA MUNDO USUARIOS
            is bigger than prevents extra unwanted scrolling.</p>
        </div>
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">REGISTRO USUARIOS</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table class="table">
              <thead>
                <tr>
                  <td>Id</td>
                  <td>Nombres</td>
                  <td>Apellidos</td>
                  <td>Correo Electrónico</td>
                  <td></td>
                </tr>
              </thead>
               <tbody>
                 @foreach ($usuarios as $usuario)
                   <tr>
                     <td>{{ $usuario->id }}</td>
                     <td>{{ $usuario->name }}</td>
                     <td>{{ $usuario->lastname }}</td>
                     <td>{{ $usuario->email }}</td>
                     <td>
                      <div class="opts">
                         <a href="{{ url('/admin/usuarios'.$usuario->id.'/editar') }}"
                            data-toggle="tooltip" data-placeholder="top"  title="Editar">
                           <i class="fas fa-edit"></i>
                         </a>
                         <a href="{{ url('/admin/usuarios'.$usuario->id.'/eliminar') }}"
                                   data-toggle="tooltip" data-placeholder="top"  title="Eliminar">
                           <i class="fas fa-trash-alt"></i>
                         </a>
                      </div>
                     </td>
                   </tr>
                 @endforeach
               </tbody>
            </table>
          </div>
        </div>
        <!-- /.box -->

      </section>
@endsection
