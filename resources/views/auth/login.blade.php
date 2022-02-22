@extends('auth.layouts.main')

@section('container')
    <main class="form-signin w-100 m-auto">
        <h1 class="mb-3 text-center">Sign In</h1>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show col col-lg-4 offset-lg-4 m-sm-5 m-lg-auto"
                role="alert">
                {{ session('success') }}
                <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
            </div>
        @endif
        @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show col col-lg-4 offset-lg-4 m-sm-5 m-lg-auto"
                role="alert">
                {{ session('failed') }}
                <button type="button" data-bs-dismiss="alert" class="btn-close"></button>
            </div>
        @endif
        <form action="/login" method="POST" class="col col-lg-4 offset-lg-4 m-sm-5 m-lg-auto">
            @csrf
            <div class="my-3 row align-items-center">
                <div class="col-md-3">
                    <label for="nik" class="col-form-label">NIK</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="nik" name="nik">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-3">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-12">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </div>
            </div>
            <div class="row text-center">
                <span>Pengguna baru? <a href="/register">Daftar disini</a></span>
            </div>
        </form>
    </main>
@endsection
