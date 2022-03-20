@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h1 class="my-3">{{ $msg }}</h1>

        @if (Request::is('dashboard/admins'))
            <div class="row">
                <div class="col-lg">
                    <a href="" class="btn btn-primary mb-3">Tambah Admin</a>
                </div>
            </div>
        @endif

        <table class="table table-striped table-sm my-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>
                            <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
                            <form action="" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure ?')"><i
                                        class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
