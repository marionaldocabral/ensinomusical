<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feriado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class FeriadoController.
 *
 * @author  The scaffold-interface created at 2018-03-13 12:11:20am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class FeriadoController extends Controller
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
        $feriados = Feriado::all();
        $tam = sizeof($feriados);
        for($i = 0; $i < ($tam - 1); $i++)
        {
            $min = $i;
            for($j = ($i + 1); $j < $tam; $j++)
            {
                if(date('Y-m-d', strtotime((str_replace('/', '-', $feriados[$j]->data)))) < date('Y-m-d', strtotime((str_replace('/', '-', $feriados[$min]->data)))))
                    $min = $j;
            }
            if($feriados[$i]->data != $feriados[$min]->data)
            {
                $aux = $feriados[$i];
                $feriados[$i] = $feriados[$min];
                $feriados[$min] = $aux;
            }
        }        
        return view('feriado.index',compact('feriados','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - feriado';
        
        return view('feriado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feriado = new Feriado();
        
        $feriado->nome = $request->nome;
        
        $feriado->data = date('d/m/Y', strtotime($request->data));        
        
        $feriado->save();

        return redirect('feriado')->with('success', 'Feriado cadastrado com sucesso!');
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
        $title = 'Show - feriado';

        if($request->ajax())
        {
            return URL::to('feriado/'.$id);
        }

        $feriado = Feriado::findOrfail($id);
        return view('feriado.show',compact('title','feriado'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('feriado/'. $id . '/edit');
        }

        
        $feriado = Feriado::findOrfail($id);
        $feriado->data = date('Y-m-d', strtotime((str_replace('/', '-', $feriado->data))));
        return view('feriado.edit',compact('feriado'  ));
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
        $feriado = Feriado::findOrfail($id);
    	
        $feriado->nome = $request->nome;
        
        $data = $request->data;
        
        $feriado->data =  date('d/m/Y', strtotime($data));        
        
        $feriado->save();

        return redirect('feriado');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$feriado = Feriado::findOrfail($id);
     	$feriado->delete();
        return redirect('feriado')->with('success', 'Feriado removido com sucesso!');
    }
}
