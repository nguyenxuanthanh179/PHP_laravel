@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>{{  $faculty->id ? 'Edit Faculty ' : 'Add Faculty' }}</h2>
        </div>
        <div class="table">
            @if(!empty($faculty->id))
                {!! Form::model($faculty, ['method' => 'PATCH', 'route' => ['faculties.update', $faculty->id]]) !!}
            @else
                {!! Form::model($faculty, ['method' => 'POST', 'route' => ['faculties.store']]) !!}
            @endif
                {!! Form::hidden('id',  $faculty->id ) !!}
                <div class="form-group">
                    {!!  Form::label('name', 'Name:') !!}
                    {!!  Form::text('name', $faculty->name , ['class' => 'form-control']) !!}
                    @if ( $errors->has('name') )
                        <span role="alert" style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group flex">
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    <a href="{{ route('faculties.index') }}" class="btn btn-default btn-primary">Cancel</a>
                {!! Form::close() !!}
                </div>
        </div>
    </div>
        </main>

@endsection
