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
  * Instala as dependências necessárias para executar o projeto.
* php artisan migrate/migrate:refresh
  * Realiza a migração das tabelas a serem criadas/faz o drop das tabelas e refaz a migração
* php artisan import:planilha-clientes 
  * Importa dados contidos na planilha clientes.xlsx e normaliza para as tabelas clientes e endereços (arquivo localizado na pasta storage)

### Migração dos dados:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1uI01V3Hy1UVsr0WlbdimrxcJX3r_mPXF"></p>

### Importação dos dados da planilha clientes.xlsx:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1uI01V3Hy1UVsr0WlbdimrxcJX3r_mPXF"></p>

### Tela inicial:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1teUYuOZqUG0JkTb68koM40U78L4fg02E"></p>

### Tela de importação de clientes (XML):
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1teUYuOZqUG0JkTb68koM40U78L4fg02E"></p>

### Tela de envio de e-mails:
<p align="center"><img src="https://drive.google.com/uc?export=view&id=1teUYuOZqUG0JkTb68koM40U78L4fg02E"></p>
