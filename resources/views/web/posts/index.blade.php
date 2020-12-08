@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Lista de artículos</h1>

            @foreach ($posts as $post)
            <div class="card mb-5">
                <h5 class="card-header bg-white">{{ $post->name }}</h5>

                <div class="card-body">
                    @if ($post->file)
                    <img src="{{ $post->file }}" class="card-img-top" alt="Imagen del post">
                    @endif

                    <p class="card-text mt-4">{{ $post->excerpt }}</p>
                    <a href="{{ route('web.posts.show', $post->slug) }}" class="float-right">Leer más</a>
                </div>
            </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection