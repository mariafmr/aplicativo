<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\committeeTitle;

class CommitteeTitleController extends Controller
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
        $committeetitles = committeeTitle::orderBy('id')->paginate(20);  
        return view('admin.means.committee.title.create',compact( 'committeetitles'));   
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
            'content' => 'required',
            'image' => 'required|image'
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
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
       $committeetitles = new committeeTitle();
       $committeetitles->title = e($request->input('title'));
       $committeetitles->content = request('content');
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $committeetitles->image = $name;
        $file->storeAs('public/images/imagMeans', $name);
       }
          
       // dd( $committeetitles);
        if($committeetitles->save()):
            return redirect('administrador/titulos-comite-emergencia/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\committeeTitle  $committeeTitle
     * @return \Illuminate\Http\Response
     */
    public function show(committeeTitle $committeeTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\committeeTitle  $committeeTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committeetitles = committeeTitle::find($id);
        $data = ['committeetitles' =>  $committeetitles];
         return view('admin.means.committee.title.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\committeeTitle  $committeeTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'content' => 'required',
            'image' => 'image'
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
        
        //DATOS 
       $committeetitles = committeeTitle::find($id);
       $committeetitles->title = e($request->input('title'));
       $committeetitles->content = request('content');
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $committeetitles->image = $name;
        $file->storeAs('public/images/imagMeans', $name);
    }
          
        //dd($threats);
        if($committeetitles->save()):
            return redirect('administrador/titulos-comite-emergencia/'.  $committeetitles->id.'/edit')->with('message','El comite de emergencia se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\committeeTitle  $committeeTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $committeetitles = committeeTitle::findOrFail($id);

        if( Storage::delete('public/images/imagMeans/'.$committeetitles->image)){
         committeeTitle::destroy($id);
         }
        return redirect('administrador/comite-emergencia')->with('messagesubtitle','El título se eliminó correctamente.')->with('typealert', 'success'); 
    }
}
