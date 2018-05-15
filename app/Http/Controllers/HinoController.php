<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hino;
use App\User;
use App\Instrumento;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class HinoController.
 *
 * @author  The scaffold-interface created at 2018-04-21 12:45:43am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class HinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($plano_id,$aluno_id)
    {
        $hinos = Hino::where('user_id','=',$aluno_id)->orderBy('numero')->get();
        $aluno = User::findOrfail($aluno_id);
        $instrumento = Instrumento::where('nome','=',$aluno->instrumento)->get()->first();
        $passados = [];
        $soprano = [];
        $contralto = [];
        $tenor = [];
        $baixo = [];
        foreach ($hinos as $hino) {
            if($aluno->status == 'iniciante' || $aluno->status == 'ensaio'){
                if($hino->status == 1 && $hino->finalidade == 1 &&
                ($instrumento->voz == 'Soprano' && ($hino->voz == 1 || $hino->voz == 5 || $hino->voz == 6 || $hino->voz == 7 || $hino->voz == 11 || $hino->voz == 12 || $hino->voz == 13 || $hino->voz == 15)) ||
                ($instrumento->voz == 'Contralto' && ($hino->voz == 2 || $hino->voz == 5 || $hino->voz == 8 || $hino->voz == 9 || $hino->voz == 11 || $hino->voz == 12 || $hino->voz == 14 || $hino->voz == 15)) ||
                ($instrumento->voz == 'Tenor' && ($hino->voz == 3 || $hino->voz == 6 || $hino->voz == 8 || $hino->voz == 10 || $hino->voz == 11 || $hino->voz == 13 || $hino->voz == 14 || $hino->voz == 15)) ||
                ($instrumento->voz == 'Baixo' && ($hino->voz == 4 || $hino->voz == 7 || $hino->voz == 9 || $hino->voz == 10 || $hino->voz == 12 || $hino->voz == 13 || $hino->voz == 14 || $hino->voz == 15)))
                    array_push($passados, $hino->numero);
            }
            elseif($aluno->status == 'rjm'){
                if($hino->status == 1 && $hino->finalidade == 2)
                    array_push($passados, $hino->numero);

            }
            elseif($aluno->status == 'oficial'){
                if($hino->status == 1 && $hino->finalidade == 3){
                    if($hino->voz == 1 || $hino->voz == 5 || $hino->voz == 6 || $hino->voz == 7 || $hino->voz == 11 || $hino->voz == 12 || $hino->voz == 13 || $hino->voz == 15)
                        array_push($soprano, $hino->numero);
                    if($hino->voz == 2 || $hino->voz == 5 || $hino->voz == 8 || $hino->voz == 9 || $hino->voz == 11 || $hino->voz == 12 || $hino->voz == 14 || $hino->voz == 15)
                        array_push($contralto, $hino->numero);
                    if($hino->voz == 3 || $hino->voz == 6 || $hino->voz == 8 || $hino->voz == 10 || $hino->voz == 11 || $hino->voz == 13 || $hino->voz == 14 || $hino->voz == 15)
                        array_push($tenor, $hino->numero);
                    if($hino->voz == 4 || $hino->voz == 7 || $hino->voz == 9 || $hino->voz == 10 || $hino->voz == 12 || $hino->voz == 13 || $hino->voz == 14 || $hino->voz == 15)
                        array_push($baixo, $hino->numero);                    
                }
            }
        }

        $tam = sizeof($hinos);
        for($i = 0; $i < ($tam - 1); $i++)
        {
            $min = $i;
            for($j = ($i + 1); $j < $tam; $j++)
            {
                if(date('Y-m-d', strtotime((str_replace('/', '-', $hinos[$j]->data)))) < date('Y-m-d', strtotime((str_replace('/', '-', $hinos[$min]->data)))))
                    $min = $j;
            }
            if($hinos[$i]->data != $hinos[$min]->data)
            {
                $aux = $hinos[$i];
                $hinos[$i] = $hinos[$min];
                $hinos[$min] = $aux;
            }
        }
        return view('hino.index',compact('hinos','aluno','plano_id','passados','soprano','contralto','tenor','baixo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id,$aluno_id)
    {
        $aluno = User::findOrfail($aluno_id);
        $data = date('Y-m-d');
        $hinos = Hino::where('user_id','=',$aluno_id)->get();
        $numero = 1;
        $voz = 1;
        $finalidade = 1;
        if(sizeof($hinos) > 0){
            $ultimo = $hinos->last();
            $numero = $ultimo->numero;
            $voz = $ultimo->voz;
            $finalidade = $ultimo->finalidade;
            if($ultimo->status == 1)
                $numero++;
        }

        return view('hino.create',compact('aluno','plano_id','data','numero','voz','finalidade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store($plano_id,$aluno_id,Request $request)
    {
        $hino = new Hino();

        
        $hino->user_id = $request->user_id;

        
        $data = $request->data;


        $hino->data = date('d/m/Y', strtotime($data));

        
        $hino->numero = $request->numero;

        
        $hino->voz = $request->voz;

        
        $hino->status = $request->status;

        
        $hino->finalidade = $request->finalidade;

        
        $hino->observacao = $request->observacao;

       
        
        $hino->save();


        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/hino')->with('success', 'Aula cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id,$aluno_id,$id)
    {
        $aluno = User::findOrfail($aluno_id);
        $hino = Hino::findOrfail($id);
        return view('hino.show',compact('hino','plano_id','aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id,$aluno_id,$id)
    {
        $hino = Hino::findOrfail($id);
        $hino->data = date('Y-m-d', strtotime((str_replace('/', '-', $hino->data))));
        $aluno = User::findOrfail($aluno_id);
        return view('hino.edit',compact('hino','plano_id','aluno'));
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
        $hino = Hino::findOrfail($id);
    	
        $hino->user_id = $request->user_id;

        $data = $request->data;
        $hino->data = date('d/m/Y', strtotime($data));
        
        $hino->numero = $request->numero;
        
        $hino->voz = $request->voz;
        
        $hino->status = $request->status;
        
        $hino->finalidade = $request->finalidade;
        
        $hino->observacao = $request->observacao;
        
        
        $hino->save();

        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/hino');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id,$aluno_id,$id)
    {
     	$hino = Hino::findOrfail($id);
     	$hino->delete();
        return redirect('/plano/' . $plano_id . '/aluno/' . $aluno_id . '/hino')->with('success', 'Aula removida com sucesso!');
    }
}
