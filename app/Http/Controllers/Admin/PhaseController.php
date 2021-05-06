<?php

namespace App\Http\Controllers\Admin;

//use App\EvacuationPlanTitle;

use App\EvacuationTitles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Phase;
use App\PhaseTitle;
use Illuminate\Support\Facades\Storage;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phasetitles= PhaseTitle::orderBy('id')->paginate(20);
        $phases= Phase::orderBy('id')->paginate(20);
        $evacuations = EvacuationTitles::orderBy('id')->paginate(20);   
        return view('admin.plan.phase.list', compact('phases', 'phasetitles', 'evacuations')); 
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evacuations  = EvacuationTitles::orderBy('id')->paginate(20);
        return view('admin.plan.phase.create',compact('typesthreats', 'evacuations'));
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
            'phase' => 'required|string|max:200',
            'image' => 'required|image',
            'content' => 'required',
            'evacuation_id' => 'required'
          ];
        $messages = [
            'phase.required' => 'El título es requerido.',
            'phase.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerido.',
            'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.',
            'evacuation_id.required' => 'El título es requerido.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
           $phases= new Phase();
           $phases->phase = e($request->input('phase'));
           $phases->content = request('content');
           $phases->evacuation_id = e($request->input('evacuation_id'));
   
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
               $phases->image = $name;
                $file->storeAs('public/images/imagPlan', $name);
            }

        if( $phases->save()):
            return redirect('administrador/fases-evacuacion/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $evacuations = EvacuationTitles::orderBy('title')->get();
        $phases = Phase::find($id);
        $data = ['phases' => $phases];
         return view('admin.plan.phase.edit', $data ,compact('evacuations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'phase' => 'required|string|max:200',
            'image' => 'image',
            'content' => 'required',
            'evacuation_id' => 'required'
        ];
      $messages = [
          'phase.required' => 'El título es requerido.',
          'phase.max' => 'El título debe tener máximo 200 caracteres.',
          'image.required' => 'La imagen es requerido.',
          'image.image' => 'El archivo no es una imagén.',
          'content.required' => 'La descripción es requerida.',
          'evacuation_id.required' => 'El título es requerido.'
        ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
           $phases= Phase::find($id);
           $phases->phase = e($request->input('phase'));
           $phases->content = request('content');
           $phases->evacuation_id = e($request->input('evacuation_id'));
   
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
               $phases->image = $name;
                $file->storeAs('public/images/imagPlan', $name);
            }

        if( $phases->save()):
            return redirect('administrador/fases-evacuacion/'.   $phases->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phases= Phase::findOrFail($id);
        if( Storage::delete('public/images/imagPlan/'.$phases->image)){
          Phase::destroy($id);
         }
        return redirect('administrador/fases-evacuacion')
        ->with('messagephase','Los campos se eliminaron correctamente.')
        ->with('typealert', 'success'); 
    }
}
