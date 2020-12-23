@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <h1>¿Desea eliminar registro {{$unidad->unidad_id}} - {{$unidad->descripcion}}?</h1>
    <form action="{{route('unidad.destroy', $unidad->unidad_id)}}" method="POST">
        @method('DELETE')
        @csrf
        <div class="mx-auto">
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-check-square"></i>
                Si
            </button>
            <a href="{{route('unidad.index')}}" class="btn btn-primary">
                <i class="fas fa-times-circle"></i>
                NO
            </a>
        </div>
    </form>
</div>
@endsection