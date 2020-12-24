@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Editar categoría
                    </h5>

                    <div class="card-body">
                        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'PUT']) !!}
                            @include('admin.categories.includes.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection