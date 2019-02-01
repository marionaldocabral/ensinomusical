<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Localidade;
use App\Cidade;
use App\User;
use App\Regional_localidade;
use Illuminate\Support\Facades\DB;
use Amranidev\Ajaxis\Ajaxis;
use URL;

class LocalidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $localidades = Localidade::orderBy('nome')->get();
        $cidades = Cidade::all();
        $regionais = User::where('status','=','enc_regional')->get();
        $locais =  User::where('status','=','enc_local')->get();

        return view('localidade.index',compact('localidades','cidades','regionais','locais'));
    }

    public function create()
    {
        $cidades = Cidade::orderBy('nome')->get();
        $users = User::where('status','=','regional')->orderBy('name')->get();
        $locais = User::where('status','=','local')->orderBy('name')->get();
        
        return view('localidade.create', compact('cidades','regionais','locais'));
    }

    public function store(Request $request)
    {
        $localidade = new Localidade();

        $localidade->nome = $request->nome;
        
        $localidade->cidade_id = $request->cidade_id;

        $localidade->enc_reg_id = $request->enc_reg_id;
        
        $localidade->enc_local_id = $request->enc_local_id;

        $localidade->save();

        return redirect('localidade')->with('success', 'Localidade criada com sucesso!');
    }

    public function show($id,Request $request)
    {
        $localidade = Localidade::findOrfail($id);
        $cidade = Cidade::findOrfail($localidade->cidade_id);
        $regional = User::findOrfail($localidade->enc_reg_id);
        $local = User::findOrfail($localidade->enc_local_id);
        return view('localidade.show',compact('localidade','cidade','regional', 'local'));
    }

    public function edit($id,Request $request)
    {
        $localidade = Localidade::findOrfail($id);
        $cidades = Cidade::all();
        $regionais = User::where('status','enc_regional')->get();
        $locais =  User::where('status','enc_local')->get();
        return view('localidade.edit',compact('localidade','cidades','regionais','locais'));
    }

    public function update($id,Request $request)
    {
        $localidade = Localidade::findOrfail($id);
    	
        $localidade->nome = $request->nome;
        
        $localidade->cidade_id = $request->cidade_id;
        
        $localidade->enc_reg_id = $request->enc_reg_id;
        
        $localidade->enc_local_id = $request->enc_local_id;
        
        $localidade->save();

        return redirect('localidade')->with('success', 'Localidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
     	$localidade = Localidade::findOrfail($id);
     	$localidade->delete();
        return redirect('localidade')->with('success', 'Localidade removida com sucesso!');
    }
}