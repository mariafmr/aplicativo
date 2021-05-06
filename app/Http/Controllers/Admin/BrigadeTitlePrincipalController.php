<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BrigadeTitlePrincipal;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrigadeTitlePrincipalController extends Controller
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
        $brigadetitleprins = BrigadeTitlePrincipal::orderBy('id')->paginate(20);  
        return view('admin.brigade.printitle.create',compact( 'brigadetitleprins'));   
   
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
        
        //DATOS-PRINCIPALES-TITULOS-BRIGADA-EMERGENCIA
        $brigadetitleprins = new BrigadeTitlePrincipal();
        $brigadetitleprins->title = e($request->input('title'));

            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $brigadetitleprins->image = $name;
                $file->storeAs('public/imagenes/imagMeans/', $name);
            }

         //dd($threats);
         if( $brigadetitleprins->save()):
            return redirect('administrador/primer-titulo-brigada/create')
            ->with('message','El título y la imagen se crearon con éxito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrigadeTitlePrincipal  $brigadeTitlePrincipal
     * @return \Illuminate\Http\Response
     */
    public function show(BrigadeTitlePrincipal $brigadeTitlePrincipal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrigadeTitlePrincipal  $brigadeTitlePrincipal
     * @return \Illuminate\Http\Response
     */
    public function edit(BrigadeTitlePrincipal $brigadeTitlePrincipal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrigadeTitlePrincipal  $brigadeTitlePrincipal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrigadeTitlePrincipal $brigadeTitlePrincipal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrigadeTitlePrincipal  $brigadeTitlePrincipal
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrigadeTitlePrincipal $brigadeTitlePrincipal)
    {
        //
    }
}
