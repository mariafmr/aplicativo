<?php


use Illuminate\Http\Request;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\ReferenceNorms;


use Illuminate\Http\Request;

class ReferenceNormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $referencenorms =  ReferenceNorms::orderBy('id')->paginate(11);
        return view('admin.reference.list', compact('referencenorms')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reference.create');
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
            'norms' => 'required|string|max:200',
            'normsTitle' => 'required|string|max:500'
          ];
          $messages = [
            'norms.required' => 'La norma es requerida.',
            'norms.max' => 'La norma debe tener máximo 200 caracteres.',
            'normsTitle.required' => 'El título de la norma es requerido.',
            'normsTitle.max' => 'El título de la norma debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $referencenorms =  new ReferenceNorms();
        $referencenorms->norms = e($request->input('norms'));
        $referencenorms->normsTitle = e($request->input('normsTitle'));


        if( $referencenorms->save()):
            return redirect('administrador/normasReferencia/create')->with('message','La norma de referencia se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReferenceNorms  $referenceNorms
     * @return \Illuminate\Http\Response
     */
    public function show(ReferenceNorms $referenceNorms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReferenceNorms  $referenceNorms
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referencenorms = ReferenceNorms::find($id);
        $data = ['referencenorms' => $referencenorms ];
        return view('admin.reference.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReferenceNorms  $referenceNorms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'norms' => 'required|string|max:200',
            'normsTitle' => 'required|string|max:500'
          ];
          $messages = [
            'norms.required' => 'La norma es requerida.',
            'norms.max' => 'La norma debe tener máximo 200 caracteres.',
            'normsTitle.required' => 'El título de la norma es requerido.',
            'normsTitle.max' => 'El título de la norma debe tener máximo 500 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
        $referencenorms = ReferenceNorms::find($id);
        $referencenorms->norms = e($request->input('norms'));
        $referencenorms->normsTitle = e($request->input('normsTitle'));


        if( $referencenorms->save()):
            return redirect('administrador/normasReferencia/'. $referencenorms->id.'/edit')->with('message','La norma de referencia se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReferenceNorms  $referenceNorms
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReferenceNorms::destroy($id);
        return redirect('administrador/normasReferencia')->with('messagereference','La norma de referencia se eliminó correctamente.')->with('typealert', 'success'); 
    }
}
