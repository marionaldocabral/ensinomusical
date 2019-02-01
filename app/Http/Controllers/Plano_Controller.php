<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Plano;
use App\Localidade;

class Plano_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $planos = DB::table('localidades')
            ->join('planos', 'planos.localidade_id', '=', 'localidades.id')
            ->orderBy('planos.ano', 'desc')
            ->orderBy('planos.turma')
            ->orderBy('localidades.nome')
            ->get();
        return view('plano_.index',compact('planos')); 
    }
    
    public function create()
    {
        $localidades = Localidade::orderBy('nome')->get();
        
        return view('plano_.create',compact('localidades'));
    }

    public function update($id,Request $request)
    {
        $plano = Plano::findOrfail($id);
    	
        $plano->ano = $request->ano;
        
        $plano->localidade_id = $request->localidade_id;
        
        $plano->turma = $request->turma;
        
        $plano->save();

        return redirect('plano')->with('success', 'Plano atualizado com sucesso!');
    }

    public function show($id,Request $request)
    {
        $plano = Plano::findOrfail($id);
        return view('plano_.show',compact('plano'));
    }

    public function destroy($id)
    {
        Plano::destroy($id);

        return redirect('plano_')->with('success', 'Plano removido com sucesso!');
    }

    public function store(Request $request)
    {
        $ano = $request->ano;
        $localidade_id = $request->localidade_id;
        $planos = Plano::where(function($query) use($ano, $localidade_id) {
            if($ano)
                $query->where('ano', "=", $ano);
            if($localidade_id)
                $query->where('localidade_id', '=', $localidade_id);
        })->get();
        $achei = true;
        $turma = 1;
        while ($achei) {
            $achei = false;
            for($i = 0; $i < sizeof($planos); $i++){
                if($planos[$i]->turma == $turma){
                    $achei = true;
                }
            }
            if($achei)
                $turma++;
        }
        $plano = new Plano();
        $plano->ano = $ano;
        $plano->localidade_id = $localidade_id;
        $plano->turma = $turma;      
        
        $plano->save();

        return redirect('plano_')->with('success', 'Plano cadastrado com sucesso!');
    }
}