<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ThreatsSubTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThreatsSubTitleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $threatsubtitles = ThreatsSubTitle::orderBy('id')->paginate(20);     
        return view('admin.threats.title.list',compact( 'threatsubtitles'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.threats.subtitle.create');

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
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $threatsubtitles = new ThreatsSubTitle();
        $threatsubtitles->title = e($request->input('title'));
        $threatsubtitles->content = request('content');
            

        if( $threatsubtitles->save()):
            return redirect('administrador/subtitulos-amenazas/create')
            ->with('message','El título y la descripción se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThreatsSubTitle  $threatsSubTitles
     * @return \Illuminate\Http\Response
     */
    public function show(ThreatsSubTitle $threatsSubTitles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreatsSubTitle  $threatsSubTitles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $threatsubtitles = ThreatsSubTitle::find($id);
       $data = ['threatsubtitles' => $threatsubtitles];
        return view('admin.threats.subtitle.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThreatsSubTitle  $threatsSubTitles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'content' => 'required'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $threatsubtitles = ThreatsSubTitle::find($id);
        $threatsubtitles->title = e($request->input('title'));
        $threatsubtitles->content = request('content');
            

        if( $threatsubtitles->save()):
            return redirect('administrador/subtitulos-amenazas/'. $threatsubtitles->id.'/edit')
            ->with('message','El título y la descripción se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThreatsSubTitle  $threatsSubTitles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ThreatsSubTitle::destroy($id);
        return redirect('administrador/titulos-amenazas')
        ->with('messagesubtitle','El título y la descripción se eliminaron correctamente.')->with('typealert', 'success'); 
    }
}
