@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de PRODUCTO</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Listado de Productos</u></h5>
            <p class="card-text">
                <form class="form-inline my-2 my-lg-0 float-right">
                    <input name="buscarpor" class="form-control btn-sm mr-sm-2" type="search" placeholder="Buscar"
                        aria-label="Search" value="{{$buscarpor}}">
                    <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <a href="{{route('productos.create')}}" class="btn btn-sm btn-primary my-2 my-sm-0">Nuevo</a>
                @if (session('datos'))
                <div class="alert alert-warning alert-dissmissible fade show mt-3" role="alert">
                    {{session('datos')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Categoría</th>
                            <th scope="col">Unidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($producto as $item)
                        <tr>
                            <td>{{$item->producto_id}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->categoria->descripcion}}</td>
                            <td>{{$item->unidad->descripcion}}</td>
                            <td>{{$item->precio}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>
                                <a href="{{route('productos.edit',$item->producto_id)}}" class="btn btn-sm btn-info"><i
                                        class="fas fa-edit"></i>Editar</a>
                                <a href="{{route('productos.confirmar',$item->producto_id)}}"
                                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Quitar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$producto->links()}}
            </p>
        </div>
    </div>
</div>
@endsection