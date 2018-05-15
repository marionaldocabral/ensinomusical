<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localidade;
use App\Cidade;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class LocalidadeController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:20:08am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class LocalidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $localidades = Localidade::orderBy('nome')->get();
        $cidades = Cidade::all();
        $regionais = User::where('status','=','enc_regional')->get();
        $locais =  User::where('status','=','enc_local')->get();

        return view('localidade.index',compact('localidades','cidades','regionais','locais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $users = User::where('status','=','regional')->orderBy('name')->get();
        $locais = User::where('status','=','local')->orderBy('name')->get();
        
        return view('localidade.create', compact('cidades','regionais','locais'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $localidade = new Localidade();

        
        $localidade->nome = $request->nome;

        
        $localidade->cidade_id = $request->cidade_id;

        
        $localidade->enc_reg_id = $request->enc_reg_id;

        
        $localidade->enc_local_id = $request->enc_local_id;

        
        
        $localidade->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new localidade has been created !!']);

        
        return redirect('localidade');
    }

    /**
     * Display the specified resource.
     *
     $cidades = Cidade::all();
     * @param    \Illuminate\Http\Request  $request
     * @par, 'cidades'    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('localidade/'.$id);
        }

        $localidade = Localidade::findOrfail($id);
        $cidade = Cidade::findOrfail($localidade->cidade_id);
        $regional = User::findOrfail($localidade->enc_reg_id);
        $local = User::findOrfail($localidade->enc_local_id);
        return view('localidade.show',compact('localidade','cidade','regional', 'local'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $localidade = Localidade::findOrfail($id);
        $cidades = Cidade::all();
        $regionais = User::where('status','enc_regional')->get();
        $locais =  User::where('status','enc_local')->get();
        return view('localidade.edit',compact('title','localidade','cidades','regionais','locais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $localidade = Localidade::findOrfail($id);
    	
        $localidade->nome = $request->nome;
        
        $localidade->cidade_id = $request->cidade_id;
        
        $localidade->enc_reg_id = $request->enc_reg_id;
        
        $localidade->enc_local_id = $request->enc_local_id;
        
        
        $localidade->save();

        return redirect('localidade');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/localidade/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$localidade = Localidade::findOrfail($id);
     	$localidade->delete();
        return redirect('localidade')->with('success', 'Localidade removida com sucesso!');
    }
}
