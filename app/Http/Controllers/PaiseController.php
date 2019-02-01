<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paise;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class PaiseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $paises = Paise::orderBy('nome')->get();
        return view('paise.index',compact('paises'));
    }

    public function create()
    {        
        return view('paise.create');
    }

    public function store(Request $request)
    {
        $paise = new Paise();
        
        $paise->nome = $request->nome;
        
        $paise->sigla = $request->sigla;

        $paise->save();

        return redirect('paise')->with('success', 'País cadastrado com sucesso!');
    }

    public function show($id,Request $request)
    {
        $paise = Paise::findOrfail($id);
        return view('paise.show',compact('paise'));
    }

    public function edit($id,Request $request)
    {
        $paise = Paise::findOrfail($id);
        return view('paise.edit',compact('paise'  ));
    }

    public function update($id,Request $request)
    {
        $paise = Paise::findOrfail($id);
    	
        $paise->nome = $request->nome;
        
        $paise->sigla = $request->sigla;
        
        $paise->save();

        return redirect('paise')->with('success', 'País atualizado com sucesso!');
    }

    public function destroy($id)
    {
     	$paise = Paise::findOrfail($id);
     	$paise->delete();
        return redirect('paise')->with('success', 'País removido com sucesso!');
    }
}