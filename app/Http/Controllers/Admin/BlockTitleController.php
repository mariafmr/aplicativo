<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\BlockTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlockTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.block.title.create');
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
        
        //DATOS DE LOS TITULOS DE LOS BLOQUES- DESCRIPCION DE LA PLANTA
        $blocktitles = new BlockTitle();
        $blocktitles->title = e($request->input('title'));
        $blocktitles->content = request('content');
        
        if($blocktitles->save()):
            return redirect('administrador/titulos-bloques/create')
            ->with('message','El título y la descripción se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlockTitle  $blockTitle
     * @return \Illuminate\Http\Response
     */
    public function show(BlockTitle $blockTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlockTitle  $blockTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blocktitles = BlockTitle::find($id);
        $data = ['blocktitles' => $blocktitles ];
        return view('admin.plan.block.title.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlockTitle  $blockTitle
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
        
        //DATOS DE LOS TITULOS DE LOS BLOQUES- DESCRIPCION DE LA PLANTA
        $blocktitles = BlockTitle::find($id);
        $blocktitles->title = e($request->input('title'));
        $blocktitles->content = request('content');
        
        if($blocktitles->save()):
            return redirect('administrador/titulos-bloques/'. $blocktitles->id.'/edit')
            ->with('message','El título y la descripción se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlockTitle  $blockTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlockTitle::destroy($id);
        return redirect('administrador/bloques')
        ->with('messageblocktitle','El título y la descripción se eliminaron correctamente.')->with('typealert', 'success');
    }
    
}
