<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::paginate(10);
        return view('perfil/gerenciarClientes', compact('clientes'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cliente = new Cliente();
       $cliente->nome = $request->input('nome');
       $cliente->cpf = $request->input('cpf');
       $cliente->rg = $request->input('rg');
       $cliente->endereco = $request->input('endereco');
       $cliente->telefone = $request->input('telefone');
       $cliente->email  = $request->input('email');
       $cliente->save();
       return redirect('/cliente/gerenciar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clienteAntigo = Cliente::find($id);
        if($clienteAntigo){
            $clienteAntigo->nome = $request->input('nome');
            $clienteAntigo->cpf = $request->input('cpf');
            $clienteAntigo->rg = $request->input('rg');
            $clienteAntigo->endereco = $request->input('endereco');
            $clienteAntigo->telefone = $request->input('telefone');
            $clienteAntigo->email  = $request->input('email');
            $clienteAntigo->save();
        }
        return redirect('/cliente/gerenciar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cliente = Cliente::find($request->input('id'));
        if($cliente){
            $cliente->delete();
        }
        return redirect('/cliente/gerenciar');
    }
}
