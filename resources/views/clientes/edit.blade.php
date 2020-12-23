@extends('layout.plantilla')
@section('contenido')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4><strong>Mantenedor de CLIENTE</strong></h4>
        </div>
        <div class="card-body">
            <h5 class="card-title"><u>.::Modificar Cliente</u></h5>
            <p class="card-text">
                <form action="{{route('clientes.update', $cliente->cliente_id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Ruc/Dni</label>
                                <input type="text" class="form-control @error('ruc_dni') is-invalid @enderror"
                                    id="ruc_dni" name="ruc_dni" placeholder="Ingrese ruc/dni"
                                    value="{{$cliente->ruc_dni}}">
                                @error('ruc_dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Nombres/Razón</label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres"
                                name="nombres" placeholder="Ingrese nombres" value="{{$cliente->nombres}}">
                            @error('nombres')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Ingrese ruc/dni" value="{{$cliente->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control @error('direccion') is-invalid @enderror"
                                id="direccion" name="direccion" placeholder="Ingrese direccion"
                                value="{{$cliente->direccion}}">
                            @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary" onclick="return validar_cliente()"><i
                            class="fas fa-save"></i>
                        Guardar</button>
                    <a href="{{route('clientes.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-ban"></i>
                        Cancelar</a>
                </form>
            </p>
        </div>
    </div>
</div>
<script src="/js/validaciones.js"></script>
@endsection