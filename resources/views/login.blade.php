<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>
<body>

    <h1>Log In</h1>

    <form action="/login" method="POST">
        @csrf

        <div>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required>
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <button type="submit">Log In</button>
    </form>

</body>
</html>