<!DOCTYPE html>
<html>
<head>
    <title>Create an Account</title>
</head>
<body>

    <h1>Create an Account</h1>

    <form action="/register" method="POST">
        @csrf

        <div>
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
            @error('first_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            @error('last_name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
            @error('phone_number') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="password">Password (Minimum 8 characters):</label><br>
            <input type="password" id="password" name="password" required>
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <div>
            <label for="password_confirmation">Confirm Password:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ route('login') }}">Log in here</a>.</p>

</body>
</html>