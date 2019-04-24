<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Jobs\EnviarEmailJob;
use App\Mail\ComunicadoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function form()
    {
        return view('email.form');
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
     * Envia e-mails para todos os torcedores
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function enviar(Request $request)
    {
        try{
            foreach (Cliente::all() as $cliente) {
                $corpoEmail = $request->get('email');
                $mComunicadoMail = new ComunicadoMail($corpoEmail,$cliente);
                Mail::to($cliente->email)->send($mComunicadoMail);
            }
            return redirect()->back()->with('success', 'E-mails enviados com sucesso');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Ocorreu um erro ao enviar os e-mails');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
