<?php

use App\Article;
use Illuminate\Support\Facades\Route;
use App\Image;
use App\LegalFramework;
use App\ThreatsTitle;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//---autenticacion --- ruta de login--- controlador de la accion
Route::get('/login','ConnectController@getLogin')->name('login');
Route::post('/login','ConnectController@postLogin')->name('login');
Route::get('/logout','ConnectController@getLogout')->name('logout');
Route::get('/register','ConnectController@getRegister')->name('register');
Route::post('/register','ConnectController@postRegister')->name('register');
//--------------------------------------------------------------------


//------------------PAGINA PRINCIPAL-------------------------------------
Route::prefix('/plan-emergencias-unimar')->group(function(){
Route::get('/','Principal\PrincipalController@getPrincipal')->name('plan-emergencias-unimar');
//Route::get('/tipos-amenazas','Principal\ThreatController@getPrincipalThreat');
Route::get('/amenazas/{id}','Principal\PrincipalController@show');
Route::get('/talento-humano/{id}','Principal\PrincipalController@showMeans');
Route::get('/brigada-emergencias','Principal\MeansController@getPrincipalBrigade');
Route::get('/fases-evacuacion','Principal\PlanController@getPrincipalPhase');
Route::get('/fases-evacuacion/{id}','Principal\PrincipalController@showPhase');
Route::get('/infraestructura/{id}','Principal\PlanController@showInfrastructure');
Route::get('/bloques/{id}','Principal\PlanController@showBlocks');
Route::get('/eventos-nuevos/{id}','Principal\PrincipalController@showEvents');

});

//----------------------ÁNALISIS DE VULNERABILIDAD------------------------------------------
Route::prefix('/analisis-vulnerabilidad')->group(function(){
Route::get('/tipos-amenazas','Principal\ThreatController@getPrincipalThreat');
Route::get('/amenazas/{id}','Principal\ThreatController@show');



//Route::get('/tiposAmenazas/{id}','Principal\ThreatController@show');
//Route::get('/tiposAmenazas/{id}','Principal\ThreatController@show')->name('tipoAmenazas');
//Route::get('/amenazas','Principal\ThreatController@getPrincipalThreat')->name('amenazas');
});

//-------------------------------RECURSOS-----------------
Route::prefix('/recursos')->group(function(){
Route::get('/comite-emergencia','Principal\MeansController@getPrincipalMeans');
Route::get('/brigada','Principal\MeansController@getPrincipalBrigade');
});
//------------------------------------------------------------


//---------------PRUEBAS PARA IMAGENES---------------------

//purebas con las imagenes
Route::get('/prueba', function (){
  
 
    
  
    $imagen = new App\Image(['url'=> 'imagenes/a.jpeg']);
   $threat = App\EvacuationPoint::find(1);
   $threat->images()->save($imagen);//craer un url con save
   return  $threat;

});

Route::get('/resultados', function (){
    
    $image = App\Image::orderBy('id', 'Desc')->get();
    return $image;
});
//-------------------------------------
Route::get('/prueba1', function (){
  
 
    //15 carga previa (eager loading()  
   // $threat = LegalFramework::find(1)->legals;
   $dato = Article::find(1)->legalFrameworks;
    return $dato;

});

