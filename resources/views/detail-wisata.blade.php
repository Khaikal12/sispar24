<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        .costom-gallery img {
            margin-right: 40px;
            margin-left: 40px;
        }

        .rating {
            direction: rtl;
            font-size: 2rem;
            unicode-bidi: bidi-override;
            display: inline-flex;
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            cursor: pointer;
            color: #ccc;
        }

        .rating>label:hover,
        .rating>label:hover~label,
        .rating>input:checked~label {
            color: #f7d106;
        }

        .average-rating {
            color: #f7d106;
            font-size: 1.5rem;
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
                <a class="navbar-brand" href="index.html">PARIWISATA PEGUNUNGAN</a>
                @auth
                    <a class="navbar-brand" style="font-size: 12px" href="">{{ Auth::user()->name }}</a>
                @endauth
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
                            @if ((auth()->check() && auth()->user()->hak_akses == 'Admin') || auth()->user()->hak_akses == 'Pengelola')
                                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a></li>
                            @endif
                            <li class="nav-item"><a class="nav-link" href="{{ route('pemesanan.detail') }}">Pesanan Saya</a>
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


        {{-- <header>
            <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/pict/c1.jpg" class="d-block w-100" alt="Cover 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>PORTAL MENUJU DUNIA HIBURAN</h1>
                            <p>Selamat datang para pecinta ketinggian, penggemar dunia dingin yang penuh petualangan dan
                                keajaiban!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/pict/c2.jpg" class="d-block w-100" alt="Cover 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>PORTAL MENUJU DUNIA HIBURAN</h1>
                            <p>Selamat datang para pecinta ketinggian, penggemar dunia dingin yang penuh petualangan dan
                                keajaiban!</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/pict/c3.jpg" class="d-block w-100" alt="Cover 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>PORTAL MENUJU DUNIA HIBURAN</h1>
                            <p>Selamat datang para pecinta ketinggian, penggemar dunia dingin yang penuh petualangan dan
                                keajaiban!</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </header> --}}

        <section style="margin-top: 50px; margin-bottom: 50px">
            <div class="container">
                <h2 class="text-center mb-5">DETAIL WISATA</h2>
                <div class="row text-center">
                    <div style="text-align: left">
                        <h4>{{ strtoupper($detailwisata->name) }}</h4>
                        <p style="font-size: 12px;"><i class="fa-solid fa-calendar-days"></i>
                            {{ \Carbon\Carbon::parse($detailwisata->tgl_upload)->locale('id')->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <img src="/images_wisata/{{ $detailwisata->image }}" style="max-width: 100%"
                            alt="{{ $detailwisata->image }}">
                    </div>
                    <div class="col-lg-6">
                        <div style="text-align: justify">
                            <h5 class="mt-3">Fasilitas</h5>
                            <p>{{ $detailwisata->fasilitas }}</p>
                            <h5>Lokasi</h5>
                            <p>{{ $detailwisata->lokasi }}</p>
                            <h5>Harga</h5>
                            <p style="font-size: 32px; color: orange">Rp. {{ $detailwisata->harga }}</p>
                            <h5>Rating</h5>
                            <p class="average-rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i < round($detailwisata->average_rating))
                                        <i class="fa-solid fa-star"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                                ({{ round($detailwisata->average_rating, 2) }})
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-5">

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

                    @auth
                        <h3 class="mt-4">Pesan Sekarang</h3>
                        <form action="{{ route('pemesanan.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="wisata_tempat_id" value="{{ $detailwisata->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <div class="form-group">
                                <label for="jumlah_orang">Jumlah Orang:</label>
                                <input type="number" name="jumlah_orang" class="form-control" id="jumlah_orang" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggal_kunjungan">Tanggal Kunjungan:</label>
                                <input type="date" name="tanggal_kunjungan" class="form-control" id="tanggal_kunjungan"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Pesan Sekarang</button>
                        </form>
                    @endauth
                </div>

                <div class="col-5">
                    @auth
                        <h3 class="mt-4">Beri Rating</h3>
                        <form action="{{ route('ratings.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="wisata_tempat_id" value="{{ $detailwisata->id }}">
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="rating">
                                    <input type="radio" name="jumlah" id="star5" value="5">
                                    <label for="star5"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="jumlah" id="star4" value="4">
                                    <label for="star4"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="jumlah" id="star3" value="3">
                                    <label for="star3"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="jumlah" id="star2" value="2">
                                    <label for="star2"><i class="fa-solid fa-star"></i></label>
                                    <input type="radio" name="jumlah" id="star1" value="1">
                                    <label for="star1"><i class="fa-solid fa-star"></i></label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Kirim Rating</button>
                        </form>
                    @endauth
                </div>
            </div>
        </section>


        <section style="margin-bottom: 50px; margin-top: 100px">
            <div class="container">
                <div class="text-center mb-5">
                    <h2>GALERI</h2>
                </div>
                <div class="row">
                    @forelse ($galeri as $row)
                        <img src="/galeri_wisata/{{ $row }}" alt="{{ $detailwisata->galeri }}"
                            style="width: 350px; height: auto; border-radius: 10px">
                    @empty
                    @endforelse

                </div>
            </div>
        </section>

        <footer class="text-center text-lg-start bg-dark py-3 text-white">

            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <img src="/pict/Kall.jpg" alt="haikal" class="img-fluid" width="50%">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Khaikal ID
                            </h6>
                            <p>
                                INI DI BUAT UNTUK MENYELESAIKAN TUGAS UAS SISTEM PARIWISATA
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Sosial Media
                            </h6>
                            <p>
                                <i class="fa-brands fa-instagram"></i>
                                <a href="https://www.instagram.com/haikalrabbani18?igsh=NXhnY2h2YTUybzds"
                                    class="text-reset">Instagram

                                </a>
                            </p>
                            <p>
                                <i class="fa-brands fa-facebook"></i>
                                <a href="https://www.facebook.com/khaikal.id?mibextid=LQQJ4d"
                                    class="text-reset">Facebook</a>
                            </p>
                            <p>
                                <i class="fa-brands fa-twitter"></i>
                                <a href="https://twitter.com/shiroitsme" class="text-reset">Twitter</a>
                            </p>
                            <p>
                                <i class="fa-brands fa-youtube"></i>
                                <a href="https://youtube.com/@officialshiro18?si=2TU-hYgxiPvQEzNB"
                                    class="text-reset">YouTube</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Hubungi Saya
                            </h6>
                            <p>
                                <i class="fa-solid fa-location-dot"></i>
                                Alamat: Jalan Pariwisata Suwela, Suntalangu, Kec. Suwela, Kab. Lombok Timur, NTB.
                            </p>
                            <p>
                                <i class="bi bi-envelope"></i>
                                mhmdkhaikal@gmail.com
                            </p>
                            <p><i class="bi bi-phone"></i> (+62) 82339263185</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center py-4" style="background-color: rgba(0, 0, 0, 0.05);">
                Copyright &copy; 2024 Your Handsome Dev Khaikal ID | Design by Khaikal ID
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

    </main>
</body>

</html>
