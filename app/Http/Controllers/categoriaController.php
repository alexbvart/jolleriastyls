<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Request;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=15;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $categoria=categoria::where('estado','=','1')->where('descripcion', 'like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('categoria.index', ['categoria'=>$categoria, 'buscarpor'=>$buscarpor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $categoria=new categoria();
        $categoria->descripcion=$request->descripcion;
        $categoria->estado='1';
        $categoria->save();

        return redirect()->route('categoria.index')->with('datos', 'Registro Guardado');
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
        $categoria=categoria::findOrfail($id);
        return view('categoria.edit', compact('categoria'));
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
        // $data=request()->validate([
        //     'descripcion'=>'required|max:30'
        // ],[
        //     'descripcion.required'=>'Ingrese descripcion de categoria',
        //     'descripcion.max'=>'Máximo 30 caracteres para la descripción'
        // ]);

        $categoria=categoria::findOrfail($id);
        $categoria->descripcion=$request->descripcion;        
        $categoria->save();

        return redirect()->route('categoria.index')->with('datos', 'Registro Actualizado');
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
        $categoria=categoria::findOrfail($id);
        $categoria->estado='0';
        $categoria->save();
        return redirect()->route('categoria.index')->with('datos', 'Registro Eliminado');
    }

    public function confirmar($id){
        $categoria=categoria::findOrfail($id);
        return view('categoria.confirm', compact('categoria'));
    }
}
