<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{

    public function index()
    {
        $data = Pembayaran::with('pemesanan', 'user')->get();
        return view('pembayaran.index', compact('data'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status = 'selesai';
        $pembayaran->save();

        // Update status pemesanan yang terkait
        $pemesanan = $pembayaran->pemesanan;
        if ($pemesanan) {
            $pemesanan->status = 'selesai';
            $pemesanan->save();
        }

        return redirect()->route('pembayaran.index')->with('success', 'Status pembayaran berhasil diperbarui!');
    }

    public function lihatBuktiPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.lihat_bukti', compact('pembayaran'));
    }

    public function showForm($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // Cek apakah pemesanan sudah dibayar
        if ($pemesanan->status == 'proses') {
            return redirect()->route('pemesanan.detail')->with('error', 'Pemesanan sudah dibayar!');
        }

        return view('pembayaran', compact('pemesanan'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:0',
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        // Cek apakah pemesanan sudah dibayar
        if ($pemesanan->status == 'selesai') {
            return redirect()->route('pemesanan.detail')->with('error', 'Pemesanan sudah dibayar!');
        }

        // Tentukan nama file yang unik
        $fileName = time() . '.' . $request->bukti_pembayaran->extension();

        // Pindahkan file ke folder public/bukti_pembayaran
        $request->bukti_pembayaran->move(public_path('bukti_pembayaran'), $fileName);

        Pembayaran::create([
            'pemesanan_id' => $pemesanan->id,
            'user_id' => Auth::id(),
            'jumlah' => $request->jumlah,
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_pembayaran' => now(),
            'bukti_pembayaran' => 'bukti_pembayaran/' . $fileName,
        ]);

        $pemesanan->status = 'proses';
        $pemesanan->save();

        return redirect()->route('pemesanan.detail')->with('success', 'Pembayaran berhasil dilakukan!');
    }
}
