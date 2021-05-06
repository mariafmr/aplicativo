<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AncientEvent;
use App\EventTitle;
use Illuminate\Support\Facades\Validator;
use DateTime;

class AncientEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ancientevents= AncientEvent::orderBy('id')->paginate(20);
        $eventstitles  = EventTitle::orderBy('id')->paginate(20);
        return view('admin.events.ancient.list', compact('ancientevents','eventstitles'));    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventstitles  = EventTitle::orderBy('id')->paginate(20);
       
        return view('admin.events.ancient.create', compact('eventstitles'));  
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
            'imagenes' => 'required',
            'content' => 'required',
            'eventan_id' => 'required'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'imagenes.required' => 'Las imágenes son requeridas.',
            // 'imagenes.image' => 'Los archivos no son imágenes.',
            'content.required' => 'La descripción es requerida.',
            'eventan_id.required' => 'El título es requerido.'
        ];
          //VALIDACIONES
          $validator = Validator::make($request->all(), $rules, $messages);
          if($validator->fails()):
           return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
          else:

       

        $ancientevents = new  AncientEvent();
        $ancientevents->title = request('title');
        $ancientevents->subtitle = request('subtitle');
        $ancientevents->content = request('content');
        $ancientevents->link = request('link');
        $ancientevents->hora_inicio = $request->get('hora_inicio');
        $ancientevents->hora_final = $request->get('hora_final');
        $ancientevents->fecha = $request->input("fecha");
        $ancientevents->eventan_id = e($request->input('eventan_id'));
       
        
        //$fecha = $request->get('fecha');
        //$ancientevents->fecha = DateTime::createFromFormat('m-d-Y', $fecha);
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
        $ancientevents->save();
        $ancientevents->images()->createMany($urlimagenes);
       
          if(  $ancientevents->save()):
           return redirect('administrador/eventos-antiguos/create')
           ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
           endif;
         endif;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AncientEvent  $ancientEvent
     * @return \Illuminate\Http\Response
     */
    public function show(AncientEvent $ancientEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AncientEvent  $ancientEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventstitles  = EventTitle::orderBy('title')->paginate(20);
        $ancientevents = AncientEvent::find($id);
        $data = ['ancientevents' =>  $ancientevents];
         return view('admin.events.ancient.edit', $data ,compact('eventstitles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AncientEvent  $ancientEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
      $rules = [
        'title' => 'required|string|max:200',
       // 'imagenes' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'content' => 'required',
        'eventan_id' => 'required'
      ];
    $messages = [
        'title.required' => 'El título es requerido.',
        'title.max' => 'El título debe tener máximo 200 caracteres.',
     //   'imagenes.required' => 'Las imagenes son requeridas.',
       // 'imagenes.image' => 'Los archivos no son imágenes.',
        'content.required' => 'La descripción es requerida.',
        'eventan_id.required' => 'El título es requerido.'
    ];
          //VALIDACIONES
          $validator = Validator::make($request->all(), $rules, $messages);
          if($validator->fails()):
           return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
          else:

       

        $ancientevents = AncientEvent::find($id);
        $ancientevents->title = request('title');
        $ancientevents->subtitle = request('subtitle');
        $ancientevents->content = request('content');
        $ancientevents->link = request('link');
        $ancientevents->hora_inicio = $request->get('hora_inicio');
        $ancientevents->hora_final = $request->get('hora_final');
        $ancientevents->fecha = $request->input("fecha");
        $ancientevents->eventan_id = e($request->input('eventan_id'));
       
        
        //$fecha = $request->get('fecha');
        //$ancientevents->fecha = DateTime::createFromFormat('m-d-Y', $fecha);
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
        $ancientevents->save();
        $ancientevents->images()->createMany($urlimagenes);
       
          if(  $ancientevents->save()):
           return redirect('administrador/eventos-antiguos/'.  $ancientevents->id.'/edit')
           ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
           endif;
         endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AncientEvent  $ancientEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ancientevents = AncientEvent::findOrFail($id);
        $ancientevents->delete();
        
       return redirect('administrador/eventos-antiguos/')
       ->with('messageanevent','Los campos se eliminaron correctamente.')
       ->with('typealert', 'success'); 
    }
}
