@extends('layouts.app')

@section('content')
    <div class="container">

        <aside class="col">
            <form action="{{ route('students.update', $student->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameId"
                        placeholder="Nama" value="{{ $student->name }}">
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" name="nim" id="nim" aria-describedby="nimId" placeholder="NIM"
                        value="{{ $student->nim }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" class="form-control"
                        placeholder="Address">{{ $student->address }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" aria-describedby="phoneId"
                        placeholder="Phone" value="{{ $student->phone }}">
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date" aria-describedby="birth_dateId"
                        placeholder="Birth Date" value="{{ $student->birth_date }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </aside>
    </div>
@endsection
