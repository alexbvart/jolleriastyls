@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Editar Registro</h1>
    <form action="{{route('unidad.update', $unidad->unidad_id)}}" method="POST">
        @method('put')
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Codigo</label>
                    <input disabled type="text" class="form-control" id="id" name="id" value="{{$unidad->unidad_id}}">
                </div>
                <div class="col-md-4">
                    <label for="">Descripcion</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                        name="descripcion" value="{{$unidad->descripcion}}">
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
        <a href="{{route('unidad.index')}}" class="btn btn-danger"><i class="fas fa-ban"></i>Cancelar</a>
    </form>
</div>
@endsection