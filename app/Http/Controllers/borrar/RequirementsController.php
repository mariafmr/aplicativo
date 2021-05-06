<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Requirements;

class RequirementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirements = Requirements::orderBy('id')->paginate(11);
        return view('admin.requirements.list',compact( 'requirements'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requirements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'subtitle' => 'max:500',
            'content' => 'required'

          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
           // 'subtitle.required' => 'El subtítulo es requerida.',
            'subtitle.max' => 'El subtítulo debe tener máximo 500 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $requirements = new Requirements();
        $requirements->title = e($request->input('title'));
        $requirements->subtitle = e($request->input('subtitle'));
        $requirements->content = request('content');


          if($requirements->save()):
            return redirect('administrador/requisitos/create')->with('message','El requisito se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function show(Requirements $requirements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirements = Requirements::find($id);
        $data = ['requirements' => $requirements];
         return view('admin.requirements.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'subtitle' => 'max:500',
            'content' => 'required'

          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            //'subtitle.required' => 'El subtítulo es requerida.',
            'subtitle.max' => 'El subtítulo debe tener máximo 500 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $requirements = Requirements::find($id);
        $requirements->title = e($request->input('title'));
        $requirements->subtitle = e($request->input('subtitle'));
        $requirements->content = request('content');


          if($requirements->save()):
            return redirect('administrador/requisitos/'.$requirements->id.'/edit')->with('message','El requisito se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requirements  $requirements
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Requirements::destroy($id);
        return redirect('administrador/requisitos')->with('messagerequi','El requisito se eliminó correctamente.')->with('typealert', 'success'); 
    }
}
