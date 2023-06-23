<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base" content="<?=env('APP_URL');?>">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/dashboard.css') }}">

    <title>Dashboard</title>

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
            <li><a href="#" class="active">
                    <i class="active uil uil-estate"></i>
                    <span class="link-name active">Home</span>
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
            <li><a href="{{route('redefinir-senha')}}">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Configurações</span>
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
    <div class="dash-content">
        <div class="overview">
            <div class="title">
                <i class="uil uil-tachometer-fast-alt"></i>
                <span class="text">Total Geral</span>
            </div>
            <div class="boxes">

                <div class="box box1">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="text">Curtidas</span>
                    <span class="number">50,120</span>
                </div>
                <div class="box box2">
                    <i class="uil uil-comments"></i>
                    <span class="text">Comentários</span>
                    <span class="number">20,120</span>
                </div>
                <div class="box box3">
                    <i class="uil uil-share"></i>
                    <span class="text">Compartilhamentos</span>
                    <span class="number">10,120</span>
                </div>
            </div>
        </div>
        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Histórico</span>
            </div>
            <div class="activity-data">
                <div class="data names">
                    <span class="data-title">Name</span>
                    <span class="data-list">Prem Shahi</span>
                    <span class="data-list">Deepa Chand</span>
                    <span class="data-list">Manisha Chand</span>
                    <span class="data-list">Pratima Shahi</span>
                    <span class="data-list">Man Shahi</span>
                    <span class="data-list">Ganesh Chand</span>
                    <span class="data-list">Bikash Chand</span>
                </div>
                <div class="data email">
                    <span class="data-title">Email</span>
                    <span class="data-list">premshahi@gmail.com</span>
                    <span class="data-list">deepachand@gmail.com</span>
                    <span class="data-list">prakashhai@gmail.com</span>
                    <span class="data-list">manishachand@gmail.com</span>
                    <span class="data-list">pratimashhai@gmail.com</span>
                    <span class="data-list">manshahi@gmail.com</span>
                    <span class="data-list">ganeshchand@gmail.com</span>
                </div>
                <div class="data joined">
                    <span class="data-title">Joined</span>
                    <span class="data-list">2022-02-12</span>
                    <span class="data-list">2022-02-12</span>
                    <span class="data-list">2022-02-13</span>
                    <span class="data-list">2022-02-13</span>
                    <span class="data-list">2022-02-14</span>
                    <span class="data-list">2022-02-14</span>
                    <span class="data-list">2022-02-15</span>
                </div>
                <div class="data type">
                    <span class="data-title">Type</span>
                    <span class="data-list">New</span>
                    <span class="data-list">Member</span>
                    <span class="data-list">Member</span>
                    <span class="data-list">New</span>
                    <span class="data-list">Member</span>
                    <span class="data-list">New</span>
                    <span class="data-list">Member</span>
                </div>
                <div class="data status">
                    <span class="data-title">Status</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
                    <span class="data-list">Liked</span>
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
