<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $perjalanans = Perjalanan::where('id_user', auth()->user()->id);

        if (request('q')) {
            $perjalanans =
                Perjalanan::where('id_user', auth()->user()->id)
                ->where('tujuan', 'like', '%' . request('q') . '%')
                ->orWhere('keperluan', 'like', '%' . request('q') . '%');
        }

        return view('dashboard.index', [
            'judul' => 'Dashboard',
            'perjalanans' => $perjalanans->orderBy('tanggal', 'desc')->get()
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
