<?php

namespace App\Imports;

use App\Cliente;
use App\Endereco;
use Illuminate\Console\OutputStyle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class ClientesImport implements ToCollection, WithHeadingRow, WithProgressBar
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $cliente_id = Cliente::create([
                'nome' => trim($row['nome']),
                'documento' => trim($row['documento']),
                'telefone' => trim($row['telefone']),
                'email' => trim($row['e_mail']),
                'ativo' => (strtoupper(trim($row['ativo'])) == 'SIM' ?? false)
            ])->id;

            Endereco::create([
                'cliente_id' => $cliente_id,
                'cep' => trim($row['cep']),
                'endereco' => trim($row['endereco']),
                'bairro' => trim($row['bairro']),
                'cidade' => trim($row['cidade']),
                'uf' => trim($row['uf']),
            ]);
        }
        return $row;
    }
}
