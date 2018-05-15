<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidade;
use App\User;
use App\Instrumento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->localidade_id;
        $localidade = Localidade::findOrfail($id);
        $enc_regional = User::findOrfail($localidade->enc_reg_id);
        $enc_local = User::findOrfail($localidade->enc_local_id);

        $musicos = User::where('localidade_id','=',$localidade->id)->orderBy('instrumento')->get();
        $qtd_musicos = 0;
        $soprano = 0;
        $contralto = 0;
        $tenor = 0;
        $baixo = 0;
        $organistas = 0;
        $alunos = 0;
        $alunas = 0;
        $cordas = 0;
        $madeiras = 0;
        $metais = 0;

        foreach ($musicos as $musico) {
            if(($musico->status == 'rjm' || $musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor' || $musico->status == 'enc_local' || $musico->status == 'enc_regional') && $musico->instrumento != 'Órgão'){
                $qtd_musicos++;
                $instrumento = Instrumento::where('nome', '=', $musico->instrumento)->first();
                if($instrumento->voz == 'Soprano')
                    $soprano++;
                elseif($instrumento->voz == 'Contralto')
                    $contralto++;
                elseif($instrumento->voz == 'Tenor')
                    $tenor++;
                elseif($instrumento->voz == 'Baixo')
                    $baixo++;
                if($instrumento->categoria == 'Cordas')
                    $cordas++;
                elseif($instrumento->categoria == 'Madeiras')
                    $madeiras++;
                elseif($instrumento->categoria == 'Matais')
                    $metais++;
            }
            elseif(($musico->status == 'rjm' || $musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor') && $musico->instrumento == 'Órgão')
                $organistas++;

            if(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento != 'Órgão')
                $alunos++;
            elseif(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento == 'Órgão')
                $alunas++;
        }        
        
        return view('home', compact(
            'localidade',
            'enc_regional',
            'enc_local',
            'qtd_musicos',
            'soprano',
            'contralto',
            'tenor',
            'baixo',
            'organistas',
            'alunos',
            'alunas',
            'cordas',
            'madeiras',
            'metais',
            'musicos'
        ));
    }
}
