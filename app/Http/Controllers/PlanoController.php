<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plano;
use App\Localidade;
use App\Aulasteorica;
use App\Feriado;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class PlanoController.
 *
 * @author  The scaffold-interface created at 2018-03-06 01:26:56am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class PlanoController extends Controller
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
    public function index()
    {
        $planos = Plano::all();
        $localidades = Localidade::all();
        return view('plano.index',compact('planos','localidades'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - plano';
        $localidades = Localidade::all();
        
        return view('plano.create',compact('localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)


    {
        $ano = $request->ano;
        $localidade_id = $request->localidade_id;
        $planos = Plano::where(function($query) use($ano, $localidade_id) {
            if($ano)
                $query->where('ano', "=", $ano);
            if($localidade_id)
                $query->where('localidade_id', '=', $localidade_id);
        })->get();
        $achei = true;
        $turma = 1;
        while ($achei) {
            $achei = false;
            for($i = 0; $i < sizeof($planos); $i++){
                if($planos[$i]->turma == $turma){
                    $achei = true;
                }
            }
            if($achei)
                $turma++;
        }
        $plano = new Plano();
        $plano->ano = $ano;
        $plano->localidade_id = $localidade_id;
        $plano->turma = $turma;      
        
        $plano->save();

        $data = date('d/m/Y', strtotime($request->data));

        $feriados = Feriado::all();

        for($i = 1; $i <= 35; $i++){
            $aulateorica = new Aulasteorica();
            $aulateorica->numero = $i;      
            $aulateorica->plano_id = $plano->id;
            switch ($i) {                
                case 1:
                    $aulateorica->conteudo = "Música/Som";
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 2:
                    $aulateorica->conteudo = "Ritmo/Propriedades do som";                    
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 3:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 4:
                    $aulateorica->conteudo = "Avaliação";                    
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 5:
                    $aulateorica->conteudo = "Figuras";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 6:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $aulateorica->data = $data;
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    break;
                case 7:
                    $aulateorica->conteudo = "Compasso; Barras de compasso; Fórmula de compasso; Compasso simples; Acentuação métrica dos compassos; Metrônomo;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 8:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 9:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 10:
                    $aulateorica->conteudo = "Pentagrama; Clave; Notas musicais; Escala; Linhas e espaços suplementares; Linha de oitava; Diapasão;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 11:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 12:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 13:
                    $aulateorica->conteudo = "Solfejo; Respiração; Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 14:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 15:
                    $aulateorica->conteudo = "Intervalos; Melodia; Harmonia; Sinais de alteração; Escala cromática; Fermata;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 16:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 17:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 18:
                    $aulateorica->conteudo = "Subdivisão dos tempos; subdivisão binária; Ponto de aumento; Ligatura; Síncopa – contratempo; Endecagrama;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 19:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 20:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 21:
                    $aulateorica->conteudo = "Frases – Motivo – Semifrase; Ritmos iniciais; Terminação das frases; 
                    Bi-subdivisão dos tempos;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 22:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 23:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 24:
                    $aulateorica->conteudo = "Escalas diatônicas maiores – com sustenidos; Escalas diatônicas maiores – com bemóis; Escalas diatônicas menores – relativa; Armadura de clave – acidente; Tonalidade – círculo das quintas;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 25:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 26:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 27:
                    $aulateorica->conteudo = "Subdivisão ternária dos tempos; Quiálteras – tercinas – hemíolas; Compasso composto; Fórmula de compasso – compostos;";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 28:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 29:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 30:
                    $aulateorica->conteudo = "Andamento – dinâmica; Articulação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 31:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 32:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 33:
                    $aulateorica->conteudo = "Expressão; Compassos alternados";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 34:
                    $aulateorica->conteudo = "Exercícios";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;
                case 35:
                    $aulateorica->conteudo = "Avaliação";
                    $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                    $eFeriado = true;
                    while ($eFeriado) {
                        $eFeriado = false;
                        foreach ($feriados as $feriado) {
                            if($feriado->data == $data){
                                $data =  date('d/m/Y', strtotime("+7 days",strtotime(str_replace("/", "-", $data))));
                                $eFeriado = true;
                                break;
                            }
                        }                        
                    }
                    $aulateorica->data = $data;
                    break;                   
            }
            if($i <= 4)
                $aulateorica->modulo = 1;
            elseif ($i > 4 && $i < 7) {
                $aulateorica->modulo = 2;
            }
            elseif ($i > 6 && $i < 10) {
                $aulateorica->modulo = 3;
            }
            elseif ($i > 9 && $i < 13) {
                $aulateorica->modulo = 4;
            }
            elseif ($i > 12 && $i <= 14) {
                $aulateorica->modulo = 5;
            }
            elseif ($i >= 15 && $i < 18) {
                $aulateorica->modulo = 6;
            }
            elseif ($i > 17 && $i < 21) {
                $aulateorica->modulo = 7;
            }
            elseif ($i > 20 && $i < 24) {
                $aulateorica->modulo = 8;
            }
            elseif ($i > 23 && $i < 27) {
                $aulateorica->modulo = 9;
            }
            elseif ($i > 26 && $i <= 29) {
                $aulateorica->modulo = 10;
            }
            elseif ($i > 29 && $i < 33) {
                $aulateorica->modulo = 11;
            }
            else{
                $aulateorica->modulo = 12;
            }
            
            $aulateorica->save();
        }

        return redirect('plano')->with('success', 'Plano cadastrado com sucesso!');
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
        $title = 'Visualizar';

        if($request->ajax())
        {
            return URL::to('plano/'.$id);
        }

        $plano = Plano::findOrfail($id);
        return view('plano.show',compact('title','plano'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - plano';
        if($request->ajax())
        {
            return URL::to('plano/'. $id . '/edit');
        }

        
        $plano = Plano::findOrfail($id);
        $localidades = Localidade::all();
        return view('plano.edit',compact('title','plano','localidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $plano = Plano::findOrfail($id);
    	
        $plano->ano = $request->ano;
        
        $plano->localidade_id = $request->localidade_id;
        
        $plano->turma = $request->turma;
        
        
        $plano->save();

        return redirect('plano');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Plano::destroy($id);

        return redirect('plano')->with('success', 'Plano removido com sucesso!');
    }
}
