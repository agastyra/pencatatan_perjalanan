@extends('auth.layouts.main')

@section('container')
    <main class="form-signup  w-100 m-auto">
        <h1 class="my-5 text-center">Daftar Pengguna Baru</h1>
        <form action="/register" method="POST" class="col col-lg-4 offset-lg-4 m-sm-5 m-lg-auto">
            @csrf
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="nik" class="col-form-label">NIK</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control col-md-6 @error('nik') is-invalid @enderror" id="nik" name="nik"
                        value="{{ old('nik') }}">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="nama" class="col-form-label">Nama</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control col-md-6 @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="jenis_kelamin" class="col-form-label">Jenis kelamin</label>
                </div>
                <div class="col">
                    <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                        name="jenis_kelamin">
                        <option value="Laki-laki" selected>Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control col-md-6 @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="alamat" class="col-form-label">Alamat</label>
                </div>
                <div class="col">
                    <textarea class="form-control col-md-6 @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="telp" class="col-form-label">Telp</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp"
                        value="{{ old('telp') }}">
                    @error('telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="email" class="col-form-label">Email</label>
                </div>
                <div class="col">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="password" class="col-form-label">Password</label>
                </div>
                <div class="col">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-2">
                    <label for="password" class="col-form-label">Confirm Password</label>
                </div>
                <div class="col">
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                        id="confirm_password" name="confirm_password">
                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col col-md-12">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                </div>
            </div>
            <div class="row mb-5 text-center">
                <span>Sudah terdaftar? <a href="/login">Login disini</a></span>
            </div>
        </form>
    </main>
@endsection
