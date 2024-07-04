@extends('layout.be.template')
@section('title', 'Data Pemesanan')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pemesanan</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Wisata Tempat</th>
                                    <th>Jumlah Orang</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pemesanan as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->wisataTempat->name }}</td>
                                        <td>{{ $row->jumlah_orang }}</td>
                                        <td>{{ $row->tanggal_pemesanan }}</td>
                                        <td>{{ $row->tanggal_kunjungan }}</td>
                                        <td>{{ $row->status }}</td>
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
