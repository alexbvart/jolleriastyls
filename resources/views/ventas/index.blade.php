@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>LISTADO DE VENTAS</h1>
    <form class="form-inline my-2 my-lg-0 float-right">
        <input name="buscarpor" class="form-control btn-sm mr-sm-2" type="search" placeholder="Buscar"
            aria-label="Search" value="">
        <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    <a href="{{route('ventas.create')}}" class="btn btn-primary btn-sm my-2 my-sm-0">Nuevo</a>
    @if (session('datos'))
    <div class="alert alert-warning alert-dissmissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <br><br>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Tipo</th>
                <th scope="col">NroDoc</th>
                <th scope="col">Fecha</th>
                <th scope="col">RUC/DNI</th>
                <th scope="col">NOMBRES/RAZON</th>
                <th scope="col">TOTAL</th>           
            </tr>
        </thead>
        <tbody>
            @foreach ($venta as $itemventa)
            <tr>
                <td>{{$itemventa->venta_id}}</td>
                <td>{{$itemventa->Tipo->descripcion}}</td>
                <td>{{$itemventa->nrodoc}}</td>
                <td>{{$itemventa->fecha_venta}}</td>
                <td>{{$itemventa->cliente->ruc_dni}}</td>
                <td>{{$itemventa->cliente->nombres}}</td>
                <td>S/. {{$itemventa->total}}</td>           
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$venta->links()}}
</div>
@endsection