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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function enviar(Request $request)
    {
        foreach (Cliente::all() as $cliente) {
            $corpoEmail = $request->get('email');

            return new ComunicadoMail($corpoEmail,$cliente);

            Mail::to($cliente->email)->send($mComunicadoMail);

            Mail::raw('You have successfully created your account on CTFlor website', function ($message) use ($cliente) {
                $message
                    ->to($cliente->email, $cliente->nome)
                    ->subject('CTFlor Website - Registration');
            });
            break;
        }
        dd(Mail::failures());
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
