{!! Form::hidden('user_id', auth()->user()->id) !!}

<div class="form-group">
    {!! Form::label('category_id', 'Categorías') !!}

    {{-- Forma de crear una lista desplegable con una variable de controlador --}}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre de la entrada') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'URL Amigable') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Imagen') !!}
    {!! Form::file('file', ['class' => 'form-control-file']) !!}
</div>

<div class="form-group">
    {!! Form::label('tags', 'Etiquetas') !!}
    
    <div>
        @foreach ($tags as $tag)
            <label>
                {!! Form::checkbox('tags[]', $tag->id) !!} {{ $tag->name }}
            </label>
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Estado', ['class' => 'd-block']) !!}

    <div class="custom-control custom-radio custom-control-inline">
        {!! Form::radio('status', 'PUBLISHED', false, ['class' => 'custom-control-input', 'id' => 'customRadioInline1']) !!}
        {!! Form::label('customRadioInline1', 'Publicado', ['class' => 'custom-control-label']) !!}
    </div>

    <div class="custom-control custom-radio custom-control-inline">
        {!! Form::radio('status', 'DRAFT', false, ['class' => 'custom-control-input', 'id' => 'customRadioInline2']) !!}
        {!! Form::label('customRadioInline2', 'Borrador', ['class' => 'custom-control-label']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('excerpt', 'Extracto') !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Descripción') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    @if (isset($post))
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    @else
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    @endif
</div>

@section('scripts')
    <script defer>
        /*
        El evendo $(document).ready(function() {}); no es soportado
        Pero se puede usar el resto de JQuery dentro del evendo load
        */
        window.addEventListener('load', function() {
            let toSlug = (str) => {
                let slug = '';
                let trimmed = $.trim(str);

                slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');

                return slug.toLowerCase();
            };

            $('#name').keyup(function (e) {
                $('#slug').val(toSlug($(this).val()));
            });

            $('#slug').blur(function (e) {
                $(this).val(toSlug($(this).val()));
            });
        }, false);
    </script>
@endsection