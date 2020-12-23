<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION=8;
    public function index(Request $request)
    {
        //
        $buscarpor = $request->get('buscarpor');
        $unidad=Unidad::where('estado','=','1')->where('descripcion', 'like','%'.$buscarpor.'%')->paginate($this::PAGINACION);
        return view('unidad.index', ['unidad'=>$unidad, 'buscarpor'=>$buscarpor]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('unidad.create');
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
        $data=request()->validate([
            'descripcion'=>'required|max:20'
        ],[
            'descripcion.required'=>'Ingrese descripcion de unidad',
            'descripcion.max'=>'Máximo 20 caracteres para la descripción'
        ]);

        $unidad=new Unidad();
        $unidad->descripcion=$request->descripcion;
        $unidad->estado='1';
        $unidad->save();

        return redirect()->route('unidad.index')->with('datos', 'Registro Nuevo Guardado');
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
        $unidad=unidad::findOrfail($id);
        return view('unidad.edit', compact('unidad'));
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
        $data=request()->validate([
            'descripcion'=>'required|max:20'
        ],[
            'descripcion.required'=>'Ingrese descripcion de unidad',
            'descripcion.max'=>'Máximo 20 caracteres para la descripción'
        ]);

        $unidad=unidad::findOrfail($id);
        $unidad->descripcion=$request->descripcion;        
        $unidad->save();

        return redirect()->route('unidad.index')->with('datos', 'Registro Actualizado');
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
        $unidad = unidad::findorfail($id);
        $unidad->estado='0';
        $unidad->save();

        return redirect()->route('unidad.index')->with('datos', 'Registro Eliminado');
    }

    public function confirmar($id){
        $unidad=unidad::findOrfail($id);
        return view('unidad.confirm', compact('unidad'));
    }
}
