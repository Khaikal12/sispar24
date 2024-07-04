@extends('layout.be.template')
@section('title', 'Data Users')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
                <div class="card">
                    <div class="card-header">Data Users</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Email</th>
                                    <th>Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>{{ $user->alamat }}</td>
                                        <td>{{ $user->jenis_kelamin }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->hak_akses }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy', $user->id) }}"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                                <a href="{{ route('user.edit', $user->id) }}"
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
