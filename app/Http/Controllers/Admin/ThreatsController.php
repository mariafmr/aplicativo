<?php

namespace App\Http\Controllers\Admin;

use App\AnalysisTitle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Type;
use Illuminate\Http\Request;
use App\Threat;
use App\ThreatsTitle;

class ThreatsController extends Controller
{
    
    //-----------AUTENTICACIÓN---------------------
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('miadmin');
    }
    //--------------------------------------------------------

    
    //----------FUNCIÓN--- VISTA DE LA LISTA DE LOS USURIOS------------
    public function getThreats(){
        $threats = Threat::orderBy('id','Asc')->get();
        $data = ['threats' => $threats];
        return view('admin.threats.list', $data);
    }
    //----------------------------------------
   
    public function  getThreatsCreate(){
        //$threats = Threat::orderBy('id','Asc')->get();
       // $data = ['threats' => $threats];
        return view('admin.threats.create');
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $threatstitles  = ThreatsTitle::orderBy('id')->paginate(20); 
        $threats  = Threat::orderBy('id')->paginate(20); 
        $typesthreats  = Type::orderBy('id')->paginate(20);  
        $analysistitles = AnalysisTitle::orderBy('id')->paginate(20);   
        return view('admin.threats.list',compact( 'threats', 'typesthreats', 'threatstitles','analysistitles'));      
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $typesthreats  = Type::orderBy('typeThreat')->get();
        $analysistitles = AnalysisTitle::orderBy('id')->paginate(20);
        return view('admin.threats.create',compact('typesthreats', 'analysistitles'));
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
            'threatTitle' => 'required|string|max:200',
            'image' => 'required|image',
            'content' => 'required',
            'analysis_id' => 'required',
            'type_id' => 'required'

          ];
          $messages = [
            'threatTitle.required' => 'La amenaza es requerida.',
            'threatTitle.max' => 'La amenaza debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'image.mimes' => 'El archivo nuna imagén.',
            'content.required' => 'La descripción es requerida.',
            'analysis_id.required' => 'El título es requerido.',
            'type_id.required' => 'El tipo de amenaza es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $threats = new Threat();
        $threats->threatTitle = e($request->input('threatTitle'));
        $threats->subtype = e($request->input('subType'));
        $threats->content = request('content');
        $threats->type_id = e($request->input('type_id'));
        $threats->analysis_id = e($request->input('analysis_id'));
   
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threats->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }
        //dd($threats);
          if($threats->save()):
            return redirect('administrador/amenazas/create')->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }
 
    public function edit($id)
    {
        $typesthreats  = Type::orderBy('typeThreat')->get();
        $analysistitles = AnalysisTitle::orderBy('title')->get();
        $threats = Threat::find($id);
        $data = ['threats' => $threats];
         return view('admin.threats.edit', $data ,compact('typesthreats', 'analysistitles'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'threatTitle' => 'required|string|max:200',
            'image' => 'image',
            'content' => 'required',
            'analysis_id' => 'required',
            'type_id' => 'required'
          ];
          $messages = [
            'threatTitle.required' => 'La amenaza es requerido.',
            'threatTitle.max' => 'La amenaza debe tener máximo 200 caracteres.',
            'image.image' => 'El archivo no es una imagén.',
            'content.required' => 'La descripción es requerida.',
            'analysis_id.required' => 'El título es requerido.',
            'type_id.required' => 'El tipo de amenaza es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $threats = Threat::find($id);
        $threats->threatTitle = e($request->input('threatTitle'));
        $threats->subtype = e($request->input('subType'));
        $threats->content = request('content');
        $threats->type_id = e($request->input('type_id'));
        $threats->analysis_id = e($request->input('analysis_id'));
   
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $threats->image = $name;
                $file->storeAs('public/images/imagThreats', $name);
            }
        //dd($threats);
          if($threats->save()):
            return redirect('administrador/amenazas/'.  $threats->id.'/edit')->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function destroy($id)
    {
        $threats = Threat::findOrFail($id);
       
        if( Storage::delete('public/images/imagThreats/'.$threats->image)){
          Threat::destroy($id);
         }
      
        return redirect('administrador/amenazas')->with('messagethreat','Los campos se eliminaron correctamente.')->with('typealert', 'success'); 
       
    }


}
