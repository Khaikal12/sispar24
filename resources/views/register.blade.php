<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

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
                            <h1 class="text-center mt-4 mb-4 fw-bolder">Register</h1>
                            <div class="form-outline mb-4">
                                <input type="text" style="border-radius: 20px" class="form-control form-control-user"
                                    placeholder="Username" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" style="border-radius: 20px" class="form-control form-control-user"
                                    placeholder="No HP" name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                            </div>
                            <div class="form-outline mb-4">
                                <input type="text" style="border-radius: 20px" class="form-control form-control-user"
                                    placeholder="Alamat" name="alamat" id="alamat" value="{{ old('alamat') }}">
                            </div>

                            <div class="form-outline mb-4">
                                <label>Jenis Kelamin:</label>
                                <div style="float: right">
                                    <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki">
                                    <label for="laki_laki">Laki-laki</label>
                                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                                    <label for="perempuan">Perempuan</label>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" style="border-radius: 20px" class="form-control form-control-user"
                                    placeholder="Email" name="email" id="email">
                            </div>
                            <div class="form-outline mb-4">
                                <input type="password" style="border-radius: 20px"
                                    class="form-control form-control-user" id="password" name="password"
                                    placeholder="Password">
                            </div>
                            {{-- <div class="form-group">
                                <input type="text" style="border-radius: 20px; display: none"
                                    class="form-control form-control-user" id="hak_akses" name="hak_akses"
                                    placeholder="Hak Akses">
                            </div> --}}
                            <button type="submit" style="border-radius: 20px"
                                class="col-12 btn btn-register btn-user     btn-block btn-primary">Daftar</button>
                            <div class="text-center" style="margin-top: 15px; color: black">
                                Sudah punya akun? <a href="/login">Silahkan Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-register").click(function() {

                var name = $("#name").val();
                var no_hp = $("#no_hp").val();
                var alamat = $("#alamat").val();
                var jenis_kelamin = $("input[name='jenis_kelamin']:checked").val();
                var email = $("#email").val();
                var password = $("#password").val();
                var token = $("meta[name='csrf-token']").attr("content");

                // Validasi nomor telepon harus berisi angka dan max 13 karakter
                var isNumeric = /^[0-9]+$/.test(no_hp);
                var isMaxLength = no_hp.length <= 13;
                var isLengthValid = no_hp.length >= 12 && no_hp.length <= 13;

                // Validasi alamat email harus berakhiran dengan '@gmail.com'
                var isEmailValid = /\b[A-Za-z0-9._%+-]+@gmail\.com\b/.test(email);


                if (name.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username tidak boleh kosong!',
                        icon: "warning",
                    });

                } else if (no_hp.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nomor HP tidak boleh kosong!',
                        icon: "warning",
                    });

                } else if (!isNumeric) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nomor HP harus berisi angka!',
                        icon: "warning",
                    });

                } else if (!isMaxLength) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nomor HP tidak valid!',
                        icon: "warning",
                    });

                } else if (!isLengthValid) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Nomor HP tidak valid!',
                        icon: "warning",
                    });

                } else if (alamat.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Alamat tidak boleh kosong!',
                        icon: "warning",
                    });

                } else if (jenis_kelamin == undefined) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Pilih jenis kelamin!',
                        icon: "warning",
                    });

                } else if (email.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Email tidak boleh kosong!',
                        icon: "warning",
                    });

                } else if (!isEmailValid) {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Email tidak valid!',
                        icon: "warning",
                    });

                } else if (password.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password tidak boleh kosong!',
                        icon: "warning",
                    });
                } else {

                    //ajax
                    $.ajax({

                        url: "{{ route('register.store') }}",
                        type: "POST",
                        cache: false,
                        data: {
                            "name": name,
                            "no_hp": no_hp,
                            "alamat": alamat,
                            "jenis_kelamin": jenis_kelamin,
                            "email": email,
                            "password": password,
                            "_token": token
                        },

                        success: function(response) {

                            if (response.success) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Berhasil!',
                                    text: 'Silahkan login!',
                                    icon: 'success',
                                });

                                $("input[name='jenis_kelamin']").prop('checked',
                                    false);

                                $("#name").val('');
                                $("#no_hp").val('');
                                $("#alamat").val('');
                                $("#jenis_kelamin").val('');
                                $("#email").val('');
                                $("#password").val('');

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Register Gagal!',
                                    text: 'silahkan coba lagi!',
                                });

                            }

                            console.log(response);

                        },

                        error: function(response) {
                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
