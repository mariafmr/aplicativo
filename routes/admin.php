<?php
use Illuminate\Support\Facades\Route;

 //------------------ADMINISTRADOR-------------------
 Route::prefix('/administrador')->group(function(){// PREFIJO PARA ADMIN
 Route::get('/','Admin\DashboardController@getDashboard')->name('admin');
 //----------------------------------------------------------


 //-----------------USUARIOS---------------------
Route::resource('/usuarios','Admin\UsersController')->names('admin.usuarios');
 //------------------------------------ 

Route::get('cancelar1/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar1','Acción Cancelada!');
})->name('cancelar1');
Route::get('cancelar2/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar2','Acción Cancelada!');
})->name('cancelar2');
Route::get('cancelar3/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar3','Acción Cancelada!');
})->name('cancelar3');
Route::get('cancelar4/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar4','Acción Cancelada!');
})->name('cancelar4');
 //------------------------------------ 

//--------------------ANALISIS DE VULNERABILIDAD--------------
Route::resource('/titulos-analisis-vulnerabilidad','Admin\AnalysisTitleController')->names('admin.titulos-analisis-vulnerabilidad');
Route::resource('/titulos-amenazas','Admin\ThreatsTitleController')->names('admin.titulos-amenazas');
Route::resource('/subtitulos-amenazas','Admin\ThreatsSubTitleController')->names('admin.subtitulos-amenazas');
Route::resource('/amenazas','Admin\ThreatsController')->names('admin.amenazas');
Route::resource('/tipos-amenazas','Admin\TypeController')->names('admin.tipos-amenazas');

//--------------------------------------------------------

//-------------------------- RECURSOS-------------------
Route::resource('/titulos-recursos','Admin\MeansTitleController')->names('admin.titulos-recursos');
Route::resource('/titulos-talento-humano','Admin\TalentTitleController')->names('admin.titulos-talento-humano');
Route::resource('/titulos-comite-emergencia','Admin\CommitteeTitleController')->names('admin.titulos-comite-emergencia');
Route::resource('/comite-emergencia','Admin\CommitteeController')->names('admin.comite-emergencia');
Route::resource('/cargos','Admin\ChargeController')->names('admin.cargos');
Route::resource('/areas','Admin\AreaController')->names('admin.areas');
Route::resource('/titulos-brigada-emergencia','Admin\BrigadeTitleController')->names('admin.titulos-brigada-emergencia');
Route::resource('/brigada-emergencia','Admin\BrigadeController')->names('admin.brigada-emergencia');

//-----------------------------FINAL RECURSOS--------------------------------------------------------


//---------------------------PLAN-EVACUACION----------------------
Route::resource('/titulos-plan-evacuacion','Admin\EvacuationTitlesController')->names('admin.titulos-plan-evacuacion');
Route::resource('/titulos-fases-evacuacion','Admin\PhaseTitleController')->names('admin.titulos-fases-evacuacion');
Route::resource('/fases-evacuacion','Admin\PhaseController')->names('admin.fases-evacuacion');
Route::resource('/titulos-bloques','Admin\BlockTitleController')->names('admin.titulos-bloques');
Route::resource('/bloques','Admin\BlockController')->names('admin.bloques');
Route::resource('/puntos-encuentro','Admin\EvacuationPointController')->names('admin.puntos-encuentro');
Route::resource('/titulos-organismos-socorro','Admin\ReliefAgencyTitleController')->names('admin.titulos-organismos-socorro');
Route::resource('/organismos-socorro','Admin\ReliefAgencyController')->names('admin.organismos-socorro');

//---------------------------------------------------------------------------------

//----------------------------EVENTOS---------------------------------
Route::resource('/titulos-eventos','Admin\EventTitleController')->names('admin.titulos-eventos');
Route::resource('/eventos-nuevos','Admin\NewEventController')->names('admin.eventos-nuevos');
Route::resource('/eventos-antiguos','Admin\AncientEventController')->names('admin.eventos-antiguos');
Route::resource('/noticias','Admin\InformationNewController')->names('admin.noticias');
//---------------------------------------------------------------------------------

//----------------------------ARCHIVOS---------------------------------
Route::resource('/categorias','Admin\CategorieController')->names('admin.categorias');
Route::resource('/archivos','Admin\CategorieController')->names('admin.archivos');
//Route::resource('/noticias','Admin\InformationNewController')->names('admin.noticias');
//---------------------------------------------------------------------------------



//----------------------------------------------------------------------------------------------------

 
 //MODULO DE BRIGADISTAS
 Route::get('/brigada', 'Admin\BrigadaController@getHome');
 Route::get('/brigada/agregar', 'Admin\BrigadaController@getBrigadaAgregar');
 Route::post('/brigada/agregar', 'Admin\BrigadaController@postBrigadaAgregar');

 //--------------------ORGANIMOS DE SOCORRO---------------
//----------------------------------------------------------------------------

//--------------------REQUISITOS--------------
///Route::resource('/requisitos','Admin\RequirementsController')->names('admin.requisitos');
///Route::resource('/marcoLegalTitulo','Admin\LegalFrameworkTitleController')->names('admin.marcoLegalTitulo');
///Route::resource('/marcoLegal','Admin\LegalFrameworkController')->names('admin.marcoLegal');
///Route::resource('/articulos','Admin\ArticleController')->names('admin.articulos');
///Route::resource('/normasTecnicas','Admin\TechnicalNormsController')->names('admin.normasTecnicas');
///Route::resource('/normasReferencia','Admin\ReferenceNormsController')->names('admin.normasReferencia');
//----------------------------------------------------------------------------

 
});
