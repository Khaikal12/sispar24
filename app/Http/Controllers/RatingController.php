<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user', 'wisataTempat')->get();
        return view('detail-wisata', compact('ratings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'wisata_tempat_id' => 'required|exists:wisata_tempats,id',
            'jumlah' => 'required|integer|min:1|max:5',
        ]);

        Rating::create($request->all());

        return redirect()->back()->with('success', 'Rating berhasil ditambahkan.');
    }
}
