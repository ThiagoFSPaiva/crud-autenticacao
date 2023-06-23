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
    <title>Cadastro</title>


</head>
<body class="antialiased">
<div class="loading" style="display: none;">
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
</div>

<div class="login vh-100 d-flex flex-column justify-content-center align-items-center">
    <div class="login-box">
        <div class="card login-container justify-content-center">
            <h1>CADASTRO</h1>
            <p class="desc">
                Informe os dados abaixo para poder se cadastrar no
                sistema.
            </p>
            <div class="mb-2">
                <label for="name" class="form-label">NOME COMPLETO</label>
                <input type="text" placeholder="Seu Nome" class="form-control form-control-lg" name="nome" id="name">
            </div>
            <div class="mb-2">
                <label for="cpf" class="form-label font-weight-bold">CPF</label>
                <input type="text" placeholder="000.000.000-00" class="cpf form-control form-control-lg" name="cpf" id="cpf">
            </div>
            <div class="mb-2">
                <label for="email" class="form-label">EMAIL</label>
                <input type="email" placeholder="seuemail@exemplo.com" class="form-control form-control-lg" name="email" id="email">
            </div>
            <div class="mb-2">
                <label for="senha" class="form-label font-weight-bold">SENHA</label>
                <input type="password" placeholder="Digita sua senha" class="form-control form-control-lg" name="senha" id="senha">
            </div>

            <button id="register-btn" class="btn w-100 btn-lg btn-dark">Cadastrar</button>

            <div class="text-center fw-medium">
                <a href="/" class="text-decoration-none text-color">Voltar</a>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript --}}
<script src="{{ asset('/assets/js/jquery.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/jquery-mask.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/toastr.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/widgets/Autenticacao/autenticacao.js') }}?nocache=<?=time();?>"></script>

</body>
