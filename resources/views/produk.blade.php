<!DOCTYPE html>
<html>
<head>
    <title>Halaman Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">

    <div class="container">
        <h2 class="mb-4">Halaman Produk</h2>

        {{-- Komponen alert --}}
        <x-alert :type="$alertType">
            {{ $pesan }}
        </x-alert>
    </div>

</body>
</html>
