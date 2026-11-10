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
      font-family: system-ui, -apple-system, sans-serif;
    }
    .box {
      background: #28282d;
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 36px 40px;
      text-align: center;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.45);
    }
    .spinner {
      width: 40px;
      height: 40px;
      border: 3px solid rgba(255, 85, 165, 0.25);
      border-top-color: #ff55a5;
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
