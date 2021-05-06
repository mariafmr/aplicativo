<?php

namespace App\Http\Controllers\Admin;

use App\Block;
use App\Brigade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\EvacuationPoint;
use Illuminate\Support\Facades\Storage;

class EvacuationPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //  $brigades = Brigade::with('images')->where('title','like',"%$title%")->orderBy('id')->paginate(10);
           
  
        $evacuationpoints = EvacuationPoint::orderBy('id')->paginate(20);     
        return view('admin.plan.evacuation.list',compact( 'evacuationpoints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brigades = Brigade::orderBy('id')->get();
        $blocks = Block::orderBy('id')->get();
        return view('admin.plan.evacuation.create',compact('brigades', 'blocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
       /* $rules = [
            'block' => 'required|string|max:200',
            'image' => 'required|image',
            'content' => 'required'
          ];
          $messages = [
            'names.required' => 'El título es requerido.',
            'names.max' => 'El título debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:*/
        $urlimagenes = [];
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
           foreach ($imagenes as $imagen) {

                $nombre = time().'_'.$imagen->getClientOriginalName();               
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta , $nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
            //return $urlimagenes;
        }
           
        //DATOS DE TALENTOS HUMANOS
      
      
        $evacuationpoints = new  EvacuationPoint();
        $evacuationpoints->title = request('title');
        $evacuationpoints->content = request('content');
        $evacuationpoints->link = request('link');
        $evacuationpoints->block_id = e($request->input('block_id'));
        $evacuationpoints->brigade_id = e($request->input('brigade_id'));
        $evacuationpoints->brigade1_id = e($request->input('brigade1_id'));
        $evacuationpoints->brigade2_id = e($request->input('brigade2_id'));
        $evacuationpoints->brigade3_id = e($request->input('brigade3_id'));
        $evacuationpoints->brigade4_id = e($request->input('brigade4_id'));
        $evacuationpoints->brigade5_id = e($request->input('brigade5_id'));

     //dd($evacuationpoints);
      $evacuationpoints->save();
      $evacuationpoints->images()->createMany($urlimagenes);
     
     
       //dd($insert_data);
       // EvacuationPoint::insert($insert_data);
       return redirect('administrador/puntos-encuentro/create');
        // return redirect('administrador/puntos-encuentro/create');
   
     
       // return $evacuationpoints->images;
     //    if($evacuationpoints->save()):
   
        //    endif;
        // endif;
      
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\EvacuationPoint  $evacuationPoint
     * @return \Illuminate\Http\Response
     */
    public function show(EvacuationPoint $evacuationPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EvacuationPoint  $evacuationPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(EvacuationPoint $evacuationPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EvacuationPoint  $evacuationPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvacuationPoint $evacuationPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EvacuationPoint  $evacuationPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvacuationPoint $evacuationPoint)
    {
        //
    }
}
