@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Editar etiqueta
                    </h5>

                    <div class="card-body">
                        {!! Form::model($tag, ['route' => ['admin.tags.update', $tag->id], 'method' => 'PUT']) !!}
                            @include('admin.tags.includes.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection