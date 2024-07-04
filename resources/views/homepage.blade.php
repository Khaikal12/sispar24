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
        .carousel-item {
            height: 500px;
        }

        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
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
                        @auth
                            @if ((auth()->check() && auth()->user()->hak_akses == 'Admin') || auth()->user()->hak_akses == 'Pengelola')
                                <li class="nav-item"><a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a></li>
                            @endif
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

        <header>
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
        </header>

        <br>
        <br>
        <br>

        <section id="about" class="about">
            <div class="container">
                <h2 class="text-center">WISATA</h2>
                <br>
                <div class="row row-cols-1 row-cols-md-3 g-4 text-center custom-gallery">
                    @forelse ($data as $row)
                        <div>
                            <div class="card shadow-sm">
                                <div class="text-center">
                                    <img src="/images_wisata/{{ $row->image }}" alt="{{ $row->image }}"
                                        width="350" height="200">
                                </div>

                                <div class="card-body">
                                    <p style="font-size: 24px; font-weight: bold">{{ strtoupper($row->name) }}</p>
                                    <p>Wilayah - {{ $row->kategor?->nama_kategori }}</p>
                                    <p>Harga Tiket: {{ $row->harga }}</p>
                                    <a href="{{ route('detail-wisata', $row->id) }}" type="button"
                                        class="btn btn-primary">Detail</a>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">
                            Data news belum tersedia
                        </div>
                    @endforelse

                    <script>
                        function toggleContent(newsId) {
                            var previewContent = document.querySelector(`#content_${newsId} .preview-content`);
                            var contentPreview = document.querySelector(`#content_${newsId} .content-preview`);
                            var contentFull = document.querySelector(`#content_${newsId} .content-full`);
                            var readMoreBtn = document.querySelector(`#content_${newsId} .read-more-btn`);

                            if (previewContent.style.display === 'none') {
                                previewContent.style.display = 'inline';
                                contentFull.style.display = 'none';
                                readMoreBtn.innerText = 'Read More';
                            } else {
                                previewContent.style.display = 'none';
                                contentFull.style.display = 'block';
                                readMoreBtn.innerText = 'Read Less';
                            }
                        }
                    </script>

                </div>
            </div>
        </section>
        <br>
        <br>
        <br>

        <footer class="text-center text-lg-start bg-dark py-3 text-white">
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <img src="/pict/Kall.jpg" alt="haikal" class="img-fluid" width="50%">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Khaikal ID
                            </h6>
                            <p>
                                INI DI BUAT UNTUK MENYELESAIKAN TUGAS UAS SISTEM PARIWISATA
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Sosial Media
                            </h6>
                            <p>
                                <a href="#" class="text-reset">Facebook</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Twitter</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Instagram</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">LinkedIn</a>
                            </p>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <h6 class="text-uppercase fw-bold mb-4">
                                Layanan
                            </h6>
                            <p>
                                <a href="#" class="text-reset">Bantuan</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Kontak</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Tentang Kami</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </footer>
    </main>
</body>

</html>
