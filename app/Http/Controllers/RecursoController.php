<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class RecursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index($plano_id,$aula_id)
    {
        $recursos = Recurso::where('aula_id','=',$aula_id)->get();
        return view('recurso.index',compact('plano_id','aula_id','recursos'));
    }

    public function create($plano_id,$aula_id)
    {
        return view('recurso.create', compact('plano_id','aula_id'));
    }

    public function store($plano_id,$aula_id,Request $request)
    {
        $recurso = new Recurso();
        
        $recurso->aula_id = $aula_id;
        
        $recurso->descricao = $request->descricao;
        
        $recurso->link = $request->link;
        
        $recurso->save();

        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso')->with('success','Recurso cadastrado com sucesso!');
    }

    public function edit($plano_id,$aula_id,$id,Request $request)
    {   
        $recurso = Recurso::findOrfail($id);
        return view('recurso.edit',compact('plano_id','aula_id','recurso'  ));
    }

    public function update($plano_id,$aula_id,$id,Request $request)
    {
        $recurso = Recurso::findOrfail($id);
    	
        $recurso->aula_id = $aula_id;
        
        $recurso->descricao = $request->descricao;
        
        $recurso->link = $request->link;        
        
        $recurso->save();

        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso')->with('success', 'Recurso atualizado com sucesso!');
    }

    public function destroy($plano_id,$aula_id,$id)
    {
     	$recurso = Recurso::findOrfail($id);
     	$recurso->delete();
        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso')->with('success','Recurso removido com sucesso!');
    }
}