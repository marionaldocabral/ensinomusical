<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use App\User;
use App\Localidade;
use App\Cidade;
use App\Plano;
use App\Chamada;
use App\Aulasteorica;
use App\Instrumento;
use App\Avaliacao;
use App\Exercicio;
use App\Aulaspratica;
use App\Hino;
use App\Exame;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($plano_id)
    {
        $plano = Plano::findOrfail($plano_id);
        $alunos = User::where('plano_id','=',$plano_id)->orderBy('name')->get();

        foreach ($alunos as $aluno) {
            if(strlen($aluno->telefone) <= 10)
                $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 4) . '-' . substr($aluno->telefone, 6);
            else
                $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 5) . '-' . substr($aluno->telefone, 7);   
        }
        
        return view('aluno.index',compact('alunos','plano'));
    }

    public function show($plano_id, $id)
    {
        $user = auth()->user();
        if(($user->status == 'iniciante' || $user->status == 'ensaio' || $user->status == 'rjm' || $user->status == 'oficial' || $user->status == 'oficializado') && $user->id != $id)
            return redirect('home')->with('erro', 'Permissão negada!');
        $plano = Plano::findOrfail($plano_id);
        $aluno = User::findOrfail($id);

        if(strlen($aluno->telefone) <= 10)
            $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 4) . '-' . substr($aluno->telefone, 6);
        else
            $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 5) . '-' . substr($aluno->telefone, 7);

        if(strlen($aluno->contato_resp) > 0 && strlen($aluno->contato_resp) <= 10)
            $aluno->contato_resp = '(' . substr($aluno->contato_resp, 0, 2) .') ' . substr($aluno->contato_resp, 2, 4) . '-' . substr($aluno->contato_resp, 6);
        else if(strlen($aluno->contato_resp) > 0)
            $aluno->contato_resp = '(' . substr($aluno->contato_resp, 0, 2) .') ' . substr($aluno->contato_resp, 2, 5) . '-' . substr($aluno->contato_resp, 7);   

        return view('aluno.show',compact('plano','aluno'));
    }

    public function edit($plano_id, $id)
    {   
    	$plano = Plano::findOrfail($plano_id);
        
        $aluno = User::findOrfail($id);        
        $aluno->nascimento = date('Y-m-d', strtotime((str_replace('/', '-', $aluno->nascimento))));
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('aluno.edit',compact('plano','aluno','instrumentos'));
    }

    public function update($plano_id, $id, Request $request)
    {
        $emails = User::where('email', $request->email)->get();
        if(sizeof($emails) != 0){
            foreach ($emails as $email) {
                if($email->id != $id)
                    return back()->with('erro', 'Email já existe!');
            }
        }

        $aluno = User::findOrfail($id);
        
        $aluno->name = $request->name;
        $aluno->endereco = $request->endereco;
        $aluno->bairro = $request->bairro;
        $aluno->email = $request->email;        
        $aluno->telefone = $this->remove_mascara($request->telefone);
        $data = $request->nascimento;
        $aluno->nascimento =  date('d/m/Y', strtotime($data));
        $aluno->status = $request->status;
        $aluno->responsavel = $request->responsavel;
        $aluno->contato_resp = $this->remove_mascara($request->contato_resp); 
        $aluno->email_resp = $request->email_resp;        
        $aluno->instrumento = $request->instrumento;        
        
        $aluno->save();

        if(!is_null($request->foto)){
            $arquivo = \Request::file('foto');
            

            $caminho = public_path() . '/img-perfis/';
            $extensao = $arquivo->getClientOriginalExtension();
            if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'bmp' && $extensao != 'JPG' && $extensao != 'JPEG' && $extensao != 'PNG' && $extensao != 'BMP'){
                return back()->with('erro', 'Formato de imagem inválida!');
            }

            $foto = $aluno->id . '.' . $extensao;
            try {
                $arquivo->move($caminho, $foto);
                $aluno->foto = 'img-perfis/' . $foto;
                $aluno->save();
                
            } catch (\Exception $e) {
                return back()->with('erro', 'Arquivo excedeu o limite máximo (2048KB)!');
                
            }
            
        }

        return redirect('/plano/' . $aluno->plano_id . '/aluno')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function create($plano_id)
    {        
        $plano = Plano::findOrfail($plano_id);
        $instrumentos = Instrumento::orderBy('nome')->get();
        
        return view('aluno.create',compact('plano','instrumentos'));
    }

    public function store(Request $request)
    {
        $email = User::where('email', $request->email)->get();
        if(sizeof($email) != 0){
            return back()->with('erro', 'Email já existe!');
        }

        $aluno = new User();
        
        $aluno->name = $request->name;
        $aluno->endereco = $request->endereco;
        $aluno->bairro = $request->bairro;
        $aluno->email = $request->email;        
        $aluno->telefone = remove_mascara($request->telefone);
        $data = $request->nascimento;
        $aluno->nascimento =  date('d/m/Y', strtotime($data));
        $aluno->status = $request->status;
        $aluno->responsavel = $request->responsavel;
        $aluno->contato_resp = remove_mascara($request->contato_resp);
        $aluno->email_resp = $request->email_resp;
        $aluno->localidade_id = $request->localidade_id;
        $aluno->plano_id = $request->plano_id;
        $aluno->foto = $request->foto;
        $aluno->instrumento = $request->instrumento;
        $aluno->adm = $request->adm;
        $aluno->password = bcrypt("teoriamusical");

        $aluno->save();

        if(!is_null($request->foto)){
            $arquivo = \Request::file('foto');

            $caminho = public_path() . '/img-perfis/';
            $extensao = $arquivo->getClientOriginalExtension();
            if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'bmp'){
                return back()->with('erro', 'Formato de imagem inválida!');
            }

            $foto = $aluno->id . '.' . $extensao;

            try {
                $arquivo->move($caminho, $foto);
                $aluno->foto = 'img-perfis/' . $foto;
                $aluno->save();                
            } catch (\Exception $e) {
                return back()->with('erro', 'Arquivo excedeu o limite máximo (2048KB)!');
            }
        }

        $aulas = Aulasteorica::where('plano_id', '=', $aluno->plano_id)->get();
        foreach ($aulas as $aula) {
            $chamada = new Chamada();
            $chamada->aula_id = $aula->id;
            $chamada->user_id = $aluno->id;
            $chamada->status = true; //presente
            $chamada->save();
        }

        for($i = 1; $i <= 12; $i++){
            $avaliacao =  new Avaliacao();
            $avaliacao->plano_id = $aluno->plano_id;
            $avaliacao->user_id = $aluno->id;
            $avaliacao->modulo = $i;
            $avaliacao->save();
        }

        for($modulo = 1; $modulo <= 12; $modulo++){
            $lim;
            if($modulo == 6 || $modulo == 7 || $modulo == 8 || $modulo == 9 || $modulo == 10)
                $lim = 20;
            else
                $lim = 10;
            for($numero = 1; $numero <= $lim; $numero++){
                $exercicio = new Exercicio();
                $exercicio->modulo = $modulo;
                $exercicio->numero = $numero;

                if($modulo == 1){
                    if($numero < 9)
                        $exercicio->pagina = 8;
                    else
                        $exercicio->pagina = 9;
                }
                if($modulo == 2){
                    if($numero < 7)
                        $exercicio->pagina = 12;
                    else
                        $exercicio->pagina = 13;
                }
                if($modulo == 3){
                    if($numero < 4)
                        $exercicio->pagina = 17;
                    else
                        $exercicio->pagina = 19;
                }
                if($modulo == 4){
                    if($numero < 6)
                        $exercicio->pagina = 23;
                    elseif($numero == 6)
                        $exercicio->pagina = 24;
                    else
                        $exercicio->pagina = 25;
                }
                if($modulo == 5){
                    if($numero < 10)
                        $exercicio->pagina = 30;
                    else
                        $exercicio->pagina = 31;
                }
                if($modulo == 6){
                    if($numero < 4)
                        $exercicio->pagina = 34;
                    elseif($numero < 7)
                        $exercicio->pagina = 35;
                    elseif($numero < 14)
                        $exercicio->pagina = 36;
                    elseif($numero == 15)
                        $exercicio->pagina = 38;
                    elseif($numero == 16)
                        $exercicio->pagina = 39;
                    elseif($numero == 17)
                        $exercicio->pagina = 40;
                    elseif($numero == 18)
                        $exercicio->pagina = 41;
                    elseif($numero == 19)
                        $exercicio->pagina = 42;
                    else
                        $exercicio->pagina = 43;
                }
                if($modulo == 7){
                    if($numero < 5)
                        $exercicio->pagina = 40;
                    elseif($numero < 7)
                        $exercicio->pagina = 41;
                    elseif($numero < 9)
                        $exercicio->pagina = 42;
                    elseif($numero == 12)
                        $exercicio->pagina = 43;
                    elseif($numero == 18)
                        $exercicio->pagina = 44;
                    else
                        $exercicio->pagina = 45;
                }
                if($modulo == 8){
                    if($numero < 3)
                        $exercicio->pagina = 48;
                    elseif($numero < 5)
                        $exercicio->pagina = 49;
                    elseif($numero < 8)
                        $exercicio->pagina = 50;
                    elseif($numero == 11)
                        $exercicio->pagina = 51;
                    else
                        $exercicio->pagina = 52;
                }
                if($modulo == 9){
                    if($numero < 3)
                        $exercicio->pagina = 56;
                    elseif($numero < 7)
                        $exercicio->pagina = 59;
                    elseif($numero < 12)
                        $exercicio->pagina = 60;
                    else
                        $exercicio->pagina = 61;
                }
                if($modulo == 10){
                    if($numero < 4)
                        $exercicio->pagina = 65;
                    elseif($numero < 11)
                        $exercicio->pagina = 66;
                    elseif($numero < 16)
                        $exercicio->pagina = 68;
                    else
                        $exercicio->pagina = 69;
                }
                if($modulo == 11){
                    if($numero < 3)
                        $exercicio->pagina = 73;
                    else
                        $exercicio->pagina = 74;
                }
                if($modulo == 12){
                    if($numero < 3)
                        $exercicio->pagina = 77;
                    elseif($numero == 7)
                        $exercicio->pagina = 78;
                    elseif($numero < 6)
                        $exercicio->pagina = 79;
                    elseif($numero < 8)
                        $exercicio->pagina = 80;
                    else
                        $exercicio->pagina = 81;
                }
                $exercicio->aluno_id = $aluno->id;
                $exercicio->save();
            }
        }

        if($aluno->instrumento == 'Órgão')
            $msg = 'Aluna cadastrada com sucesso!';
        else
            $msg = 'Aluno cadastrado com sucesso!';

        return redirect('/plano/' . $aluno->plano_id . '/aluno')->with('success', $msg);
    }

    public function destroy($plano_id, $id)
    {
        $plano = Plano::findOrfail($plano_id);
        if($plano->ano == 1970)
            return redirect('/plano/' . $plano_id . '/aluno')->with('erro', 'Permissão negada!');

        User::destroy($id);

        return redirect('/plano/' . $plano_id . '/aluno')->with('success', 'Aluno removido com sucesso!');
    }

    public function relatorio($plano_id, $id){
        $aluno = User::findOrfail($id);

        if(strlen($aluno->telefone) <= 10)
            $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 4) . '-' . substr($aluno->telefone, 6);
        else
            $aluno->telefone = '(' . substr($aluno->telefone, 0, 2) .') ' . substr($aluno->telefone, 2, 5) . '-' . substr($aluno->telefone, 7);


        $localidade = Localidade::findOrfail($aluno->localidade_id);
        $cidade = Cidade::findOrfail($localidade->cidade_id);
        $plano = Plano::findOrfail($aluno->plano_id);
        $modulo1 = Exercicio::where([['modulo', 1],['aluno_id',$id]])->get();
        $modulo2 = Exercicio::where([['modulo', 2],['aluno_id',$id]])->get();
        $modulo3 = Exercicio::where([['modulo', 3],['aluno_id',$id]])->get();
        $modulo4 = Exercicio::where([['modulo', 4],['aluno_id',$id]])->get();
        $modulo5 = Exercicio::where([['modulo', 5],['aluno_id',$id]])->get();
        $modulo6 = Exercicio::where([['modulo', 6],['aluno_id',$id]])->get();
        $modulo7 = Exercicio::where([['modulo', 7],['aluno_id',$id]])->get();
        $modulo8 = Exercicio::where([['modulo', 8],['aluno_id',$id]])->get();
        $modulo9 = Exercicio::where([['modulo', 9],['aluno_id',$id]])->get();
        $modulo10 = Exercicio::where([['modulo', 10],['aluno_id',$id]])->get();
        $modulo11 = Exercicio::where([['modulo', 11],['aluno_id',$id]])->get();
        $modulo12 = Exercicio::where([['modulo', 12],['aluno_id',$id]])->get();
        $aula = Aulasteorica::where([['plano_id', $plano_id],['numero', 1]])->first();
        $obs = Exercicio::where([['observacoes', '!=', NULL],['aluno_id',$id]])->get();
        $exs = [];
        $i = 1;
        foreach ($obs as $ob) {
            $exs[$i] = $ob->observacoes;
            if($i == 11)
                break;
            $i++;
        }
        $instrutores = User::where('status','auxiliar')
            ->orWhere('status','instrutor')
            ->orWhere('status','enc_local')
            ->orWhere('status','enc_regional')
            ->get();
        foreach ($instrutores as $instrutor) {
            $instrutor->name = substr($instrutor->name, 0, 10);
        }

        $licaos = Aulaspratica::where([['apto', 1],['user_id',$id]])->get();
        $metodos = [];
        $i = 1;
        foreach ($licaos as $licao) {
            $metodos[$i] = $licao;
            $metodos[$i]->observacao = substr($metodos[$i]->observacao, 0, 28);
            $i++;
        }

        $hinos = Hino::where([
            ['user_id', $id],
            ['status', 1]
        ])->distinct('numero')->get();
        
        $soprano = [];
        $contralto = [];
        $tenor = [];
        $baixo = [];
        $hino_obs = [];
        $i = 1;

        foreach ($hinos as $hino) {
            if(in_array($hino->voz, array(1,5,6,7,11,12,13,15)))
                $soprano[$hino->numero] = $hino;
            if(in_array($hino->voz, array(2,5,8,9,11,12,14,15)))
                $contralto[$hino->numero] = $hino;
            if(in_array($hino->voz, array(3,6,8,10,11,13,14,15)))
                $tenor[$hino->numero] = $hino;
            if(in_array($hino->voz, array(4,7,9,10,12,13,14,15)))
                $baixo[$hino->numero] = $hino;
            if($hino->observacao != NULL){
                $hino_obs[$i] = $hino->observacao;
                $i++;
            }
        }

        $avaliacaos = Avaliacao::where('user_id', $id)->orderBy('modulo')->get();

        foreach($avaliacaos as $av) {
            if($av->nota != NULL){
                $av->nota = number_format($av->nota, 1, '.', '');
            }
        }

        $teste_ensaio = Exame::where([
            ['apto', 1],
            ['user_id', $id],
            ['categoria', 'ensaio']
        ])->first();
        $teste_rjm = Exame::where([
            ['apto', 1],
            ['user_id', $id],
            ['categoria', 'rjm']
        ])->first();
        $teste_culto = Exame::where([
            ['apto', 1],
            ['user_id', $id],
            ['categoria', 'oficial']
        ])->first();
        $teste_oficial = Exame::where([
            ['apto', 1],
            ['user_id', $id],
            ['categoria', 'oficializacao']
        ])->first();
    
        return view('aluno.relatorio', compact(
            'aluno',
            'localidade',
            'cidade',
            'modulo1',
            'modulo2',
            'modulo3',
            'modulo4',
            'modulo5',
            'modulo6',
            'modulo7',
            'modulo8',
            'modulo9',
            'modulo10',
            'modulo11',
            'modulo12',
            'instrutores',
            'plano',
            'aula',
            'exs',
            'metodos',
            'soprano',
            'contralto',
            'tenor',
            'baixo',
            'hino_obs',
            'avaliacaos',
            'teste_ensaio',
            'teste_rjm',
            'teste_culto',
            'teste_oficial'
        ));
    }

    public function remove_mascara($telefone){
        $resultado = '';        
        for($i = 0; $i < strlen($telefone); $i++){            
            if($telefone[$i] == '0' ||
                $telefone[$i] == '1' ||
                $telefone[$i] == '2' ||
                $telefone[$i] == '3' ||
                $telefone[$i] == '4' ||
                $telefone[$i] == '5' ||
                $telefone[$i] == '6' ||
                $telefone[$i] == '7' ||
                $telefone[$i] == '8' ||
                $telefone[$i] == '9')
               $resultado =  $resultado . $telefone[$i];
        }
        return $resultado;
    }
}
