<div class="form-group">
    {!! Form::label('name', 'Nombre de la etiqueta') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'URL Amigable') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Descripción') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body']) !!}
</div>

@if (isset($category))
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

            $('#name').keyup(function (e) {
                $('#slug').val(toSlug($(this).val()));
            });

            $('#slug').blur(function (e) {
                $(this).val(toSlug($(this).val()));
            });
        }, false);
    </script>
@endsection