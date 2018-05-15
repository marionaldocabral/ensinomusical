<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Estado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CidadeController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:59am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class CidadeController extends Controller
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
        $title = 'Index - cidade';
        $cidades = Cidade::orderBy('nome')->get();
        $estados = Estado::all();
        return view('cidade.index',compact('cidades','title','estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - cidade';
        $estados = Estado::orderBy('nome')->get();
        
        return view('cidade.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade();

        
        $cidade->estado_id = $request->estado_id;

        
        $cidade->nome = $request->nome;

        
        
        $cidade->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new cidade has been created !!']);

        return redirect('cidade');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - cidade';

        if($request->ajax())
        {
            return URL::to('cidade/'.$id);
        }

        $cidade = Cidade::findOrfail($id);
        $estado = Estado::findOrfail($cidade->estado_id);
        return view('cidade.show',compact('title','cidade','estado'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - cidade';
        if($request->ajax())
        {
            return URL::to('cidade/'. $id . '/edit');
        }        
        $cidade = Cidade::findOrfail($id);
        $estados = Estado::orderBy('nome')->get();
        return view('cidade.edit',compact('title','cidade', 'estados'));
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
        $cidade = Cidade::findOrfail($id);
    	
        $cidade->estado_id = $request->estado_id;
        
        $cidade->nome = $request->nome;
        
        
        $cidade->save();

        return redirect('cidade');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/cidade/'. $id . '/delete');

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
     	$cidade = Cidade::findOrfail($id);
     	$cidade->delete();
        return redirect('cidade')->with('success', 'Cidade removida com sucesso!');
    }
}
