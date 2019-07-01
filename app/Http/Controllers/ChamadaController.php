<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chamada;
use App\Aulasteorica;
use App\User;
use App\Plano;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\Response;
use URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\faltaMail;

class ChamadaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($plano_id,$aula_id)
    {
        $aula = Aulasteorica::findOrfail($aula_id);

        $plano = Plano::findOrfail($plano_id);

        $alunos = User::where('plano_id','=',$plano_id)->orderBy('name')->get();

        $aulas = Aulasteorica::where('plano_id', '=', $plano_id)->get();
        foreach ($aulas as $aula) {
            foreach ($alunos as $aluno) {
                $chamada = \App\Chamada::where([['aula_id', $aula->id], ['user_id', $aluno->id]])->first();
                if($chamada == NULL){
                    $chamada = new Chamada();
                    $chamada->aula_id = $aula->id;
                    $chamada->user_id = $aluno->id;
                    $chamada->status = true; //presente
                    $chamada->save();
                }
            }        
        }
        $chamadas = Chamada::where('aula_id','=',$aula_id)->get();

        return view('chamada.index',compact('aula','alunos','plano','chamadas'));
    }
    
    public function check($plano_id, $aula_id, $chamada_id)
    {
        $chamada = Chamada::findOrfail($chamada_id);
        $aluno = User::findOrfail($chamada->user_id);
        if($chamada->status == false){
            $chamada->status = true;
            $aluno->faltas -= 1;
            $chamada->save();
            $aluno->save();
        }
        $dados = [];
        $dados['status'] = $chamada->status;
        $dados['faltas'] = $aluno->faltas;

        return Response::json($dados);
    }

    public function uncheck($plano_id, $aula_id, $chamada_id)
    {
        $chamada = Chamada::findOrfail($chamada_id);
        $aluno = User::findOrfail($chamada->user_id);
        if($chamada->status == true){
            $chamada->status = false;
            $aluno->faltas += 1;
            $chamada->save();
            $aluno->save();
            $idade = (strtotime(date('d/m/Y')) - strtotime($aluno->nascimento)) / 31536000;
            if($aluno->email_resp != NULL && $idade < 18){
                return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/chamada/' . $aluno->id . '/send');
            }
        }

        $dados = [];
        $dados['status'] = $chamada->status;
        $dados['faltas'] = $aluno->faltas;

         return Response::json($dados);
    }
}