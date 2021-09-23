<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mahasiswa.index', compact('user'));
    }
}
