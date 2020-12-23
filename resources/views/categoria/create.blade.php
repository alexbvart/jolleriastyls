@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de CATEGORÍA</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Nueva Categoría</u></h5>
            <p class="card-text">
                <form action="{{route('categoria.store')}}" method="POST" onsubmit="return validar_cat()">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-0">
                                <label for="" hidden>Codigo</label>
                                <input type="text" class="form-control" id="id" name="id" hidden>
                            </div>
                            <div class="col-md-4">
                                <label for="">Descripción</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" name="descripcion" placeholder="Ingrese descripción">
                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Guardar</button>
                    <a href="{{route('categoria.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i> Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>
<script src="/js/validaciones.js"></script>
@endsection