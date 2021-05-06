<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\LegalFrameworkTitle;

class LegalFrameworkTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalframeworktitles = LegalFrameworkTitle::orderBy('id')->paginate(20);     
        return view('admin.legal.list',compact( 'legalframeworktitles'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.legal.title.create');
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
            'subtitle' => 'required|string|max:500'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'subtitle.required' => 'La descripción es requerida.',
            'subtitle.max' => 'La descripción debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
            $legalframeworktitles = new LegalFrameworkTitle();
            $legalframeworktitles->title = e($request->input('title'));
            $legalframeworktitles->subtitle = e($request->input('subtitle'));
            
          if( $legalframeworktitles->save()):
            return redirect('administrador/marcoLegalTitulo/create')->with('message','El título se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LegalFrameworkTitle  $legalFrameworkTitle
     * @return \Illuminate\Http\Response
     */
    public function show(LegalFrameworkTitle $legalFrameworkTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LegalFrameworkTitle  $legalFrameworkTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalframeworktitles = LegalFrameworkTitle::find($id);
        $data = ['legalframeworktitles' => $legalframeworktitles ];
        return view('admin.legal.title.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LegalFrameworkTitle  $legalFrameworkTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'subtitle' => 'required|string|max:500'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'subtitle.required' => 'La descripción es requerida.',
            'subtitle.max' => 'La descripción debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
            $legalframeworktitles = LegalFrameworkTitle::find($id);
            $legalframeworktitles->title = e($request->input('title'));
            $legalframeworktitles->subtitle = e($request->input('subtitle'));
            
          if( $legalframeworktitles->save()):
            return redirect('administrador/marcoLegalTitulo/'. $legalframeworktitles->id.'/edit')->with('message','El título se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LegalFrameworkTitle  $legalFrameworkTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LegalFrameworkTitle::destroy($id);
        return redirect('administrador/marcoLegal')->with('messagelegal','El título se eliminó correctamente.')->with('typealert', 'success');
    }
}
