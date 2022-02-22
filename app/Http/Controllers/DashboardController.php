<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'judul' => 'Dashboard'
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

        Perjalanan::create($validatedData);

        return redirect('/dashboard')->with('success', 'Data telah ditambahkan');
    }
}
