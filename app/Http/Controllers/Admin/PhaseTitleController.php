<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\PhaseTitle;
use Illuminate\Support\Facades\Storage;

class PhaseTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phasetitles= PhaseTitle::orderBy('id')->paginate(11);
        return view('admin.plan.phase.title.list', compact('phasetitles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plan.phase.title.create');
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
        
        //DATOS DE AMENAZAS
           $phasetitles= new PhaseTitle();
           $phasetitles->title = e($request->input('title'));
           $phasetitles->content = request('content');

        if( $phasetitles->save()):
            return redirect('administrador/titulos-fases-evacuacion/create')
            ->with('message','El título y la descripción se actualizaron')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhaseTitle  $phaseTitle
     * @return \Illuminate\Http\Response
     */
    public function show(PhaseTitle $phaseTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhaseTitle  $phaseTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phasetitles = PhaseTitle::find($id);
        $data = ['phasetitles' => $phasetitles];
        return view('admin.plan.phase.title.edit', $data);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhaseTitle  $phaseTitle
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
        
        //DATOS DE AMENAZAS
           $phasetitles= PhaseTitle::find($id);
           $phasetitles->title = e($request->input('title'));
           $phasetitles->content = request('content');

        if( $phasetitles->save()):
            return redirect('administrador/titulos-fases-evacuacion/create')
            ->with('message','El título y la descripción se actualizaron')->with('typealert', 'success');
            endif;
        endif;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhaseTitle  $phaseTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhaseTitle::destroy($id);
        // }
        return redirect('administrador/fases-evacuacion')
        ->with('messagephasetitle','El título y la descripción se eliminaron correctamente.')
        ->with('typealert', 'success'); 
   
    }
}
