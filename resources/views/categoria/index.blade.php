@extends('layout.plantilla')
@section('contenido')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h4><strong>CATEGORÍA</strong></h4>
            </div>
            <div class="card-body">
                <p class="card-text">

                <nav class="navbar navbar-light bg-light justify-content-between">

                    <a href="{{ route('categoria.create') }}" class="btn btn-primary btn-md  my-sm-0">
                         <strong>+ Nuevo</strong>
                    </a>

                    <form class="form-inline  my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search"
                            value="{{ $buscarpor }}">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                            Buscar
                        </button>
                    </form>
                </nav>

                @if (session('datos'))
                    <div class="alert alert-warning alert-dissmissible fade show mt-3" role="alert">
                        {{ session('datos') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                  <table class="table table table-striped">
                      <thead class="thead-dark ">
                          <tr>
                              <th scope="col">Codigo</th>
                              <th scope="col">Descripcion</th>
                              <th scope="col">Opciones</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categoria as $itemcategoria)
                              <tr>
                                  <td>{{ $itemcategoria->categoria_id }}</td>
                                  <td>{{ $itemcategoria->descripcion }}</td>
                                  <td>
                                      <a href="{{ route('categoria.edit', $itemcategoria->categoria_id) }}"
                                          class="btn btn-sm btn-info"><i class="fas fa-edit"></i>Editar</a>
                                      <a href="{{ route('categoria.confirmar', $itemcategoria->categoria_id) }}"
                                          class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>Quitar</a>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
                {{ $categoria->links() }}
                </p>
            </div>
        </div>
    </div>
@endsection
