<!DOCTYPE html>
<html>

<head>
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>

    <center>
        <h5>Aplikasi Pencatatan Perjalanan</h5>
    </center>

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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($perjalanans as $perjalanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $perjalanan->tanggal }}</td>
                                <td>{{ $perjalanan->nama }}</td>
                                <td>{{ $perjalanan->tujuan }}</td>
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

</body>

</html>
