@extends('dashboard.layouts.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tambah Perjalanan</h1>
        </div>

        <form method="POST" action="/dashboard">
            @csrf

            <div class="mb-3 row align-items-center">
                <div class="col-lg-1">
                    <label for="tanggal" class="col-form-label">Tanggal</label>
                </div>
                <div class="col">
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                        name="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row align-items-center">
                <div class="col-lg-1">
                    <label for="tujuan" class="col-form-label">Tujuan</label>
                </div>
                <div class="col">
                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan">
                    @error('tujuan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row align-items-center">
                <div class="col-lg-1">
                    <label for="suhu_tubuh" class="col-form-label">Suhu tubuh</label>
                </div>
                <div class="col">
                    <input type="number" class="form-control @error('suhu_tubuh') is-invalid @enderror" id="suhu_tubuh"
                        name="suhu_tubuh">
                    @error('suhu_tubuh')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row align-items-center">
                <div class="col-lg-1">
                    <label for="keperluan" class="col-form-label">Keperluan</label>
                </div>
                <div class="col">
                    <textarea type="text" class="form-control @error('keperluan') is-invalid @enderror" id="keperluan"
                        name="keperluan"></textarea>
                    @error('keperluan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center mb-5">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                <div class="col">
                    <a href="/dashboard" class="text-muted text-decoration-none">Batal</a>
                </div>
            </div>
        </form>
    </main>
@endsection
