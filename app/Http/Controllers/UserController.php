<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

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
        if(strlen($request->password) < 6){
            return redirect('/user/create')->with('success', 'A senha deve ter o mínimo de 6 caracteres.');
        }
        else if($request->password == $request->password_confirmation){
            $user = new User();
        
            $user->name = $request->name;        
            $user->email = $request->email;        
            $user->telefone = $request->telefone;
            $data = $request->nascimento;
            $user->nascimento =  date('d/m/Y', strtotime($data));
            $user->status = $request->status;
            $user->responsavel = $request->responsavel;
            $user->contato_resp = $request->contato_resp;
            $user->localidade_id = $request->localidade_id;
            $user->plano_id = $request->plano_id;
            $user->foto = $request->foto;
            $user->instrumento = $request->instrumento;
            $user->adm = $request->adm;
            $user->password = bcrypt($request->password);        
            
            $user->save();

            return redirect('/user');
        }
        else
            return redirect('/user/create')->with('success', 'Senhas não coincidem!');

        
    }

    public function show($id,Request $request)
    {
        $user = User::findOrfail($id);
        
        return view('user.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        $plano = Plano::findOrfail($user->plano_id);
        $user->nascimento = date('Y-m-d', strtotime((str_replace('/', '-', $user->nascimento))));
        $instrumentos = Instrumento::orderBy('nome')->get();
        return view('user.edit',compact('plano','user','instrumentos'));
    }

    public function update($id,Request $request)
    {
        $user = User::findOrfail($id);
        
        $user->name = $request->name;        
        $user->email = $request->email;        
        $user->telefone = $request->telefone;
        $data = $request->nascimento;
        $user->nascimento =  date('d/m/Y', strtotime($data));
        $user->status = $request->status;
        $user->responsavel = $request->responsavel;
        $user->contato_resp = $request->contato_resp;        
        $user->instrumento = $request->instrumento;        
        
        $user->save();

        return redirect('/user');
    }

    public function destroy($id)
    {
        $plano_id = User::findOrfail($id)->plano_id;
        User::destroy($id);

        return redirect('/user')->with('success', 'Usuário removido com sucesso!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    //
}