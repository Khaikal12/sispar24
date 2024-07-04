<?php

namespace App\Http\Controllers;

use App\Models\WisataTempat;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $data = WisataTempat::all();
        return view('homepage', compact('data'));
    }

    public function detailwisata($id)
    {
        $detailwisata = WisataTempat::findOrFail($id);

        $galeri = json_decode($detailwisata->galeri);

        return view('detail-wisata', compact('detailwisata', 'galeri'));
    }
}
