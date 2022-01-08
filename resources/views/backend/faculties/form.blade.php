<div class='form-group'>
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    @if ( $errors->has('name') )
        <span role="alert" style="color:red;">{{ $errors->first('name') }}</span>
    @endif
</div>

<div class='form-group flex'>
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-success']) !!}
    <a href="{{ route('faculties.index') }}" class="btn btn-default btn-primary">Cancel</a>
</div>
