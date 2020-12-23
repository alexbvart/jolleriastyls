@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>Crear Registro</h1>
    <form action="{{route('unidad.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-0">
                    <label for="" hidden>Codigo</label>
                    <input type="text" class="form-control" id="id" name="id" hidden>
                </div>
                <div class="col-md-4">
                    <label for="">Descripcion</label>
                    <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                        name="descripcion">
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