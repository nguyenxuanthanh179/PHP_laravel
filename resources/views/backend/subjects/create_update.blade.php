@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>{{  $subject->id ? 'Edit Subject ' : 'Add Subject' }}</h2>
        </div>
        <div class="table">
            @if(!empty($subject->id))
                {!! Form::model($subject, ['method' => 'PUT', 'route' => ['subjects.update', $subject->id]]) !!}
            @else
                {!! Form::model($subject, ['method' => 'POST', 'route' => ['subjects.store']]) !!}
            @endif
                {!! Form::hidden('id',  $subject->id ) !!}
            <div class="form-group">
                {!!  Form::label('name', 'Name:') !!}
                {!!  Form::text('name', $subject->name , ['class' => 'form-control']) !!}
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
@endsection
