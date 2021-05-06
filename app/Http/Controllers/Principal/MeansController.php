<?php

namespace App\Http\Controllers\Principal;

use App\BrigadeTitle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\committee;
use App\committeeTitle;

use App\BrigadeTitlePrincipal;

use App\MeansTitle;

class MeansController extends Controller
{
    /*public function showMeans($id){
        $meanstitles = MeansTitle::orderBy('id')->take(1)->get();
        $committeetitles = committeeTitle::all(); 
        $committees = committee::all(); 
        return view('principal.committee.blog', compact(
            'meanstitles', 'committeetitles', 'committees'));  
    }*/

    public function getPrincipalBrigade(){
        $brigadetitles = BrigadeTitle::all();
        $meanstitles = MeansTitle::orderBy('id')->take(1)->get();
        return view('principal.brigade.blog', compact(
            'brigadetitles', 'meanstitles' ));  
    }

   
}
