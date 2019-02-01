<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Telefone;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class TelefoneController.
 *
 * @author  The scaffold-interface created at 2018-09-18 11:53:47pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - telefone';
        $telefones = Telefone::paginate(6);
        return view('telefone.index',compact('telefones','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - telefone';
        
        return view('telefone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telefone = new Telefone();

        
        $telefone->numero = $request->numero;

        
        $telefone->nome = $request->nome;

        
        
        $telefone->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new telefone has been created !!']);

        return redirect('telefone');
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
        $title = 'Show - telefone';

        if($request->ajax())
        {
            return URL::to('telefone/'.$id);
        }

        $telefone = Telefone::findOrfail($id);
        return view('telefone.show',compact('title','telefone'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - telefone';
        if($request->ajax())
        {
            return URL::to('telefone/'. $id . '/edit');
        }

        
        $telefone = Telefone::findOrfail($id);
        return view('telefone.edit',compact('title','telefone'  ));
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
        $telefone = Telefone::findOrfail($id);
    	
        $telefone->numero = $request->numero;
        
        $telefone->nome = $request->nome;
        
        
        $telefone->save();

        return redirect('telefone');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/telefone/'. $id . '/delete');

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
     	$telefone = Telefone::findOrfail($id);
     	$telefone->delete();
        return URL::to('telefone');
    }
}
