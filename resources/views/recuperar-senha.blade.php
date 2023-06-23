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
    <title>Recuperar Senha</title>


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
                Informe abaixo seu CPF e Senha para recuperar sua senha,
                enviaremos um link para o email cadastrado.
            </p>

            <div class="mb-2">
                <label for="cpf" class="form-label font-weight-bold">CPF</label>
                <input type="text" class="cpf form-control form-control-lg" placeholder="000.000.000-00" name="cpf" id="cpf">
            </div>

            <button id="recuperar-btn" class="btn w-100 btn-lg btn-dark">Enviar</button>

            <div class="text-center py-4 fw-medium">
                <a href="/" class="text-decoration-none text-dark">Voltar</a>
            </div>

        </div>
        <div id="alerta" style="display: none;"></div>
    </div>
</div>

{{-- JavaScript --}}
<script src="{{ asset('/assets/js/jquery.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/jquery-mask.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/toastr.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/widgets/Autenticacao/autenticacao.js') }}?nocache=<?=time();?>"></script>

@yield('scripts')

</body>



