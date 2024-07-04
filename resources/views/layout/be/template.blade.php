<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>@yield('title') - UAS WEB LANJUT </title>

        <link href="/backend/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

    @include('layout.be.top-nav')

        <div id="layoutSidenav">

            @include('layout.be.sidebar')

            <div id="layoutSidenav_content">
                <main>

                    @yield('content')

                </main>

                @include('layout.be.footer')

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/backend/js/scripts.js"></script>
    </body>
</html>
