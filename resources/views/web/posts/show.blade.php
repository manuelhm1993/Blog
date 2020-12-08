@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $post->name }}</h1>

            <div class="card mb-5">
                <h5 class="card-header bg-white">
                    Categoría
                    <a href="#">{{ $post->category->name }}</a>
                </h5>

                <div class="card-body">
                    @if ($post->file)
                    <img src="{{ $post->file }}" class="card-img-top" alt="Imagen del post">
                    @endif

                    <p class="card-text mt-4">{{ $post->excerpt }}</p>

                    <hr>
                    {{-- Se usa esta sintaxis porque el body tendrá código HTML --}}
                    {!! $post->body !!}
                    <hr>
                    Etiquetas

                    {{-- Iterar todas las etiquetas que tiene el post --}}
                    @foreach ($post->tags as $tag)
                    <a href="#" class="badge badge-primary">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection