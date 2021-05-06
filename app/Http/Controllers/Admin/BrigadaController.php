<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Brigada;
use Validator;


class BrigadaController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('miadmin');
    }

    public function getHome(){
      return view('admin.brigada.home');
    }

    public function getBrigadaAgregar(){
      return view('admin.brigada.agregar');
    }

    public function postBrigadaAgregar(Request $request)
    {
      $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email|unique:brigada',
        'celular' => 'required|min:11|numeric',
        'telefono' => 'required|min:11|numeric',
        'cargo' => 'required',
        'bloque' => 'required'

      ];
      $messages = [
        'nombre.required' => 'El nombre del brigadistas es requerido'
       ];

      $validator = Validator::make($request->all(), $rules, $messages);
      if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error.')->with(
        'typealert', 'danger')->withInput();
      else:
           $brigada = new Brigada;
           $brigada->nombre = e($request->input('nombre'));
           $brigada->apellido = e($request->input('apellido'));
           $brigada->email = e($request->input('email'));
           $brigada->celular = e($request->input('celular'));
           $brigada->telefono = e($request->input('telefono'));
           $brigada->cargo = e($request->input('cargo'));
           $brigada->bloque = e($request->input('bloque'));
         

           if($brigada->save()):
             return redirect('/admin/brigada')->with('message', 'Guardado con éxito.')->with('typealert', 'success');
      endif;
    endif;
    }


}
