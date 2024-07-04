<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WisataTempat extends Model
{
    use HasFactory;
    protected $table = "wisata_tempats";
    protected $fillable = [
        'image',
        'name',
        'id_kategori',
        'harga',
        'fasilitas',
        'lokasi',
        'galeri',
        'tgl_upload',
        'average_rating',
    ];

    public function kategor()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
