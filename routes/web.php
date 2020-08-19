<?php

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



Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
////////////////////////////interface/////////////////////////////////////////
///
Route::get('/admin/interface/addchild', 'HomeController@index')->name('addchild');

Route::get('/admin/interfaceaddchild/addchild', 'AddchildController@index')->name('addchild');
Route::get('/admin/interfaceaddtraitant/addtraitant', 'AddtraitantController@index')->name('addtraitant');
Route::get('/admin/interfaceaddspecialiste/addspecialiste', 'AddspecialisteController@index')->name('addspecialiste');
//////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////LES LISTES pour ADMIN///////////////////////////////////////////////
//Route::group(['middleware'=>['auth','admin']],function (){});

Route::get('/admin', 'HomeController@index')->name('home');
//Route::resource('/admin/chart', 'Admin\CharrtController',['as'=>'admin']);
Route::get('/admin/chart', 'Admin\CharrtController@index', ['as' => 'admin'])->name('chart.index');
Route::resource('/admin/traitants', 'Admin\TraitantsController', ['as' => 'admin']);
Route::resource('/admin/enfants', 'Admin\EnfantController', ['as' => 'admin']);
Route::get('/admin/parentts/{enfant}/edit', 'Admin\EnfantController@edit')->name('admin.enfants.edit');
Route::get('/admin/carsSpecialistes/{carsspecialiste}/edit', 'Admin\CarsspecialisteController@edit')->name('admin.carsSpecialistes.edit');
//Route::get   ('/admin/carsSpecialistes/{carsspecialiste}', 'Admin\CarsspecialisteController@update')->name('admin.carsSpecialistes.update');
Route::resource('/admin/carsSpecialistes', 'Admin\CarsspecialisteController', ['as' => 'admin']);
Route::resource('/admin/enfants', 'Admin\EnfantController', ['as' => 'admin']);
Route::resource('/admin/applications', 'Admin\ExerciceController', ['as' => 'admin']);
///////////////////////////////////////////////////////
/// ///////////////////////////////pour SPECIALISTE////////////////////////////////////////
Route::get('/pagecarsspecialiste', 'carsSpecialiste\DiagnosticController@create')->name('pagecarsspecialiste');
Route::resource('/pagecarsspecialiste/parentts', 'carsSpecialiste\ParenttController', ['as' => 'pagecarsspecialiste']);
Route::get('/pagecarsspecialiste/diagnostics/create', 'carsSpecialiste\DiagnosticController@create')->name('pagecarsspecialiste');
Route::get('/pagecarsspecialiste/diagnostics/affiche/{id_enfant}', 'CarsSpecialiste\DiagnosticController@affiche')->name('pagecarsspecialiste.affiche');
Route::get('/pagecarsspecialiste/diagnostics/show/{id}', 'carsSpecialiste\DiagnosticController@show')->name('pagecarsspecialiste.show');
Route::post('/pagecarsspecialiste/diagnostics/storeAffiche', 'carsSpecialiste\DiagnosticController@storeAffiche')->name('pagecarsspecialiste.storeAffiche');
//Route::get('/pagecarsspecialiste/diagnostics/action', 'carsSpecialiste\DiagnosticController@action')->name('live_search.action');
//Route::get('/pagecarsspecialiste/diagnostics/pdf', 'carsSpecialiste\DiagnosticController@pdf');
Route::resource('/pagecarsspecialiste/diagnostics', 'carsSpecialiste\DiagnosticController', ['as' => 'pagecarsspecialiste']);
Route::post('/pagecarsspecialiste/diagnostics/store', 'carsSpecialiste\DiagnosticController@store');

/////////////////////////////////////////////////////////////////////////////////////////
/// ///////////////////////////////pour TRAITANT////////////////////////////////////////
Route::get('/pagetraitant', 'Traitant\SeancetraitementController@create')->name('pagetraitant');
//Route::resource('/pagetraitant/enfants','Traitant\EnfantController',['as'=>'pagetraitant']);
Route::get('/pagetraitant/seancetraitements/show2/{id_enfant}', 'Traitant\SeancetraitementController@show2')->name('pagetraitant.show2');
Route::get('/pagetraitant/seancetraitements/traite/{id}', 'Traitant\SeancetraitementController@traite')->name('pagetraitant.traite');
Route::get('/pagetraitant/seancetraitements/affihe/{idF}', 'Traitant\SeancetraitementController@affiche')->name('affiche');
//Route::resource('pagetraitant','SeancetraitementController', array('only' => array('index','create','store','dossier')));
Route::resource('/pagetraitant/seancetraitements', 'Traitant\SeancetraitementController', ['as' => 'pagetraitant']);
Route::resource('/pagetraitant/traitants', 'Traitant\TraitantsController', ['as' => 'pagetraitant']);
//Route::resource('/pagetraitant/seancetraitements','Traitant\SeancetraitementController',['as'=>'pagetraitant']);
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////Route::get('/admin/addchild', 'HomeController@index');
//});
//Route::get('/addchild', 'AddchildController@index');
/////*********************************login*****************************************
Route::view('/', 'home')->name('index');

Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about')->name('about');




////////////////////////////////////////////////
