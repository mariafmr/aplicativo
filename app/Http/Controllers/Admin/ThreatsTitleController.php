<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ThreatsTitle;
use App\ThreatsSubTitle;
use App\ThreatsTitlePrincipal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThreatsTitleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //  $threatsubtitles = ThreatsSubTitle::orderBy('id')->paginate(20);
        $threatstitles = ThreatsTitle::orderBy('id')->paginate(20);
        return view('admin.threats.title.list', compact('threatstitles', 'threatsubtitles'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        return view('admin.threats.title.create');

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
           // 'image' => 'required|image'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
           // 'image.required' => 'La imagen es requerida.',
            //'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS TITULO
            $threatstitles = new ThreatsTitle();
            $threatstitles->title = e($request->input('title'));
            $threatstitles->content = request('content');
            
           /* if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threatstitles->image = $name;
                $file->storeAs('public/images/imagThreats/', $name);
            }*/

          if($threatstitles->save()):
            return redirect('administrador/titulos-amenazas/create')
            ->with('message','El título y la descripción se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThreatsTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function show(ThreatsTitle $threatsTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThreatsTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $threatstitles = ThreatsTitle::find($id);
        $data = ['threatstitles' => $threatstitles];
         return view('admin.threats.title.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ThreatsTitle  $threatsTitle
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
        
        //DATOS TITULO
            $threatstitles = ThreatsTitle::find($id);
            $threatstitles->title = e($request->input('title'));
            $threatstitles->content = request('content');
           /* if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threatstitles->image = $name;
                $file->storeAs('public/images/imagThreats/', $name);
            }*/

          if($threatstitles->save()):
            return redirect('administrador/titulos-amenazas/'. $threatstitles->id.'/edit')
            ->with('message','El título y la descripción se actualizaron correctamente.')->with('typealert', 'success');
            endif; 
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThreatsTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $threatstitles = ThreatsTitle::findOrFail($id);
       
        if( Storage::delete('public/images/imagThreats/'.$threatstitles->image)){
          ThreatsTitle::destroy($id);
        }*/
         ThreatsTitle::destroy($id);
      
        return redirect('administrador/titulos-amenazas')->with('messagetitle','El título y la descripción se eliminaron correctamente.')->with('typealert', 'success'); 
       
    }
}
