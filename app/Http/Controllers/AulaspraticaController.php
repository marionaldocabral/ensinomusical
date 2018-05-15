<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aulaspratica;
use App\User;
use App\Plano;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AulaspraticaController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:33:22am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AulaspraticaController extends Controller
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
        $plano = Plano::findOrfail($plano_id);
        $aulaspraticas = Aulaspratica::where('user_id','=',$aluno_id)->get();
        $tam = sizeof($aulaspraticas);
        for($i = 0; $i < ($tam - 1); $i++)
        {
            $min = $i;
            for($j = ($i + 1); $j < $tam; $j++)
            {
                if(date('Y-m-d', strtotime((str_replace('/', '-', $aulaspraticas[$j]->data)))) < date('Y-m-d', strtotime((str_replace('/', '-', $aulaspraticas[$min]->data)))))
                    $min = $j;
            }
            if($aulaspraticas[$i]->data != $aulaspraticas[$min]->data)
            {
                $aux = $aulaspraticas[$i];
                $aulaspraticas[$i] = $aulaspraticas[$min];
                $aulaspraticas[$min] = $aux;
            }
        }
        return view('aulaspratica.index',compact('aulaspraticas','aluno','plano'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id,$aluno_id)
    {
        $aluno = User::findOrfail($aluno_id);
        $plano = Plano::findOrfail($plano_id);
        $data = date('Y-m-d');
        $aulas = Aulaspratica::where('user_id','=',$aluno_id)->get();
        $metodo = '';
        $pagina = 1;
        $licao = 1;
        if(sizeof($aulas) > 0){
            $ultima_aula = $aulas->last();
            $metodo = $ultima_aula->metodo;
            $pagina = $ultima_aula->pagina;
            if($ultima_aula->apto == true)
                $licao = $ultima_aula->licao + 1;
            else
                $licao = $ultima_aula->licao;
            
        }
        return view('aulaspratica.create',compact('aluno','plano','data','metodo','pagina','licao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store($plano_id,$aluno_id,Request $request)
    {
        $aulaspratica = new Aulaspratica();        
        $aulaspratica->user_id = $aluno_id;
        $data = $request->data;
        $aulaspratica->data = date('d/m/Y', strtotime($data));        
        $aulaspratica->metodo = $request->metodo;
        $aulaspratica->pagina = $request->pagina;
        $aulaspratica->licao = $request->licao;
        $aulaspratica->apto = $request->apto;        
        $aulaspratica->observacao = $request->observacao;

        $aulaspratica->save();
        
        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/metodo')->with('success', 'Aula cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id, $aluno_id, $id)
    {
        $aluno = User::findOrfail($aluno_id);
        $aulaspratica = Aulaspratica::findOrfail($id);
        return view('aulaspratica.show',compact('aulaspratica','aluno','plano_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id, $aluno_id, $id)
    {
        $aluno = User::findOrfail($aluno_id);
        $aulaspratica = Aulaspratica::findOrfail($id);
        $aulaspratica->data = date('Y-m-d', strtotime((str_replace('/', '-', $aulaspratica->data))));
        return view('aulaspratica.edit',compact('plano_id','aulaspratica','aluno'));
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
        $aulaspratica = Aulaspratica::findOrfail($id);
    	
        $aulaspratica->user_id = $request->user_id;
        
        $data = $request->data;

        $aulaspratica->data = date('d/m/Y', strtotime($data));
        
        $aulaspratica->metodo = $request->metodo;

        $aulaspratica->pagina = $request->pagina;

        $aulaspratica->licao = $request->licao;
        
        $aulaspratica->apto = $request->apto;
        
        $aulaspratica->observacao = $request->observacao;        
        
        $aulaspratica->save();

        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/metodo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id,$aluno_id,$id)
    {
     	$aulaspratica = Aulaspratica::findOrfail($id);
     	$aulaspratica->delete();
        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/metodo')->with('success', 'Aula removida com sucesso!');
    }
}
