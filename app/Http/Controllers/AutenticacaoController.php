<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AutenticacaoController extends Controller
{
    public function redefinirSenhaView()
    {
        return view('redefinir-senha');
    }

    public function cadastroview()
    {
        return view('cadastro');
    }

    public function index()
    {
        if ($this->checarSessao()) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login');
        }

    }

    public function login()
    {
        if ($this->checarSessao()) {
            return redirect()->route('index');
        }
        return view('login');
    }

    private function checarSessao()
    {
        return session()->has('user');
    }

    public function cadastro(Request $request)
    {
        // recupera os dados do formulário
        $dados = $request->all();

        // verifica se já existe um usuário com o mesmo CPF
        $cpf = $dados['cpf'];
        $existe = User::where('cpf', $cpf)->exists();
        if ($existe) {
            return response()->json(['mensagem' => 'Já existe um usuário com este CPF.'], 400);
        }

        // cria o novo usuário
        $user = new User;
        $user->nome = $dados['nome'];
        $user->cpf = $cpf;
        $user->email = $dados['email'];
        $user->senha = bcrypt($dados['senha']);
        $user->save();

        return response()->json(['redirect_url' => 'login']);
    }

    public function loginsubmit(Request $request)
    {
        // VERIFICA SE EXISTE A SESSAO
        if ($this->checarSessao()) {
            return redirect()->route('index');
        }
        // VERIFICA SE HOUVE POST NO FORM
        if (!$request->isMethod('post')) {
            return redirect()->route('index');
        }

        // RECUPERA DADOS DO FORM
        $cpf = $request->input('cpf');
        $senha = $request->input('senha');

        // VERIFICA SE O USUARIO EXISTE NO BANCO DE DADOS
        $user = User::where('cpf', $cpf)->first();
        if (!$user) {
            session()->flash('erro', ['Cpf ou senha incorreto']);
            return response()->json(
                [
                    'redirect_url' => 'login',
                    'message'      => 'Cpf ou senha incorreto'
                ]
            );
        }

        // VERIFICA SE A SENHA ESTA CORRETA
        if (!Hash::check($senha, $user->senha)) {
            session()->flash('erro', ['Cpf ou senha incorreto']);
            return response()->json(
                [
                    'redirect_url' => 'login',
                    'message'      => 'Cpf ou senha incorreto'
                ]
            );
        }

        // CRIA A SESSAO
        session()->put('user', $user);

        // RETORNA PRO FRONT COM A ROTA DE REDIRECIONAMENTO
        return response()->json(['redirect_url' => 'dashboard']);

    }
    public function logout()
    {
        //DESTROI SESSAO E REDIRECIONA PARA A PAGINA DE LOGIN
        session()->forget('user');
        return redirect()->route('index');
    }

    public function dashboard()
    {
        // VERIFICA SE EXISTE SESSAO
        if (!$this->checarSessao()) {
            return redirect()->route('login');
        }
        return view('dashboard');
    }

    public function redefinirSenha(Request $request)
    {
        // RECEBE DADOS DO FORM COM A SENHA NOVA
        $novaSenha = $request->input('novaSenha');

        // VERIFICA SE O CAMPO ESTA VAZIO
        if (empty($novaSenha)) {
            return response()->json(['error' => 'Nova senha não pode ser vazia.'], 400);
        }

        //RECEBE O USUARIO DA DESSAO
        $user = session()->get('user');

        //CRIPTOGRAFA A SENHA E SALVA NO BANCO
        $user->senha = bcrypt($novaSenha);
        $user->save();

        //RETORNA PRO FRONT-END A ROTA DE DIRECIONAMENTO
        return response()->json(['mensagem' => 'Senha alterada com sucesso']);

    }

}
