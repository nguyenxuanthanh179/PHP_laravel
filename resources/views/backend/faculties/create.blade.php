@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        <div class="row flex">
            <h2>Add Faculty</h2>
        </div>
        <div class="table">
                {{ Form::open(['method'=>'POST', 'route' => 'faculties.store' ]) }}
                <div class="row form-group">
                    <div class="col">
                        {{ Form::label('', 'Name') }}
                        {{ Form::text('name','', ['class' => 'form-control']) }}
                        @if ( $errors->has('name') )
                            <span class="invalid-feedback" role="alert" style="color:red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                </div>
                {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
                <a href="{{ route('faculties.index') }}" class="btn btn-default btn-primary">Cancel</a>
                {{ Form::close() }}
        </div>
    </div>
    </main>

@endsection
