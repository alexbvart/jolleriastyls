<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CabeceraVenta;
use App\Tipo;
use App\Parametro;
use App\Cliente;
use App\Producto;
use DB;
use App\DetalleVenta;
use Carbon\Carbon;

class CabeceraVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $venta=CabeceraVenta::where('estado','=','1')->paginate(5);
        return view('ventas.index', compact('venta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cliente=Cliente::where('estado','=','1')->get();        
        $producto=Producto::where('estado','=','1')->get();
        $tipo=Tipo::all();
        $tipou=Tipo::select('tipo_id','descripcion')->orderBy('tipo_id','DESC')->get();
        $parametros=Parametro::findOrFail($tipou[0]->tipo_id);
        return view('ventas.create', compact('tipo', 'parametros', 'cliente', 'producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function dar_formato($numero){
        if ($numero<10) return "0000".$numero;
        else if ($numero<100) return "000".$numero;
        else if ($numero<1000) return "00".$numero;
        else if ($numero<10000) return "0".$numero;
        else return ''.$numero;
    }

    public function store(Request $request)
    {
        //             
        try {
            DB::beginTransaction();
            /* Grabar Cabecera */
            /* Obtiene codigo cliente a partir del dni */
            $cliente=Cliente::where('ruc_dni','=',$request->ruc)->get();
            $cliente_id=$cliente[0]->cliente_id;
            $venta=new CabeceraVenta();
            $venta->cliente_id=$cliente_id;
            $venta->nrodoc=$request->get('nrodoc'); 
            $venta->tipo_id=$request->seltipo;
            $arr = explode('/', $request->fecha);
            $nFecha = $arr[2].'-'.$arr[1].'-'.$arr[0];
            $venta->fecha_venta=$nFecha;            
            if ($request->seltipo='2'){
                $venta->total=$request->total;
                $venta->subtotal='0';
                $venta->igv='0';
            }
            else{
                $venta->total=$request->total;
                $venta->subtotal=$request->total-($request->total*0.18);
                $venta->igv=$request->total*0.18;
            }

            $venta->estado='1';
            $venta->save();
            /* Grabar Detalle */
            //$detalleventa=$request->get('detalles');
            $producto_id = $request->get('cod_producto');
            $cantidad = $request->get('cantidad');
            $pventa = $request->get('pventa');
            $cont = 0;
            while ($cont<count($producto_id)) {
                $detalle=new DetalleVenta();
                $detalle->venta_id=$venta->venta_id;
                $detalle->producto_id=$producto_id[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precio=$pventa[$cont];
                $detalle->save();

                /* Actualizar stock */
                Producto::ActualizarStock($detalle->producto_id,$detalle->cantidad);
                $cont=$cont+1;
            }
            /* Actualizar el numero de documento en la tabla parametro */
            $numeracion='';
            $numeracion=$this->dar_formato($request->numeracion+1);     
            Parametro::ActualizarNumero($venta->tipo_id, $numeracion);
            DB::commit();
            return redirect()->route('ventas.index');
        }
        catch (Exception $e) {
            DB::rollback();
        }
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
        //
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
    }

    public function BuscarProducto(Request $request){
        $locationVal=$request->seleccion;
        $matchedCities=Producto::where('descripcion','like','%'.$locationVal.'%')
            ->pluck('descripcion','descripcion');
        return response()->json(['items'=>$matchedCities]);
    }
    
    /* Para select2 Buscar Productos */
    public function ProductoCodigo($producto_id){
        return DB::table('productos as p')
            ->join('unidads as u','p.unidad_id','=','u.unidad_id')
            ->where('p.estado','=','1')
            ->where('p.producto_id','=',$producto_id)
            ->select('p.producto_id','p.descripcion','u.descripcion as unidad','p.precio','p.cantidad')->get();
    }

    /* Para select2 Buscar Clientes */
    public function PorCodigo($cliente_id){
        return Cliente::where('cliente_id','=',$cliente_id)->get();
    }
    
    /* Para select2 Buscar Tipo */
    public function ListarTipo(Request $request){
        $locationVal=$request->seltipo;
        $matchedCities=Tipo::where('descripcion','like','%'.$locationVal.'%')
            ->orderBy('descripcion', 'asc')->pluck('descripcion','descripcion');
        return response()->json(['items'=>$matchedCities]);
    }

    public function PorTipo($tipo_id){
        //return Tipo::where('descripcion','=',$descripcion)->get();
        return DB::table('tipo as t')
            ->join('parametros as p','p.tipo_id','=','t.tipo_id')
            ->where('t.tipo_id','=',$tipo_id)
            ->select('t.tipo_id','t.descripcion','p.serie','p.numeracion')->get();
    }   
}
