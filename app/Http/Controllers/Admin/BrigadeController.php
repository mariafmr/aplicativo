<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Brigade;
use App\BrigadeTitle;
use App\BrigadeTitlePrincipal;
use App\Charge;

class BrigadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charges = Charge::orderBy('id')->paginate(20); 
        $chargesnames = Charge::orderBy('id')->paginate(20); 
        $brigadetitles = BrigadeTitle::orderBy('id')->paginate(20); 
        $brigadetitleprins = BrigadeTitlePrincipal::orderBy('id')->paginate(11); 
        $brigades = Brigade::orderBy('id')->paginate(20);     
        return view('admin.means.brigade.list',compact( 'brigades', 'brigadetitles',
         'charges', 'brigadetitleprins', 'chargesnames'));//, 'committees',
       //'committeetitleprins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charges = Charge::orderBy('id')->get();
        $chargesnames  = Charge::orderBy('id')->get();
        return view('admin.means.brigade.create',compact('charges','chargesnames'));
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
            'names_id' => 'required|string|max:200',
            'charge_id' => 'required|string|max:200',
           // 'lastnames_id' => 'required',cellphone debe contener al menos 10 caracteres.
           // 'lastnames' => 'required|string|max:200|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
           'telephone' => 'required|max:7|min:7|regex:/^[0-9]+$/',
           'cellphone' => 'required|max:10|min:10|regex:/^[0-9]+$/',
           'landline' => 'max:3|min:3|regex:/^[0-9]+$/',
            'image' => 'required|image'
          ];
          $messages = [
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
            'landline.regex' => 'La extensión solo puede contener números.',

            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'names_id.required' => 'Los nombres y apellidos son requeridos.',
            'charge_id.required' => 'El cargo es requerido.'
           // 'names.regex' => 'El formato de los nombres y apellidos son inválidos.'

          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $brigades = new Brigade();
            $brigades->telephone = e($request->input('telephone'));
            $brigades->cellphone = e($request->input('cellphone'));
            $brigades->landline = e($request->input('landline'));
            $brigades->charge_id = e($request->input('charge_id'));
            $brigades->names_id = e($request->input('names_id'));

            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $brigades->image = $name;
                $file->storeAs('public/images/imagMeans/', $name);
            }
        // dd($brigades);
        if( $brigades->save()):
            return redirect('administrador/brigada-emergencia/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function show(Brigade $brigade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brigades = Brigade::find($id);
        $charges  = Charge::orderBy('charge')->get();
        $chargesnames  = Charge::orderBy('id')->get();
        $data = ['brigades' => $brigades];
        return view('admin.means.brigade.edit', $data,compact('charges', 'chargesnames'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $rules = [
            'names_id' => 'required|string|max:200',
            'charge_id' => 'required|string|max:200',
           // 'lastnames_id' => 'required',cellphone debe contener al menos 10 caracteres.
           // 'lastnames' => 'required|string|max:200|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
           'telephone' => 'required|max:7|min:7|regex:/^[0-9]+$/',
           'cellphone' => 'required|max:10|min:10|regex:/^[0-9]+$/',
           'landline' => 'max:3|min:3|regex:/^[0-9]+$/',
            'image' => 'image'
          ];
          $messages = [
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
            'landline.regex' => 'La extensión solo puede contener números.',

            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'names_id.required' => 'Los nombres y apellidos son requeridos.',
            'charge_id.required' => 'El cargo es requerido.'
           // 'names.regex' => 'El formato de los nombres y apellidos son inválidos.'

          ];

        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS 
        $brigades = Brigade::find($id);
            $brigades->telephone = e($request->input('telephone'));
            $brigades->cellphone = e($request->input('cellphone'));
            $brigades->landline = e($request->input('landline'));
            $brigades->charge_id = e($request->input('charge_id'));
            $brigades->names_id = e($request->input('names_id'));

            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $brigades->image = $name;
                $file->storeAs('public/images/imagMeans/', $name);
            }
        // dd($brigades);
        if( $brigades->save()):
            return redirect('administrador/brigada-emergencia/'. $brigades->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brigade  $brigade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brigades= Brigade::findOrFail($id);
        if( Storage::delete('public/images/imagMeans/'.$brigades->image)){
          BrigadeTitle::destroy($id);
         }
        return redirect('administrador/brigada-emergencia')
        ->with('messagebrigade','Los campos se eliminaron correctamente.')
        ->with('typealert', 'success'); 
    }
}
