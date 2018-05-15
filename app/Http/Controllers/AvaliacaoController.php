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

/**
 * Class AvaliacaoController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:36:28am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AvaliacaoController extends Controller
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
    public function index($plano_id,$aluno_id)
    {
        $avaliacaos = Avaliacao::where('user_id','=',$aluno_id)->get();
        $aluno = User::findOrfail($aluno_id);
        $aprovado = true;
        foreach ($avaliacaos as $avaliacao) {
            if($avaliacao->nota < 7)
                $aprovado = false;
        }
        return view('avaliacao.index',compact('avaliacaos','plano_id','aluno','aprovado'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id,$aluno_id,$id,Request $request)
    {
        $aluno = User::findOrfail($aluno_id);
        $avaliacao = Avaliacao::findOrfail($id);
        return view('avaliacao.edit',compact('avaliacao','plano_id','aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($plano_id,$aluno_id,$id,Request $request)
    {
        $avaliacao = Avaliacao::findOrfail($id);
        
        $avaliacao->nota = $request->nota;
        
        
        $avaliacao->save();

        return redirect('plano/' . $plano_id . '/aluno/' . $aluno_id . '/avaliacao');
    }
}
