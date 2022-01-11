@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        @if (session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif
        <div class="row flex">
            <h2>Subject List</h2>
            <a class="content__add" href="{{ route('subjects.create') }}"><i class="fas fa-plus plus"></i> Add New</a>
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
                @foreach( $subjects as $key => $item )
                    <tr class="">
                        <td align="center">{{ $subjects->firstItem() + $key }}</td>
                        <td >{{ $item->name }}</td>
                        <td align="center">{{ $item->created_at }}</td>
                        <td align="center">{{ $item->updated_at }}</td>
                        <td class="d-flex">
                            <a href="{{ route('subjects.edit', [$item->id]) }}" class="button"><i class="far fa-edit"></i></a>
                            {{ Form::model($item, ['method'=>'DELETE', 'route' => ['subjects.destroy', $item->id]]) }}
                                <button onclick="return confirm('Are you sure you want to delete this entry?')" class="button remove"><i class="far fa-trash-alt "></i> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $subjects->links() }}
        </div>
    </div>
    </main>
@endsection
