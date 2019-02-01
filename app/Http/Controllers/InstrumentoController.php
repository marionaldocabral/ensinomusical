<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instrumento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class InstrumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('instrumento.index',compact('instrumentos'));
    }

    public function create()
    {
        return view('instrumento.create');
    }

    public function store(Request $request)
    {
        $instrumento = new Instrumento();
        
        $instrumento->nome = $request->nome;
        
        $instrumento->categoria = $request->categoria;
        
        $instrumento->tipo = $request->tipo;
        
        $instrumento->voz = $request->voz;
        
        $instrumento->save();

        return redirect('instrumento')->with('success', 'Instrumento cadastrado com sucesso!');
    }

    public function show($id,Request $request)
    {
        $instrumento = Instrumento::findOrfail($id);
        return view('instrumento.show',compact('title','instrumento'));
    }

    public function edit($id,Request $request)
    {   
        $instrumento = Instrumento::findOrfail($id);
        return view('instrumento.edit',compact('instrumento'));
    }

    public function update($id,Request $request)
    {
        $instrumento = Instrumento::findOrfail($id);
    	
        $instrumento->nome = $request->nome;
        
        $instrumento->categoria = $request->categoria;
        
        $instrumento->tipo = $request->tipo;
        
        $instrumento->voz = $request->voz;
        
        $instrumento->save();

        return redirect('instrumento')->with('success', 'Instrumento atualizado com sucesso!');
    }

    public function destroy($id)
    {
     	$instrumento = Instrumento::findOrfail($id);
     	$instrumento->delete();
        return redirect('/instrumento')->with('success', 'Instrumento removido com sucesso!');
    }
}
