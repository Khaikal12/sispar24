<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-5">Pembayaran</h2>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('pembayaran.store', $pemesanan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah Bayar</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                            <option value="transfer">Transfer Bank</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

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
</body>

</html>
