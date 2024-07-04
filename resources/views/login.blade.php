<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="/backend/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/font/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/styles/style.css') }}">
</head>

<body>
    <br>
    <br>
    <div class="container login-form">
        <div class="row mt-4 justify-content-center">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="offest-md-4">
                            <h1 class="text-center mt-4 mb-4 fw-bolder">Login</h1>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/login-post" method="post" class="form-login">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label style="font-weight: bold" class="form-label" for="form2Example1">Email
                                        address</label>
                                    <input type="email" id="form2Example1" name="email" class="form-control"
                                        placeholder="E-mail" required />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label style="font-weight: bold" class="form-label "
                                        for="form2Example2">Password</label>
                                    <input type="password" id="form2Example2" name="password" class="form-control"
                                        placeholder="Password" />
                                </div>

                                <!-- Submit button -->
                                <div class="col-md-12">
                                    <button type="submit" class="col-12 btn btn-primary btn-block mb-4">Sign
                                        in</button>
                                </div>
                                <a href="{{ route('register.index') }}" type="submit" class="col-12 btn btn-primary btn-block mb-4">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>

    <script src="/backend/js/scripts.js"></script>
</body>

</html>
