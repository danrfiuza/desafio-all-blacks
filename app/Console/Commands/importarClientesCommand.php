<?php

namespace App\Console\Commands;

use App\Imports\ClientesImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class importarClientesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:planilha-clientes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa dados contidos na planilha clientes.xlsx e normaliza para as tabelas clientes e endereços';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->output->title('Importando dados...');
        (new ClientesImport)->withOutput($this->output)->import(storage_path('clientes.xlsx'));
        $this->output->success('Dados importados com sucesso.');
    }
}
