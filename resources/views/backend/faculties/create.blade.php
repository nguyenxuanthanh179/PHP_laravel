@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>Add Faculty</h2>
        </div>
        <div class="table">
            {!! Form::open(['action' => 'FacultyController@store']) !!}
            @include('backend.faculties.form', ['submitButtonText' => 'Add'])
            {!! Form::close() !!}
        </div>
    </div>
    </main>

@endsection
