<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas= Area::orderBy('id')->paginate(20);  
        return view('admin.means.charge.area.create',compact( 'areas'));  
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
            'area' => 'required|string|max:200'
          ];
        $messages = [
            'area.required' => 'El área es requerida.',
            'area.max' => 'El área debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $areas= new Area();
        $areas->area = e($request->input('area'));

        if($areas->save()):
            return redirect('administrador/areas/create')->with('message','El campo se creó con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::find($id);
        $data = ['areas' => $areas];
        return view('admin.means.charge.area.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'area' => 'required|string|max:200'
          ];
        $messages = [
            'area.required' => 'El área es requerida.',
            'area.max' => 'El área debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')
         ->with('typealert', 'danger');
        else:
        
        //DATOS 
        $areas = Area::find($id);
        $areas->area = e($request->input('area'));

        if($areas->save()):
            return redirect('administrador/areas/'.
             $areas->id.'/edit')
             ->with('message','El campo se actualizó correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::destroy($id);
        return redirect('administrador/areas')
        ->with('messagearea','El campo se eliminó correctamente.')->with('typealert', 'success');
    }
}
