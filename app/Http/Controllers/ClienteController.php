<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

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
        //
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
