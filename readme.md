<p align="center"><img src="http://allblacks.p21sistemas.com.br/images/logo.png"></p>

# Solução do Desafio Técnico

## Seleção Neozelandesa de Rugby (o cliente)

### Descrição do desafio:
https://gist.githubusercontent.com/p21sistemas/c66b07bb0c30de898642aeb0f9fdb4f0/raw/6a07425840ed07f300eb2e30cb653a1a7b27a28d/DesafioAllBlacks.md

## Solução desenvolvida:

### Requisitos para instalar a solução:
* PHP >= 7.1
* MySQL
* Laravel >= 5.7

### Passos para executar a aplicação
* cd desafio-all-blacks
* composer install
* php artisan migrate
* php artisan import:planilha-clientes 
  * Importa dados contidos na planilha clientes.xlsx e normaliza para as tabelas clientes e endereços (arquivo localizado na pasta storage)


Tela inicial:
<p align="center"><img src="(readme-files/index.png)"></p>
