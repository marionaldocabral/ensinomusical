<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exame;
use App\User;
use App\Avaliacao;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class ExameController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:37:54am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ExameController extends Controller
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
        $aluno = User::findOrfail($aluno_id);
        $exames = Exame::where('user_id','=',$aluno_id)->orderBy('data')->get();

        return view('exame.index',compact('exames','plano_id','aluno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id,$aluno_id)
    {
        $avaliacaos = Avaliacao::where('user_id','=',$aluno_id)->get();
        $aluno = User::findOrfail($aluno_id);
        $data = date('Y-m-d');
        if($aluno->faltas > 8)
            return redirect('plano/' . $plano_id . '/aluno/' . $aluno_id . '/exame')->with('success', 'É necessário repor as aulas de Teoria Musical');
        else{
            $apto = true;
            foreach ($avaliacaos as $avaliacao) {
                if($avaliacao->nota < 7)
                    $apto = false;
            }
            if($apto == true){
                $aluno = User::findOrfail($aluno_id);
                $exames = Exame::where('user_id','=',$aluno_id)->get();
                $nivel;
                if($aluno->status == 'iniciante')
                    $nivel = 1;
                elseif($aluno->status == 'ensaio')
                    $nivel = 2;
                elseif($aluno->status == 'rjm')
                    $nivel = 3;
                else
                    $nivel = 4;
                return view('exame.create', compact('plano_id','aluno','exames','nivel','data'));
            }        
            else
                return redirect('plano/' . $plano_id . '/aluno/' . $aluno_id . '/exame')->with('success', 'É necessário concluir o programa de Teoria Musical');
        }                   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store($plano_id,$aluno_id,Request $request)
    {
        $exame = new Exame();        

        $exame->user_id = $aluno_id;
        $exame->data = date('d/m/Y', strtotime($request->data));        
        $exame->categoria = $request->categoria;        
        $exame->apto = $request->apto;        
        $exame->observacao = $request->observacao;

        $exame->save();

        if($exame->apto == true){
            $aluno = User::findOrfail($aluno_id);
            $aluno->status = $exame->categoria;

            $aluno->save();
        }

        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/exame')->with('success','Exame cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id,$aluno_id,$id,Request $request)
    {
        $exame = Exame::findOrfail($id);
        $aluno = User::findOrfail($aluno_id);
        return view('exame.show',compact('exame','aluno','plano_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id,$aluno_id,$id,Request $request)
    {   
        $exame = Exame::findOrfail($id);
        $exame->data = date('Y-m-d', strtotime((str_replace('/', '-', $exame->data))));
        $aluno = User::findOrfail($aluno_id);
        $nivel;
        if($aluno->status == 'iniciante')
            $nivel = 1;
        elseif($aluno->status == 'ensaio')
            $nivel = 2;
        elseif($aluno->status == 'rjm')
            $nivel = 3;
        else
            $nivel = 4;
        return view('exame.edit',compact('exame','aluno','plano_id','nivel'));
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
        $exame = Exame::findOrfail($id);

        $exame->data = date('d/m/Y', strtotime($request->data));        
    	
        $exame->user_id = $aluno_id;
        
        $exame->categoria = $request->categoria;
        
        $exame->apto = $request->apto;
        
        $exame->observacao = $request->observacao;
        
        
        $exame->save();

        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/exame');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id,$aluno_id,$id)
    {
     	$exame = Exame::findOrfail($id);
     	$exame->delete();
        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/exame')->with('success','Exame removido com sucesso!');
    }
}
