<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Endereco;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.index');
    }

    public function listaClientesJson(Request $request)
    {
        $columns = array('id', 'nome', 'documento', 'email');

        $totalData = Cliente::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $search = $request->input('search.value');

        $clienteQuery = Cliente::offset($start)
            ->limit($limit)
            ->orderBy($order, $dir)
            ->select($columns);

        if (!empty($search)) {
            $clienteQuery->where('id', 'LIKE', "%{$search}%")
                ->orWhere('nome', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");

            $totalFiltered = Cliente::where('id', 'LIKE', "%{$search}%")
                ->orWhere('nome', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->count();
        }
        $clientes = $clienteQuery->get();


        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => (!empty($clientes) ? $clientes : [])
        );

        return response()->json($json_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function formCreate()
    {
        $cliente = new Cliente();
        $endereco = new Endereco();
        return view('cliente.form')
            ->with('cliente', $cliente)
            ->with('endereco', $endereco);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        DB::beginTransaction();
        try {
            $cliente_id = $request->get('cliente_id') ?? null;
            $mCliente = $cliente_id ? Cliente::find($cliente_id) : (new Cliente());
            $mCliente->nome = $request->get('nome');
            $mCliente->email = $request->get('email');
            $mCliente->documento = $request->get('documento');
            $mCliente->telefone = $request->get('telefone');
            $cliente_id = $mCliente->save();

            $endereco_id = $request->get('endereco_id') ?? null;
            $mEndereco = $endereco_id ? Endereco::find($endereco_id) : (new Endereco());
            $mEndereco->uf = $request->get('uf');
            $mEndereco->cidade = $request->get('cidade');
            $mEndereco->cep = $request->get('cep');
            $mEndereco->endereco = $request->get('endereco');
            $mEndereco->bairro = $request->get('bairro');
            $mEndereco->cliente_id = $cliente_id;
            $mEndereco->save();
            DB::commit();
        } catch (\Exception $e) {
            Db::rollback();
            return response()->json($e, 500);
        }

        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente $cliente
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $endereco = $cliente->endereco;
        return view('cliente.form')
            ->with('cliente', $cliente)
            ->with('endereco', $endereco);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente $cliente
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cliente $cliente
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        dd($request, $cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente $cliente
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
