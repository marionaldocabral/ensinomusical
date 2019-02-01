<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cidade;
use App\Estado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class CidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Index - cidade';
        $cidades = Cidade::orderBy('nome')->get();
        $estados = Estado::all();
        return view('cidade.index',compact('cidades','title','estados'));
    }

    public function create()
    {
        $title = 'Create - cidade';
        $estados = Estado::orderBy('nome')->get();
        
        return view('cidade.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $cidade = new Cidade();

        $cidade->estado_id = $request->estado_id;

        $cidade->nome = $request->nome;
        
        $cidade->save();

        return redirect('cidade')->with('sucess', 'Cidade cadastrada com sucesso!');
    }

    public function show($id,Request $request)
    {

        $cidade = Cidade::findOrfail($id);
        $estado = Estado::findOrfail($cidade->estado_id);
        return view('cidade.show',compact('cidade','estado'));
    }

    public function edit($id,Request $request)
    {
        $cidade = Cidade::findOrfail($id);
        $estados = Estado::orderBy('nome')->get();
        return view('cidade.edit',compact('cidade', 'estados'));
    }

    public function update($id,Request $request)
    {
        $cidade = Cidade::findOrfail($id);
    	
        $cidade->estado_id = $request->estado_id;
        
        $cidade->nome = $request->nome;
        
        $cidade->save();

        return redirect('cidade')->with('success', 'Cidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
     	$cidade = Cidade::findOrfail($id);
     	$cidade->delete();
        return redirect('cidade')->with('success', 'Cidade removida com sucesso!');
    }
}
