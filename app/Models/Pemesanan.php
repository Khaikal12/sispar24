<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit jika tidak mengikuti konvensi penamaan tabel Laravel
    protected $table = 'pemesanan';

    // Tentukan kolom-kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'wisata_tempat_id',
        'jumlah_orang',
        'tanggal_pemesanan',
        'tanggal_kunjungan',
        'jumlah_kunjungan',
        'status',
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Definisikan relasi dengan model WisataTempat
    public function wisataTempat()
    {
        return $this->belongsTo(WisataTempat::class);
    }

    // Definisikan relasi dengan model Pembayaran (jika diperlukan)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
