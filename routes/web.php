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

Route::group(['middleware'=> 'web'],function(){
  Route::resource('/scaffold/user','\App\Http\Controllers\ScaffoldInterface\UserController'); 
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/detalhe', 'HomeController@detalhe')->name('detalhe');

//user Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('/user','\App\Http\Controllers\UserController');
});

//aluno Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aluno','\App\Http\Controllers\AlunoController'); 
});

//paise Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('paise','\App\Http\Controllers\PaiseController');
});

//estado Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('estado','\App\Http\Controllers\EstadoController');
});

//cidade Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('cidade','\App\Http\Controllers\CidadeController');
});

//localidade Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('localidade','\App\Http\Controllers\LocalidadeController');
});

//plano Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano','\App\Http\Controllers\PlanoController');
});

//plano_ Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano_','\App\Http\Controllers\Plano_Controller');
});

//aulasteorica Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aula','\App\Http\Controllers\AulasteoricaController');
});

//chamada Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aula/{aula_id}/chamada','\App\Http\Controllers\ChamadaController');
  Route::post('plano/{plano_id}/aula/{aula_id}/chamada/{chamada_id}/check', ['as' => 'chamada.check', 'uses' => 'ChamadaController@check']);
  Route::post('plano/{plano_id}/aula/{aula_id}/chamada/{chamada_id}/uncheck', ['as' => 'chamada.uncheck', 'uses' => 'ChamadaController@uncheck']);
});

//aulaspratica Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aluno/{aluno_id}/metodo','\App\Http\Controllers\AulaspraticaController');
});

//avaliacao Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aluno/{aluno_id}/avaliacao','\App\Http\Controllers\AvaliacaoController');
});

//exame Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aluno/{aluno_id}/exame','\App\Http\Controllers\ExameController');
});

//administradore Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('administradore','\App\Http\Controllers\AdministradoreController');
  Route::post('administradore/{id}/update','\App\Http\Controllers\AdministradoreController@update');
  Route::get('administradore/{id}/delete','\App\Http\Controllers\AdministradoreController@destroy');
  Route::get('administradore/{id}/deleteMsg','\App\Http\Controllers\AdministradoreController@DeleteMsg');
});

//feriado Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('feriado','\App\Http\Controllers\FeriadoController');
});

//instrumento Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('instrumento','\App\Http\Controllers\InstrumentoController');
});

//recurso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('/plano/{plano_id}/aula/{aula_id}/recurso','\App\Http\Controllers\RecursoController');
});

//recurso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('/plano/{plano_id}/aula/{aula_id}/chamada/{id}/send','\App\Http\Controllers\FaltaMailController');
});
//hino Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aluno/{aluno_id}/hino','\App\Http\Controllers\HinoController');
});
