<?php

namespace App\Http\Controllers\Admin;

use App\Charge;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\committee;
use App\committeeTitle;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $charges = Charge::orderBy('id')->paginate(20); 
        $committeetitles = committeeTitle::orderBy('id')->paginate(20); 
        $committees = committee::orderBy('id')->paginate(20);     
        return view('admin.means.committee.list',compact( 'committeetitles',
        'committees', 'charges'));  
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charges = Charge::orderBy('id')->get();
        $committees = committee::orderBy('id')->paginate(20);  
        return view('admin.means.committee.create',compact( 'committees', 'charges'));   
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
            'image' => 'required|image'
          ];
          $messages = [
            'names.required' => 'El título es requerido.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'names.max' => 'El título debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
       $committees = new committee();
       $committees->names = e($request->input('names'));
       $committees->charge_id = e($request->input('charge_id'));
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $committees->image = $name;
        $file->storeAs('public/images/imagMeans', $name);
    }  
     // dd($committees);
          if($committees->save()):
            return redirect('administrador/comite-emergencia/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function show(committee $committee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committees = committee::find($id);
        $charges  = Charge::orderBy('charge')->get();
        $data = ['committees' =>  $committees];
         return view('admin.means.committee.edit', $data ,compact('charges'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'names' => 'required|string|max:200',
            'image' => 'image'
          ];
          $messages = [
            'names.required' => 'El título es requerido.',
            'image.image' => 'El archivo no es una imagén.',
            'names.max' => 'El título debe tener máximo 200 caracteres.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
       $committees = committee::find($id);
       $committees->names = e($request->input('names'));
       $committees->charge_id = e($request->input('charge_id'));
       if($request->hasFile('image')){
        $file = $request->file('image');
        $name = time().$file->getClientOriginalName();
        $committees->image = $name;
        $file->storeAs('public/images/imagMeans', $name);
    }  
          
      //dd( $committees);
          if($committees->save()):
            return redirect('administrador/comite-emergencia/'.  $committees->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\committee  $committee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $committees = committeeTitle::findOrFail($id);

        if( Storage::delete('public/images/imagMeans/'.$committees->image)){
         committeeTitle::destroy($id);
         }
        return redirect('administrador/comite-emergencia')
        ->with('messageCommittee','Los campos se eliminaron correctamente.')->with('typealert', 'success');
       
    }
}
