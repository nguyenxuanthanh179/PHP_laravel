@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>Point List</h2>
        </div>
        <div class="table">
            <div class="row">
                <div class="form-group col-7">
                    {!!  Form::label('subject', 'Subject:') !!}
                </div>
                <div class="form-group col-4">
                    {!!  Form::label('mark', 'Mark:') !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-7">
                    {!! Form::select('subject', $subject, $student->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-4">
                    {!!  Form::text('mark', '',['class' => 'form-control']) !!}
                </div>
            </div>
            <div class=" col-12 form-group flex">
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('students.index') }}" class="btn btn-default btn-primary">Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </main>

@endsection
