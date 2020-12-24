<div class="form-group">
    {!! Form::label('name', 'Nombre de la etiqueta') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'URL Amigable') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
</div>

@if (isset($tag))
    <div class="form-group">
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    </div>
@else
    <div class="form-group">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
    </div>
@endif

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

            $('#slug, #name').on('keyup', function (e) {
                let objeto = (e.target.name == 'slug') ? $(this) : '#slug';

                $(objeto).val(toSlug($(this).val()));
            });
        }, false);
    </script>
@endsection