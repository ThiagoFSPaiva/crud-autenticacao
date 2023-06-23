

    document.addEventListener('DOMContentLoaded', function() {
    var nomeInput = document.getElementById('nome');
    if (nomeInput) {
    var nomeCompleto = nomeInput.value;
    var primeiroNome = nomeCompleto.split(' ')[0];
    nomeInput.value = primeiroNome;
}
});

$(document).ready(function() {

    //CRIA MASCARA DE CPF
    $('.cpf').mask('000.000.000-00', {reverse: true})
    $.ajaxSetup({

        //PEGA O TOKEN DE SESSAO
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#login-btn').click(function() {
        //MOSTRA LOADING
        $('.loading').show();

        //REMOVE A MASCARA
        $('.cpf').unmask();
        //OBTEM DADOS DO FORMM
        var cpf = $('input[name=cpf]').val();
        var senha = $('input[name=senha]').val();

        //ENVIA DADOS PARA ROTA VIA AJAX
        $.ajax({
            url: '/loginsubmit',
            method: 'POST',
            data: {
                cpf: cpf,
                senha: senha
            },
            success: function(response) {
                //FECHA LOADING
                $('.loading').hide();
                // REDIRECIONA

                //SE HOUVER ERRO LANCA A TOAST
                if (response.message) {
                    toastr.error(response.message)
                } else {
                    //REDIRECIONA PARA PAGINA PRINCIPAL
                    window.location.replace(response.redirect_url)
                }
            },
            error: function(xhr) {
                //FECHA LOADING
                $('.loading').hide();
                // SE A REQUISIÇÃO FALHAR EXIBA O ERRO NA TOAST
                toastr.error(xhr.responseJSON.message)
            }
        });
    });

    $('#register-btn').click(function() {
        //remove a mascara
        $('.cpf').unmask();
        // Obter os dados do formulário
        var nome = $('input[name=nome]').val();
        var cpf = $('input[name=cpf]').val();
        var email = $('input[name=email]').val();
        var senha = $('input[name=senha]').val();

        // Enviar os dados via Ajax
        $.ajax({
            url: '/cadastro',
            method: 'POST',
            data: {
                nome: nome,
                cpf: cpf,
                email: email,
                senha: senha
            },
            success: function(response) {
                // Redirecionar para a página de login
                console.log(response)
                window.location.replace(response.redirect_url)
            },
            error: function(xhr) {
                $('.loading').hide();
                // Exibir mensagem de erro
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    // PEGA O BOTAO DE LOGOUT E REDIRECIONA
    $('#mudarsenha-btn').click(function() {
        window.location.replace('redefinir-senha');
    });

    $('#redefinir-btn').click(function(e) {
        e.preventDefault();

        $('.loading').show();
        // OBTEM OS DADOS DO INPUT
        var novaSenha = $('input[name=nova-senha]').val();
        var confirmarSenha = $('input[name=confirmar-senha]').val();

        // VERIFICA SE NÃO ESTA VAZIO
        if (!novaSenha || !confirmarSenha) {
            toastr.error('Por favor, preencha todos os campos');
            return;
        }
        // VERIFICA SE AS SENHAS ESTÃO IGUAIS
        if(novaSenha !== confirmarSenha){
            toastr.error('As senhas não coincidem')
            return;
        }

        // ENVIA DADOS PELO AJAX
        $.ajax({
            url: '/redefinir-senha',
            method: 'PATCH',
            data: {
                novaSenha: novaSenha,
                confirmarSenha: confirmarSenha
            },
            success: function(response) {
                $('.loading').hide();
                // SE HOUVER ERRO LANCA A TOAST DE ERRO
                if (response.erro) {
                    toastr.error(response.erro)
                } else {
                    // REDIRECIONA PARA PAGINA PRINCIPAL
                    toastr.success(response.mensagem)
                }

            },
            error: function(xhr) {
                $('.loading').hide();
                // EXIBE O ERRO SE HOUVER ERRO NA REQUISIÇÃO
                toastr.error(xhr.responseJSON.message);
            }
        });
    });

    $('#recuperar-btn').click(function() {

        //MOSTRA LOADING
        $('.loading').show();

        //REMOVE A MASCARA ANTES DE ENVIAR PRO BACK-END
        $('.cpf').unmask();
        event.preventDefault();
        //OBTEM O VALOR DO INPUT CPF
        var cpf = $('#cpf').val();

        $.ajax({
            type: 'POST',
            url: '/enviar-email',
            data: {
                cpf: cpf
            },
            success: function(response) {
                //FECHA LOADING
                $('.loading').hide();

                //SE HOUVER ERRO MANDA MENSAGEM DE ERRO
                if (response.erro) {
                    toastr.error(response.erro)
                } else {
                    //REDIRECIONA PARA PAGINA PRINCIPAL
                    toastr.success(response.success);
                }
            },
            error: function(response) {
                $('.loading').hide();
                toastr.error(response.responseJSON.message);
            }
        });
    });
});
