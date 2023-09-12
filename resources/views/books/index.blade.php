@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class=" card-header">
                <div class="row">
                    <div class="col-10 col-lg-10"><h4>Listado de libros</h4></div>
                    <div class="col-2 col-lg-2">
                        @can('books-crear')
                            <a href="{{ route('books.create') }}" class="btn btn-sm btn-success">Crear</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id#</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Precio</th>
                            <th>Fecha de Publicacion</th>
                            <th>Genero</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book )
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>$ {{ $book->price }}</td>
                            <td>{{ $book->publication_date }}</td>
                            <td>{{ $book->gender->name }}</td>
                            <td>
                                @can('books-ver')
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">Ver</a>
                                @endcan
                                @can('books-editar')
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                @endcan
                                @can('books-deshabilitar')
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $books->links("vendor.pagination.bootstrap-5") }}
            </div>
        </div>
    </div>
</div>
@endsection