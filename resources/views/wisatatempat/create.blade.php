@extends('layout.be.template')
@section('title', 'Tambah Wisata')
@section('content')
    <link rel="stylesheet" href="/frontend/assets/css/jquery-ui.css">
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Wisata</div>
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

                        <form action=" {{ route('wisatatempat.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label>Foto Wisata</label>
                                <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                    autofocus>
                            </div>
                            <div class="mb-3">
                                <label>Nama Wisata</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="" class="form-select">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach ($data_kategor as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3">
                                <label>Harga</label>
                                <input type="text" name="harga" class="form-control" value="{{ old('harga') }}">
                            </div>
                            <div class="mb-3">
                                <label>Fasilitas</label>
                                <input type="text" name="fasilitas" class="form-control" value="{{ old('fasilitas') }}">
                            </div>
                            <div class="mb-3">
                                <label>Lokasi</label>
                                <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}">
                            </div>
                            <div class="mb-3">
                                <label>Galeri</label>
                                <input type="file" name="galeri[]" class="form-control" multiple>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_upload">Tanggal Upload</label>
                                <input type="text" name="tgl_upload" id="tgl_upload" class="form-control datepicker"
                                    value="{{ old('tgl_upload') }}">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a href="{{ route('wisatatempat.index') }}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/frontend/assets/vendors/jquery/jquery.min.js"></script>
    <script src="/frontend/assets/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tgl_upload').datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection
