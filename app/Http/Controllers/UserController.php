<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.administrator.users', [
            'judul' => 'Users',
            'msg' => 'Daftar User',
            'users' => User::where('id_level', 3)->orderBy('nama', 'asc')->get()
        ]);
    }

    public function admin()
    {
        return view('dashboard.administrator.users', [
            'judul' => 'Admins',
            'msg' => 'Daftar Admin',
            'users' => User::where('id_level', 2)->orderBy('nama', 'asc')->get()
        ]);
    }
}
