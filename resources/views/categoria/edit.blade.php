@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de CATEGORÍA</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Modificar Categoría</u></h5>
            <p class="card-text">
                <form action="{{route('categoria.update', $categoria->categoria_id)}}" method="POST" onsubmit="return validar_cat()">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">
                                <label for="">Codigo</label>
                                <input disabled type="text" class="form-control" id="id" name="id"
                                    value="{{$categoria->categoria_id}}">
                            </div>
                            <div class="col-md-4">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" name="descripcion" value="{{$categoria->descripcion}}">
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                    <a href="{{route('categoria.index')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>
<script src="/js/validaciones.js"></script>
@endsection