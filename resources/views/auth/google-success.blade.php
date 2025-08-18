<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Google Login Success</title>
</head>
<body>
    <h2>Welcome, {{ $user->name }}</h2>
    <p>Logging you in...</p>

    <script>
        // Save token to localStorage
        localStorage.setItem("auth_token", "{{ $token }}");

        // Redirect after saving
        window.location.href = "{{ $redirectTo }}";
    </script>
</body>
</html>
