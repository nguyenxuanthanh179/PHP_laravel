@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        <div class="row flex">
            <h2>Edit information</h2>
        </div>
        <div class="table">
            {!! Form::model($faculty, ['method' => 'PATCH', 'action' => ['FacultyController@update',$faculty->id]]) !!}
            @include('backend.faculties.form', ['submitButtonText' => 'Save'])
            {!! Form::close() !!}
        </div>
    </div>
    </main>
@endsection



