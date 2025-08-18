<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Menu</title>
    <link rel="stylesheet" href="css/metisMenu.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
        <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f4f4;
        }

        .sidebar {
            width: 250px;
            background: #2f4050;
            color: #fff;
            height: 100vh;
            position: fixed;
        }

        .sidebar .sidebar-header {
            padding: 20px;
            background: #293846;
            font-size: 18px;
            font-weight: bold;
        }

        .sidebar-menu li a {
            display: block;
            padding: 12px 20px;
            color: #fff;
            text-decoration: none;
        }

        .sidebar-menu li a:hover {
            background: #1ab394;
        }

        .fa.arrow {
            float: right;
        }
        /* Make logout look like sidebar links */
.logout-item form {
    margin: 0;
    padding: 0;
}

.logout-link {
    display: block;
    width: 100%;
    text-align: left;
    border: none;
    background: transparent;
    color: #fff;              /* match sidebar text */
    padding: 10px 15px;
    font-size: 14px;
    cursor: pointer;
}

.logout-link i {
    margin-left: 6px;
    margin-right: 8px;
}

/* Hover effect same as other menu links */
.logout-link:hover {
    background: #2c3e50;      /* adjust to match your theme */
    color: #f1f1f1;
}


        </style>
<body>

<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <div class="logo">
                    <span class="l l1"></span>
                    <span class="l l2"></span>
                    <span class="l l3"></span>
                    <span class="l l4"></span>
                    <span class="l l5"></span>
                </div>
                Admin
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i> Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ url('book-list') }}">
                        <i class="fa fa-th-large"></i> Books List
                        
                    </a>
                </li>
                <li>
                    <a href="{{ url('book-create') }}"><i class="fa-solid fa-circle-plus"></i> Create Book </a>
                </li>

                <li>
                    <a href="{{ url('book-category') }}">
                        <i class="fa fa-area-chart"></i> Category
                    </a>
                </li>

                <li>
                    <a href="{{ route('customer-list') }}">
                        <i class="fa fa-table"></i> Customer List
                    </a>
                </li>

                <li>
                    <a href="{{ route('premium') }}">
                        <i class="fa-solid fa-dollar-sign"></i> Premium
                    </a>
                </li>

                <li class="logout-item">
                    <form action="{{ url('google/logout') }}" method="POST">
                        @csrf 
                        <button type="submit" class="logout-link" id="logout">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<script>
    document.getElementById('logout-btn').addEventListener('click', function() {
            localStorage.removeItem("auth_token"); // clear token
            window.location.href = "/"; // optional backend logout
        });
</script>
<script src="js/jquery.min.js"></script>
<script src="js/metisMenu.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
