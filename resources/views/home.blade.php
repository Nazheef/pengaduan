<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Siswa</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-blue-600 text-white p-4 flex justify-between">
    <h1 class="text-xl font-bold">Dashboard Siswa</h1>
    <a href="/logout" class="bg-red-500 px-4 py-2 rounded-lg">Logout</a>
</nav>

<div class="max-w-6xl mx-auto p-6 grid md:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4">Buat Pengaduan</h2>

        <form action="/complaint" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <input type="text" name="judul" placeholder="Judul Pengaduan"
            class="w-full border p-3 rounded-xl">

            <textarea name="isi" rows="5" placeholder="Isi laporan..."
            class="w-full border p-3 rounded-xl"></textarea>

            <input type="file" name="foto"
            class="w-full border p-3 rounded-xl">

            <button class="bg-blue-600 text-white px-6 py-3 rounded-xl w-full">
                Kirim Pengaduan
            </button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4">Riwayat Pengaduan</h2>

        @foreach($data as $d)
        <div class="border-b py-3">
            <h3 class="font-bold">{{ $d->judul }}</h3>
            <p class="text-gray-600">{{ $d->isi }}</p>
            <span class="text-sm px-3 py-1 rounded-full bg-yellow-200">
                {{ $d->status }}
            </span>
        </div>
        @endforeach

    </div>

</div>

</body>
</html>