@extends('backend.layouts.main')

@section('content')
    <div class="content col-8">
        <div class="row flex">
            <h2>List of Faculties</h2>
            <a class="content__add" href="{{ route('faculty.create') }}">
                <i class="fas fa-plus plus"></i>
                Add
            </a>
        </div>
        <div class="table">
            <table>
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
                @foreach($data as $key => $item)
                    <tr class="">
                        <td align="center">{{$key+1}}</td>
                        <td >{{$item->name}}</td>
                        <td align="center">{{$item->created_at}}</td>
                        <td align="center">{{$item->updated_at}}</td>
                        <td align="center">
                            <a href="{{ route('faculty.edit',[$item->id]) }}" class="button"><i class="far fa-edit"></i></a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="{{ route('faculty.delete',[$item->id]) }}" class="button"><i class="far fa-trash-alt"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
                {{ $data->links() }}
        </div>
    </div>
    </main>
@endsection
