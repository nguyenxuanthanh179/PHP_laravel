@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>{{  $mark->id ? 'Edit Mark ' : 'Add Mark' }}</h2>
        </div>
        <div class="table">
            @if(!empty($mark->id))
                {!! Form::model($mark, ['method' => 'PATCH', 'route' => ['marks.update', $mark->id]]) !!}
            @else
                {!! Form::model($mark, ['method' => 'POST', 'route' => ['marks.store']]) !!}
            @endif
            {!! Form::hidden('id',  $mark->id ) !!}
            <div class="form-group">
                {!!  Form::label('student_id', 'Student:') !!}
                {!! Form::select('student_id', $student, $mark->student_id, ['class' => 'form-control']) !!}
                @if ( $errors->has('student_id') )
                    <span role="alert" style="color:red;">{{ $errors->first('student_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!!  Form::label('subject_id', 'Subject:') !!}
                {!! Form::select('subject_id', $subject, $mark->subject_id, ['class' => 'form-control']) !!}
                @if ( $errors->has('subject_id') )
                    <span role="alert" style="color:red;">{{ $errors->first('subject_id') }}</span>
                @endif
            </div>
            <div class="form-group">
                {!!  Form::label('mark', 'Mark:') !!}
                {!!  Form::text('mark', $mark->mark , ['class' => 'form-control']) !!}
                @if ( $errors->has('mark') )
                    <span role="alert" style="color:red;">{{ $errors->first('mark') }}</span>
                @endif
            </div>
            <div class="form-group flex">
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('marks.index') }}" class="btn btn-default btn-primary">Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </main>

@endsection
