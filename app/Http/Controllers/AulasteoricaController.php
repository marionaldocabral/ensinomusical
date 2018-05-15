<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aulasteorica;
use App\Plano;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class AulasteoricaController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:30:03am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class AulasteoricaController extends Controller
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
    public function index($plano_id)
    {
        $aulasteoricas = Aulasteorica::all();
        $plano = Plano::findOrfail($plano_id);
        $ultimaaula = 1;
        foreach ($aulasteoricas as $aulasteorica) {
            if($aulasteorica->numero >= $ultimaaula){
                $ultimaaula = $aulasteorica->numero;
            }
        }
        $tam = sizeof($aulasteoricas);
        for($i = 0; $i < ($tam - 1); $i++)
        {
            $min = $i;
            for($j = ($i + 1); $j < $tam; $j++)
            {
                if(date('Y-m-d', strtotime((str_replace('/', '-', $aulasteoricas[$j]->data)))) < date('Y-m-d', strtotime((str_replace('/', '-', $aulasteoricas[$min]->data)))))
                    $min = $j;
            }
            if($aulasteoricas[$i]->data != $aulasteoricas[$min]->data)
            {
                $aux = $aulasteoricas[$i];
                $aulasteoricas[$i] = $aulasteoricas[$min];
                $aulasteoricas[$min] = $aux;
            }
        }        
        return view('aulasteorica.index',compact('aulasteoricas','plano','ultimaaula'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id)
    {
        $plano = Plano::findOrfail($plano_id);
        $aulas = Aulasteorica::all();
        $achei = true;
        $numero = 1;
        while ($achei) {
            $achei = false;
            for($i = 0; $i < sizeof($aulas); $i++){
                if($aulas[$i]->numero == $numero){
                    $achei = true;
                }
            }
            if($achei)
                $numero++;
        }
        
        return view('aulasteorica.create', compact('plano','numero'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aulasteorica = new Aulasteorica();

        
        $aulasteorica->plano_id = $request->plano_id;        
        $data = $request->data;
        $aulasteorica->data =  date('d/m/Y', strtotime($data));        
        $aulasteorica->modulo = $request->modulo;        
        $aulasteorica->numero = $request->numero;        
        $aulasteorica->conteudo = $request->conteudo; 
        
        $aulasteorica->save();

        return redirect('plano/' . $aulasteorica->plano_id . '/aula')->with('success', 'Aula cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($plano_id,$id,Request $request)
    {
        $aula = Aulasteorica::findOrfail($id);
        $plano = Plano::findOrfail($aula->plano_id);
        return view('aulasteorica.show',compact('aula','plano'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id,$id,Request $request)
    {
        if($request->ajax())
        {
            return URL::to('aula/'. $id . '/edit');
        }
        
        $aula = Aulasteorica::findOrfail($id);
        $plano = Plano::findOrfail($aula->plano_id);
        $data = date('Y-m-d', strtotime((str_replace('/', '-', $aula->data))));

        return view('aulasteorica.edit',compact('aula','plano', 'data'));
    }

    public function aula($id)
    {
        $aulasteoricas = Aulasteorica::where('plano_id','=',$id)->get();
        $plano = Plano::findOrfail($id);
        $ultimaaula = 1;
        foreach ($aulasteoricas as $aulasteorica) {
            if($aulasteorica->numero >= $ultimaaula){
                $ultimaaula = $aulasteorica->numero;
            }
        }
        
        return view('aulasteorica.index',compact('aulasteoricas','plano','ultimaaula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($plano_id,$id,Request $request)
    {
        $aulasteorica = Aulasteorica::findOrfail($id);

        $data = $request->data;
    	        
        $aulasteorica->data =  date('d/m/Y', strtotime($data));
        
        $aulasteorica->modulo = $request->modulo;
        
        $aulasteorica->conteudo = $request->conteudo;        
        
        $aulasteorica->save();

        return redirect('plano/' . $aulasteorica->plano_id . '/aula');
    }

       
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id, $id)
    {
     	$aulasteorica = Aulasteorica::findOrfail($id);
        $plano_id = $aulasteorica->plano_id;
     	$aulasteorica->delete();
        return redirect('plano/' . $plano_id . '/aula')->with('success', 'Aula removida com sucesso!');
    }
}
