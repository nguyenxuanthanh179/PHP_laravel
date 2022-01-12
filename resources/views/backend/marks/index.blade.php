@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        @if (session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif
        <div class="row flex">
            <h2>Mark List</h2>
            <a class="content__add" href="{{ route('marks.create') }}"><i class="fas fa-plus plus"></i> Add New</a>
        </div>
        <div class="table">
            <table >
                <thead class="table__header">
                <tr class="header__title">
                    <th>STT</th>
                    <th>Student</th>
                    <th>Subject</th>
                    <th>Mark</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody class="table__body">
                @foreach( $marks as $key => $item )
                    <tr class="">
                        <td align="center">{{ $marks->firstItem() + $key }}</td>
                        <td >{{ $item->student->name }}</td>
                        <td >{{ $item->subject->name }}</td>
                        <td align="center">{{ $item->mark }}</td>
                        <td class="d-flex">
                            <a href="{{ route('marks.edit', [$item->id]) }}" class="button"><i class="far fa-edit"></i></a>
                            {{ Form::model($item, ['method'=>'DELETE', 'route' => ['marks.destroy', $item->id]]) }}
                            <button onclick="return confirm('Are you sure you want to delete this entry?')" class="button remove"><i class="far fa-trash-alt "></i> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $marks->links() }}
        </div>
    </div>
    </main>
@endsection
