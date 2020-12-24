@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Crear entrada
                    </h5>

                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.posts.store']) !!}
                            @include('admin.posts.includes.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection