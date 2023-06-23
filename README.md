# (CRUD) Sistema de Autenticação

Este projeto é um sistema de autenticação que oferece recursos de login, cadastro e recuperação de senha. Após o login, os usuários são direcionados para a tela principal, onde podem acessar funcionalidades específicas. Também é possível alterar a senha para garantir a segurança. Em caso de esquecimento da senha, uma nova senha é enviada para o email do usuário, utilizando o CPF como referência. O objetivo é proporcionar uma experiência prática e segura aos usuários, garantindo o acesso e a proteção adequada das informações.



![](https://github.com/ThiagoFSPaiva/crud-autenticacao/blob/master/screenshot/print1.png)

![](https://github.com/ThiagoFSPaiva/crud-autenticacao/blob/master/screenshot/print2.png)

![](https://github.com/ThiagoFSPaiva/crud-autenticacao/blob/master/screenshot/print3.png)

### Passo a passo

Clone Repositório
```sh
git clone https://github.com/ThiagoFSPaiva/crud-autenticacao.git
```
```sh
cd crud-autenticacao
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Configure o seu banco de dados (Você também pode usar o xamp e usar o MySQL localmente).
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Crie o banco de dados automaticamente com as tabelas com o comando:
```sh
php artisan migrate
```

Atualize as variáveis de ambiente para envio do email no arquivo .env
```dosini
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seuemail@gmail.com
MAIL_PASSWORD=suaSenha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="seuemail@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Inicie o projeto
```sh
php artisan serve
```

Acesse o projeto pelo link fornecido

![](https://github.com/ThiagoFSPaiva/crud-autenticacao/blob/master/screenshot/print4.png)
