<?php

namespace App\Http\Controllers\Admin;

use App\AnalysisTitle;
use App\EventTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewEvent;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Storage;

class NewEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newevents= NewEvent::orderBy('id')->paginate(20);
        $events  = EventTitle::orderBy('id')->paginate(20);
       
        return view('admin.events.new.list', compact('newevents','events'));      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events  = EventTitle::orderBy('id')->paginate(20);
        return view('admin.events.new.create',compact('events'));
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
            'event_id' => 'required'
          ];
        $messages = [
            'title.required' => 'El título es requerido.',
            'title.max' => 'El título debe tener máximo 200 caracteres.',
            'imagenes.required' => 'Las imágenes son requeridas.',
           // 'imagenes.image' => 'Los archivos no son imágenes.',
            'content.required' => 'La descripción es requerida.',
            'event_id.required' => 'El título es requerido.'
        ];

         //VALIDACIONES
         $validator = Validator::make($request->all(), $rules, $messages);
         if($validator->fails()):
          return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
         else:

      
      /*  NewEvent::insert([
            'title'       => $request->input("title"),
            'subtitle'  => $request->input("subtitle"),
            'content'  => $request->input("content"),
            'link'  => $request->input("link"),
            'hora_inicio'  => $request->input("hora_inicio"),
            'hora_final'  => $request->input("hora_final"),
            'fecha'        => $request->input("fecha")
          ]);*/
        $newevents = new  NewEvent();
        $newevents->title = request('title');
        $newevents->subtitle = request('subtitle');
        $newevents->content = request('content');
        $newevents->link = request('link');
        $newevents->hora_inicio = $request->get('hora_inicio');
        $newevents->hora_final = $request->get('hora_final');
        $newevents->fecha = $request->input("fecha");
        $newevents->event_id = e($request->input('event_id'));
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
      //  $fecha = $request->get('fecha');
      //  $newevents->fecha = DateTime::createFromFormat('m-d-Y', $fecha);
      
     $newevents->save();
     $newevents->images()->createMany($urlimagenes);
    
       if( $newevents->save()):
        return redirect('administrador/eventos-nuevos/create')
        ->with('message','Los campos se crearon con éxito.')->with('typealert', 'success');
        endif;
      endif;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewEvent  $newEvent
     * @return \Illuminate\Http\Response
     */
    public function show(NewEvent $newEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewEvent  $newEvent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events  = EventTitle::orderBy('title')->paginate(20);
        $newevents = NewEvent::find($id);
        $data = ['newevents' =>  $newevents];
         return view('admin.events.new.edit', $data ,compact('events'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewEvent  $newEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request, $id)
    {
      $rules = [
        'title' => 'required|string|max:200',
        //'imagenes' => 'image|mimes:jpeg,png,jpg,gif,svg',
        'content' => 'required',
        'event_id' => 'required'
      ];
    $messages = [
        'title.required' => 'El título es requerido.',
        'title.max' => 'El título debe tener máximo 200 caracteres.',
       // 'imagenes.required' => 'Las imagenes son requeridas.',
      //  'imagenes.image' => 'Los archivos no son imágenes.',
        'content.required' => 'La descripción es requerida.',
        'event_id.required' => 'El título es requerido.'
    ];

         //VALIDACIONES
         $validator = Validator::make($request->all(), $rules, $messages);
         if($validator->fails()):
          return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
         else:


        $newevents = NewEvent::find($id);
        $newevents->title = request('title');
        $newevents->subtitle = request('subtitle');
        $newevents->content = request('content');
        $newevents->link = request('link');
        $newevents->hora_inicio = $request->get('hora_inicio');
        $newevents->hora_final = $request->get('hora_final');
        $newevents->fecha = $request->input("fecha");
        $newevents->event_id = e($request->input('event_id'));
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
      //  $fecha = $request->get('fecha');
      //  $newevents->fecha = DateTime::createFromFormat('m-d-Y', $fecha);
      
     $newevents->save();
     $newevents->images()->createMany($urlimagenes);
    
       if( $newevents->save()):
        return redirect('administrador/eventos-nuevos/'. $newevents->id.'/edit')
        ->with('message','Los campos se actualizaron correctamente.')->with('typealert', 'success');
        endif;
      endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewEvent  $newEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /* $newevents= NewEvent::findOrFail($id);
        if( Storage::delete('/imagenes'.$newevents->image)){
          NewEvent::destroy($id);
         }*/
         $newevents= NewEvent::findOrFail($id);
         $newevents->delete();
         
        return redirect('administrador/eventos-nuevos/')
        ->with('messagenewevent','Los campos se eliminaron correctamente.')
        ->with('typealert', 'success'); 
    }
   
 
}

