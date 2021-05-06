<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mean;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\MeansTitle;
use Illuminate\Http\Request;


class MeansTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meanstitles = MeansTitle::orderBy('id')->paginate(20);  
        return view('admin.means.printitle.list',compact( 'meanstitles'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $meanstitles = MeansTitle::orderBy('id')->paginate(20);  
        return view('admin.means.printitle.create',compact( 'meanstitles'));   
   
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
            'image' => 'required|image'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'image.required' => 'La imagen es requerida.',
            'image.image' => 'El archivo no es una imagén.'
          ];


        //VALIDACIONES
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
         return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
        
        //DATOS
         $meanstitles = new MeansTitle();
         $meanstitles->title = e($request->input('title'));

            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                 $meanstitles->image = $name;
                $file->storeAs('public/images/imagMeans/', $name);
            }

         if( $meanstitles->save()):
            return redirect('administrador/titulos-recursos/create')
            ->with('message','El título y la imagen se crearon con éxito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MeansTitle  $meansTitle
     * @return \Illuminate\Http\Response
     */
    public function show(MeansTitle $meansTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MeansTitle  $meansTitle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meanstitles = MeansTitle::find($id);
        $data = ['meanstitles' =>  $meanstitles];
         return view('admin.means.printitle.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MeansTitle  $meansTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        
        //DATOS-PRINCIPALES-TITULOS-COMITE-EMERGENCIA
        $meanstitles = MeansTitle::find($id);
        $meanstitles->title = e($request->input('title'));

            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = time().$file->getClientOriginalName();
                $meanstitles->image = $name;
                $file->storeAs('public/images/imagMeans/', $name);
            }

         //dd($threats);
         if( $meanstitles->save()):
            return redirect('administrador/titulos-recursos/'. $meanstitles->id.'/edit')
            ->with('message','El título y la imagen se crearon con éxito.')
            ->with('typealert', 'success');
            endif;
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MeansTitle  $meansTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meanstitles = MeansTitle::findOrFail($id);
       
        if( Storage::delete('public/images/imagMeans/'.$meanstitles->image)){
            MeansTitle::destroy($id);
         }

        return redirect('administrador/titulos-recursos')->with('messagemeantitle','El título y la imagen se eliminó correctamente.')->with('typealert', 'success'); 
       
    }
}
