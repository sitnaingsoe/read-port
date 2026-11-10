<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<style>
  .rp-auth-alert {
    width: 100%;
    background: rgba(239, 68, 68, 0.16);
    border: 1px solid rgba(239, 68, 68, 0.4);
    color: #fca5a5;
    padding: 10px 14px;
    border-radius: 6px;
    font-size: 13px;
    margin-bottom: 18px;
    text-align: left;
  }
  .rp-google-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 46px;
    border-radius: 4px;
    background: #2b2b31;
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #fff !important;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none !important;
    margin-top: 14px;
    transition: all 0.2s ease;
  }
  .rp-google-btn:hover {
    border-color: #1aafff;
    background: rgba(26, 175, 255, 0.08);
  }
  .sign__form {
    width: 100%;
    max-width: 400px;
    padding: 40px 35px !important;
    border-radius: 6px;
  }
  .sign__group {
    width: 100%;
  }
  .sign__input {
    width: 100% !important;
    border-radius: 4px !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
  }
  .sign__input:focus {
    border-color: #1aafff !important;
    outline: none;
  }
</style>
<body class="body">
  <div class="sign section--bg">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="sign__content">
            <!-- registration form -->
            <form action="/signup" method="POST" class="sign__form">
              @csrf
              <a href="{{ route('home') }}" class="sign__logo">
                <img src="{{ asset('img/reportlogo.png') }}" alt="ReadPort">
              </a>

              @if($errors->any())
                <div class="rp-auth-alert">
                  @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle"></i> {{ $error }}</div>
                  @endforeach
                </div>
              @endif

              <div class="sign__group">
                <input type="text" name="name" id="firstname" class="sign__input" value="{{ old('name') }}" placeholder="Name" required>
              </div>

              <div class="sign__group">
                <input type="email" name="email" id="email" class="sign__input" value="{{ old('email') }}" placeholder="Email" required>
              </div>

              <div class="sign__group">
                <input type="password" name="password" id="password" class="sign__input" placeholder="Password (min 6 characters)" required>
              </div>

              <div class="sign__group sign__group--checkbox">
                <input id="remember" name="remember" type="checkbox" checked="checked">
                <label for="remember">I agree to the <a href="#">Privacy Policy</a></label>
              </div>

              <button class="sign__btn" type="submit" style="border:none; cursor:pointer;">Sign up</button>

              <a href="{{ route('google.redirect') }}" class="rp-google-btn">
                <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google" style="width:18px; height:18px;">
                Sign up with Google
              </a>

              <span class="sign__text" style="margin-top: 20px; color: rgba(255,255,255,0.6); font-size: 14px;">
                Already have an account? <a href="{{ route('login') }}" style="color: #1aafff;">Sign in!</a>
              </span>

              <span class="sign__text" style="margin-top: 10px; font-size: 13px;">
                <a href="{{ route('home') }}" style="color: rgba(255,255,255,0.5);">&larr; Back to Home</a>
              </span>
            </form>
            <!-- registration form -->
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('component.user-js')
</body>
</html>
