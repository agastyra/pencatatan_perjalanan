<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class DashboardPerjalananController extends Controller
{
    public function index()
    {
        $perjalanans = Perjalanan::latest()->where('id_user', auth()->user()->id);

        if (request('q')) {
            $perjalanans =
                Perjalanan::latest()->where('id_user', auth()->user()->id)
                ->where('tujuan', 'like', '%' . request('q') . '%')
                ->orWhere('keperluan', 'like', '%' . request('q') . '%');
        }

        if (auth()->user()->id_level !== 3) {
            $perjalanans = Perjalanan::join('users', 'perjalanans.id_user', '=', 'users.id')
                ->select(
                    'perjalanans.id',
                    'perjalanans.id_user',
                    'perjalanans.tanggal',
                    'perjalanans.suhu_tubuh',
                    'perjalanans.tujuan',
                    'perjalanans.keperluan',
                    'perjalanans.created_at',
                    'users.id',
                    'users.nik',
                    'users.nama',
                )
                ->orderBy('perjalanans.created_at', 'desc');

            if (request('q')) {
                $perjalanans =
                    $perjalanans->where('perjalanans.tujuan', 'like', '%' . request('q') . '%')
                    ->orWhere('perjalanans.keperluan', 'like', '%' . request('q') . '%')
                    ->orWhere('users.nik', 'like', '%' . request('q') . '%')
                    ->orWhere('users.nama', 'like', '%' . request('q') . '%')
                    ->orderBy('perjalanans.created_at', 'desc');
            }
        }

        return view('dashboard.index', [
            'judul' => 'Dashboard',
            'perjalanans' => $perjalanans->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.create', [
            'judul' => 'Tambah perjalanan'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required|date',
            'tujuan' => 'required',
            'keperluan' => 'required',
            'suhu_tubuh' => 'required|numeric|digits:2'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['id_user'] = auth()->user()->id;

        $validatedData['slug'] = auth()->user()->id . "-$request->tanggal";

        Perjalanan::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data telah ditambahkan');
    }
}
