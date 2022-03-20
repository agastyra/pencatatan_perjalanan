@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if (auth()->user()->id_level == 1)
            <h1>Ini halaman untuk superadmin</h1>
        @elseif(auth()->user()->id_level == 2)
            <h1>Ini halaman untuk admin</h1>
        @else
            <h1>Dilarang masuk!</h1>
        @endif
    </main>
@endsection
