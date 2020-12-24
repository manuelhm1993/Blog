@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Lista de categorías
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    </h5>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Acciones CRUD">
                                                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-sm btn-success">Ver</a>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                
                                                {!! Form::submit('Eliminar', ['form' => 'eliminar-' . $category->id, 'class' => 'btn btn-danger btn-sm']) !!}
                                            </div>

                                            {!! Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete', 'id' => 'eliminar-' . $category->id]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection