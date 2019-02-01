<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feriado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class FeriadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function create()
    {
        return view('feriado.create');
    }

    public function store(Request $request)
    {
        $feriado = new Feriado();
        
        $feriado->nome = $request->nome;
        
        $feriado->data = date('d/m/Y', strtotime($request->data));        
        
        $feriado->save();

        return redirect('feriado')->with('success', 'Feriado cadastrado com sucesso!');
    }

    public function show($id,Request $request)
    {
        $feriado = Feriado::findOrfail($id);
        return view('feriado.show',compact('feriado'));
    }

    public function edit($id,Request $request)
    {
        $feriado = Feriado::findOrfail($id);
        $feriado->data = date('Y-m-d', strtotime((str_replace('/', '-', $feriado->data))));
        return view('feriado.edit',compact('feriado'  ));
    }

    public function update($id,Request $request)
    {
        $feriado = Feriado::findOrfail($id);
    	
        $feriado->nome = $request->nome;
        
        $data = $request->data;
        
        $feriado->data =  date('d/m/Y', strtotime($data));        
        
        $feriado->save();

        return redirect('feriado')->with('success', 'Feriado atualizado com sucesso!');
    }

    public function destroy($id)
    {
     	$feriado = Feriado::findOrfail($id);
     	$feriado->delete();
        return redirect('feriado')->with('success', 'Feriado removido com sucesso!');
    }
}
