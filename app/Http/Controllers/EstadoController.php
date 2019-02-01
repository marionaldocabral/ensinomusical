<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estado;
use App\Paise;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estados = Estado::orderBy('nome')->get();
        $paises = Paise::all();
        return view('estado.index',compact('estados','paises'));
    }

    public function create()
    {
        $paises = Paise::orderBy('nome')->get();
        
        return view('estado.create',compact('paises'));
    }

    public function store(Request $request)
    {
        $estado = new Estado();

        $estado->pais_id = $request->pais_id;
        
        $estado->nome = $request->nome;

        $estado->sigla = $request->sigla;

        $estado->save();

        return redirect('estado')->with('success', 'Estado criado com sucesso!');
    }

    public function show($id,Request $request)
    {
        $estado = Estado::findOrfail($id);
        $pais = Paise::findOrfail($estado->pais_id);
        return view('estado.show',compact('estado','pais'));
    }

    public function edit($id,Request $request)
    {
        $estado = Estado::findOrfail($id);
        $paises = Paise::orderBy('nome')->get();
        return view('estado.edit',compact('estado','paises'));
    }

    public function update($id,Request $request)
    {
        $estado = Estado::findOrfail($id);
    	
        $estado->pais_id = $request->pais_id;
        
        $estado->nome = $request->nome;
        
        $estado->sigla = $request->sigla;
        
        $estado->save();

        return redirect('estado')->with('success', 'Estado atualizado com sucesso!');
    }

    public function destroy($id)
    {
     	$estado = Estado::findOrfail($id);
     	$estado->delete();
        return redirect('estado')->with('success', 'Estado removido com sucesso!');
    }
}