<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------->middleware('admin_filter')----------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=> 'web'],function(){
  Route::resource('/scaffold/user','\App\Http\Controllers\ScaffoldInterface\UserController')->middleware('admin_filter'); 
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home/regional', 'HomeController@index_regional')->name('home')->middleware('regional_filter');
Route::get('/home/aluno', 'HomeController@index_aluno')->name('home')->middleware('user_filter');
Route::get('/home', 'HomeController@index')->name('home')->middleware('home_filter');

//user Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('/user/{user_id}/redefine', 'UserController@redefine');
  Route::post('/user/{user_id}/salvar_senha', 'UserController@salvar_senha');
  Route::get('user', 'UserController@index')->middleware('admin_filter');
  Route::get('user/create', 'UserController@create')->middleware('admin_filter');
  Route::get('user/{id}', 'UserController@show')->middleware('admin_filter');
  Route::get('user/{id}/edit', 'UserController@edit')->middleware('admin_filter');
  Route::patch('user/{id}', 'UserController@update')->middleware('admin_filter');
  Route::post('user/', 'UserController@store')->middleware('admin_filter');
  Route::delete('user/{id}', 'UserController@destroy')->middleware('admin_filter');
});

//aluno Routes
Route::group(['middleware'=> 'web'],function(){  
  Route::get('plano/{plano_id}/aluno/create', 'AlunoController@create')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno', 'AlunoController@index');
  Route::get('plano/{plano_id}/aluno/{id}', 'AlunoController@show');
  Route::get('plano/{plano_id}/aluno/{id}/edit', 'AlunoController@edit')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{id}/relatorio', 'AlunoController@relatorio')->middleware('manager_filter');
  Route::post('plano/{plano_id}/aluno', 'AlunoController@store')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{id}', 'AlunoController@update')->middleware('manager_filter');
  Route::delete('plano/{plano_id}/aluno/{id}', 'AlunoController@destroy')->middleware('admin_filter');  
});

//paise Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('paise','\App\Http\Controllers\PaiseController')->middleware('admin_filter');
});

//estado Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('estado','\App\Http\Controllers\EstadoController')->middleware('admin_filter');
});

//cidade Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('cidade','\App\Http\Controllers\CidadeController')->middleware('admin_filter');
});

//localidade Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('local','\App\Http\Controllers\LocalidadeController@index_regional');
  Route::get('local/create','\App\Http\Controllers\LocalidadeController@create_regional');
  Route::resource('localidade','\App\Http\Controllers\LocalidadeController');
});

//plano Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano','\App\Http\Controllers\PlanoController@index')->middleware('manager_filter');
  Route::get('plano/create','\App\Http\Controllers\PlanoController@create')->middleware('manager_filter');
  Route::post('plano','\App\Http\Controllers\PlanoController@store')->middleware('manager_filter');
  //Route::delete('plano/{id}','\App\Http\Controllers\PlanoController@destroy')->middleware('admin_filter');
});

//plano_ Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano_','\App\Http\Controllers\Plano_Controller')->middleware('admin_filter');
});

//aulasteorica Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aula/print','\App\Http\Controllers\AulasteoricaController@print');
  Route::get('plano/{plano_id}/aula','\App\Http\Controllers\AulasteoricaController@index');
  Route::get('plano/{plano_id}/aula/create','\App\Http\Controllers\AulasteoricaController@create')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aula/{id}/edit','\App\Http\Controllers\AulasteoricaController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aula/{id}','\App\Http\Controllers\AulasteoricaController@update')->middleware('manager_filter');
  Route::post('plano/{plano_id}/aula','\App\Http\Controllers\AulasteoricaController@store')->middleware('manager_filter');
  Route::delete('plano/{plano_id}/aula/{id}','\App\Http\Controllers\AulasteoricaController@destroy')->middleware('manager_filter');
});

//chamada Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('plano/{plano_id}/aula/{aula_id}/chamada','\App\Http\Controllers\ChamadaController')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aula/{aula_id}/chamada/{chamada_id}/check', ['as' => 'chamada.check', 'uses' => 'ChamadaController@check'])->middleware('manager_filter');
  Route::get('plano/{plano_id}/aula/{aula_id}/chamada/{chamada_id}/uncheck', ['as' => 'chamada.uncheck', 'uses' => 'ChamadaController@uncheck'])->middleware('manager_filter');
});

//aulaspratica Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aluno/{aluno_id}/metodo','\App\Http\Controllers\AulaspraticaController@index');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/metodo/create','\App\Http\Controllers\AulaspraticaController@create')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/metodo/{id}','\App\Http\Controllers\AulaspraticaController@show')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/metodo/{id}/edit','\App\Http\Controllers\AulaspraticaController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{aluno_id}/metodo/{id}','\App\Http\Controllers\AulaspraticaController@update')->middleware('manager_filter');
  Route::post('plano/{plano_id}/aluno/{aluno_id}/metodo','\App\Http\Controllers\AulaspraticaController@store')->middleware('manager_filter');
  Route::delete('plano/{plano_id}/aluno/{aluno_id}/metodo/{id}','\App\Http\Controllers\AulaspraticaController@destroy')->middleware('manager_filter');
});

//avaliacao Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aluno/{aluno_id}/avaliacao','\App\Http\Controllers\AvaliacaoController@index');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/avaliacao/{id}/edit','\App\Http\Controllers\AvaliacaoController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{aluno_id}/avaliacao/{id}','\App\Http\Controllers\AvaliacaoController@update')->middleware('manager_filter');
});

//exame Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exame','\App\Http\Controllers\ExameController@index');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exame/create','\App\Http\Controllers\ExameController@create')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exame/{id}','\App\Http\Controllers\ExameController@show')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exame/{id}/edit','\App\Http\Controllers\ExameController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{aluno_id}/exame/{id}','\App\Http\Controllers\ExameController@update')->middleware('manager_filter');
  Route::post('plano/{plano_id}/aluno/{aluno_id}/exame','\App\Http\Controllers\ExameController@store')->middleware('manager_filter');
  Route::delete('plano/{plano_id}/aluno/{aluno_id}/exame/{id}','\App\Http\Controllers\ExameController@destroy')->middleware('manager_filter');
});

//feriado Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('feriado','\App\Http\Controllers\FeriadoController')->middleware('admin_filter');
});

//instrumento Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('instrumento','\App\Http\Controllers\InstrumentoController')->middleware('admin_filter');
});

//recurso Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('/plano/{plano_id}/aula/{aula_id}/recurso','\App\Http\Controllers\RecursoController@index');
  Route::get('/plano/{plano_id}/aula/{aula_id}/recurso/create','\App\Http\Controllers\RecursoController@create')->middleware('manager_filter');
  Route::get('/plano/{plano_id}/aula/{aula_id}/recurso/{id}/edit','\App\Http\Controllers\RecursoController@edit')->middleware('manager_filter');
  Route::patch('/plano/{plano_id}/aula/{aula_id}/recurso/{id}','\App\Http\Controllers\RecursoController@update')->middleware('manager_filter');
  Route::post('/plano/{plano_id}/aula/{aula_id}/recurso','\App\Http\Controllers\RecursoController@store')->middleware('manager_filter');
  Route::delete('/plano/{plano_id}/aula/{aula_id}/recurso/{id}','\App\Http\Controllers\RecursoController@destroy')->middleware('manager_filter');
});

//Email Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('/plano/{plano_id}/aula/{aula_id}/chamada/{id}/send','\App\Http\Controllers\FaltaMailController')->middleware('manager_filter');
});
//hino Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aluno/{aluno_id}/hino/create','\App\Http\Controllers\HinoController@create')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/hino','\App\Http\Controllers\HinoController@index');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/hino/{id}','\App\Http\Controllers\HinoController@show')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/hino/{id}/edit','\App\Http\Controllers\HinoController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{aluno_id}/hino/{id}','\App\Http\Controllers\HinoController@update')->middleware('manager_filter');
  Route::post('plano/{plano_id}/aluno/{aluno_id}/hino','\App\Http\Controllers\HinoController@store')->middleware('manager_filter');
  Route::delete('plano/{plano_id}/aluno/{aluno_id}/hino/{id}','\App\Http\Controllers\HinoController@destroy')->middleware('manager_filter');
});
//exercicio Routes
Route::group(['middleware'=> 'web'],function(){
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exercicio/{id}/check','ExercicioController@check')->middleware('manager_filter');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exercicio','\App\Http\Controllers\ExercicioController@index');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exercicio/{id}','\App\Http\Controllers\ExercicioController@show');
  Route::get('plano/{plano_id}/aluno/{aluno_id}/exercicio/{id}/edit','\App\Http\Controllers\ExercicioController@edit')->middleware('manager_filter');
  Route::patch('plano/{plano_id}/aluno/{aluno_id}/exercicio/{id}','\App\Http\Controllers\ExercicioController@update')->middleware('manager_filter');
});

//telefone Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('telefone','\App\Http\Controllers\TelefoneController');
  Route::post('telefone/{id}/update','\App\Http\Controllers\TelefoneController@update');
  Route::get('telefone/{id}/delete','\App\Http\Controllers\TelefoneController@destroy');
  Route::get('telefone/{id}/deleteMsg','\App\Http\Controllers\TelefoneController@DeleteMsg');
});
