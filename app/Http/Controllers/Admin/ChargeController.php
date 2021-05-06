<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Charge;
class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges = Charge::orderBy('id')->paginate(20);   
       // $areas = Area::orderBy('id')->paginate(20); 
        return view('admin.means.charge.list',compact('charges'));//, 'areas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charges = Charge::orderBy('id')->paginate(20);  
        return view('admin.means.charge.create',compact( 'charges'));  
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
            'names' => 'required|string|max:200',
            'area' => 'required|string|max:200',
            'charge' => 'required|string|max:200',
            'lastnames' => 'required|string|max:200'
          ];
        $messages = [
            'names.required' => 'Los nombres son requeridos.',
            'names.max' => 'Los nombres debe tener máximo 200 caracteres.',
            'lastnames.required' => 'Los apellidos son requeridos.',
            'lastnames.max' => 'Los apellidos debe tener máximo 200 caracteres.',
            'area.required' => 'El área es requerida.',
            'area.max' => 'El área debe tener máximo 200 caracteres.',
            'charge.required' => 'El cargo es requerido.',
            'charge.max' => 'El cargo debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $charges = new Charge();
        $charges->charge = e($request->input('charge'));
        $charges->area = e($request->input('area'));
        $charges->names = e($request->input('names'));
        $charges->lastnames = e($request->input('lastnames'));

        if($charges->save()):
            return redirect('administrador/cargos/create')->with('message','El campo se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function show(Charge $charge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charges = Charge::find($id);
        $data = ['charges' => $charges];
        return view('admin.means.charge.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'names' => 'required|string|max:200',
            'area' => 'required|string|max:200',
            'charge' => 'required|string|max:200',
            'lastnames' => 'required|string|max:200'
          ];
        $messages = [
            'names.required' => 'Los nombres son requeridos.',
            'names.max' => 'Los nombres debe tener máximo 200 caracteres.',
            'lastnames.required' => 'Los apellidos son requeridos.',
            'lastnames.max' => 'Los apellidos debe tener máximo 200 caracteres.',
            'area.required' => 'El área es requerida.',
            'area.max' => 'El área debe tener máximo 200 caracteres.',
            'charge.required' => 'El cargo es requerido.',
            'charge.max' => 'El cargo debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $charges = Charge::find($id);
        $charges->charge = e($request->input('charge'));
        $charges->area = e($request->input('area'));
        $charges->names = e($request->input('names'));
        $charges->lastnames = e($request->input('lastnames'));

        if($charges->save()):
            return redirect('administrador/cargos/'.
             $charges->id.'/edit')
             ->with('message','El campo se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Charge  $charge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Charge::destroy($id);
        return redirect('administrador/cargos')->with('messagecharge','El campo se eliminó correctamente.')->with('typealert', 'success');
    }
}
