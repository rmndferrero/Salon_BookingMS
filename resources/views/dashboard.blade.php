<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
<title>Dashboard</title>
</head>

<body class="bg-background-light min-h-screen flex items-center justify-center">

<div class="bg-white p-10 rounded-xl shadow-lg text-center">

<h1 class="text-3xl font-bold mb-4">
Welcome {{ Auth::user()->name }}
</h1>

<form method="POST" action="/logout">
@csrf

<button class="bg-primary text-white px-6 py-3 rounded-lg">
Logout
</button>

</form>

</div>

</body>
</html>