<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exercicio;
use App\User;
use Amranidev\Ajaxis\Ajaxis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use URL;

class ExercicioController extends Controller
{
    public function index($plano_id, $id)
    {
        $user = auth()->user();
        if(($user->status == 'iniciante' || $user->status == 'ensaio' || $user->status == 'rjm' || $user->status == 'oficial' || $user->status == 'oficializado') && $user->id != $id)
            return redirect('home')->with('erro', 'Permissão negada!');
        $aluno = User::findOrfail($id);
        $modulo1 = [];
        $modulo = Exercicio::where([['modulo', 1],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo1[$i] = $ex;
            $i++;
        }
        $modulo2 = [];
        $modulo = Exercicio::where([['modulo', 2],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo2[$i] = $ex;
            $i++;
        }
        $modulo3 = [];
        $modulo = Exercicio::where([['modulo', 3],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo3[$i] = $ex;
            $i++;
        }
        $modulo4 = [];
        $modulo = Exercicio::where([['modulo', 4],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo4[$i] = $ex;
            $i++;
        }
        $modulo5 = [];
        $modulo = Exercicio::where([['modulo', 5],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo5[$i] = $ex;
            $i++;
        }
        $modulo6a = [];
        $modulo = Exercicio::where([['modulo', 6],['aluno_id', $id],['numero','<=',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo6a[$i] = $ex;
            $i++;
        }
        $modulo6b = [];
        $modulo = Exercicio::where([['modulo', 6],['aluno_id', $id],['numero','>',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo6b[$i] = $ex;
            $i++;
        }
        $modulo7a = [];
        $modulo = Exercicio::where([['modulo', 7],['aluno_id', $id],['numero','<=',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo7a[$i] = $ex;
            $i++;
        }
        $modulo7b = [];
        $modulo = Exercicio::where([['modulo', 7],['aluno_id', $id],['numero','>',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo7b[$i] = $ex;
            $i++;
        }
        $modulo8a = [];
        $modulo = Exercicio::where([['modulo', 8],['aluno_id', $id],['numero','<=',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo8a[$i] = $ex;
            $i++;
        }
        $modulo8b = [];
        $modulo = Exercicio::where([['modulo', 8],['aluno_id', $id],['numero','>',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo8b[$i] = $ex;
            $i++;
        }
        $modulo9a = [];
        $modulo = Exercicio::where([['modulo', 9],['aluno_id', $id],['numero','<=',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo9a[$i] = $ex;
            $i++;
        }
        $modulo9b = [];
        $modulo = Exercicio::where([['modulo', 9],['aluno_id', $id],['numero','>',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo9b[$i] = $ex;
            $i++;
        }
        $modulo10a = [];
        $modulo = Exercicio::where([['modulo', 10],['aluno_id', $id],['numero','<=',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo10a[$i] = $ex;
            $i++;
        }
        $modulo10b = [];
        $modulo = Exercicio::where([['modulo', 10],['aluno_id', $id],['numero','>',10]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo10b[$i] = $ex;
            $i++;
        }
        $modulo11 = [];
        $modulo = Exercicio::where([['modulo', 11],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo11[$i] = $ex;
            $i++;
        }
        $modulo12 = [];
        $modulo = Exercicio::where([['modulo', 12],['aluno_id', $id]])->get();
        $i = 1;
        foreach ($modulo as $ex) {
            $modulo12[$i] = $ex;
            $i++;
        }

        return view('exercicio.index',compact(
            'modulo1',
            'modulo2',
            'modulo3',
            'modulo4',
            'modulo5',
            'modulo6a',
            'modulo6b',
            'modulo7a',
            'modulo7b',
            'modulo8a',
            'modulo8b',
            'modulo9a',
            'modulo9b',
            'modulo10a',
            'modulo10b',
            'modulo11',
            'modulo12',
            'aluno',
            'plano_id'
        ));
    }

    public function show($plano_id, $aluno_id, $id)
    {
        $user = auth()->user();
        if(($user->status == 'iniciante' || $user->status == 'ensaio' || $user->status == 'rjm' || $user->status == 'oficial' || $user->status == 'oficializado') && $user->id != $aluno_id)
            return redirect('home')->with('erro', 'Permissão negada!');

        $aluno = User::findOrfail($aluno_id);

        $exercicio = Exercicio::findOrfail($id);

        $instrutores = User::where('status', 'instrutor')
            ->orWhere('status', 'auxiliar')
            ->orWhere('status', 'enc_local')
            ->orWhere('status', 'enc_regional')
            ->get();
        
        return view('exercicio.show',compact('aluno', 'exercicio', 'instrutores', 'plano_id'));
    }

    public function edit($plano_id, $aluno_id, $id)
    {
        $exercicio = Exercicio::findOrfail($id);
        $aluno = User::findOrfail($exercicio->aluno_id);

        return view('exercicio.edit', compact('exercicio','aluno', 'plano_id'));
    }

    public function update($plano_id, $aluno_id, $id, Request $request)
    {
        $exercicio = Exercicio::findOrfail($id);
    	
        $exercicio->observacoes = $request->observacoes;        
        
        $exercicio->save();

        return redirect('plano/' . $plano_id . '/aluno/' . $aluno_id . '/exercicio/' . $id)->with('success', 'Exercício atualizado com sucesso!');
    }

    public function check($plano_id, $aluno_id, $id)
    {
        $exercicio = Exercicio::findOrfail($id);

        if($exercicio->data == NULL){
            date_default_timezone_set('America/Sao_Paulo');
        
            $exercicio->data = str_replace('-','/',date('d-m-Y'));
            $user = auth()->user();            
            $exercicio->instrutor_id = $user->id;
        }else{
            $exercicio->data = NULL;
            $exercicio->instrutor_id = NULL;
        }

        $exercicio->save();

        return Response::json($exercicio);
    }

}
