<!DOCTYPE html>
<html lang="en">
@include('component.user-head')
<style>
  .rp-upgrade-wrap {
    min-height: calc(100vh - 160px);
    padding: 110px 0 60px;
    background: radial-gradient(1200px 600px at 10% -10%, rgba(255, 85, 165, 0.14), transparent 50%),
                radial-gradient(1000px 800px at 90% 10%, rgba(245, 158, 11, 0.12), transparent 50%),
                #2b2b31;
    color: #fff;
    font-family: 'Open Sans', sans-serif;
  }
  .rp-upgrade-card {
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
    height: 100%;
  }
  .rp-plan-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    border-radius: 999px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24);
    color: #111827;
    font-weight: 700;
    font-size: 12px;
    margin-bottom: 16px;
  }
  .rp-price-box {
    background: linear-gradient(135deg, rgba(255, 85, 165, 0.12), rgba(245, 158, 11, 0.12));
    border: 1px solid rgba(245, 158, 11, 0.35);
    border-radius: 14px;
    padding: 20px;
    margin: 20px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }
  .rp-benefit-list {
    list-style: none;
    padding: 0;
    margin: 20px 0;
  }
  .rp-benefit-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    color: rgba(255, 255, 255, 0.85);
    font-size: 15px;
  }
  .rp-benefit-list li i {
    color: #10b981;
    font-size: 16px;
  }
  .rp-dropzone {
    border: 2px dashed rgba(255, 255, 255, 0.22);
    border-radius: 14px;
    padding: 28px 20px;
    text-align: center;
    background: rgba(255, 255, 255, 0.02);
    margin-bottom: 20px;
    cursor: pointer;
    transition: border-color 0.2s ease, background 0.2s ease;
  }
  .rp-dropzone:hover {
    border-color: #1aafff;
    background: rgba(26, 175, 255, 0.04);
  }
  .rp-submit-btn {
    width: 100%;
    padding: 14px 20px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(90deg, #1aafff 0%, #1f41da 100%);
    color: #fff;
    font-weight: 700;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(26, 175, 255, 0.3);
    transition: opacity 0.2s ease;
  }
  .rp-submit-btn:hover {
    opacity: 0.92;
  }
  .rp-status-banner {
    border-radius: 14px;
    padding: 20px 24px;
    margin-bottom: 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }
  .rp-history-card {
    background: #28282d;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 24px 28px;
    margin-top: 10px;
  }
</style>
<body class="body">
  @include('vendor.sweetalert.alert')
  @include('component.user-header')

  <div class="rp-upgrade-wrap">
    <div class="container">

      {{-- Active Premium or Pending Banner --}}
      @if(!empty($user) && $user->is_premium)
        <div class="rp-status-banner" style="background: linear-gradient(90deg, rgba(16, 185, 129, 0.2), rgba(5, 150, 105, 0.15)); border: 1px solid #10b981;">
          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:52px; height:52px; border-radius:50%; background:#10b981; color:#fff; display:flex; align-items:center; justify-content:center; font-size:24px;">
              <i class="fas fa-crown"></i>
            </div>
            <div>
              <h3 style="margin:0 0 4px; font-size:20px; color:#fff;">You are an Active Premium Member! 🎉</h3>
              <p style="margin:0; color:rgba(255,255,255,0.75); font-size:14px;">You have full, unlimited access to read and download all Premium books on ReadPort.</p>
            </div>
          </div>
          <a href="{{ route('home') }}" style="padding:10px 20px; border-radius:8px; background:#10b981; color:#fff; font-weight:700; text-decoration:none; font-size:13px;">
            Browse Premium Books &rarr;
          </a>
        </div>
      @elseif(!empty($pendingRequest))
        <div class="rp-status-banner" style="background: rgba(245, 158, 11, 0.15); border: 1px solid #f59e0b;">
          <div style="display:flex; align-items:center; gap:16px;">
            <div style="width:50px; height:50px; border-radius:50%; background:#f59e0b; color:#111827; display:flex; align-items:center; justify-content:center; font-size:22px;">
              <i class="fas fa-hourglass-half"></i>
            </div>
            <div>
              <h3 style="margin:0 0 4px; font-size:18px; color:#fbbf24;">Your Premium Upgrade Request is Pending Review</h3>
              <p style="margin:0; color:rgba(255,255,255,0.75); font-size:14px;">
                Submitted {{ $pendingRequest->created_at?->diffForHumans() }}. Our Admin team will verify your payment receipt shortly.
              </p>
            </div>
          </div>
          <a href="{{ $pendingRequest->e_receipt }}" target="_blank" style="padding:8px 16px; border-radius:8px; background:rgba(255,255,255,0.1); color:#fff; text-decoration:none; font-size:13px;">
            View Submitted Receipt
          </a>
        </div>
      @endif

      <div class="row">
        {{-- Left Column: Plan Details & Payment Info --}}
        <div class="col-12 col-lg-6" style="margin-bottom: 24px;">
          <div class="rp-upgrade-card">
            <span class="rp-plan-badge"><i class="fas fa-crown"></i> READ-PORT VIP MEMBERSHIP</span>
            <h2 style="font-size: 28px; font-weight: 700; margin: 0 0 10px; color: #fff;">Upgrade to Premium</h2>
            <p style="color: rgba(255,255,255,0.65); line-height: 1.6; margin-bottom: 0;">
              Get instant, lifetime access to all exclusive Premium E-Books, novels, and PDF downloads with a single payment.
            </p>

            <div class="rp-price-box">
              <div>
                <div style="font-size:12px; text-transform:uppercase; color:#fbbf24; font-weight:700; letter-spacing:0.6px;">Lifetime Premium Pass</div>
                <div style="font-size:28px; font-weight:800; color:#fff; margin-top:2px;">10,000 MMK <span style="font-size:13px; font-weight:400; color:rgba(255,255,255,0.6);">/ one-time</span></div>
              </div>
              <span style="padding:6px 12px; border-radius:8px; background:rgba(16,185,129,0.2); color:#6ee7b7; font-size:12px; font-weight:700;">
                Full Library Access
              </span>
            </div>

            <ul class="rp-benefit-list">
              <li><i class="fas fa-check-circle"></i> Read & download all <strong>Premium E-Books (PDF)</strong></li>
              <li><i class="fas fa-check-circle"></i> Save unlimited books to your personal library</li>
              <li><i class="fas fa-check-circle"></i> Verified <strong>👑 Premium Member</strong> badge on your profile</li>
              <li><i class="fas fa-check-circle"></i> Fast verification via KBZPay / WavePay screenshot</li>
            </ul>

            <div style="background: rgba(255,255,255,0.04); border-radius: 12px; padding: 18px; border: 1px solid rgba(255,255,255,0.08);">
              <div style="font-size: 13px; color: rgba(255,255,255,0.6); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px;">
                <i class="fas fa-wallet" style="color:#fbbf24; margin-right:6px;"></i> Step 1: Transfer Payment To
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid rgba(255,255,255,0.06);">
                <span style="color:rgba(255,255,255,0.8);">KBZPay / WavePay</span>
                <strong style="color:#fbbf24; font-size:16px;">09-123-456-789</strong>
              </div>
              <div style="display:flex; justify-content:space-between; align-items:center; padding-top:8px;">
                <span style="color:rgba(255,255,255,0.8);">Account Name</span>
                <strong style="color:#fff;">Read-Port Bookstore</strong>
              </div>
            </div>
          </div>
        </div>

        {{-- Right Column: Upload Form --}}
        <div class="col-12 col-lg-6" style="margin-bottom: 24px;">
          <div class="rp-upgrade-card">
            <h3 style="font-size: 22px; font-weight: 700; margin: 0 0 6px; color: #fff;">
              Step 2: Upload Payment Receipt
            </h3>
            <p style="color: rgba(255,255,255,0.6); font-size: 14px; margin: 0 0 20px;">
              Upload a screenshot of your transfer receipt below. Once approved by Admin, your account will automatically upgrade to Premium.
            </p>

            @if(session('success'))
              <div style="background: rgba(16, 185, 129, 0.18); border: 1px solid #10b981; color: #6ee7b7; padding: 14px; border-radius: 10px; margin-bottom: 18px;">
                <div><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
              </div>
            @endif

            @if($errors->any())
              <div style="background: rgba(239, 68, 68, 0.18); border: 1px solid #ef4444; color: #fca5a5; padding: 14px; border-radius: 10px; margin-bottom: 18px;">
                <ul style="margin: 0; padding-left: 18px;">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="receipt-file" class="rp-dropzone" style="display:block;">
                <i class="fas fa-cloud-upload-alt" style="font-size: 40px; color: #ff55a5; margin-bottom: 10px;"></i>
                <div style="color: #fff; font-weight: 600; font-size: 15px; margin-bottom: 4px;">
                  Click to choose your E-Receipt image
                </div>
                <div style="color: rgba(255,255,255,0.5); font-size: 12px; margin-bottom: 14px;">
                  Supports JPG, PNG, GIF (Max 10MB)
                </div>
                <input type="file" name="file" id="receipt-file" accept="image/*" required style="color: #fff; max-width: 100%;" onchange="previewReceipt(event)">
                <div id="receipt-preview-wrap" style="display:none; margin-top:16px;">
                  <img id="receipt-preview-img" src="" alt="Preview" style="max-height: 200px; border-radius: 10px; border: 2px solid #ff55a5;">
                </div>
              </label>

              <button type="submit" class="rp-submit-btn">
                <i class="fas fa-paper-plane" style="margin-right: 6px;"></i> Submit Premium Request
              </button>
            </form>

            <div style="margin-top: 18px; text-align: center;">
              <a href="{{ route('profile') }}" style="color: rgba(255,255,255,0.65); font-size: 13px; text-decoration: none;">
                &larr; Back to My Profile
              </a>
            </div>
          </div>
        </div>
      </div>

      {{-- User's Submitted Requests History --}}
      @if(!empty($userRequests) && $userRequests->count() > 0)
        <div class="rp-history-card">
          <h4 style="margin: 0 0 16px; font-size: 18px; font-weight: 700; color: #fff;">
            <i class="fas fa-history" style="color: #1aafff; margin-right: 8px;"></i> My Submitted Requests
          </h4>
          <div class="table-responsive">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
              <thead>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.55); text-align: left;">
                  <th style="padding: 10px 8px;">Receipt</th>
                  <th style="padding: 10px 8px;">Account</th>
                  <th style="padding: 10px 8px;">Submitted Date</th>
                  <th style="padding: 10px 8px;">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($userRequests as $req)
                  <tr style="border-bottom: 1px solid rgba(255,255,255,0.06);">
                    <td style="padding: 12px 8px;">
                      <a href="{{ $req->e_receipt }}" target="_blank">
                        <img src="{{ $req->e_receipt }}" alt="Receipt" style="width: 48px; height: 64px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(255,255,255,0.15);">
                      </a>
                    </td>
                    <td style="padding: 12px 8px;">
                      <strong>{{ $req->name }}</strong><br>
                      <small style="color: rgba(255,255,255,0.55);">{{ $req->email }}</small>
                    </td>
                    <td style="padding: 12px 8px; color: rgba(255,255,255,0.7);">
                      {{ $req->created_at?->format('M d, Y h:i A') }}
                    </td>
                    <td style="padding: 12px 8px;">
                      @if(!$req->is_disabled)
                        <span style="padding: 4px 12px; border-radius: 999px; background: rgba(245, 158, 11, 0.2); border: 1px solid #f59e0b; color: #fbbf24; font-size: 12px; font-weight: 600;">
                          ⏳ Pending Approval
                        </span>
                      @elseif($user && $user->is_premium)
                        <span style="padding: 4px 12px; border-radius: 999px; background: rgba(16, 185, 129, 0.2); border: 1px solid #10b981; color: #6ee7b7; font-size: 12px; font-weight: 600;">
                          ✓ Approved
                        </span>
                      @else
                        <span style="padding: 4px 12px; border-radius: 999px; background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #fca5a5; font-size: 12px; font-weight: 600;">
                          Processed
                        </span>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      @endif

    </div>
  </div>

  @include('component.user-fooder')
  @include('component.user-js')
  <script>
    function previewReceipt(event) {
      const file = event.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('receipt-preview-img').src = e.target.result;
        document.getElementById('receipt-preview-wrap').style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  </script>
</body>
</html>
