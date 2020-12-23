@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de CATEGORÍA</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Eliminar Categoría</u></h5>
            <p class="card-text">
                <strong>Código: </strong> {{$categoria->categoria_id}} <br>
                <strong>Descripción: </strong> {{$categoria->descripcion}}
            </p>
            <h5 class="card-title">¿Desea eliminar?</h5><br>
            <form action="{{route('categoria.destroy', $categoria->categoria_id)}}" method="POST">
                @method('DELETE')
                @csrf
                <div class="mx-auto">
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-check-square"></i>
                        Si
                    </button>
                    <a href="{{route('categoria.index')}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-times-circle"></i>
                        NO
                    </a>
                </div>
            </form>
            </p>
        </div>
    </div>
</div>
@endsection