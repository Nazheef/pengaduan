<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Siswa</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
body{
font-family:Inter,sans-serif;
}
</style>
</head>

<body class="bg-[#0a0a0f] text-white min-h-screen">

<div class="flex min-h-screen">

<aside class="w-72 bg-white/5 backdrop-blur-2xl border-r border-white/10 p-7 hidden md:block">

<h1 class="text-2xl font-extrabold tracking-wide">PENGADUAN</h1>
<p class="text-white/40 mt-1 text-sm">student panel</p>

<div class="mt-10 space-y-3">

<div class="bg-white text-black rounded-2xl px-4 py-3 font-semibold">
Dashboard
</div>

<div class="bg-white/5 rounded-2xl px-4 py-3 text-white/70">
Riwayat
</div>

<div class="bg-white/5 rounded-2xl px-4 py-3 text-white/70">
Buat Laporan
</div>

<a href="/logout" class="block bg-red-500 rounded-2xl px-4 py-3 mt-8 text-center font-semibold">
Logout
</a>

</div>

</aside>

<main class="flex-1 p-8">

<div class="flex justify-between items-center mb-8">

<div>
<h2 class="text-4xl font-bold">Halo, {{ Auth::user()->nama }}</h2>
<p class="text-white/40 mt-1">welcome back king 👑</p>
</div>

<div class="bg-white/5 px-5 py-3 rounded-2xl border border-white/10">
{{ now()->format('d M Y') }}
</div>

</div>

<div class="grid md:grid-cols-3 gap-5 mb-8">

<div class="rounded-3xl p-6 bg-gradient-to-br from-white/10 to-white/5 border border-white/10">
<p class="text-white/50">Total</p>
<h1 class="text-5xl font-bold mt-3">{{ $data->count() }}</h1>
</div>

<div class="rounded-3xl p-6 bg-gradient-to-br from-blue-500/20 to-cyan-500/10 border border-blue-400/20">
<p class="text-white/50">Diproses</p>
<h1 class="text-5xl font-bold mt-3">{{ $data->where('status','proses')->count() }}</h1>
</div>

<div class="rounded-3xl p-6 bg-gradient-to-br from-green-500/20 to-emerald-500/10 border border-green-400/20">
<p class="text-white/50">Selesai</p>
<h1 class="text-5xl font-bold mt-3">{{ $data->where('status','selesai')->count() }}</h1>
</div>

</div>

<div class="grid md:grid-cols-2 gap-6">

<div class="bg-white/5 border border-white/10 rounded-3xl p-7">

<h3 class="text-2xl font-bold mb-5">Buat Pengaduan</h3>

<form action="/complaint" method="POST" enctype="multipart/form-data" class="space-y-4">
@csrf

<input type="text" name="judul" placeholder="Judul"
class="w-full bg-[#111118] border border-white/10 p-4 rounded-2xl outline-none">

<textarea name="isi" rows="5" placeholder="Isi laporan..."
class="w-full bg-[#111118] border border-white/10 p-4 rounded-2xl outline-none"></textarea>

<input type="file" name="foto"
class="w-full bg-[#111118] border border-white/10 p-4 rounded-2xl">

<button class="w-full py-4 rounded-2xl bg-white text-black font-bold hover:scale-[1.02] duration-200">
Kirim Sekarang
</button>

</form>

</div>

<div class="bg-white/5 border border-white/10 rounded-3xl p-7">

<h3 class="text-2xl font-bold mb-5">Riwayat</h3>

<div class="space-y-4 max-h-[520px] overflow-y-auto pr-2">

@forelse($data as $d)

<div class="bg-[#111118] rounded-2xl p-5">

<div class="flex justify-between">
<h4 class="font-semibold text-lg">{{ $d->judul }}</h4>
<span class="text-xs text-white/40">{{ $d->created_at }}</span>
</div>

<p class="text-white/50 mt-2">{{ $d->isi }}</p>

<div class="mt-4 inline-block px-3 py-1 rounded-xl bg-white/10 text-sm">
{{ $d->status }}
</div>

</div>

@empty

<p class="text-white/40">Belum ada laporan.</p>

@endforelse

</div>

</div>

</div>

</main>

</div>

</body>
</html>