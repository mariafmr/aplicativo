<?php

namespace App\Http\Controllers\Principal;

use App\AnalysisTitle;
use App\AncientEvent;
use App\Block;
use App\BlockTitle;
use App\Brigade;
use App\BrigadeTitle;
use App\BrigadeTitlePrincipal;
use App\committee;
use App\committeeTitle;
use App\EvacuationPlanTitle;
use App\EvacuationPoint;
use App\Http\Controllers\Controller;
use App\Image;
use App\MeansTitle;
use App\NewEvent;
use App\Phase;
use App\PhaseTitle;
use App\ReliefAgency;
use App\ReliefAgencyTitle;
use App\TalentTitle;
use App\Threat;
use App\ThreatsTitle;
use App\ThreatsSubTitle;
use App\Type;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    
    //----------FUNCIÓN--- VISTA DE LA LISTA DE LOS USURIOS------------
    public function getPrincipal(){
        
       $threatstitles= ThreatsTitle::orderBy('id')->take(1)->get();
       $threatstitlesDos= ThreatsTitle::orderBy('id')->take(1)->get();
       $talents = TalentTitle::orderBy('id')->take(1)->get();
       $talentsDos = TalentTitle::all();
       $brigadetitles = BrigadeTitle::orderBy('id')->take(1)->get();
       $brigadetitlesDos = BrigadeTitle::all();
       $brigades = Brigade::all();
       $reliefagencys= ReliefAgency::all();
       $reliefagencytitles = ReliefAgencyTitle::orderBy('id')->take(1)->get();
       $reliefagencytitlesDos = ReliefAgencyTitle::all();         
       $phasetitles= PhaseTitle::orderBy('id')->take(1)->get();
       $phases= Phase::all();
       $blocks= Block::all();
       $blocktitles= BlockTitle::all();
       $newevents = NewEvent::all();
       $images = Image::all();
       $ancientevents= AncientEvent::all();
       $evacuationpoints = EvacuationPoint::all();
       $threats = Threat::all();

       return view('principal.master', compact(
           'threatstitles', 'threatstitlesDos',
           'talents', 'talentsDos', 
           'brigades', 'brigadetitlesDos', 'brigadetitles',
           'reliefagencytitles', 'reliefagencytitlesDos', 'reliefagencys',  
           'blocktitles', 'blocks',
           'phasetitles', 'phases',
           'newevents', 'evacuationpoints', 'images', 'ancientevents', 'threats'
          
        ));
       //return view('principal.master', ['titles' =>  $titles , 'subtitles' => $subtitles]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $titles = ThreatsTitle::all();
        $subtitles = ThreatsSubTitle::all();
        $reliefagencys= ReliefAgency::all();
        $reliefagencytitles = ReliefAgencyTitle::all();
      
        return view('principal.master', compact('titles', 'subtitles',
         'reliefagencytitles', 'reliefagencys'));
       //  ['titles' =>  $titles, 'subtitles' => $subtitles]);
   
   
    }

    //----------------------------------------

/*    public function getPrincipalPhase($id){ 
        $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $phasetitles= PhaseTitle::find($id);
        $phases= Phase::find($id);

        return view('principal.plan.blog', compact(
            'phasetitles', 'phases', 'evacuationplantitles' ));  
    }*/

    public function showEvents($id){
        $newevents = NewEvent::find($id);
        $images= Image::find($id);
        $threatstitlesprincipals = AnalysisTitle::find($id);
 
        return view('principal.newevents.blog', compact(
            'newevents', 'images', 'threatstitlesprincipals'));  
    }

    public function show($id)
     {
         $threatstitles = ThreatsTitle::all();
         //  $types =Type::all();
        // $threatstitlesprins = AnalysisTitle::orderBy('id')->take(1)->get();
        // $threatstitlesprins = AnalysisTitle::all();
         $threat = Threat::find($id);
         return view('principal.threat.detail',
          ['threat' => $threat,
        //  'threatstitlesprins' => $threatstitlesprins,
          'threatstitles' => $threatstitles
          // 'types' =>  $types
          ]);
     }
     public function showMeans($id){
        $meanstitles = MeansTitle::all();
        $talents = TalentTitle::find($id);
      //  $committeetitles = committeeTitle::all(); 
       // $committees = committee::all(); 
        return view('principal.committee.blog', compact(
            'meanstitles', 'talents'));  
    }

    public function showPhase($id)
    {
        //Find the post with the id = $id
      //  $evacuat ionplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $phasetitles= PhaseTitle::all(); 
        $phases= Phase::find($id);
        return view('principal.plan.detail', [
        //'evacuationplantitles' => $evacuationplantitles,
        'phasetitles' =>  $phasetitles,'phases' =>  $phases] );
    }

}
