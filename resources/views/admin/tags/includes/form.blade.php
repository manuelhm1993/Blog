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