<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ThreatsTitle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
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
       $threatstitles  = ThreatsTitle::orderBy('title')->get();
        return view('admin.threats.type.create',
         compact('threatstitles')); 
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
            'typeThreat' => 'required|string|max:200'
           // 'image' => 'required|image'
          ];
          $messages = [
            'typeThreat.required' => 'El tipo de amenaza es requerido.',
            'typeThreat.max' => 'El tipo de amenaza debe tener máximo 200 caracteres.'
           // 'image.required' => 'La imagen es requerida.',
           // 'image.image' => 'El archivo no es una imagén.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $typesthreats= new Type();
        $typesthreats->typeThreat = e($request->input('typeThreat'));
       // $typesthreats->threats_titles_id = e($request->input('threats_titles_id'));   
          /*  if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $typesthreats->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }*/
  
          if($typesthreats->save()):
            return redirect('administrador/tipos-amenazas/create')
            ->with('message','El campo se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typesthreats = Type::find($id);
        $data = ['typesthreats' => $typesthreats];
         return view('admin.threats.type.edit', $data);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'typeThreat' => 'required|string|max:200'
           // 'image' => 'image'
          ];
          $messages = [
            'typeThreat.required' => 'El tipo de amenaza es requerido.',
            'typeThreat.max' => 'El tipo de amenaza tener máximo 200 caracteres.',
           // 'image.image' => 'El archivo no es una imagén.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $typesthreats= Type::find($id);
        $typesthreats->typeThreat = e($request->input('typeThreat'));
            
           /* if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $typesthreats->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }*/
  
          if($typesthreats->save()):
            return redirect('administrador/tipos-amenazas/'.  $typesthreats->id.'/edit')
            ->with('message','El campo se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $typesthreats = Type::findOrFail($id);
       
        if( Storage::delete('public/images/imagThreats/'. $typesthreats->image)){
          Type::destroy($id);
         }
      
        return redirect('administrador/amenazas')
        ->with('messagetype','El campos se eliminó correctamente.')->with('typealert', 'success'); 
       
    }
}
