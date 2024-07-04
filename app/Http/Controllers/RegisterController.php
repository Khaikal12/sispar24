<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $no_hp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $email = $request->input('email');
        $password = $request->input('password');
        $hak_akses = 'Pengunjung';

        $user = User::create([
            'name' => $name,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'email' => $email,
            'password' => Hash::make($password),
            'hak_akses' => $hak_akses,
        ]);

        // Memberikan respons berdasarkan hasil dari operasi penyimpanan data
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Gagal!'
            ], 400);
        }
    }
}
