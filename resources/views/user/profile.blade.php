<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>
    <h1>Profile Page</h1>
    <p id="welcome-message">Loading your profile...</p>
    <button id="logout-btn">Logout</button>

    <script>
        // Check token in localStorage
        const token = localStorage.getItem("auth_token");

        if (!token) {
            // No token, redirect to login
            window.location.href = "/login";
        } else {
            // Verify token with backend
            fetch('/api/auth/me', {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            })
            .then(res => {
                if (res.status === 200) return res.json();
                else throw new Error('Invalid token');
            })
            .then(user => {
                document.getElementById('welcome-message').innerText =
                    `Welcome back, ${user.name}! Your email: ${user.email}`;
            })
            .catch(err => {
                console.error(err);
                localStorage.removeItem("auth_token");
                window.location.href = "/login";
            });
        }

        // Logout button
        document.getElementById('logout-btn').addEventListener('click', function() {
            localStorage.removeItem("auth_token"); // clear token
            window.location.href = "/logout"; // optional backend logout
        });
    </script>
</body>
</html>
