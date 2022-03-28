@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            @if (auth()->user()->id_level !== 3)
                <h1 class="h2">Daftar perjalanan</h1>
            @else
                <h1 class="h2">Daftar perjalanan kamu</h1>
            @endif
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg">
                @can('user')
                    <a href="/dashboard/create" class="btn btn-primary mb-3">Buat Perjalanan</a>
                @endcan
                <a href="/dashboard/print?q={{ request('q') }}"
                    class="btn btn-success mb-3 @if ($perjalanans->count() < 1) disabled @endif" target="_blank">Export</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <form action="/dashboard" method="GET">
                    <div class="input-group mb-3">
                        @if (auth()->user()->id_level !== 3)
                            <input type="text" class="form-control @error('q') is-invalid @enderror"
                                placeholder="Cari berdasarkan NIK, Nama, Tujuan, atau Keperluan..." id="q" name="q"
                                value="{{ request('q') }}" autocomplete="off" autofocus>
                            @error('q')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            <input type="text" class="form-control @error('q') is-invalid @enderror"
                                placeholder="Cari berdasarkan Tujuan atau Keperluan..." id="q" name="q"
                                value="{{ request('q') }}" autocomplete="off" autofocus>
                            @error('q')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($perjalanans->count() > 0)
            <div class="table-responsive mb-5">
                <table class="table table-striped table-sm">
                    @if (auth()->user()->id_level !== 3)
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perjalanans as $perjalanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $perjalanan->tanggal }}</td>
                                    <td>{{ $perjalanan->nama }}</td>
                                    <td>{{ $perjalanan->tujuan }}</td>
                                    <td>
                                        <a href="" class="badge bg-info"><i class="bi bi-eye"></i></a>
                                        <form action="" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are you sure ?')"><i
                                                    class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Suhu tubuh</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Keperluan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($perjalanans as $perjalanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $perjalanan->tanggal }}</td>
                                    <td>{{ $perjalanan->suhu_tubuh }}</td>
                                    <td>{{ $perjalanan->tujuan }}</td>
                                    <td>{{ $perjalanan->keperluan }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            @else
                <h6 class="text-center text-muted my-3">Tidak ada perjalanan</h6>
        @endif
        </div>
    </main>
@endsection
