@extends('backend.layouts.main')

@section('content')
    <div class="content col-10">
        @if (session('success'))
            <div class="alert alert-success" >{{ session('success') }}</div>
        @endif
        <div class="row flex">
            <h2>Student List</h2>
            <a class="content__add" href="{{ route('students.create') }}"><i class="fas fa-plus plus"></i> Add New</a>
        </div>
        <div class="table">
            <table >
                <thead class="table__header">
                <tr class="header__title">
                    <th>STT</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Birthday</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Faculty</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody class="table__body">
                @foreach( $students as $key => $student )
                    <tr class="">
                        <td align="center">{{ $students->firstItem() + $key }}</td>
                        <td >{{ $student->name }}</td>
                        <td align="center">
                            @if(!empty($student->id))
                                <img src="{{ asset($student->image) }}" width="70" height="70">
                            @endif
                        </td>
                        <td align="center">{{ date('d-m-Y', strtotime($student->birthday)) }}</td>
                        <td align="center">{{ ($student->gender == 0) ? 'Nam' : 'Nữ' }}</td>
                        <td align="center">{{ $student->address }}</td>
                        <td align="center">{{ $student->phone_number }}</td>
                        <td align="center">{{ $student->faculty->name }}</td>
                        <td class="d-flex pt-3 pb-5">
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info mr-1"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning"><i class="far fa-edit"></i></a>
                            {{ Form::model($student, ['method'=>'DELETE', 'route' => ['students.destroy', $student->id]]) }}
                            <button onclick="return confirm('Are you sure you want to delete this entry?')" class="btn btn-danger ml-1"><i class="far fa-trash-alt "></i> </button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $students->links() }}
        </div>
    </div>
@endsection
