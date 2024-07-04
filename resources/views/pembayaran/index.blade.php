@extends('layout.be.template')
@section('title', 'Data Pembayaran')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pembayaran</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Jumlah</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Status</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>{{ $row->metode_pembayaran }}</td>
                                        <td>{{ $row->tanggal_pembayaran }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            <a href="{{ route('pembayaran.lihatBukti', $row->id) }}"
                                                class="btn btn-info">Lihat</a>
                                        </td>
                                        <td>
                                            @if ($row->status != 'selesai')
                                                <form method="POST"
                                                    action="{{ route('pembayaran.updateStatus', $row->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Tandai Selesai</button>
                                                </form>
                                            @else
                                                <span class="text-success">Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
