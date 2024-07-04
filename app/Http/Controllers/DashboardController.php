<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\WisataTempat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahWisata = WisataTempat::count();
        $jumlahPengguna = User::count();
        $jumlahPemesanan = Pemesanan::count();

        return view('dashboard', compact('jumlahWisata', 'jumlahPengguna', 'jumlahPemesanan'));
    }
}
