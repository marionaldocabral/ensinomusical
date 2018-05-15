<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paise;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PaiseController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:13:10am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PaiseController extends Controller
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
        $title = 'Lista de Países';
        $paises = Paise::orderBy('nome')->get();
        return view('paise.index',compact('paises','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Criar País';
        
        return view('paise.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paise = new Paise();

        
        $paise->nome = $request->nome;

        
        $paise->sigla = $request->sigla;

        
        
        $paise->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new paise has been created !!']);

        return redirect('paise');
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
        $title = 'Show - paise';

        if($request->ajax())
        {
            return URL::to('paise/'.$id);
        }

        $paise = Paise::findOrfail($id);
        return view('paise.show',compact('title','paise'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - paise';
        if($request->ajax())
        {
            return URL::to('paise/'. $id . '/edit');
        }

        
        $paise = Paise::findOrfail($id);
        return view('paise.edit',compact('title','paise'  ));
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
        $paise = Paise::findOrfail($id);
    	
        $paise->nome = $request->nome;
        
        $paise->sigla = $request->sigla;
        
        
        $paise->save();

        return redirect('paise');
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
        $msg = Ajaxis::MtDeleting('Warning!!','Would you like to remove This?','/paise/'. $id . '/delete');

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
     	$paise = Paise::findOrfail($id);
     	$paise->delete();
        return redirect('paise')->with('success', 'País removido com sucesso!');
    }
}
