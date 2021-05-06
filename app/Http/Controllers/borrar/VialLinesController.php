<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\VialLines;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class VialLinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vialines = VialLines::orderBy('id')->paginate(20);   
        return view('admin.vital.list',compact( 'vialines'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vital.create');
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
            'content' => 'required'

          ];
        $messages = [
            'title.required' => 'La línea vital es requerida.',
            'title.max' => 'La línea vital debe tener máximo 200 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE LAS LINEAS VITALES
        $vialines = new VialLines();
        $vialines->title = e($request->input('title'));
        $vialines->content = request('content');
        
        if($vialines->save()):
            return redirect('administrador/lineas-vitales/create')->with('message','La línea vital se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VialLines  $vialLines
     * @return \Illuminate\Http\Response
     */
    public function show(VialLines $vialLines)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VialLines  $vialLines
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vialines  = VialLines::find($id);
        $data = ['vialines' => $vialines];
        return view('admin.vital.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VialLines  $vialLines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'content' => 'required'

          ];
        $messages = [
            'title.required' => 'La línea vital es requerida.',
            'title.max' => 'La línea vital debe tener máximo 200 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE LAS LINEAS VITALES
        $vialines = VialLines::find($id);
        $vialines->title = e($request->input('title'));
        $vialines->content = request('content');
        
        if($vialines->save()):
            return redirect('administrador/lineas-vitales/'. $vialines->id.'/edit')->with('message','La línea vital se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VialLines  $vialLines
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VialLines::destroy($id);
        return redirect('administrador/lineas-vitales')->with('messagevital','La línea vital se eliminó correctamente.')->with('typealert', 'success');
    }
}
