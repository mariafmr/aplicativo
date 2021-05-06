<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Talents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TalentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $talents = Talents::orderBy('id')->paginate(20);  
        return view('admin.means.talent.list',compact( 'talents'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $talents = Talents::orderBy('id')->paginate(20);  
        return view('admin.means.talent.create',compact( 'talents'));   
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
            'image' => 'required|image',
            'content' => 'required'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
         ->with('typealert', 'danger');
        else:
        
        //DATOS DE TALENTOS
       $talents = new Talents();
       $talents->title = e($request->input('title'));
       $talents->content = request('content');
   
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $talents->image = $name;
                $file->storeAs('public/images/imagMeans', $name);
            }
        //dd($threats);
        if($talents->save()):
            return redirect('administrador/titulos-talento-humano/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Talents  $talents
     * @return \Illuminate\Http\Response
     */
    public function show(Talents $talents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Talents  $talents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $talents = Talents::find($id);
        $data = ['talents' => $talents];
         return view('admin.means.talent.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Talents  $talents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'image' => 'image',
            'content' => 'required'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE TALENTOS
       $talents = Talents::find($id);
       $talents->title = e($request->input('title'));
       $talents->content = request('content');
   
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $talents->image = $name;
                $file->storeAs('public/images/imagMeans', $name);
            }
        //dd($threats);
        if($talents->save()):
            return redirect('administrador/titulos-talento-humano/'.  $talents->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Talents  $talents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $talents = Talents::findOrFail($id);
       
        if( Storage::delete('public/images/imagMeans/'.$talents->image)){
            Talents::destroy($id);
         }
        // dd($talents);
      
        return redirect('administrador/titulos-talento-humano')
        ->with('messagetalent','Los campos se eliminaron correctamente.')->with('typealert', 'success'); 
       
    }
}
