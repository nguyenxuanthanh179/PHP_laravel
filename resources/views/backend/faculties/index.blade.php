@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        @if (session('success'))
            <div class="alert alert-success" >
                {{ session('success') }}
            </div>
        @endif
        <div class="row flex">
            <h2>Faculty List</h2>
            <a class="content__add" href="{{ route('faculty.create') }}">
                <i class="fas fa-plus plus"></i>
                Add
            </a>
        </div>
        <div class="table">
            <table >
                <thead class="table__header">
                <tr class="header__title">
                    <th style="width:40px">STT</th>
                    <th style="width:150px">Name</th>
                    <th style="width:80px">Date Created</th>
                    <th style="width:100px">Date Updated</th>
                    <th style="width:100px">Options</th>
                </tr>
                </thead>
                <tbody class="table__body">
                @foreach( $faculty as $key => $item )
                    <tr class="">
                        <td align="center">{{ $faculty->firstItem() + $key }}</td>
                        <td >{{ $item->name }}</td>
                        <td align="center">{{ $item->created_at }}</td>
                        <td align="center">{{ $item->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('faculty.edit', [$item->id]) }}" class="button"><i class="far fa-edit"></i></a>
                            {{ Form::open(['method'=>'DELETE', 'route' => ['faculty.destroy', $item->id ]]) }}
                                <button onclick="return confirm('Are you sure you want to delete this entry?')" class="button remove"><i class="far fa-trash-alt "></i> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
                {{ $faculty->links() }}
        </div>
    </div>
    </main>
@endsection
