<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\AnalysisTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnalysisTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threatstitlesprincipals = AnalysisTitle::orderBy('id')->paginate(20);
        return view('admin.threats.printitle.list', compact('threatstitlesprincipals'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.threats.printitle.create');
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
            'image' => 'required|image'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
            $threatstitlesprincipals= new AnalysisTitle();
            $threatstitlesprincipals->title = e($request->input('title'));
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threatstitlesprincipals->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }

          if($threatstitlesprincipals->save()):
            return redirect('administrador/titulos-analisis-vulnerabilidad/create')
            ->with('message','El título y la imagen se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AnalysisTitle  $analysisTitle
     * @return \Illuminate\Http\Response
     */
    public function show(AnalysisTitle $analysisTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AnalysisTitle  $analysisTitle
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {
        $threatstitlesprincipals = AnalysisTitle::find($id);
        $data = ['threatstitlesprincipals' => $threatstitlesprincipals];
        return view('admin.threats.printitle.edit', $data);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AnalysisTitle  $analysisTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'image' => 'image'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.image' => 'El archivo no es una imagén.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
            $threatstitlesprincipals= AnalysisTitle::find($id);
            $threatstitlesprincipals->title = e($request->input('title'));
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threatstitlesprincipals->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }

          if($threatstitlesprincipals->save()):
            return redirect('administrador/titulos-analisis-vulnerabilidad/'. $threatstitlesprincipals->id.'/edit')
            ->with('message','El título y la imagen se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AnalysisTitle  $analysisTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $threatstitlesprincipals = AnalysisTitle::findOrFail($id);
        if( Storage::delete('public/images/imagThreats/'.$threatstitlesprincipals->image)){
          AnalysisTitle::destroy($id);
         }
        return redirect('administrador/titulos-analisis-vulnerabilidad')
        ->with('messagetitleprin','El título y la imagen se eliminaron correctamente.')
        ->with('typealert', 'success'); 
    }
}
