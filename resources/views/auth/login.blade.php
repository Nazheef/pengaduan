<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
body{
font-family:Inter,sans-serif;
}
</style>
</head>

<body class="min-h-screen bg-[#0a0a0f] text-white flex items-center justify-center overflow-hidden">

<div class="absolute w-80 h-80 bg-blue-600/20 blur-3xl rounded-full top-10 left-10"></div>
<div class="absolute w-80 h-80 bg-purple-600/20 blur-3xl rounded-full bottom-10 right-10"></div>

<div class="relative w-full max-w-md px-6">

<div class="bg-white/5 border border-white/10 backdrop-blur-2xl rounded-3xl p-8 shadow-2xl">

<div class="text-center mb-8">
<h1 class="text-4xl font-extrabold tracking-wide">LOGIN</h1>
<p class="text-white/40 mt-2">Sistem Pengaduan Siswa</p>
</div>

@if($errors->any())
<div class="mb-5 bg-red-500/20 border border-red-500/30 text-red-300 p-4 rounded-2xl">
{{ $errors->first() }}
</div>
@endif

<form action="/login" method="POST" class="space-y-4">
@csrf

<div>
<label class="text-sm text-white/50">Username</label>
<input type="text" name="username"
placeholder="masukin username"
class="w-full mt-2 bg-[#111118] border border-white/10 px-4 py-4 rounded-2xl outline-none focus:border-blue-500">
</div>

<div>
<label class="text-sm text-white/50">Password</label>
<input type="password" name="password"
placeholder="masukin password"
class="w-full mt-2 bg-[#111118] border border-white/10 px-4 py-4 rounded-2xl outline-none focus:border-blue-500">
</div>

<div>
<p class="text-sm text-white/50 mb-3">Pilih Role</p>

<div class="grid grid-cols-2 gap-3">

<label>
<input type="radio" name="role" value="admin" class="hidden peer" required>

<div class="bg-[#111118] border border-white/10 rounded-2xl p-4 text-center cursor-pointer peer-checked:bg-white peer-checked:text-black peer-checked:font-bold duration-200">
<div class="text-2xl mb-1">🛡️</div>
<div>Admin</div>
</div>
</label>

<label>
<input type="radio" name="role" value="siswa" class="hidden peer">

<div class="bg-[#111118] border border-white/10 rounded-2xl p-4 text-center cursor-pointer peer-checked:bg-white peer-checked:text-black peer-checked:font-bold duration-200">
<div class="text-2xl mb-1">🎓</div>
<div>Siswa</div>
</div>
</label>

</div>
</div>

<button class="w-full py-4 rounded-2xl bg-white text-black font-bold hover:scale-[1.02] duration-200 mt-2">
Masuk
</button>

</form>

<a href="/register"
class="block text-center mt-6 text-white/45 hover:text-white duration-200">
Belum punya akun? Register
</a>

</div>

</div>

</body>
</html>