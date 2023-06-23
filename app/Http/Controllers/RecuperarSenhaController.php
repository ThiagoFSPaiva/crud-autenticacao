<?php

namespace App\Http\Controllers;

use App\Mail\NovaSenhaMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RecuperarSenhaController extends Controller
{

    public function index()
    {
        return view('recuperar-senha');
    }

    public function enviarEmail(Request $request)
    {
        // RECUPERA DADOS DO FORM
        $cpf = $request->input('cpf');
        $cpf = str_replace('-', '', $cpf); // Remove os hifens
        $cpf = str_replace('.', '', $cpf); // Remove os pontos
        $cpf = str_replace(' ', '', $cpf);
        $user = User::where('cpf', $cpf)->first();

        // VERIFICA SE O USUARIO ESTÁ CADASTRADO
        if (!$user) {
            session()->flash('erro', ['Não existe o usuario indicado']);
            return response()->json(
                [
                    'redirect_url' => 'login',
                    'erro'      => 'Não existe o usuario indicado'
                ]
            );
        }

        // GERA UMA SENHA ALEATORIOA
        $novaSenha = substr(md5(mt_rand()), 0, 8);

        // FAZ O HASK DE SENHA E ATUALIZA E SALVA NO BANCO
        $user->senha = Hash::make($novaSenha);
        $user->save();

        // ENVIA O EMAIL COM A NOVA SENHA
        Mail::to($user->email)->send(new NovaSenhaMail($novaSenha));

        //RETORNA PRO FRONT-END
        return response()->json(['success' => 'Uma nova senha foi enviada para o e-mail cadastrado']);
    }

}
