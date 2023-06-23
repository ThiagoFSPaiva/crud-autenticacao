<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base" content="<?=env('APP_URL');?>">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loading.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toast.css') }}">

    <title>Redefinir senha</title>

</head>
<body>
<nav>

    <div class="logo-name">
        <div class="logo-image">
            <img src="assets/images/perfil.png" alt="">
        </div>
        <span class="logo_name">{{ implode(' ', array_slice(explode(' ', session('user.nome')), 0, 2)) }}</span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="/">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Home</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Conteudo</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Dados</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Curtida</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comentário</span>
                </a></li>
            <li><a href="#">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Compartilhamento</span>
                </a></li>
            <li><a href="{{route('redefinir-senha')}}" class="active">
                    <i class="uil uil-setting active"></i>
                    <span class="link-name active">Configurações</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="{{route('logout')}}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
        </ul>
    </div>
</nav>
<section class="dashboard">

    <i class="uil uil-bars sidebar-toggle"></i>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6  mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="foto_perfil">
                                <img src="assets/images/perfil.png" alt="">
                            </div>
                            <div class="mt-2">
                                <small>
                                    <a href="#">Alterar foto</a>
                                </small>
                            </div>
                        </div>
                        <h5 class="card-title">Informações Pessoais</h5>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" value="{{session('user.nome')}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control cpf" id="cpf" value="{{session('user.cpf')}}" disabled>
                        </div>
                        <button type="button" class="btn btn-primary botao-redefinir" data-bs-toggle="modal" data-bs-target="#redefinirSenhaModal">
                            Redefinir Senha
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="redefinirSenhaModal" tabindex="-1" aria-labelledby="redefinirSenhaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="redefinirSenhaModalLabel">Redefinir Senha</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label for="nova-senha" class="form-label font-weight-bold">Nova senha</label>
                        <input type="password" class="form-control form-control-lg" name="nova-senha" id="nova-senha" required>
                    </div>

                    <div class="mb-2">
                        <label for="confirmar-senha" class="form-label font-weight-bold">Confirmar a nova senha</label>
                        <input type="password" class="form-control form-control-lg" name="confirmar-senha" id="confirmar-senha" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" id="redefinir-btn" class="btn btn-primary">Alterar</button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JavaScript --}}
<script src="{{ asset('/assets/js/jquery.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/jquery-mask.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/toastr.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/widgets/Autenticacao/autenticacao.js') }}?nocache=<?=time();?>"></script>
<script src="{{ asset('/assets/js/widgets/Usuario/dashboard.js') }}?nocache=<?=time();?>"></script>


</body>





