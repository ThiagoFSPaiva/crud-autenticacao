<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base" content="<?=env('APP_URL');?>">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loading.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toast.css') }}">
    <title>Login</title>

</head>
<body class="antialiased">

<div class="loading" style="display: none;">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>

    <div class="login vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="login-box">
            <div class="card login-container justify-content-center">
                <h1>AUTENTICAÇÃO</h1>
                <p class="desc">
                    Ainda não tem cadastro? <a href="/cadastro" >Cadastrar</a>
                </p>

                <div class="mb-3">
                    <label for="cpf" class="form-label font-weight-bold">CPF</label>
                    <input type="text" autocomplete="off" class="cpf form-control form-control-lg" placeholder="000.000.000-00" name="cpf" id="cpf">
                </div>

                <div class="mb-3">
                    <div class="group-label mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <a href="/recuperar-senha" class="text-decoration-none text-color">Esqueceu sua senha?</a>
                    </div>
                    <input type="password" autocomplete="off" class="form-control form-control-lg" placeholder="Sua senha" name="senha" id="senha">
                </div>

                <button id="login-btn" class="btn w-100 btn-lg btn-dark">Entrar</button>

            </div>


        </div>

        {{-- JavaScript --}}
        <script src="{{ asset('/assets/js/jquery.js') }}?nocache=<?=time();?>"></script>
        <script src="{{ asset('/assets/js/jquery-mask.js') }}?nocache=<?=time();?>"></script>
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}?nocache=<?=time();?>"></script>
        <script src="{{ asset('/assets/js/toastr.js') }}?nocache=<?=time();?>"></script>
        <script src="{{ asset('/assets/js/widgets/Autenticacao/autenticacao.js') }}?nocache=<?=time();?>"></script>
</body>
