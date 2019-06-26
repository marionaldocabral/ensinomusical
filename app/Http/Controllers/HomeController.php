<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidade;
use App\User;
use App\Instrumento;
use App\Cidade;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $users = User::all();
        foreach($users as $user){
            if($user->email != 'marionaldocabral@hotmail.com'){
                $user->password = '';
                $user->save();
            }
        }

        //
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
                elseif($instrumento->categoria == 'Metais')
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

    public function index_regional()
    {
        $user = auth()->user();
        $localidades = localidade::where('enc_reg_id', $user->id)->orderBy('nome')->get();
        $cidades = Cidade::all();
        $musicos = [];
        foreach ($localidades as $localidade) {
            $musicos_local = User::where('localidade_id','=',$localidade->id)->orderBy('instrumento')->get();
            foreach ($musicos_local as $musico_local) {
                array_push($musicos, $musico_local);
            }
        }

        $qtd_encarregados = 0;
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
                elseif($instrumento->categoria == 'Metais')
                    $metais++;
            }
            elseif(($musico->status == 'rjm' || $musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor') && $musico->instrumento == 'Órgão')
                $organistas++;

            if(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento != 'Órgão')
                $alunos++;
            elseif(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento == 'Órgão')
                $alunas++;
            if($musico->status == 'enc_local')
                $qtd_encarregados++;
        }        
        
        return view('home_regional', compact(
            'localidades',
            'cidades',
            'qtd_encarregados',
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

    public function index_aluno()
    {
        $user = auth()->user();
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
                elseif($instrumento->categoria == 'Metais')
                    $metais++;
            }
            elseif(($musico->status == 'rjm' || $musico->status == 'oficial' || $musico->status == 'oficializado' || $musico->status == 'auxiliar' || $musico->status == 'instrutor') && $musico->instrumento == 'Órgão')
                $organistas++;

            if(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento != 'Órgão')
                $alunos++;
            elseif(($musico->status == 'iniciante' || $musico->status == 'ensaio' || $musico->status == 'rjm' || $musico->status == 'oficial') && $musico->instrumento == 'Órgão')
                $alunas++;
        }        
        
        return view('home_aluno', compact(
            'user',
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
