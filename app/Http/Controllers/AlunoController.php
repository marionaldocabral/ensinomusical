<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Localidade;
use App\Plano;
use App\Chamada;
use App\Aulasteorica;
use App\Instrumento;
use App\Avaliacao;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($plano_id)
    {
        $alunos = User::where('plano_id','=',$plano_id)->orderBy('name')->get();
        $plano = Plano::findOrfail($plano_id);
        return view('aluno.index',compact('alunos','plano'));
    }

    public function show($plano_id, $id)
    {        
        $plano = Plano::findOrfail($plano_id);
        $aluno = User::findOrfail($id);
        return view('aluno.show',compact('plano','aluno'));
    }

    public function edit($plano_id, $id)
    {   
    	$plano = Plano::findOrfail($plano_id);
        $aluno = User::findOrfail($id);        
        $aluno->nascimento = date('Y-m-d', strtotime((str_replace('/', '-', $aluno->nascimento))));
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('aluno.edit',compact('plano','aluno','instrumentos'));
    }

    public function update($plano_id, $id, Request $request)
    {

        $aluno = User::findOrfail($id);
        
        $aluno->name = $request->name;
        $aluno->email = $request->email;        
        $aluno->telefone = $request->telefone;
        $data = $request->nascimento;
        $aluno->nascimento =  date('d/m/Y', strtotime($data));
        $aluno->status = $request->status;
        $aluno->responsavel = $request->responsavel;
        $aluno->contato_resp = $request->contato_resp;        
        $aluno->email_resp = $request->email_resp;        
        $aluno->instrumento = $request->instrumento;        
        
        $aluno->save();

        return redirect('/plano/' . $aluno->plano_id . '/aluno');
    }

    public function create($plano_id)
    {        
        $plano = Plano::findOrfail($plano_id);
        $instrumentos = Instrumento::orderBy('nome')->get();
        
        return view('aluno.create',compact('plano','instrumentos'));
    }

    public function store(Request $request)
    {
        $aluno = new User();
        
        $aluno->name = $request->name;        
        $aluno->email = $request->email;        
        $aluno->telefone = $request->telefone;
        $data = $request->nascimento;
        $aluno->nascimento =  date('d/m/Y', strtotime($data));
        $aluno->status = $request->status;
        $aluno->responsavel = $request->responsavel;
        $aluno->contato_resp = $request->contato_resp;
        $aluno->email_resp = $request->email_resp;
        $aluno->localidade_id = $request->localidade_id;
        $aluno->plano_id = $request->plano_id;
        $aluno->foto = $request->foto;
        $aluno->instrumento = $request->instrumento;
        $aluno->adm = $request->adm;
        $aluno->password = bcrypt("teoriamusical");        
        
        $aluno->save();

        $aulas = Aulasteorica::where('plano_id', '=', $aluno->plano_id)->get();
        foreach ($aulas as $aula) {
            $chamada = new Chamada();
            $chamada->aula_id = $aula->id;
            $chamada->user_id = $aluno->id;
            $chamada->status = true; //presente
            $chamada->save();
        }

        for($i = 1; $i <= 12; $i++){
            $avaliacao =  new Avaliacao();
            $avaliacao->plano_id = $aluno->plano_id;
            $avaliacao->user_id = $aluno->id;
            $avaliacao->modulo = $i;
            $avaliacao->save();
        }

        return redirect('/plano/' . $aluno->plano_id . '/aluno')->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function destroy($plano_id, $id)
    {
        User::destroy($id);

        return redirect('/plano/' . $plano_id . '/aluno')->with('success', 'Aluno removido com sucesso!');
    }


    
}
