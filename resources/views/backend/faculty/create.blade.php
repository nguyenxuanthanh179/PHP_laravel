@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        <div class="row flex">
            <h2>Add Faculty</h2>
        </div>
        <div class="table">
            <form role="form" action="{{ route('faculty.store') }}" method="post">
                @csrf
                <div class="row form-group">
                    <div class="col">
                        <label for="name" >Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tạo</button>
                <a href="{{route('faculty.index')}}" class="btn btn-default btn-primary" style="border:1px solid #ccc">Cancel</a>
            </form>
        </div>
    </div>
    </main>

@endsection
