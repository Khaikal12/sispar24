<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PemesananController extends Controller
{

    public function index()
    {
        $pemesanan = Pemesanan::all();

        return view('pemesanan.index', compact('pemesanan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'wisata_tempat_id' => 'required|exists:wisata_tempats,id',
            'user_id' => 'required|exists:users,id',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_kunjungan' => 'required|date|after:today',
        ]);

        $pemesanan = Pemesanan::create([
            'user_id' => $validated['user_id'],
            'wisata_tempat_id' => $validated['wisata_tempat_id'],
            'jumlah_orang' => $validated['jumlah_orang'],
            'tanggal_pemesanan' => Carbon::now(),
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'status' => 'menunggu',
        ]);

        return redirect()->route('pemesanan.detail')->with('success', 'Pemesanan berhasil dilakukan!');
    }

    public function detail()
    {
        $user_id = auth()->id();
        $pemesanan = Pemesanan::orderBy('created_at', 'desc')->where('user_id', $user_id)->get();

        return view('detail', compact('pemesanan'));
    }

    // public function payment(Request $request)
    // {
    //     $validated = $request->validate([
    //         'pemesanan_id' => 'required|exists:pemesanans,id',
    //     ]);

    //     $pemesanan = Pemesanan::find($validated['pemesanan_id']);
    //     $pemesanan->status = 'lunas';  // atau status yang sesuai dengan logika Anda
    //     $pemesanan->save();

    //     return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan!');
    // }
}
