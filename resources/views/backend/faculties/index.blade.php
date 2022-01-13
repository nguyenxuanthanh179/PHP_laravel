@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        @if (session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif
        <div class="row flex">
            <h2>Faculty List</h2>
            <a class="content__add" href="{{ route('faculties.create') }}"><i class="fas fa-plus plus"></i> Add New</a>
        </div>
        <div class="table">
            <table >
                <thead class="table__header">
                    <tr class="header__title">
                        <th>STT</th>
                        <th>Name</th>
                        <th>Date Created</th>
                        <th>Date Updated</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                @foreach( $faculties as $key => $faculty )
                    <tr class="">
                        <td align="center">{{ $faculties->firstItem() + $key }}</td>
                        <td >{{ $faculty->name }}</td>
                        <td align="center">{{ $faculty->created_at }}</td>
                        <td align="center">{{ $faculty->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('faculties.edit', $faculty->id) }}" class="button"><i class="far fa-edit"></i></a>
                            {{ Form::model($faculty, ['method'=>'DELETE', 'route' => ['faculties.destroy', $faculty->id]]) }}
                                <button onclick="return confirm('Are you sure you want to delete this entry?')" class="button remove"><i class="far fa-trash-alt "></i> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $faculties->links() }}
        </div>
    </div>
@endsection
