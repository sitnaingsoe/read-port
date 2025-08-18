<!doctype html>
<html class="no-js" lang="en">
 @include('component.head')
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

    <body>
          @include('vendor.sweetalert.alert')
        <div class="main-wrapper">
            <div class="app" id="app">
                @include('component.header')
                @include('component.sidebar')
                 <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                 <article class="content dashboard-page">
                   
    <h1>Admin Dashboard</h1>
    <p id="welcome-message">Loading admin info...</p>
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
                        if (user.usertype !== 'admin') {
                            // Not an admin, redirect to user profile
                            window.location.href = "/user/profile";
                        } else {
                            document.getElementById('welcome-message').innerText =
                                `Welcome back, Admin ${user.name}! Your email: ${user.email}`;
                        }
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
            window.location.href = "/"; // optional backend logout
        });
    </script>
                </article>
                @include('component.fooder')
                <!-- /.modal -->
            </div>
        </div>
        @include('component.script')
        <script>
            const token = localStorage.getItem("auth_token");

            if (token) {
                // Send token to backend to verify
                fetch('/api/auth/me', {
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(res => {
                    if (res.status === 200) {
                        return res.json();
                    } else {
                        // Token invalid or expired, remove it
                        localStorage.removeItem("auth_token");
                        window.location.href = "/login"; // fallback
                    }
                })
                .then(user => {
                    console.log("Welcome back, " + user.name);
                    // You can update the page with user info here
                })
                .catch(() => {
                    localStorage.removeItem("auth_token");
                    window.location.href = "/login";
                });
            } else {
                // No token, redirect to login
                window.location.href = "/login";
            }
        </script>

        <script src="js/vendor.js"></script>
        <script src="js/app.js"></script>
    </body>

</html>
