@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header bg-white">
                        Lista de etiquetas
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>
                    </h5>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" colspan="3">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td width="10px">
                                            <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-sm btn-secondary">Ver</a>
                                        </td>

                                        <td width="10px">
                                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                                        </td>

                                        <td width="10px">
                                            Eliminar
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection