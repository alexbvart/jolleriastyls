@extends('layout.plantilla')
@section('contenido')
<br>
<div class="card">
  <div class="card-header">
    <h4><strong>Mantenedor de CLIENTE</strong></h4>
  </div>
  <div class="card-body">
    <h5 class="card-title"><u>.::Listado de Clientes</u></h5>
    <p class="card-text">
      <form class="form-inline my-2 my-lg-0 float-right">
        <input name="buscarpor" class="form-control btn-sm mr-sm-2" type="search" placeholder="Buscar por ruc/dni"
          aria-label="Search" value="{{$buscarpor}}">
        <button class="btn btn-success btn-sm my-2 my-sm-0" type="submit">Buscar</button>
      </form>
      <a href="{{route('clientes.create')}}" class="btn btn-sm btn-primary my-2 my-sm-0">Nuevo</a>
      @if (session('datos'))
      <div class="alert alert-warning alert-dissmissible fade show mt-3" role="alert">
        {{session('datos')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <table class="table table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Código</th>
            <th scope="col">RUC/DNI</th>
            <th scope="col">Nombres/Razón</th>
            <th scope="col">Email</th>        
            <th scope="col">Dirección</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clientes as $item)
          <tr>
            <td>{{$item->cliente_id}}</td>
            <td>{{$item->ruc_dni}}</td>
            <td>{{$item->nombres}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->direccion}}</td>
            <td>
              <a href="{{route('clientes.edit',$item->cliente_id)}}" class="btn btn-sm btn-info"><i
                  class="fas fa-edit"></i>Editar</a>
              <a href="{{route('clientes.show',$item->cliente_id)}}" class="btn btn-sm btn-danger"><i
                  class="fas fa-trash"></i>Quitar</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$clientes->links()}}
    </p>
  </div>
</div>
@endsection