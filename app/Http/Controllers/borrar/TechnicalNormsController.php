<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\TechnicalNorms;
use Illuminate\Http\Request;



class TechnicalNormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technicalnorms = TechnicalNorms::orderBy('id')->paginate(11);
        return view('admin.technical.list', compact('technicalnorms'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
        return view('admin.technical.create');
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
            'legalNorms' => 'required|string|max:200',
            'provision' => 'required|string|max:500'
          ];
          $messages = [
            'legalNorms.required' => 'La norma legal es requerida.',
            'legalNorms.max' => 'La norma legal debe tener máximo 200 caracteres.',
            'provision.required' => 'La sección de disposición es requerida.',
            'provision.max' => 'La sección de disposición debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $technicalnorms = new TechnicalNorms();
        $technicalnorms->legalNorms = e($request->input('legalNorms'));
        $technicalnorms->provision = e($request->input('provision'));


        if($technicalnorms->save()):
            return redirect('administrador/normasTecnicas/create')->with('message','La norma técnica se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechnicalNorms  $technicalNorms
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicalNorms $technicalNorms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechnicalNorms  $technicalNorms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $technicalnorms = TechnicalNorms::find($id);
        $data = ['technicalnorms' => $technicalnorms];
        return view('admin.technical.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TechnicalNorms  $technicalNorms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'legalNorms' => 'required|string|max:200',
            'provision' => 'required|string|max:500'
          ];
          $messages = [
            'legalNorms.required' => 'La norma legal es requerida.',
            'legalNorms.max' => 'La norma legal debe tener máximo 200 caracteres.',
            'provision.required' => 'La sección de disposición es requerida.',
            'provision.max' => 'La sección de disposición debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $technicalnorms = TechnicalNorms::find($id);
        $technicalnorms->legalNorms = e($request->input('legalNorms'));
        $technicalnorms->provision = e($request->input('provision'));


        if($technicalnorms->save()):
            return redirect('administrador/normasTecnicas/'. $technicalnorms->id.'/edit')->with('message','La norma técnica se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechnicalNorms  $technicalNorms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TechnicalNorms::destroy($id);
        return redirect('administrador/normasTecnicas')->with('messagetehnical','La norma técnica se eliminó correctamente.')->with('typealert', 'success'); 
   
    }
}
