<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','Asc')->get();
        $data = ['users' => $users];
        return view('admin.users.list', $data);
    }

    public function edit($id)
    {
        $users = User::find($id);
        $data = ['users' => $users];
         return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'cpassword' => 'required|min:8|same:password'

      ];

      $messages = [
        'name.required' => 'Su nombre es requerido.',
        'lastname.required' => 'Su apellido es requerido.',
        'email.required' => 'Su correo electrónico es requerido.',
        'email.email' => 'El formato de su correo electrónico es invalido.',
        'email.unique' => 'Ya existe un usuario registrado con este correo electrónico.',
        'password.required' => 'Por favor escriba una contraseña.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'cpassword.required' => 'Es necesario confirmar la contraseña',
        'cpassword.min' => 'La confirmación de la contraseña debe tener al menos 8 caracteres.',
        'cpassword.same' => 'Las contraseñas no coninciden.'
      ];
      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()):
       return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
      else:
        $users = User::find($id);
        $users->name = e($request->input('name'));
        $users->lastname = e($request->input('lastname'));
        $users->email = e($request->input('email'));
        $users->password = Hash::make($request->input('password'));
        if($request->hasFile('image')){
          $file = $request->file('image');
          $name = time().$file->getClientOriginalName();
          $users->image = $name;
          $file->storeAs('public/images/imagUser', $name);
      }

        if($users->save()):
          return redirect('administrador/usuarios/'. $users->id.'/edit')
          ->with('message','Su usuario se creó con éxito, ahora puede iniciar sesión.')->with('typealert', 'success');
          endif;
      endif;
    }
}
