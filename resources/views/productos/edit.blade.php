@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de PRODUCTO</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Modificar Producto</u></h5>
            <p class="card-text">
                <form action="{{route('productos.update', $producto->producto_id)}}" method="POST"
                    onsubmit="return validar_prod()">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-0">
                                <label for="" hidden>Codigo</label>
                                <input type="text" class="form-control" id="id" name="id" hidden>
                            </div>
                            <div class="col-md-4">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" name="descripcion" value="{{$producto->descripcion}}">
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Categorias</label>
                                <select class="form-control" name="categoria_id" id="categoria_id">
                                    @foreach ($categoria as $item)
                                    <option value="{{$item->categoria_id}}" {{$item->categoria_id==$producto->categoria_id ? 'selected':''}}>
                                        {{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Unidades</label>
                                <select class="form-control" name="unidad_id" id="unidad_id">
                                    @foreach ($unidad as $item)
                                    <option value="{{$item->unidad_id}}" {{$item->unidad_id==$producto->unidad_id ? 'selected':''}}>
                                        {{$item->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Precio</label>
                                <input type="number" value="{{$producto->precio}}" step=".1"
                                    class="form-control @error('precio') is-invalid @enderror" id="precio"
                                    name="precio">
                                @error('precio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="">Stock</label>
                                <input type="number" value="{{$producto->cantidad}}" step="1"
                                    class="form-control @error('cantidad') is-invalid @enderror" id="cantidad"
                                    name="cantidad" value="{{$producto->cantidad}}">
                                @error('cantidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    <a href="{{route('productos.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i>
                        Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>
<script src="/js/validaciones.js"></script>
@endsection