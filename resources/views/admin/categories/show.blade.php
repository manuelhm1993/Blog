@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">
                        Detalle de la etiqueta
                    </h5>

                    <div class="card-body">
                        <p class="card-text">
                            <strong>Nombre: </strong> {{ $tag->name }}
                        </p>

                        <p class="card-text">
                            <strong>Slug: </strong> {{ $tag->slug }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection