<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ReliefAgencyTitle;
use App\ReliefAgency;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
class ReliefAgencyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reliefagencys = ReliefAgency::orderBy('id')->paginate(11);
        $reliefagencytitles = ReliefAgencyTitle::orderBy('id','DESC')->paginate(30);    
        return view('admin.means.agency.list',compact( 'reliefagencytitles', 'reliefagencys'));      
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.means.agency.create');

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
            'institution' => 'required|string|max:200',
            'telephone' => 'required|max:7|min:7|regex:/^[0-9]+$/',
            'cellphone' => 'required|max:10|min:10|regex:/^[0-9]+$/',
            'landline' => 'max:3|min:3|regex:/^[0-9]+$/'

          ];
          $messages = [
            'institution.required' => 'La institución es requerida.', //no debe ser mayor que 7 caracteres.
            'institution.max' => 'La institución debe tener máximo 200 caracteres.',
            'telephone.max' => 'El teléfono fijo no debe ser mayor que 7 caracteres.',
            'telephone.min' => 'El teléfono fijo debe contener al menos 7 caracteres.',
            'telephone.required' => 'El teléfono fijo es requerido.',
            'telephone.regex' => 'El teléfono fijo solo puede contener números.',

            'cellphone.required' => 'El celular es requerido.',
            'cellphone.max' => 'El celular no debe ser mayor que 10 caracteres.',
            'cellphone.min' => 'El celular debe contener al menos 10 caracteres.',
            'cellphone.regex' => 'El celular solo puede contener números.',

            'landline.max' => 'La extensión no debe ser mayor que 3 caracteres.',
            'landline.min' => 'La extensión debe contener al menos 3 caracteres.',
            'landline.regex' => 'La extensión solo puede contener números.'
          
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
            $reliefagencys = new ReliefAgency();
            $reliefagencys->institution = e($request->input('institution'));
            $reliefagencys->telephone = e($request->input('telephone'));
            $reliefagencys->cellphone = e($request->input('cellphone'));
            $reliefagencys->landline = e($request->input('landline'));

          if( $reliefagencys->save()):
            return redirect('administrador/organismos-socorro/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
     
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\ReliefAgency  $reliefAgency
     * @return \Illuminate\Http\Response
     */
    public function show(ReliefAgency $reliefAgency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReliefAgency  $reliefAgency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reliefagencys = ReliefAgency::find($id);
        $data = ['reliefagencys' =>  $reliefagencys];
         return view('admin.means.agency.edit', $data);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReliefAgency  $reliefAgency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $rules = [
        'institution' => 'required|string|max:200',
        'telephone' => 'required|max:7|min:7|regex:/^[0-9]+$/',
        'cellphone' => 'required|max:10|min:10|regex:/^[0-9]+$/',
        'landline' => 'max:3|min:3|regex:/^[0-9]+$/'

      ];
      $messages = [
        'institution.required' => 'La institución es requerida.', //no debe ser mayor que 7 caracteres.
        'institution.max' => 'La institución debe tener máximo 200 caracteres.',
        'telephone.max' => 'El teléfono fijo no debe ser mayor que 7 caracteres.',
        'telephone.min' => 'El teléfono fijo debe contener al menos 7 caracteres.',
        'telephone.required' => 'El teléfono fijo es requerido.',
        'telephone.regex' => 'El teléfono fijo solo puede contener números.',

        'cellphone.required' => 'El celular es requerido.',
        'cellphone.max' => 'El celular no debe ser mayor que 10 caracteres.',
        'cellphone.min' => 'El celular debe contener al menos 10 caracteres.',
        'cellphone.regex' => 'El celular solo puede contener números.',

        'landline.max' => 'La extensión no debe ser mayor que 3 caracteres.',
        'landline.min' => 'La extensión debe contener al menos 3 caracteres.',
        'landline.regex' => 'La extensión solo puede contener números.'
      
      ];

        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE AMENAZAS
             $reliefagencys = ReliefAgency::find($id);
             $reliefagencys->institution = e($request->input('institution'));
             $reliefagencys->telephone = e($request->input('telephone'));
             $reliefagencys->cellphone = e($request->input('cellphone'));
             $reliefagencys->landline = e($request->input('landline'));
 

        if( $reliefagencys->save()):
            return redirect('administrador/organismos-socorro/'.  $reliefagencys->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
          endif; 
        endif;
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReliefAgency  $reliefAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReliefAgency::destroy($id);
        return redirect('administrador/organismos-socorro')
        ->with('reliefagency','Los campos se eliminaron correctamente.')->with('typealert', 'success');
         
    }

}
