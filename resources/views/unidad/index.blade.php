@extends('layout.plantilla')
@section('contenido')
<div class="container">
  <h1>Listado de Unidades</h1>
  <form class="form-inline my-2 my-lg-0 float-right">
    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search"
      value="{{$buscarpor}}">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
  </form>
  <a href="{{route('unidad.create')}}" class="btn btn-primary my-2 my-sm-0">Nuevo</a>
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
        <th scope="col">Codigo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($unidad as $f)
      <tr>
        <td>{{$f->unidad_id}}</td>
        <td>{{$f->descripcion}}</td>
        <td>
          <a href="{{route('unidad.edit',$f->unidad_id)}}" class="btn btn-info"><i
              class="fas fa-edit"></i>Editar</a>
          <a href="{{route('unidad.confirmar',$f->unidad_id)}}" class="btn btn-danger"><i
              class="fas fa-trash"></i>Quitar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$unidad->links()}}
</div>
@endsection