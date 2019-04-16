<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArquivoImportacao extends Model
{
    const ERRO = 1;
    const SUCESSO = 2;
    public $timestamps = true;
    public $table = 'arquivo_importacoes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'nome_original',
        'quantidade_processada',
        'processado',
    ];

    public function importarClientes()
    {
        $xml = $this->carregarArquivo();
        DB::beginTransaction();
        $qtd_processada = 0;
        $resposta = [];
        try {
            foreach ($xml as $row) {
                $documento = str_replace(['-', '.', '/'], ['', '', ''], trim($row['documento']));

                $mCliente = Cliente::getClienteByDocumento($documento) ?? (new Cliente());

                $mCliente->nome = $row['nome'];
                $mCliente->documento = $documento;
                $mCliente->telefone = str_replace(['(', ')', '-'], ['', ''], trim($row['telefone']));
                $mCliente->email = $row['email'];
                $mCliente->ativo = $row['ativo'] ? true : false;
                $mCliente->save();

                $mEndereco = $mCliente->endereco ?? (new Endereco());
                $mEndereco->cliente_id = $mCliente->id;
                $mEndereco->cep = str_replace(['-'], [''], trim($row['cep']));
                $mEndereco->endereco = trim($row['endereco']);
                $mEndereco->bairro = trim($row['bairro']);
                $mEndereco->cidade = trim($row['cidade']);
                $mEndereco->uf = trim($row['uf']);
                $mEndereco->save();
                $qtd_processada++;
            }
            $this->quantidade_processada = $qtd_processada;
            $this->processado = true;
            $this->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rowbcack();
            return self::ERRO;
        }
        return self::SUCESSO;
    }

    public function carregarArquivo()
    {
        $caminhoArquivo = storage_path('app/importacoes_xml/' . $this->nome);
        return simplexml_load_file($caminhoArquivo);
    }
}