<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instrumento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class InstrumentoController.
 *
 * @author  The scaffold-interface created at 2018-03-18 10:17:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class InstrumentoController extends Controller
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
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('instrumento.index',compact('instrumentos','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - instrumento';
        
        return view('instrumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instrumento = new Instrumento();

        
        $instrumento->nome = $request->nome;

        
        $instrumento->categoria = $request->categoria;

        
        $instrumento->tipo = $request->tipo;

        
        $instrumento->voz = $request->voz;

        
        
        $instrumento->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new instrumento has been created !!']);

        return redirect('instrumento');
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
        $title = 'Show - instrumento';

        if($request->ajax())
        {
            return URL::to('instrumento/'.$id);
        }

        $instrumento = Instrumento::findOrfail($id);
        return view('instrumento.show',compact('title','instrumento'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - instrumento';
        if($request->ajax())
        {
            return URL::to('instrumento/'. $id . '/edit');
        }

        
        $instrumento = Instrumento::findOrfail($id);
        return view('instrumento.edit',compact('title','instrumento'  ));
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
        $instrumento = Instrumento::findOrfail($id);
    	
        $instrumento->nome = $request->nome;
        
        $instrumento->categoria = $request->categoria;
        
        $instrumento->tipo = $request->tipo;
        
        $instrumento->voz = $request->voz;
        
        
        $instrumento->save();

        return redirect('instrumento');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$instrumento = Instrumento::findOrfail($id);
     	$instrumento->delete();
        return redirect('/instrumento')->with('success', 'Instrumento removido com sucesso!');
    }
}
