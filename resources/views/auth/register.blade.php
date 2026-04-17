<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
body{
font-family:Inter,sans-serif;
}
</style>
</head>

<body class="min-h-screen bg-[#0a0a0f] text-white flex items-center justify-center">

<div class="absolute w-80 h-80 bg-blue-600/20 blur-3xl rounded-full top-10 left-10"></div>
<div class="absolute w-80 h-80 bg-purple-600/20 blur-3xl rounded-full bottom-10 right-10"></div>

<div class="relative w-full max-w-md px-6">

<div class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-8 shadow-2xl">

<div class="text-center mb-8">
<h1 class="text-4xl font-extrabold">REGISTER</h1>
<p class="text-white/40 mt-2">buat akun siswa</p>
</div>

@if($errors->any())
<div class="mb-5 bg-red-500/20 border border-red-500/30 text-red-300 p-4 rounded-2xl">
{{ $errors->first() }}
</div>
@endif

<form action="/register" method="POST" class="space-y-4">
@csrf

<div>
<label class="text-sm text-white/50">Nama</label>
<input type="text" name="nama"
class="w-full mt-2 bg-[#111118] border border-white/10 px-4 py-4 rounded-2xl outline-none focus:border-blue-500"
placeholder="nama lengkap">
</div>

<div>
<label class="text-sm text-white/50">Username</label>
<input type="text" name="username"
class="w-full mt-2 bg-[#111118] border border-white/10 px-4 py-4 rounded-2xl outline-none focus:border-blue-500"
placeholder="username unik">
</div>

<div>
<label class="text-sm text-white/50">Password</label>
<input type="password" name="password"
class="w-full mt-2 bg-[#111118] border border-white/10 px-4 py-4 rounded-2xl outline-none focus:border-blue-500"
placeholder="password">
</div>

<button class="w-full py-4 rounded-2xl bg-white text-black font-bold hover:scale-[1.02] duration-200 mt-2">
Buat Akun
</button>

</form>

<a href="/login"
class="block text-center mt-6 text-white/45 hover:text-white duration-200">
udah punya akun? login
</a>

</div>

</div>

</body>
</html>