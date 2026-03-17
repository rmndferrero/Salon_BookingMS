<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://cdn.tailwindcss.com?plugins=forms"></script>

<title>Login</title>

</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen">

<div class="bg-white shadow-2xl rounded-xl overflow-hidden grid md:grid-cols-2 max-w-4xl w-full">

<!-- LEFT SIDE -->
<div class="bg-pink-50 p-10 flex flex-col justify-center">

<h1 class="text-4xl font-bold mb-4">
Elevate Your <span class="text-pink-500">Natural Beauty</span>
</h1>

<p class="text-gray-600">
Join our community of style seekers. Manage your appointments and discover new looks effortlessly.
</p>

</div>

<!-- RIGHT SIDE -->
<div class="p-10">

<h2 class="text-3xl font-bold mb-6">Welcome Back</h2>

<form method="POST" action="/login" class="space-y-5">
@csrf

<div>
<label class="text-sm font-semibold">Email Address</label>
<input name="email"
type="email"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
placeholder="jane@example.com"
required>
</div>

<div>
<label class="text-sm font-semibold">Password</label>
<input name="password"
type="password"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
required>
</div>

<button class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded-lg shadow-md transition">
Log In
</button>

</form>

<p class="text-center mt-6 text-gray-500">
Don't have an account?
<a href="/register" class="text-pink-500 font-semibold">Sign up</a>
</p>

</div>

</div>

</body>
</html>