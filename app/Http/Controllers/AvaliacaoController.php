<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Avaliacao;
use App\User;
use App\Chamada;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class AvaliacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($plano_id,$aluno_id)
    {
        $user = auth()->user();
        if(($user->status == 'iniciante' || $user->status == 'ensaio' || $user->status == 'rjm' || $user->status == 'oficial' || $user->status == 'oficializado') && $user->id != $aluno_id)
            return redirect('home')->with('erro', 'Permissão negada!');
        $avaliacaos = Avaliacao::where('user_id','=',$aluno_id)->get();
        $aluno = User::findOrfail($aluno_id);
        $aprovado = true;
        foreach ($avaliacaos as $avaliacao) {
            if($avaliacao->nota < 7)
                $aprovado = false;
        }
        return view('avaliacao.index',compact('avaliacaos','plano_id','aluno','aprovado'));
    }

    public function edit($plano_id,$aluno_id,$id,Request $request)
    {
        $aluno = User::findOrfail($aluno_id);
        $avaliacao = Avaliacao::findOrfail($id);
        return view('avaliacao.edit',compact('avaliacao','plano_id','aluno'));
    }

    public function update($plano_id,$aluno_id,$id,Request $request)
    {
        $avaliacao = Avaliacao::findOrfail($id);
        
        $avaliacao->nota = $request->nota;
        
        
        $avaliacao->save();

        return redirect('plano/' . $plano_id . '/aluno/' . $aluno_id . '/avaliacao')->with('success', 'Nota atualizada com sucesso!');
    }
}