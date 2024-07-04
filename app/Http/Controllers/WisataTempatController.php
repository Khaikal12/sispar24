<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\WisataTempat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WisataTempatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WisataTempat::with('kategor')->orderBy('created_at', 'desc')->get();
        return view('wisatatempat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_kategor = Kategori::all();
        return view('wisatatempat.create', compact('data_kategor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tgl_upload = $request->input('tgl_upload');
        $tgl_upload_formatted = Carbon::createFromFormat('d-m-Y', $tgl_upload)->format('Y-m-d');
        $request->merge(['tgl_upload' => $tgl_upload_formatted]);

        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg",
            "galeri" => "required|array",
            "galeri.*" => "image|mimes:jpeg,png,jpg",
            "name" => "required|unique:wisata_tempats",
            "id_kategori" => "required",
            "harga" => "required",
            "fasilitas" => "required",
            "lokasi" => "required",
            "tgl_upload" => "required",

        ]);

        $input = $request->all();

        //upload gambar
        if ($image = $request->file('image')) {
            $destinationPath = 'images_wisata/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }

        // Upload gambar untuk galeri
        if ($request->hasFile('galeri')) {
            $destinationPath = 'galeri_wisata/';
            $galleryImages = [];
            foreach ($request->file('galeri') as $galleryImage) {
                $galleryImageName = date('YmdHis') . "_" . $galleryImage->getClientOriginalName();
                $galleryImage->move($destinationPath, $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
            $input['galeri'] = json_encode($galleryImages);
        }

        WisataTempat::create($input);
        return redirect()->route("wisatatempat.index")->with("success", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(WisataTempat $wisataTempat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WisataTempat $wisatatempat)
    {
        $data_kategor = Kategori::all();
        return view("wisatatempat.edit", compact("wisatatempat", "data_kategor"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WisataTempat $wisatatempat)
    {
        $request->validate([
            "name" => "required",
            "id_kategori" => "required",
            "harga" => "required",
            "fasilitas" => "required",
            "lokasi" => "required",
            "tgl_upload" => "required",
            "image" => "sometimes|image|mimes:jpeg,png,jpg",
            "galeri" => "sometimes|array",
            "galeri.*" => "image|mimes:jpeg,png,jpg",
        ]);

        // Ubah format tanggal dari datepicker ke format yang diharapkan oleh MySQL
        $tgl_upload = date('Y-m-d', strtotime($request->tgl_upload));

        $input = $request->except(['image', 'galeri']);

        // upload gambar utama
        if ($request->hasFile('image')) {
            $destinationPath = 'images_wisata/';

            // Hapus gambar lama jika ada
            if ($wisatatempat->image && file_exists($destinationPath . $wisatatempat->image)) {
                unlink($destinationPath . $wisatatempat->image);
            }

            // Upload dan simpan gambar baru
            $image = $request->file('image');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = $postImage;
        }

        // Upload gambar galeri
        if ($request->hasFile('galeri')) {
            $destinationPath = 'galeri_wisata/';
            $galleryImages = [];
            foreach ($request->file('galeri') as $galleryImage) {
                $galleryImageName = date('YmdHis') . "_" . $galleryImage->getClientOriginalName();
                $galleryImage->move($destinationPath, $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
            $input['galeri'] = json_encode($galleryImages);
        }

        // Perbarui data dengan format tanggal yang sudah diubah
        $input['tgl_upload'] = $tgl_upload;
        $wisatatempat->update($input);
        return redirect()->route("wisatatempat.index")->with("success", "Data berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WisataTempat $wisatatempat)
    {
        $wisatatempat->delete();
        return to_route("wisatatempat.index")->with("success", "Data berhasil dihapus");
    }
}
