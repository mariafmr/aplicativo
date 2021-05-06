<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\EvacuationPlanTitle;
use Illuminate\Support\Facades\Storage;


class EvacuationPlanTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->paginate(20);
        return view('admin.plan.printitle.list', compact('evacuationplantitles'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.printitle.create');
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
            //'content' => 'required'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerido.',
            'image.image' => 'El archivo no es una imagén.'
        //'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
           $evacuationplantitles= new EvacuationPlanTitle();
           $evacuationplantitles->title = e($request->input('title'));
           //$evacuationplantitles->content = request('content');
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
               $evacuationplantitles->image = $name;
                $file->storeAs('public/images/imagPlan', $name);
            }

          if($evacuationplantitles->save()):
            return redirect('administrador/titulos-plan-evacuacion/create')
            ->with('message','El título y la imagen se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EvacuationPlanTitle  $evacuationPlanTitle
     * @return \Illuminate\Http\Response
     */
    public function show(EvacuationPlanTitle $evacuationPlanTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EvacuationPlanTitle  $evacuationPlanTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evacuationplantitles = EvacuationPlanTitle::find($id);
        $data = ['evacuationplantitles' =>  $evacuationplantitles];
         return view('admin.plan.printitle.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EvacuationPlanTitle  $evacuationPlanTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'image' => 'image'
           // 'content' => 'required'
          ];
          $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.image' => 'El archivo no es una imagén.'
           // 'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
           $evacuationplantitles= EvacuationPlanTitle::find($id);
           $evacuationplantitles->title = e($request->input('title'));
           //$evacuationplantitles->content = request('content');
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
               $evacuationplantitles->image = $name;
                $file->storeAs('public/images/imagPlan', $name);
            }

          if($evacuationplantitles->save()):
            return redirect('administrador/titulos-plan-evacuacion/'. $evacuationplantitles->id.'/edit')
            ->with('message','El título y la imagen se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EvacuationPlanTitle  $evacuationPlanTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $evacuationplantitles = EvacuationPlanTitle::findOrFail($id);
       
        if( Storage::delete('public/images/imagPlan/'.$evacuationplantitles->image)){
            EvacuationPlanTitle::destroy($id);
         }

        return redirect('administrador/titulos-plan-evacuacion')
        ->with('evacuationtitle','El título y la descripción se eliminaron correctamente.')
        ->with('typealert', 'success'); 
       
    }
}
