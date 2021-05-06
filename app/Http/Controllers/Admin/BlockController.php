<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Block;
use App\BlockTitle;
use App\EvacuationPlanTitle;
use App\EvacuationTitles;
use Illuminate\Support\Facades\Storage;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocktitles = BlockTitle::orderBy('id')->paginate(20); 
        $blocks = Block::orderBy('id')->paginate(20); 
        $evacuationplantitles = EvacuationTitles::orderBy('id')->paginate(20);   
         
        return view('admin.plan.block.list',
        compact( 'blocktitles', 'blocks', 'evacuationplantitles'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
         $evacuationplantitles  = EvacuationTitles::orderBy('id')->paginate(20);
        return view('admin.plan.block.create',compact('evacuationplantitles'));
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
            'block' => 'required|string|max:200',
            'image' => 'required|image',
            'content' => 'required',
            'evacu_id' => 'required'
         ];
        $messages = [
            'block.required' => 'El título es requerido.',
            'block.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'evacu_id.required' => 'El título es requerido.',
            'content.required' => 'La descripción es requerida.'
           ];
        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE LOSTITULOS DE LOS BLOQUES
        $blocks = new Block();
        $blocks->block = e($request->input('block'));
        $blocks->link = e($request->input('link'));
        $blocks->content = request('content');
        $blocks->evacu_id = e($request->input('evacu_id'));
   
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $blocks->image = $name;
            $file->storeAs('public/images/imagPlan/', $name);
        }

        if($blocks->save()):
            return redirect('administrador/bloques/create')
            ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show(Block $block)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evacuationplantitles = EvacuationTitles::orderBy('title')->get();
        
        $blocks = Block::find($id);
        $data = ['blocks' => $blocks ];
        return view('admin.plan.block.edit', $data,compact( 'evacuationplantitles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'block' => 'required|string|max:200',
            'image' => 'image',
            'content' => 'required',
            'evacu_id' => 'required'
         ];
        $messages = [
            'block.required' => 'El título es requerido.',
            'block.max' => 'El título debe tener máximo 200 caracteres.',
         //   'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.',
            'evacu_id.required' => 'El título es requerido.',
            'content.required' => 'La descripción es requerida.'
           ];
        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS DE LOSTITULOS DE LOS BLOQUES
        $blocks = Block::find($id);
        $blocks->block = e($request->input('block'));
        $blocks->link = e($request->input('link'));
        $blocks->content = request('content');
        $blocks->evacu_id = e($request->input('evacu_id'));
   
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $blocks->image = $name;
            $file->storeAs('public/images/imagPlan/', $name);
        }

        if($blocks->save()):
            return redirect('administrador/bloques/'.   $blocks->id.'/edit')
            ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blocks= Block::findOrFail($id);
        if( Storage::delete('public/images/imagPlan/'.$blocks->image)){
          Block::destroy($id);
         }
        return redirect('administrador/bloques')
        ->with('messageblock','Los campos se eliminaron correctamente.')
        ->with('typealert', 'success'); }
}
