<!DOCTYPE html>
<html>
<head>
    <title>Book an Appointment</title>
</head>
<body>

    <h1>Book an Appointment</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="/booking/process-user" method="POST">
        @csrf <div>
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
            <input type="hidden" name="is_creating_account" value="0">
            <input type="checkbox" id="is_creating_account" name="is_creating_account" value="1" onchange="togglePassword()">
            <label for="is_creating_account">Create an account to manage future bookings</label>
        </div>
        <br>

        <div id="password_section" style="display: none;">
            <label for="password">Password (Minimum 8 characters):</label><br>
            <input type="password" id="password" name="password">
            @error('password') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
        <br>

        <button type="submit">Confirm Booking</button>
    </form>

    <script>
        function togglePassword() {
            var checkbox = document.getElementById('is_creating_account');
            var passwordSection = document.getElementById('password_section');
            if (checkbox.checked) {
                passwordSection.style.display = 'block';
            } else {
                passwordSection.style.display = 'none';
            }
        }
    </script>

</body>
</html>