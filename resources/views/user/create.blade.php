@extends('layout.be.template')
@section('title', 'Tambah User')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah User</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                                    name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>
                                        Laki-laki</option>
                                    <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="hak_akses" class="form-label">Hak Akses</label>
                                <select class="form-select @error('hak_akses') is-invalid @enderror" id="hak_akses"
                                    name="hak_akses">
                                    <option value="">Pilih Hak Akses</option>
                                    <option value="Admin" @if (old('hak_akses') == 'Admin') selected @endif>Admin
                                    </option>
                                    <option value="Pengelola" @if (old('hak_akses') == 'Pengelola') selected @endif>Pengelola
                                    </option>
                                </select>
                                @error('hak_akses')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
