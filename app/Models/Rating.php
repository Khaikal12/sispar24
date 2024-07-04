<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wisata_tempat_id',
        'jumlah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wisataTempat()
    {
        return $this->belongsTo(WisataTempat::class);
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($rating) {
            $wisataTempat = WisataTempat::find($rating->wisata_tempat_id);
            $averageRating = $wisataTempat->ratings()->avg('jumlah');
            $wisataTempat->average_rating = $averageRating;
            $wisataTempat->save();
        });

        static::updated(function ($rating) {
            $wisataTempat = WisataTempat::find($rating->wisata_tempat_id);
            $averageRating = $wisataTempat->ratings()->avg('jumlah');
            $wisataTempat->average_rating = $averageRating;
            $wisataTempat->save();
        });

        static::deleted(function ($rating) {
            $wisataTempat = WisataTempat::find($rating->wisata_tempat_id);
            $averageRating = $wisataTempat->ratings()->avg('jumlah');
            $wisataTempat->average_rating = $averageRating;
            $wisataTempat->save();
        });
    }
}
