@extends('layout.be.template')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Kategori</div>
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

                        <form action=" {{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control">
                            </div>
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <a href="{{ route('kategori.index') }}" class="btn btn-warning">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
