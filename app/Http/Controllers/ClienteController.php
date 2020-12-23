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
    const PAGINACION=8;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $clientes=Cliente::where('estado','=','1')
            ->where('ruc_dni', 'like','%'.$buscarpor.'%')
            ->paginate($this::PAGINACION);
        return view('clientes.index', compact('clientes', 'buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar campos

        $cliente = new Cliente();
        $cliente->ruc_dni=$request->ruc_dni;
        $cliente->nombres=$request->nombres;
        $cliente->email=$request->email;
        $cliente->direccion=$request->direccion;
        $cliente->estado=1;
        $cliente->save();

        return redirect()->route('clientes.index')->with('datos','Cliente Registrado');
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
        $cliente=Cliente::findorfail($id);
        return view('clientes.confirmar', compact('cliente'));
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
        $cliente=Cliente::findorfail($id);
        return view('clientes.edit', compact('cliente'));
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
        //
        $cliente=Cliente::findorfail($id);
        $cliente->ruc_dni=$request->ruc_dni;
        $cliente->nombres=$request->nombres;
        $cliente->email=$request->email;
        $cliente->direccion=$request->direccion;
        $cliente->save();

        return redirect()->route('clientes.index')->with('datos','Cliente Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente=Cliente::findorfail($id);
        $cliente->estado=0;
        $cliente->save();

        return redirect()->route('clientes.index')->with('datos','Cliente Eliminado');
    }     
}
