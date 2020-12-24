@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Lista de entradas
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
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
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->name }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Acciones CRUD">
                                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-success">Ver</a>
                                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                
                                                {!! Form::submit('Eliminar', ['form' => 'eliminar-' . $post->id, 'class' => 'btn btn-danger btn-sm']) !!}
                                            </div>

                                            {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'delete', 'id' => 'eliminar-' . $post->id]) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection