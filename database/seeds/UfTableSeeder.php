<?php

use Illuminate\Database\Seeder;

class UfTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ufs')->delete();

        \DB::table('ufs')->insert(array (
            0 =>
                array (
                    'uf' => 'AC',
                    'nome' => 'Acre',
                ),
            1 =>
                array (
                    'uf' => 'AL',
                    'nome' => 'Alagoas',
                ),
            2 =>
                array (
                    'uf' => 'AM',
                    'nome' => 'Amazonas',
                ),
            3 =>
                array (
                    'uf' => 'AP',
                    'nome' => 'Amapá',
                ),
            4 =>
                array (
                    'uf' => 'BA',
                    'nome' => 'Bahia',
                ),
            5 =>
                array (
                    'uf' => 'CE',
                    'nome' => 'Ceará',
                ),
            6 =>
                array (
                    'uf' => 'DF',
                    'nome' => 'Distrito Federal',
                ),
            7 =>
                array (
                    'uf' => 'ES',
                    'nome' => 'Espírito Santo',
                ),
            8 =>
                array (
                    'uf' => 'GO',
                    'nome' => 'Goiás',
                ),
            9 =>
                array (
                    'uf' => 'MA',
                    'nome' => 'Maranhão',
                ),
            10 =>
                array (
                    'uf' => 'MG',
                    'nome' => 'Minas Gerais',
                ),
            11 =>
                array (
                    'uf' => 'MS',
                    'nome' => 'Mato Grosso do Sul',
                ),
            12 =>
                array (
                    'uf' => 'MT',
                    'nome' => 'Mato Grosso',
                ),
            13 =>
                array (
                    'uf' => 'PA',
                    'nome' => 'Pará',
                ),
            14 =>
                array (
                    'uf' => 'PB',
                    'nome' => 'Paraíba',
                ),
            15 =>
                array (
                    'uf' => 'PE',
                    'nome' => 'Pernambuco',
                ),
            16 =>
                array (
                    'uf' => 'PI',
                    'nome' => 'Piauí',
                ),
            17 =>
                array (
                    'uf' => 'PR',
                    'nome' => 'Paraná',
                ),
            18 =>
                array (
                    'uf' => 'RJ',
                    'nome' => 'Rio de Janeiro',
                ),
            19 =>
                array (
                    'uf' => 'RN',
                    'nome' => 'Rio Grande do Norte',
                ),
            20 =>
                array (
                    'uf' => 'RO',
                    'nome' => 'Rondônia',
                ),
            21 =>
                array (
                    'uf' => 'RR',
                    'nome' => 'Roraima',
                ),
            22 =>
                array (
                    'uf' => 'RS',
                    'nome' => 'Rio Grande do Sul',
                ),
            23 =>
                array (
                    'uf' => 'SC',
                    'nome' => 'Santa Catarina',
                ),
            24 =>
                array (
                    'uf' => 'SE',
                    'nome' => 'Sergipe',
                ),
            25 =>
                array (
                    'uf' => 'SP',
                    'nome' => 'São Paulo',
                ),
            26 =>
                array (
                    'uf' => 'TO',
                    'nome' => 'Tocantins',
                ),
        ));


    }
}
