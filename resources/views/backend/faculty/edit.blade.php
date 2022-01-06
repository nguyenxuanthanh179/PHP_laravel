@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        <div class="row flex">
            <h2>Edit information</h2>
        </div>
        <div class="table">
            <form role="form" action="{{route('faculty.update',[$data->id])}}" method="post" enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="row form-group">
                    <div class="col">
                        <label for="name" >Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$data->name}}">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('faculty.index') }}" class="btn btn-default btn-primary">Cancel</a>
            </form>
        </div>
    </div>
    </main>
@endsection
