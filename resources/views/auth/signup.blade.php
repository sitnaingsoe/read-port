<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create Account – ReadPort Bookstore</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Open Sans', sans-serif;
      background: radial-gradient(1200px 600px at 10% -10%, rgba(255, 85, 165, 0.16), transparent 50%),
                  radial-gradient(1000px 800px at 90% 10%, rgba(26, 175, 255, 0.14), transparent 50%),
                  #2b2b31;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 24px;
    }
    .rp-auth-box {
      width: 100%;
      max-width: 440px;
      background: #28282d;
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 36px 32px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
      border-top: 3px solid #1aafff;
    }
    .rp-logo {
      text-align: center;
      margin-bottom: 24px;
    }
    .rp-logo a {
      text-decoration: none;
      font-size: 28px;
      font-weight: 800;
      letter-spacing: 0.5px;
      color: #fff;
    }
    .rp-logo a span {
      background: linear-gradient(90deg, #ff55a5, #1aafff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .rp-subtitle {
      text-align: center;
      color: rgba(255, 255, 255, 0.6);
      font-size: 14px;
      margin: -14px 0 24px;
    }
    .rp-alert {
      background: rgba(239, 68, 68, 0.16);
      border: 1px solid rgba(239, 68, 68, 0.4);
      color: #fca5a5;
      padding: 12px 14px;
      border-radius: 10px;
      font-size: 13px;
      margin-bottom: 18px;
    }
    .rp-group {
      margin-bottom: 16px;
    }
    .rp-label {
      display: block;
      font-size: 13px;
      color: rgba(255, 255, 255, 0.75);
      margin-bottom: 7px;
      font-weight: 600;
    }
    .rp-input {
      width: 100%;
      height: 46px;
      border-radius: 10px;
      border: 1px solid rgba(255, 255, 255, 0.12);
      background: #2b2b31;
      color: #fff;
      padding: 0 14px;
      font-size: 14px;
      transition: border-color 0.2s ease;
    }
    .rp-input:focus {
      outline: none;
      border-color: #1aafff;
    }
    .rp-btn-primary {
      width: 100%;
      height: 46px;
      border-radius: 10px;
      border: none;
      background: linear-gradient(90deg, #ff55a5 0%, #ff5860 100%);
      color: #fff;
      font-size: 14px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(255, 85, 165, 0.3);
      margin-top: 6px;
    }
    .rp-divider {
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 20px 0;
      color: rgba(255, 255, 255, 0.4);
      font-size: 12px;
    }
    .rp-divider::before, .rp-divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: rgba(255, 255, 255, 0.1);
    }
    .rp-btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      height: 44px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.14);
      color: #fff;
      font-size: 13.5px;
      font-weight: 600;
      text-decoration: none;
    }
    .rp-footer-text {
      text-align: center;
      margin-top: 22px;
      font-size: 13.5px;
      color: rgba(255, 255, 255, 0.65);
    }
    .rp-footer-text a {
      color: #ff55a5;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="rp-auth-box">
    <div class="rp-logo">
      <a href="{{ route('home') }}"><span>ReadPort</span></a>
    </div>
    <p class="rp-subtitle">Create your free reader account</p>

    @if($errors->any())
      <div class="rp-alert">
        @foreach($errors->all() as $error)
          <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form id="signup-form" action="/signup" method="POST">
      @csrf
      <div class="rp-group">
        <label class="rp-label" for="firstname">Full Name</label>
        <input type="text" class="rp-input" name="name" id="firstname" value="{{ old('name') }}" placeholder="Enter your full name" required>
      </div>

      <div class="rp-group">
        <label class="rp-label" for="email">Email Address</label>
        <input type="email" class="rp-input" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
      </div>

      <div class="rp-group">
        <label class="rp-label" for="password">Password (min 6 characters)</label>
        <input type="password" class="rp-input" name="password" id="password" placeholder="Create a password" required>
      </div>

      <button type="submit" class="rp-btn-primary">Create Account</button>
    </form>

    <div class="rp-divider">OR</div>

    <a href="{{ route('google.redirect') }}" class="rp-btn-google">
      <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google" style="width:18px; height:18px;">
      Sign up with Google
    </a>

    <div class="rp-footer-text">
      Already have an account? <a href="{{ route('login') }}">Sign In</a>
      <div style="margin-top: 12px;">
        <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.5); font-size: 12.5px; font-weight: 400;">
          &larr; Back to Bookstore
        </a>
      </div>
    </div>
  </div>
</body>
</html>
