<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArquivoImportacao extends Model
{
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
        $caminhoArquivo = storage_path('app/importacoes_xml/'.$this->nome);
        $xml = simplexml_load_file($caminhoArquivo);
        dd($xml);
        foreach($rows as $row) {
            $cliente_id = Cliente::create([
                'nome' => $row['nome'],
                'documento' => $row['documento'],
                'telefone' => $row['telefone'],
                'email' => $row['e_mail'],
                'ativo' => (strtoupper($row['ativo']) == 'SIM' ?? false)
            ])->id;

            Endereco::create([
                'cliente_id' => $cliente_id,
                'cep' => $row['cep'],
                'endereco' => $row['endereco'],
                'bairro' => $row['bairro'],
                'cidade' => $row['cidade'],
                'uf' => $row['uf'],
            ]);
        }
        return $row;
    }
}