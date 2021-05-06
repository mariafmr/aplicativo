<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\LegalFramework;
use App\LegalFrameworkTitle;

class LegalFrameworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $legalframeworktitles = LegalFrameworkTitle::orderBy('id')->paginate(20); 
        $legalframeworks = LegalFramework::orderBy('id')->paginate(20); 
        $articles = Article::orderBy('id')->paginate(20);     
        return view('admin.legal.list',compact( 'legalframeworktitles', 'legalframeworks', 'articles'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles  = Article::orderBy('title')->get();
        return view('admin.legal.create',compact('articles'));
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
           // 'subtitle' => 'max:500'
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
        
        //DATOS DEL MARCO LEGAL
        $legalframeworks = new LegalFramework();
        $legalframeworks->title = e($request->input('title'));
        $legalframeworks->content = request('content');
        $legalframeworks->article_id = e($request->input('article_id'));

        if($legalframeworks->save()):
            return redirect('administrador/marcoLegal/create')->with('message','El marco legal se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LegalFramework  $legalFramework
     * @return \Illuminate\Http\Response
     */
    public function show(LegalFramework $legalFramework)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LegalFramework  $legalFramework
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $legalframeworks = LegalFramework::find($id);
        $articles  = Article::orderBy('title')->get();
        $data = ['legalframeworks' => $legalframeworks];
        return view('admin.legal.edit', $data, compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LegalFramework  $legalFramework
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
           // 'subtitle' => 'max:500'
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
        
        //DATOS DEL MARCO LEGAL
        $legalframeworks = LegalFramework::find($id);
        $legalframeworks->title = e($request->input('title'));
        $legalframeworks->content = request('content');
        $legalframeworks->article_id = e($request->input('article_id'));

        if($legalframeworks->save()):
            return redirect('administrador/marcoLegal/'. $legalframeworks->id.'/edit')->with('message','El marco legal se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LegalFramework  $legalFramework
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LegalFramework::destroy($id);
        return redirect('administrador/marcoLegal')->with('messagelegalfra','El marco legal se eliminó correctamente.')->with('typealert', 'success');
    }
}
