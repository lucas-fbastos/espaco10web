<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Imovel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        $imoveis =  Imovel::all();

        return view('perfil.perfilHome', compact('clientes'), compact('imoveis'));
    }
}
