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
use Illuminate\Support\Facades\DB;
use URL;

class PlanoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $localidade_id = auth()->user()->localidade_id;
        $planos = DB::table('planos')
            ->where('localidade_id', $localidade_id)
            ->orderBy('ano', 'desc')
            ->orderBy('turma')
            ->paginate(6);
        $localidade = Localidade::findOrfail($localidade_id);
        return view('plano.index',compact('planos','localidade'));
    }

    public function create()
    {
        $localidades = Localidade::all();
        
        return view('plano.create',compact('localidades'));
    }

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
                    $aulateorica->conteudo = "Música/Som - Pág. 7";
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
                    $aulateorica->conteudo = "Ritmo/Propriedades do som - Pág. 7-9";                    
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
                    $aulateorica->conteudo = "Exercícios - Pág. 8-10";
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
                    $aulateorica->conteudo = "Figuras; Exercícios - Pág. 11-14";
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
                    $aulateorica->conteudo = "Compasso; Barras de compasso; Fórmula de compasso; Compasso simples; Acentuação métrica dos compassos; Metrônomo - Pág. 15-18";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 17, 19 e 20";
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
                    $aulateorica->conteudo = "Pentagrama; Clave; Notas musicais; Escala; Linhas e espaços suplementares; Linha de oitava; Diapasão - Pág. 21-24";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 23-26";
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
                    $aulateorica->conteudo = "Solfejo; Respiração; Exercícios - Pág. 27-31";
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
                    $aulateorica->conteudo = "Intervalos; Melodia; Harmonia; Sinais de alteração; Escala cromática; Fermata - Pág. 32-35";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 34-38";
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
                    $aulateorica->conteudo = "Subdivisão dos tempos; subdivisão binária; Ponto de aumento; Ligatura; Síncopa – contratempo; Endecagrama - Pág. 39-43";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 40-45";
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
                    Bi-subdivisão dos tempos - Pág. 46-50";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 48-53";
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
                    $aulateorica->conteudo = "Escalas diatônicas maiores – com sustenidos; Escalas diatônicas maiores – com bemóis; Escalas diatônicas menores – relativa; Armadura de clave – acidente; Tonalidade – círculo das quintas - Pág. 54, 55, 57 e 58";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 56 e 59-62";
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
                    $aulateorica->conteudo = "Subdivisão ternária dos tempos; Quiálteras – tercinas – hemíolas; Compasso composto; Fórmula de compasso – compostos - Pág. 63, 64, 67";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 65, 66 e 68-70";
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
                    $aulateorica->conteudo = "Andamento – dinâmica; Articulação - Pág. 71-72";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 73-75";
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
                    $aulateorica->conteudo = "Expressão; Compassos alternados - Pág. 76 e 78";
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
                    $aulateorica->conteudo = "Exercícios - Pág. 77-82";
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

    public function destroy($id)
    {
        $plano = Plano::findOrfail($id);
        if($plano->ano == 1970)
            return redirect('plano')->with('success', 'Permissão negada!');
        Plano::destroy($id);

        return redirect('plano')->with('success', 'Plano removido com sucesso!');
    }
}