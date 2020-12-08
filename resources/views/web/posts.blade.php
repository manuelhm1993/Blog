@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Lista de artículos</h1>

                @foreach ($posts as $post)
                <div class="card my-5">
                    <h5 class="card-header">{{ $post->name }}</h5>

                    @if ($post->file)
                    <img src="{{ $post->file }}" class="card-img-top" alt="Imagen del post">
                    @endif

                    <div class="card-body">
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="#" class="float-right">Leer más</a>
                    </div>
                </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection