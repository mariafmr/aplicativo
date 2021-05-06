<?php

namespace App\Http\Controllers\Admin;
use App\ReliefAgencyTitle;
use App\ReliefAgency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReliefAgencyTitleController extends Controller
{
   
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reliefagencytitles = ReliefAgencyTitle::orderBy('id','DESC')->paginate(30);    
        return view('admin.means.agency.list',compact( 'reliefagencytitles'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.means.agency.title.create');

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
        'content' => 'required'
      ];
      $messages = [
        'title.required' => 'El título es requerido.',
        'title.max' => 'El título debe tener máximo 200 caracteres.',
        'content.required' => 'La descripción es requerida.'
      ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
            $reliefagencytitles = new ReliefAgencyTitle();
            $reliefagencytitles->title = e($request->input('title'));
            $reliefagencytitles->content = request('content');

          if( $reliefagencytitles->save()):
            return redirect('administrador/titulos-organismos-socorro/create')
            ->with('message','El título y la descripción se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReliefAgencyTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function show(ReliefAgencyTitle $threatsTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReliefAgencyTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reliefagencytitles = ReliefAgencyTitle::find($id);
        $data = ['reliefagencytitles' =>  $reliefagencytitles];
         return view('admin.means.agency.title.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReliefAgencyTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string|max:200',
            'content' => 'required'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'content.required' => 'La descripción es requerida.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
             $reliefagencytitles = ReliefAgencyTitle::find($id);
             $reliefagencytitles->title = e($request->input('title'));
             $reliefagencytitles->content = request('content');

          if( $reliefagencytitles->save()):
            return redirect('administrador/titulos-organismos-socorro/'.  $reliefagencytitles->id.'/edit'
            )->with('message','El título y la descripción se actualizaron correctamente.')->with('typealert', 'success');
            endif; 
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReliefAgencyTitle  $threatsTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReliefAgencyTitle::destroy($id);
        return redirect('administrador/organismos-socorro')
        ->with('reliefagencytitle','El título y la descripción se eliminaron correctamente.')->with('typealert', 'success'); 
    }
}
