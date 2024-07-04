@extends('layout.be.template')
@section('title', 'Wisata')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('wisatatempat.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>Tambah Data
                </a>
                <div class="card">
                    <div class="card-header">Data Wisata</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Wisata</th>
                                    <th>Nama Wisata</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Fasilitas</th>
                                    <th>Lokasi</th>
                                    <th>Galeri</th>
                                    <th>Tanggal Upload</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="/images_wisata/{{ $row->image }}" width="100px" alt="">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->kategor?->nama_kategori }}</td>
                                        <td>{{ $row->harga }}</td>
                                        <td>{{ $row->fasilitas }}</td>
                                        <td>{{ $row->lokasi }}</td>
                                        <td>
                                            @foreach (json_decode($row->galeri) as $galleryImage)
                                                <img src="/galeri_wisata/{{ $galleryImage }}" width="50px"
                                                    style="border-radius: 10px" alt="">
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($row->tgl_upload)->locale('id')->isoFormat('D MMMM YYYY') }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('wisatatempat.destroy', $row->id) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                                <a href="{{ route('wisatatempat.edit', $row->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
