<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\AvisoDeFalta;
use App\Localidade;
use App\Aulasteorica;

class FaltaMailController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($plano_id,$aula_id,$id)
    {
    	$aula = Aulasteorica::findOrfail($aula_id);
    	$aluno = User::findOrfail($id);
    	$remetente = auth()->user();
    	Mail::to($aluno->email_resp)->send(new AvisoDeFalta($remetente,$aluno->name,$aula->data));
    	return redirect('/plano/'. $plano_id . '/aula/' . $aula_id . '/chamada/');
    }
}
