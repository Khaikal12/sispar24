@extends('layout.be.template')
@section('title', 'Lihat Bukti Pembayaran')
@section('content')
    <div class="container px-4 mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bukti Pembayaran</div>
                    <div class="card-body text-center">
                        <img src="{{ asset($pembayaran->bukti_pembayaran) }}" class="img-fluid" alt="Bukti Pembayaran">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
