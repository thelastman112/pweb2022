@extends('layouts.app')

@section('content')
    <h1>selamat datang</h1>
    <table>
        <thead>
            <tr>
                <td>name</td>
                <td>nim</td>
                <th>address</th>
                <th>phone</th>
                <th>birth date</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->birth_date }}</td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}">edit</a>
                    <form action="{{ route('student.destroy', $student->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <aside>
        <form action="{{ route }}"></form>
    </aside>
@endsection
