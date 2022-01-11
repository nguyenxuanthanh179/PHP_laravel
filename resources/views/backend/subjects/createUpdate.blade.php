@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>{{ !empty($array['id']) ? 'Edit information ' : 'Add Subject' }}</h2>
        </div>
        <div class="table">
            {!! Form::model($subjects, ['method' => $method, 'route' => [$array['route'], $array['id']]]) !!}
                <input type="hidden" name="id" value="{{!empty($array['id']) ? $subjects->id : ''}}">
                    <div class="form-group">
                        {!!  Form::label('name', 'Name:') !!}
                        {!!  Form::text('name', !empty($array['id']) ? $subjects->name : '' , ['class' => 'form-control']) !!}
                        @if ( $errors->has('name') )
                            <span role="alert" style="color:red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                <div class="form-group flex">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    <a href="{{ route('subjects.index') }}" class="btn btn-default btn-primary">Cancel</a>
            {!! Form::close() !!}
                </div>
        </div>
    </div>
        </main>

@endsection
