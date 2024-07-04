@extends('layout.be.template')
@section('title', 'Edit Wisata')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Wisata</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('wisatatempat.update', $wisatatempat->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label>Foto Wisata</label>
                                <input type="file" name="image" class="form-control">
                                <img src="/images_wisata/{{ $wisatatempat->image }}" width="300px" alt="">
                            </div>
                            <div class="mb-3">
                                <label>Nama Wisata</label>
                                <input type="text" name="name" class="form-control" value="{{ $wisatatempat->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="" class="form-select">
                                    <option disabled value="">-- Pilih Kategori --</option>
                                    @foreach ($data_kategor as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $wisatatempat->kategor->id == $row->id ? 'selected' : '' }}>
                                            {{ $row->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control"
                                    value="{{ $wisatatempat->harga }}">
                            </div>
                            <div class="mb-3">
                                <label>Fasilitas</label>
                                <input type="text" name="fasilitas" class="form-control"
                                    value="{{ $wisatatempat->fasilitas }}">
                            </div>
                            <div class="mb-3">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control"
                                    value="{{ $wisatatempat->lokasi }}">
                            </div>
                            <div class="mb-3">
                                <label>Galeri</label>
                                <input type="file" name="galeri[]" class="form-control" multiple>
                                @if ($wisatatempat->galeri)
                                    @foreach (json_decode($wisatatempat->galeri) as $galleryImage)
                                        <img src="/galeri_wisata/{{ $galleryImage }}" width="300px">
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="tgl_upload">Tanggal Upload</label>
                                <input type="text" name="tgl_upload" id="tgl_upload" class="form-control"
                                    value="{{ \Carbon\Carbon::parse($wisatatempat->tgl_upload)->locale('id')->isoFormat('D MMMM YYYY') }}">

                            </div>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a href="{{ route('wisatatempat.index') }}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
