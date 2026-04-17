<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
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

<aside class="w-72 bg-white/5 border-r border-white/10 backdrop-blur-2xl p-7 hidden md:block">

<h1 class="text-2xl font-extrabold">ADMIN PANEL</h1>
<p class="text-white/40 text-sm mt-1">manage complaints</p>

<div class="mt-10 space-y-3">

<div class="bg-white text-black rounded-2xl px-4 py-3 font-semibold">
Dashboard
</div>

<div class="bg-white/5 rounded-2xl px-4 py-3 text-white/70">
Data Pengaduan
</div>

<a href="/logout"
class="block bg-red-500 rounded-2xl px-4 py-3 mt-8 text-center font-semibold">
Logout
</a>

</div>

</aside>

<main class="flex-1 p-8">

<div class="flex justify-between items-center mb-8">

<div>
<h2 class="text-4xl font-bold">Halo, {{ Auth::user()->nama }}</h2>
<p class="text-white/40 mt-1">welcome back admin 👑</p>
</div>

<div class="bg-white/5 border border-white/10 px-5 py-3 rounded-2xl">
{{ now()->format('d M Y') }}
</div>

</div>

<div class="grid md:grid-cols-3 gap-5 mb-8">

<div class="rounded-3xl p-6 bg-white/5 border border-white/10">
<p class="text-white/50">Total Laporan</p>
<h1 class="text-5xl font-bold mt-3">{{ $data->count() }}</h1>
</div>

<div class="rounded-3xl p-6 bg-yellow-500/10 border border-yellow-400/20">
<p class="text-white/50">Pending</p>
<h1 class="text-5xl font-bold mt-3">
{{ $data->where('status','pending')->count() }}
</h1>
</div>

<div class="rounded-3xl p-6 bg-green-500/10 border border-green-400/20">
<p class="text-white/50">Selesai</p>
<h1 class="text-5xl font-bold mt-3">
{{ $data->where('status','selesai')->count() }}
</h1>
</div>

</div>

<div class="bg-white/5 border border-white/10 rounded-3xl p-7">

<div class="flex justify-between items-center mb-6">
<h3 class="text-2xl font-bold">Semua Pengaduan</h3>
</div>

<div class="space-y-4 max-h-[620px] overflow-y-auto pr-2">

@forelse($data as $d)

<div class="bg-[#111118] rounded-3xl p-5 border border-white/5">

<div class="flex justify-between items-start gap-4">

<div class="flex-1">
<h4 class="text-xl font-semibold">{{ $d->judul }}</h4>

<p class="text-white/45 mt-1">
{{ $d->user->nama ?? 'User' }}
</p>

<p class="text-white/60 mt-3">
{{ $d->isi }}
</p>

@if($d->foto)
<img src="{{ asset('storage/'.$d->foto) }}"
class="w-28 h-28 object-cover rounded-2xl mt-4">
@endif
</div>

<div class="w-52">

<form action="/status/{{ $d->id }}" method="POST" class="space-y-3">
@csrf

<select name="status"
class="w-full bg-black/40 border border-white/10 rounded-2xl px-4 py-3 outline-none">
<option value="pending">Pending</option>
<option value="proses">Proses</option>
<option value="selesai">Selesai</option>
</select>

<button class="w-full bg-white text-black py-3 rounded-2xl font-bold">
Update
</button>

</form>

<form action="/hapus/{{ $d->id }}" method="POST" class="mt-3">
@csrf
@method('DELETE')

<button class="w-full bg-red-500 py-3 rounded-2xl font-bold">
Hapus
</button>

</form>

</div>

</div>

</div>

@empty

<div class="text-white/40">
Belum ada laporan masuk.
</div>

@endforelse

</div>

</div>

</main>

</div>

</body>
</html>