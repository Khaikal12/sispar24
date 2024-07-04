@extends('layout.be.template')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Sidenav Light</li>
    </ol> --}}
        <div class="card mb-4">
            <div class="card-body">

                <head>
                    <title>Laravel Marquee Text</title>
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #0d6efd;
                        }

                        .marquee-container {
                            width: 100%;
                            overflow: hidden;
                        }

                        .marquee-content {
                            width: 100%;
                            display: inline-block;
                            white-space: nowrap;
                            animation: marquee 20s linear infinite;
                            font-size: 50px;
                        }

                        @keyframes marquee {
                            0% {
                                transform: translateX(100%);
                            }

                            100% {
                                transform: translateX(-100%);
                            }
                        }

                        .card-deck {
                            display: flex;
                            flex-direction: row;
                            justify-content: space-between;
                            margin-top: 20px;
                        }

                        .card {
                            flex: 1;
                            margin: 10px;
                            background-color: #fff;
                            border: 1px solid #ccc;
                            border-radius: 10px;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            text-align: center;
                            transition: transform 0.2s;
                        }

                        .card:hover {
                            transform: scale(1.05);
                        }

                        .card-body {
                            padding: 20px;
                        }

                        .card-body h5 {
                            font-size: 24px;
                            margin-bottom: 10px;
                        }

                        .card-body p {
                            font-size: 40px;
                            font-weight: bold;
                            margin: 0;
                        }

                        a.card-link {
                            text-decoration: none;
                            color: inherit;
                        }
                    </style>
                </head>

                <body>
                    <div class="marquee-container">
                        <div class="marquee-content">
                            <p>SELAMAT DATANG DI MENU DASHBOARD</p>
                        </div>
                    </div>

                    <div class="card-deck">
                        @if (auth()->check() && auth()->user()->hak_akses == 'Admin')
                            <a href="{{ route('pengguna.index') }}" class="card-link">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Pengguna</h5>
                                        <p class="card-text">{{ $jumlahPengguna }}</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                        <a href="{{ route('wisata.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Wisata</h5>
                                    <p class="card-text">{{ $jumlahWisata }}</p>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('pemesanan.index') }}" class="card-link">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Pemesanan</h5>
                                    <p class="card-text">{{ $jumlahPemesanan }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </body>
            </div>
        </div>
    </div>
@endsection
