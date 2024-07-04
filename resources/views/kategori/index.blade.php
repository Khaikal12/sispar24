@extends('layout.be.template')
@section('title', 'Kategori')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i>Tambah Data
                </a>
                <div class="card">
                    <div class="card-header">Data Kategori</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama_kategori }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('kategori.destroy', $row->id) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                                <a href="{{ route('kategori.edit', $row->id) }}"
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
