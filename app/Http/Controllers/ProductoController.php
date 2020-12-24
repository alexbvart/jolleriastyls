<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\categoria;
use App\Unidad;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $buscarpor = $request->get('buscarpor');
        $producto=Producto::where('estado','=','1')
            ->where('descripcion', 'like','%'.$buscarpor.'%')
            ->paginate(5);
        return view('productos.index', compact('producto', 'buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoria=categoria::where('estado','=','1')->get();
        $unidad=unidad::where('estado','=','1')->get();
        return view('productos.create', compact('categoria','unidad'));
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
        $producto=new producto();
        $producto->descripcion=$request->descripcion;
        $producto->categoria_id=$request->categoria_id;
        $producto->unidad_id=$request->unidad_id;
        $producto->precio=$request->precio;
        $producto->cantidad=$request->cantidad;
        $producto->estado='1';
        $producto->save();

        return redirect()->route('productos.index')->with('datos', 'Registro Nuevo Guardado');
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
        $producto=producto::findOrfail($id);
        $categoria=categoria::where('estado','=','1')->get();
        $unidad=unidad::where('estado','=','1')->get();
        return view('productos.edit', compact('producto','categoria','unidad'));
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
        $producto=producto::findOrfail($id);
        $producto->descripcion=$request->descripcion;
        $producto->categoria_id=$request->categoria_id;
        $producto->unidad_id=$request->unidad_id;
        $producto->precio=$request->precio;
        $producto->cantidad=$request->cantidad;       
        $producto->save();

        return redirect()->route('productos.index')->with('datos', 'Registro Actualizado');
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
        $producto=producto::findorfail($id);
        $producto->estado='0';
        $producto->save();

        return redirect()->route('productos.index')->with('datos', 'Producto Eliminado');
    }

    public function confirmar($id){
        $producto = producto::findorfail($id);
        return view('productos.confirm', compact('producto'));
    }
}
