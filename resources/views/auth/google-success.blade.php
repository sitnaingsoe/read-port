<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome – ReadPort</title>
  <style>
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #2b2b31;
      color: #fff;
      font-family: 'Open Sans', system-ui, sans-serif;
    }
    .box {
      background: #28282d;
      border-top: 2px solid #1aafff;
      border-radius: 6px;
      padding: 36px 40px;
      text-align: center;
      box-shadow: 0 5px 25px 0 rgba(0, 0, 0, 0.3);
    }
    .spinner {
      width: 40px;
      height: 40px;
      border: 3px solid rgba(26, 175, 255, 0.25);
      border-top-color: #1aafff;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      margin: 0 auto 18px;
    }
    @keyframes spin { to { transform: rotate(360deg); } }
  </style>
  <script>
    window.onload = function() {
      let token = "{{ $token }}";
      if (token) {
        localStorage.setItem("auth_token", token);
      }
      setTimeout(() => {
        window.location.href = "{{ $redirectTo }}";
      }, 600);
    }
  </script>
</head>
<body>
  <div class="box">
    <div class="spinner"></div>
    <h2 style="margin: 0 0 8px;">Welcome, {{ $user->name }}! 🎉</h2>
    <p style="margin: 0; color: rgba(255,255,255,0.65); font-size: 14px;">Signing you in to ReadPort...</p>
  </div>
</body>
</html>
