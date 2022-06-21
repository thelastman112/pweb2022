@extends('layouts.app')
@section('content')


<div class="container">
    <h1>Halaman Student</h1>
    <section class="row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentadd">
            Student Add Data
        </button>

        <!-- Modal add -->
        <div class="modal fade" id="studentadd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="add">
                        <div class="modal-body">
                            @csrf
                            {{-- name --}}
                            <div>
                                <label> Nama </label>
                                <input type="text" class="form-control" name="name" placeholder="enter name">
                            </div>
                            {{-- nim --}}
                            <div>
                                <label> NIM </label>
                                <input type="text" class="form-control" name="nim" placeholder="enter nim">
                            </div>
                            {{-- address --}}
                            <div>
                                <label> Alamat </label>
                                <textarea class="form-control" name="address" placeholder="enter address"></textarea>
                            </div>
                            {{-- phone --}}
                            <div>
                                <label> Phone </label>
                                <input type="text" class="form-control" name="phone" placeholder="enter phone">
                            </div>
                            {{-- birthdate --}}
                            <div>
                                <label> Birthdate </label>
                                <input type="date" class="form-control" name="birth_date" placeholder="enter birthdate">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Student Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal edit/update -->
        <div class="modal fade" id="studentedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="edit">
                        <div class="modal-body">
                            @csrf
                            {{-- name --}}
                            <div>
                                <label> Nama </label>
                                <input type="text" class="form-control" name="name" placeholder="enter name">
                            </div>
                            {{-- nim --}}
                            <div>
                                <label> NIM </label>
                                <input type="text" class="form-control" name="nim" placeholder="enter nim">
                            </div>
                            {{-- address --}}
                            <div>
                                <label> Alamat </label>
                                <textarea class="form-control" name="address" placeholder="enter address"></textarea>
                            </div>
                            {{-- phone --}}
                            <div>
                                <label> Phone </label>
                                <input type="text" class="form-control" name="phone" placeholder="enter phone">
                            </div>
                            {{-- birthdate --}}
                            <div>
                                <label> Birthdate </label>
                                <input type="date" class="form-control" name="birth_date" placeholder="enter birthdate">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Student Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        {{-- ajax for insert --}}
        <script>
            $(document).ready(function()
            {
                $('#add').on('submit', function (event)
                {
                    event.preventDefault();
                    var form_data = $(this).serialize();
                    console.log(form_data);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('students.store') }}',
                        // url: "/students",
                        data: $(this).serializeArray(),
                        success : function(data){
                            data = data.data;
                            $('#tbody').prepend(
                            '<tr>' +
                            '<td>' + data.name + '</td>' +
                            '<td>' + data.nim + '</td>' +
                            '<td>' + data.address + '</td>' +
                            '<td>' + data.phone + '</td>' +
                            '<td>' + data.birth_date + '</td>' +
                            '<td>' +
                                    `<a href="/students/${data.id}" class="btn btn-warning">Edit</a>` +
                                    '<a href="/students/' + data.id + '" class="btn btn-danger">Delete</a>' +
                                    '</td>' +
                                    '</tr>'
                                    );
                                    document.getElementById('add').reset();
                                    //reset modal
                                    $('#studentadd').modal('hide');
                                    Swal.fire ({
                                        icon : 'success',
                                        title : 'Data Berhasil Ditambahkan',
                                        text : 'Data Berhasil Ditambahkan',
                                        showConfirmButton : false,
                                        timer: 1050
                                    })
                                    $('#studentadd .close').click();
                                },
                                error: function(error){
                                    console.log(error);
                                    alert ('Data Gagal Ditambahkan');
                                }
                        });
                });
            $('[id^="delete"]') .each (function () {
                $(this).on('click', function (e) {
                    const id = $(this).data('id');
                    console.log(id);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'DELETE',
                        url: '/students/' + id,
                        success: function(data){
                            $(e.target) .closest('tr') .remove();
                            console.log($(this));
                            $('#student' + id).remove();
                        Swal.fire({
                            icon : 'success',
                            title : 'Data Berhasil Dihapus',
                            showConfirmButton : false,
                            timer : 1050
                        });
                        },

                        error: function(error){
                            console.log(error);
                            alert('Data Gagal Dihapus');
                        }
                    });

                });
            });
            //ajax for edit
        });
            </script>

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
                    <tbody id="tbody">
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->nim }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->birth_date }}</td>
                            <td>

                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                <button class="btn btn-danger" data-id="{{ $student->id }}" id="delete"> Delete </button>
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
