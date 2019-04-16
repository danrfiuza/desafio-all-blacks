<?php

namespace App\Http\Controllers;

use App\ArquivoImportacao;
use App\Http\Requests\ArquivoImportacaoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArquivoImportacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('importacao.index');
    }

    public function listaArquivosJson(Request $request)
    {
        $columns = array('id', 'nome_original', 'quantidade_processada', 'processado', 'created_at', 'updated_at');

        $totalData = ArquivoImportacao::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        $clienteQuery = ArquivoImportacao::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->select($columns);

        $clientes = $clienteQuery->get();


        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => (!empty($clientes) ? $clientes : [])
        );

        return response()->json($json_data);
    }

    public function importarArquivo(ArquivoImportacao $arquivoImportacao)
    {
        $resposta = $arquivoImportacao->importarClientes();
        if ($resposta == ArquivoImportacao::SUCESSO) {
            return response()->json(['Arquivo Processado com sucesso'], 200);
        }
        return response()->json(['Falha ao processar arquivo'], 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArquivoImportacaoRequest $request)
    {
        $arquivo = $request->file('arquivo');
        $nomeArquivo = time() . $arquivo->getClientOriginalName();

        $arquivo->storeAs('importacoes_xml', $nomeArquivo);

        $mArquivoImportacao = new ArquivoImportacao;
        $mArquivoImportacao->nome = $nomeArquivo;
        $mArquivoImportacao->nome_original = $request->file('arquivo')->getClientOriginalName();
        $mArquivoImportacao->save();

        return back()->with('mensagem', 'Arquivo salvo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArquivoImportacao $arquivoImportacao
     * @return \Illuminate\Http\Response
     */
    public function show(ArquivoImportacao $arquivoImportacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArquivoImportacao $arquivoImportacao
     * @return \Illuminate\Http\Response
     */
    public function edit(ArquivoImportacao $arquivoImportacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ArquivoImportacao $arquivoImportacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArquivoImportacao $arquivoImportacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArquivoImportacao $arquivoImportacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArquivoImportacao $arquivoImportacao)
    {
        //
    }
}
