<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pemesanan</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .costom-gallery img {
            margin-right: 40px;
            margin-left: 40px;
        }
    </style>
</head>

<body>
    <main class="flex-shrink-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container px-5">
                <a class="navbar-brand" href="index.html">
                    <img src="/pict/logo.jpg" alt="gn" style="height: 40px;">
                    <!-- Sesuaikan path dan style sesuai kebutuhan Anda -->
                </a>
                <a class="navbar-brand" href="index.html">PARIWISATA PENDAKIAN</a>
                <a class="navbar-brand" style="font-size: 12px" href="">{{ Auth::user()->name }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ url('homepage') }}">Home</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('halamanNews') }}">Search</a></li> --}}

                        @auth
                            @if ((auth()->check() && auth()->user()->hak_akses == 'Admin') || auth()->user()->hak_akses == 'TourGuide')
                                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a></li>
                            @endif
                            {{-- <li class="nav-item"><a class="nav-link" href=""> {{ Auth::user()->name }} </a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="{{ route('pemesanan.detail') }}">Pesanan Saya</a>
                            </li>
                            <li class="nav-item"><a
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                    class="nav-link" href="{{ route('homepage') }}">Logout</a>
                                <form id="logout-form" action="{{ route('logoutgues') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('login') }}">Login</a>
                                    </li>
                                </ul>
                            </div>

                        @endauth
                    </ul>
                </div>
            </div>
        </nav>


        {{-- <style>
            .bg-dark.py-5 {
                background-image: url('/pict/honkaibg.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: rgb(250, 250, 250);
                /* Warna teks untuk kontras dengan background */
            }
        </style>
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6 d-flex flex-column align-items-center">
                        <div class="my-5 text-center text-xl-start">

                            <h1>PORTAL MENUJU DUNIA HIBURAN</h1>
                            <p>Selamat datang para pecinta ketinggian, penggemar dunia dingin yang penuh petualangan dan
                                keajaiban!</p>
                            <br>
                            <br>

                        </div>
                    </div>
                </div>
            </div>
        </header> --}}

        <div class="container mt-5">
            <h2 class="text-center mb-5">Detail Pemesanan</h2>
            <div class="row">
                <div class="col-12">

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

                    @foreach ($pemesanan as $order)
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text">Jumlah Orang: {{ $order->jumlah_orang }}</p>
                                <p class="card-text">Tanggal Pemesanan:
                                    {{ \Carbon\Carbon::parse($order->tanggal_pemesanan)->locale('id')->isoFormat('D MMMM YYYY') }}
                                </p>
                                <p class="card-text">Tanggal Kunjungan:
                                    {{ \Carbon\Carbon::parse($order->tanggal_kunjungan)->locale('id')->isoFormat('D MMMM YYYY') }}
                                </p>
                                <p class="card-text">Status Pemesanan: {{ $order->status }}</p>
                                @if ($order->status == 'proses' || $order->status == 'selesai')
                                    <p class="text-success text-center">Sudah Dibayar</p>
                                @else
                                    <form action="{{ route('pembayaran.form', $order->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Bayar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>

</html>
