<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Amranidev\Ajaxis\Ajaxis;
use URL;
use App\User;
use App\Localidade;
use App\Plano;
use App\Chamada;
use App\Aulasteorica;
use App\Instrumento;

class UserController extends Controller
{
	use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

	 public function index()
    {
        $users = User::orderBy('name')->get();
        $localidades = Localidade::all();
        return view('user.index',compact('users','localidades'));
    }

    public function create()
    {        
        $localidades = Localidade::orderBy('nome')->get();
        $planos = Plano::orderBy('ano')->get();
        $instrumentos = Instrumento::orderBy('nome')->get();        
        
        return view('user.create',compact('localidades','planos','instrumentos'));
    }

    public function store(Request $request)
    {
        $email = User::where('email', $request->email)->get();
        if(sizeof($email) != 0){
            return back()->with('erro', 'Email já existe!');
        }

        if(strlen($request->password) < 6){
            return redirect('/user/create')->with('erro', 'A senha deve ter o mínimo de 6 caracteres.');
        }
        else if($request->password == $request->password_confirmation){
            $user = new User();
        
            $user->name = $request->name;
            $user->endereco = $request->endereco;
            $user->bairro = $request->bairro;
            $user->email = $request->email;        
            $user->telefone = $this->remove_mascara($request->telefone);
            $data = $request->nascimento;
            $user->nascimento =  date('d/m/Y', strtotime($data));
            $user->status = $request->status;
            $user->responsavel = $request->responsavel;
            $user->contato_resp = $this->remove_mascara($request->contato_resp);
            $user->email_resp = $request->email_resp;
            $user->localidade_id = $request->localidade_id;
            $user->plano_id = $request->plano_id;
            $user->foto = $request->foto;
            $user->instrumento = $request->instrumento;
            $user->adm = $request->adm;
            $user->password = bcrypt($request->password);        
            
            $user->save();

            if(!is_null($request->foto)){
                $arquivo = \Request::file('foto');

                $caminho = public_path() . '/img-perfis/';
                $extensao = $arquivo->getClientOriginalExtension();
                if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'bmp' && $extensao != 'JPG' && $extensao != 'JPEG' && $extensao != 'PNG' && $extensao != 'BMP'){
                    return back()->with('erro', 'Formato de imagem inválida!');
                }

                $foto = $user->id . '.' . $extensao;

                try {
                    $arquivo->move($caminho, $foto);
                    $user->foto = 'img-perfis/' . $foto;
                    $user->save();                    
                } catch (\Exception $e) {
                    return back()->with('erro', 'Arquivo excedeu o limite máximo (2048KB)!');
                }
                
            }

            return redirect('/user')->with('success', 'Usuário criado com sucesso!');
        }
        else
            return redirect('/user/create')->with('erro', 'Senhas não coincidem!');

        
    }

    public function show($id,Request $request)
    {
        $user = User::findOrfail($id);

        if(strlen($user->telefone) <= 10)
            $user->telefone = '(' . substr($user->telefone, 0, 2) .') ' . substr($user->telefone, 2, 4) . '-' . substr($user->telefone, 6);
        else
            $user->telefone = '(' . substr($user->telefone, 0, 2) .') ' . substr($user->telefone, 2, 5) . '-' . substr($user->telefone, 7);
        
        return view('user.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        $localidade = Localidade::findOrfail($user->localidade_id);
        $localidades = Localidade::orderBy('nome')->get();     
        $plano = Plano::findOrfail($user->plano_id);
        $planos = Plano::orderBy('ano')->get();
        $user->nascimento = date('Y-m-d', strtotime((str_replace('/', '-', $user->nascimento))));
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('user.edit',compact('plano','planos', 'user','instrumentos', 'localidade', 'localidades'));
    }

    public function update($id,Request $request)
    {
        $emails = User::where('email', $request->email)->get();
        if(sizeof($emails) != 0){
            foreach ($emails as $email) {
                if($email->id != $id)
                    return back()->with('erro', 'Email já existe!');
            }
        }

        if(strlen($request->password) < 6 && strlen($request->password) != 0){
            return redirect('user/' . $id . '/edit')->with('erro', 'A senha deve ter o mínimo de 6 caracteres.');
        }
        else if($request->password == $request->password_confirmation){
            $user = User::findOrfail($id);
            
            $user->name = $request->name;
            $user->endereco = $request->endereco;
            $user->bairro = $request->bairro;       
            $user->email = $request->email;        
            $user->telefone = $this->remove_mascara($request->telefone);
            $data = $request->nascimento;
            $user->nascimento =  date('d/m/Y', strtotime($data));
            $user->status = $request->status;
            $user->localidade_id = $request->localidade_id;
            $user->plano_id = $request->plano_id;
            $user->responsavel = $request->responsavel;
            $user->contato_resp = $this->remove_mascara($request->contato_resp);
            $user->email_resp = $request->email_resp;        
            $user->instrumento = $request->instrumento;
            if(strlen($request->password) >= 6 && $request->password == $request->password_confirmation)
                $user->password = bcrypt($request->password);
            
            $user->save();

            if(!is_null($request->foto)){
                $arquivo = \Request::file('foto');

                $caminho = public_path() . '/img-perfis/';
                $extensao = $arquivo->getClientOriginalExtension();
                if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png' && $extensao != 'bmp' && $extensao != 'JPG' && $extensao != 'JPEG' && $extensao != 'PNG' && $extensao != 'BMP'){
                    return back()->with('erro', 'Formato de imagem inválida!');
                }

                $foto = $user->id . '.' . $extensao;

                try {
                    $arquivo->move($caminho, $foto);
                    $user->foto = 'img-perfis/' . $foto;
                    $user->save();                    
                } catch (\Exception $e) {
                    return back()->with('erro', 'Arquivo excedeu o limite máximo (2048KB)!');
                }                
            }

            return redirect('/user')->with('success', 'Usuário atualizado com sucesso!');
        }
        else
            return redirect('user/' . $id . '/edit')->with('erro', 'Senhas não coincidem!');
    }

    public function destroy($id)
    {
        $plano_id = User::findOrfail($id)->plano_id;
        User::destroy($id);

        return redirect('/user')->with('success', 'Usuário removido com sucesso!');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
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