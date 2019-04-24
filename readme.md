<p align="center"><img src="http://allblacks.p21sistemas.com.br/images/logo.png"></p>

# Solução do Desafio Técnico

## Seleção Neozelandesa de Rugby (o cliente)

### Descrição do desafio:
https://gist.githubusercontent.com/p21sistemas/c66b07bb0c30de898642aeb0f9fdb4f0/raw/6a07425840ed07f300eb2e30cb653a1a7b27a28d/DesafioAllBlacks.md

## Solução desenvolvida:

### Requisitos de instalação da solução:
* PHP >= 7.1
* MySQL
* Laravel >= 5.7

### Passos para executar a aplicação
* cd desafio-all-blacks
* composer install
  * Instala as dependências necessárias para executar o projeto.
* cp .env.example .env
* php artisan key:generate
  * Exemplo de configuração do arquivo .env:
  ```
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    LOG_CHANNEL=stack

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=desafiop21
    DB_USERNAME=admin
    DB_PASSWORD=admin

    BROADCAST_DRIVER=log
    CACHE_DRIVER=file
    SESSION_DRIVER=file
    SESSION_LIFETIME=120
    QUEUE_DRIVER=sync

    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=<username>
    MAIL_PASSWORD=<password>
    MAIL_FROM_ADDRESS=<emailfrom>
    MAIL_FROM_NAME=<name>
  ```
* php artisan migrate/migrate:refresh
  * Realiza a migração das tabelas a serem criadas/faz o drop das tabelas e refaz a migração
* php artisan db:seed --class=UfTableSeeder
  * Realiza carga das UFs
* php artisan import:planilha-clientes
  * Importa dados contidos na planilha clientes.xlsx e normaliza para as tabelas clientes e endereços (arquivo localizado na pasta storage)
  * Utilizado a biblioteca laravel-excel https://laravel-excel.com/
* Configurar serviço de smtp em .env ou config/mail.php
  * utilizei o mailtrap para demonstar o envio de emails https://mailtrap.io/

### Migração dos dados:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1uI01V3Hy1UVsr0WlbdimrxcJX3r_mPXF"></p>

### Importação dos dados da planilha clientes.xlsx:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1nl6prLbA0PUGjsruTNs11NcjCi_edL1f"></p>

### Tela inicial com CRUD de torcedores:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1teUYuOZqUG0JkTb68koM40U78L4fg02E"></p>

### Tela de importação de clientes (XML):
* salva e processa os dados do arquivo XML
* Caso exista torcedor com o documento já informado, o sistema atualiza os dados 
<p align="center"><img src="https://drive.google.com/uc?export=view&id=11VyFZ1B9b3_oFrfhHCwq-NhZHgiCIhpD"></p>

### Tela de envio de e-mails:
* Permite escrever e-mails e disparar para todos os usuários
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1ozLf8SAZ5Xb59ARIDKmIkFKTN-KtVWfG"></p>
