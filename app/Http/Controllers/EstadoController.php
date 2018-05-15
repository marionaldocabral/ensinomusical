<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estado;
use App\Paise;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class EstadoController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:16:16am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class EstadoController extends Controller
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
        $title = 'Index - estado';
        $estados = Estado::orderBy('nome')->get();
        $paises = Paise::all();
        return view('estado.index',compact('estados','title','paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - estado';
        $paises = Paise::orderBy('nome')->get();
        
        return view('estado.create',compact('paises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = new Estado();

        
        $estado->pais_id = $request->pais_id;

        
        $estado->nome = $request->nome;

        
        $estado->sigla = $request->sigla;

        
        
        $estado->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new estado has been created !!']);

        return redirect('estado');
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
        $title = 'Show - estado';

        if($request->ajax())
        {
            return URL::to('estado/'.$id);
        }

        $estado = Estado::findOrfail($id);
        $pais = Paise::findOrfail($estado->pais_id);
        return view('estado.show',compact('title','estado','pais'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - estado';
        if($request->ajax())
        {
            return URL::to('estado/'. $id . '/edit');
        }

        $estado = Estado::findOrfail($id);
        $paises = Paise::orderBy('nome')->get();
        return view('estado.edit',compact('title','estado','paises'));
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
        $estado = Estado::findOrfail($id);
    	
        $estado->pais_id = $request->pais_id;
        
        $estado->nome = $request->nome;
        
        $estado->sigla = $request->sigla;
        
        
        $estado->save();

        return redirect('estado');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/estado/'. $id . '/delete');

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
     	$estado = Estado::findOrfail($id);
     	$estado->delete();
        return redirect('estado')->with('success', 'Estado removido com sucesso!');
    }
}
