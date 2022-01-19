@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>Mark List</h2>
            <button id="addForm" class="btn btn-success"><i class="fas fa-plus plus"></i> Add New</button>
        </div>
        <div class="table">
            @if(!empty($student->id))
                {!! Form::model($student, ['method' => 'PUT', 'route' => ['students.update', $student->id]]) !!}
            @else
                {!! Form::model($student, ['method' => 'POST', 'route' => ['students.store']]) !!}
            @endif
            {!! Form::hidden('id',  $student->id ) !!}
            <div class="row">
                <div class="form-group col-7">
                    {!!  Form::label('subject', 'Subject:') !!}
                </div>
                <div class="form-group col-4">
                    {!!  Form::label('mark', 'Mark:') !!}
                </div>
            </div>
            @if(!empty($student->id))
                @foreach ($student->subjects as $subjects)
                    <div class="row" >
                        <div class="form-group col-7">
                            {!! Form::select('subject_id', $subject , $subjects->pivot->subject_id, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-4">
                            {!!  Form::text('mark', $subjects->pivot->mark ,['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-1 pb-5 d-flex justify-content-start align-items-center">
                            {{ Form::model($subjects, ['method'=>'DELETE', 'route' => ['marks.delete', $subjects->pivot->id ]]) }}
                            <button onclick="return confirm('Are you sure you want to delete this entry?')" class="btn btn-danger ml-1"><i class="fas fa-times"></i></button>
                            {{ Form::close() }}
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row" id="formMark">
            </div>
            <div class=" col-12 form-group flex">
                {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                <a href="{{ route('students.index') }}" class="btn btn-default btn-primary">Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#addForm').click(function () {
                $('#formMark').append(`
                <div class="form-group col-7">
                    {!! Form::select('subject_id', $subject , null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-4">
                    {!!  Form::text('mark', '',['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-1 pb-5 d-flex justify-content-start align-items-center">
                    <button type="button" onclick="return confirm('Are you sure you want to delete this entry?')" class="btn btn-danger ml-1"><i class="fas fa-times"></i></button>
                </div>
               `);
            })
        });
    </script>
@endsection
