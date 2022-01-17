@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>Point List</h2>
        </div>
        <div class="table">
            <div class="row flex justify-content-end">
                <a class="content__add" href="{{ route('marks.create') }}"><i class="fas fa-plus plus"></i> Add New</a>
            </div>
        <div class="row">
            <div class="form-group col-7">
                {!!  Form::label('subject', 'Subject:') !!}
            </div>
            <div class="form-group col-4">
                {!!  Form::label('mark', 'Mark:') !!}
            </div>

        </div>

        <div class="row">
            @foreach ($student->subjects as $subject)
            <div class="form-group col-7">
                {!! Form::text('subject', $subject->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-4">
                {!!  Form::text('mark', $subject->pivot->mark ,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-1 pb-5 d-flex justify-content-start align-items-center">
                {{ Form::open(['method'=>'DELETE', 'route' => ['students.delete', $student->id ]]) }}
                <button onclick="return confirm('Are you sure you want to delete this entry?')" class="btn btn-danger ml-1"><i class="fas fa-times"></i></button>
                {{ Form::close() }}
            </div>
            @endforeach
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
