<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'judul' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required|unique:users|size:16',
            'nama' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'telp' => 'required|unique:users|max:14',
            'email' => 'required|email:dns|unique:users',
            'alamat' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);

        unset($validatedData['confirm_password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Berhasil registrasi, silahkan login');
    }
}
