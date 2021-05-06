<?php

namespace App\Http\Controllers\Principal;

use App\Block;
use App\BlockTitle;
use App\EvacuationPlanTitle;
use App\EvacuationPoint;
use App\Http\Controllers\Controller;
use App\Phase;
use App\PhaseTitle;
use App\Threat;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function getPrincipalPhase(){ 
        $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $phasetitles= PhaseTitle::all();
        $phases= Phase::all();

        return view('principal.plan.blog', compact(
            'phasetitles', 'phases', 'evacuationplantitles' ));  
    }
  

    public function showEvacuation($id)
    {
        //Find the post with the id = $id
        $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $blocks= Block::find($id);
        $evacuationpoints= EvacuationPoint::find($id);
        return view('principal.block.detail', ['evacuationplantitles' => $evacuationplantitles,
        'blocks' => $blocks,
        'evacuationpoints' =>  $evacuationpoints] );
    }
  /*  public function showInfrastructure($id)
    {
  // $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $blocktitles= BlockTitle::all();
        $blocks= Block::find($id);
        return view('principal.infra.detail', [
        'blocktitles' => $blocktitles,  'blocks' => $blocks]
     );
    }*/
    public function showBlocks($id)
    {
  // $evacuationplantitles= EvacuationPlanTitle::orderBy('id')->take(1)->get();
        $blocktitles= BlockTitle::all();
        $blocks= Block::find($id);
        return view('principal.block.detail', [
        'blocktitles' => $blocktitles,  'blocks' => $blocks]
     );
    }

}
