<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\BrigadeTitle;


class BrigadeTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brigadetitles = BrigadeTitle::orderBy('id')->paginate(20);  
        return view('admin.means.brigade.title.create',compact( 'brigadetitles'));   
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
          //  'image' => 'required|image',
            'content' => 'required'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
           // 'image.required' => 'La imagen es requerida.',
          //  'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.'
          ];

        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $brigadetitles = new BrigadeTitle();
        $brigadetitles->title = e($request->input('title'));
        $brigadetitles->content = request('content');
       /* if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $brigadetitles->image = $name;
            $file->storeAs('public/images/imagMeans/', $name);
        }*/
        //dd($threats);
        if($brigadetitles->save()):
            return redirect('administrador/titulos-brigada-emergencia/create')
            ->with('message','El título y la descripción se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrigadeTitle  $brigadeTitle
     * @return \Illuminate\Http\Response
     */
    public function show(BrigadeTitle $brigadeTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrigadeTitle  $brigadeTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brigadetitles = BrigadeTitle::find($id);
        $data = ['brigadetitles' => $brigadetitles];
        return view('admin.means.brigade.title.edit', $data);
   
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrigadeTitle  $brigadeTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
          //  'image' => 'image',
            'content' => 'required'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
           // 'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.'
          ];

        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $brigadetitles = BrigadeTitle::find($id);
        $brigadetitles->title = e($request->input('title'));
        $brigadetitles->content = request('content');
       /* if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $brigadetitles->image = $name;
            $file->storeAs('public/images/imagMeans/', $name);
        }*/
        //dd($threats);
        if($brigadetitles->save()):
            return redirect('administrador/titulos-brigada-emergencia/'. $brigadetitles->id.'/edit')
            ->with('message','El título y la descripción se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrigadeTitle  $brigadeTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // $brigadetitles= BrigadeTitle::findOrFail($id);
       // if( Storage::delete('public/images/imagMeans/'.$brigadetitles->image)){
          BrigadeTitle::destroy($id);
        // }
        return redirect('administrador/brigada-emergencia')
        ->with('messagebrigadetitle','El título y la descripción se eliminaron correctamente.')
        ->with('typealert', 'success'); 
    }
}
