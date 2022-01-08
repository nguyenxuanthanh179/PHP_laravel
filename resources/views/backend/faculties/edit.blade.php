@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        <div class="row flex">
            <h2>Edit information</h2>
        </div>
        <div class="table">
            {{ Form::open(['method'=>'PUT', 'route' => ['faculties.update', $faculty->id]]) }}
            <div class="row form-group">
                <div class="col">
                    {{ Form::label('', 'Name') }}
                    {{ Form::text('name', $faculty->name , ['class' => 'form-control']) }}
                    @if ( $errors->has('name') )
                        <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('faculties.index') }}" class="btn btn-default btn-primary">Cancel</a>
             {{ Form::close() }}
        </div>
    </div>
    </main>
@endsection
