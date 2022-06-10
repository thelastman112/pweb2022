@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Halaman Student</h1>
        <section class="row">
            <form action="{{ route('students.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameId"
                        placeholder="Nama">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="nimId"
                        placeholder="NIM">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"
                        placeholder="Address"></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneId"
                        placeholder="Phone">
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date"
                        aria-describedby="birth_dateId" placeholder="Birth Date">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div>
                <br>
            </div>
            <table class="col table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama
                            <a href="#"><i class="fas fa-sort"></i></a>
                        </th>
                        <th>NIM</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Birth Date</th>
                        <th>Action</th>
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
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <aside class="col"> --}}
            {{-- </aside> --}}
        </section>
    </div>
@endsection
