@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Welcome, {{ auth()->user()->nama }}</h1>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
            </div>
        @endif

        <a href="/dashboard/create" class="btn btn-primary mb-3">Buat Perjalanan</a>

        @if ($histories->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tujuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $history)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->tanggal }}</td>
                                <td>{{ $history->tujuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center text-muted">Tidak ada perjalanan</h6>
        @endif
        </div>
    </main>
@endsection
