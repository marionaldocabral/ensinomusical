<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recurso;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RecursoController.
 *
 * @author  The scaffold-interface created at 2018-03-26 06:33:38pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RecursoController extends Controller
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
        $recursos = Recurso::where('aula_id','=',$aula_id)->get();
        return view('recurso.index',compact('plano_id','aula_id','recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create($plano_id,$aula_id)
    {
        return view('recurso.create', compact('plano_id','aula_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store($plano_id,$aula_id,Request $request)
    {
        $recurso = new Recurso();

        
        $recurso->aula_id = $aula_id;

        
        $recurso->descricao = $request->descricao;

        
        $recurso->link = $request->link;
        
        
        $recurso->save();


        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso')->with('success','Recurso cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - recurso';

        if($request->ajax())
        {
            return URL::to('recurso/'.$id);
        }

        $recurso = Recurso::findOrfail($id);
        return view('recurso.show',compact('title','recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($plano_id,$aula_id,$id,Request $request)
    {   
        $recurso = Recurso::findOrfail($id);
        return view('recurso.edit',compact('plano_id','aula_id','recurso'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($plano_id,$aula_id,$id,Request $request)
    {
        $recurso = Recurso::findOrfail($id);
    	
        $recurso->aula_id = $aula_id;
        
        $recurso->descricao = $request->descricao;
        
        $recurso->link = $request->link;        
        
        $recurso->save();

        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($plano_id,$aula_id,$id)
    {
     	$recurso = Recurso::findOrfail($id);
     	$recurso->delete();
        return redirect('/plano/' . $plano_id . '/aula/' . $aula_id . '/recurso')->with('success','Recurso removido com sucesso!');
    }
}
