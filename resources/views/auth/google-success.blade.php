<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Google Login Success</title>
    <script>
        // Store token in localStorage (so frontend can use it for API requests)
        window.onload = function() {
            let token = "{{ $token }}";
            if (token) {
                localStorage.setItem("auth_token", token);
            }

            // Redirect after 2 seconds
            setTimeout(() => {
                window.location.href = "{{ $redirectTo }}";
            }, 2000);
        }
    </script>
</head>
<body>
    <h1>Welcome, {{ $user->name }} 🎉</h1>
    <p>You have successfully logged in with Google.</p>
    <p>Redirecting you to <strong>{{ $redirectTo }}</strong>...</p>
</body>
</html>
