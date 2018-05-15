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
use URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\faltaMail;

/**
 * Class ChamadaController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:34:45am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ChamadaController extends Controller
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
    public function index($plano_id,$aula_id)
    {
        $aula = Aulasteorica::findOrfail($aula_id);

        $plano = Plano::findOrfail($plano_id);

        $alunos = User::where('plano_id','=',$plano_id)->orderBy('name')->get();

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

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/chamada');
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
            $idade = (strtotime(date('Y')) - strtotime($aluno->nascimento)) / 31536000;
            if(strlen($aluno->email_resp) > 5 && $idade < 18)
                return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/chamada/' . $aluno->id . '/send');
        }

        return redirect('plano/' . $plano_id . '/aula/' . $aula_id . '/chamada');
    }

}
