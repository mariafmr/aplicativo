<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Article;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id')->paginate(20);     
        return view('admin.leal.list',compact( 'articles'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.legal.article.create');
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
        
        //DATOS DE LOS ARTICULOS
        $articles = new Article();
        $articles->title = e($request->input('title'));
        $articles->subtitle = e($request->input('subtitle'));
        $articles->content = request('content');


        if($articles->save()):
            return redirect('administrador/articulos/create')->with('message','El artículo se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        $data = ['articles' => $articles];
        return view('admin.legal.article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            //'subtitle' => 'max:500'
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
        
        //DATOS DE LOS ARTICULOS
        $articles = Article::find($id);
        $articles->title = e($request->input('title'));
        $articles->subtitle = e($request->input('subtitle'));
        $articles->content = request('content');


        if($articles->save()):
            return redirect('administrador/articulos/'. $articles->id.'/edit')->with('message','El artículo se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('administrador/marcoLegal')->with('messagearticle','El artículo se eliminó correctamente.')->with('typealert', 'success');
    }
}
