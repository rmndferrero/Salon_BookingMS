<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://cdn.tailwindcss.com?plugins=forms"></script>

<title>Create Account</title>
</head>

<body class="bg-gray-200 flex items-center justify-center min-h-screen font-sans">

<div class="bg-white w-full max-w-lg rounded-xl shadow-xl p-10">

<h1 class="text-3xl font-bold text-center mb-2">Create Account</h1>
<p class="text-gray-500 text-center mb-8">
Join us for a premium pampering experience
</p>

<form method="POST" action="/register" class="space-y-5">
@csrf

<div>
<label class="text-sm font-semibold">Full Name</label>
<input name="name"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
placeholder="Jane Doe"
required>
</div>

<div>
<label class="text-sm font-semibold">Email Address</label>
<input name="email"
type="email"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
placeholder="jane@example.com"
required>
</div>

<div>
<label class="text-sm font-semibold">Phone Number</label>
<input name="phone"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
placeholder="+1 (555) 000-0000">
</div>

<div>
<label class="text-sm font-semibold">Password</label>
<input name="password"
type="password"
class="mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring-pink-500"
required>
</div>

<div class="flex items-center gap-2">
<input type="checkbox" required>
<label class="text-sm text-gray-500">
I agree to the
<span class="text-pink-500">Terms of Service</span>
</label>
</div>

<button class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded-lg shadow-md transition">
Create Account
</button>

</form>

<p class="text-center mt-6 text-gray-500">
Already have an account?
<a href="/login" class="text-pink-500 font-semibold">Log in here</a>
</p>

</div>

</body>
</html>