<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>NPN — Forgot Password</title>
  <link rel="stylesheet" href="../css/forgot-password.css">

</head>

<body>
  <!-- BACKGROUND -->

  <div class="background-grid"></div>

  <div class="glow one"></div>

  <div class="glow two"></div>

  <!-- =====================================================
         PAGE
    ====================================================== -->

  <main class="page">
    <section class="forgot-container">
      <!-- =================================================
                 BRAND PANEL
            ================================================== -->

      <div class="brand-panel">
        <div class="brand-content">
          <!-- LOGO -->

          <div class="brand-logo">
            <div class="logo-icon">
              <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <linearGradient
                    id="npnGradient"
                    x1="0"
                    y1="1"
                    x2="1"
                    y2="0">
                    <stop offset="0%" stop-color="#00a8e8" />

                    <stop offset="100%" stop-color="#4db8ff" />
                  </linearGradient>
                </defs>

                <ellipse
                  cx="50"
                  cy="50"
                  rx="42"
                  ry="17"
                  fill="none"
                  stroke="url(#npnGradient)"
                  stroke-width="7"
                  transform="rotate(-42 50 50)" />

                <circle
                  cx="50"
                  cy="50"
                  r="27"
                  fill="none"
                  stroke="url(#npnGradient)"
                  stroke-width="8" />

                <path
                  d="
                                    M27 61
                                    L40 42
                                    L48 50
                                    L68 29
                                    "
                  fill="none"
                  stroke="#ffffff"
                  stroke-width="6"
                  stroke-linecap="round"
                  stroke-linejoin="round" />

                <circle cx="48" cy="50" r="4.5" fill="#00a8e8" />
              </svg>
            </div>

            <div class="logo-text">
              NPN

              <span> Network Productivity </span>
            </div>
          </div>

          <!-- CONTENT -->

          <h2>
            Secure your
            <br />

            <span>workspace.</span>
          </h2>

          <p class="brand-description">
            Jangan khawatir jika Anda lupa password. Kami akan membantu Anda
            mendapatkan kembali akses ke akun NPN dengan aman.
          </p>

          <!-- SECURITY -->

          <div class="security-box">
            <div class="security-icon">✓</div>

            <div>
              <strong> Secure Account Recovery </strong>

              <p>
                Link reset password akan dikirim melalui email yang terdaftar
                pada akun Anda.
              </p>
            </div>
          </div>
        </div>

        <!-- FOOTER -->

        <div class="brand-footer">
          <span> © 2026 <strong>NPN</strong> </span>

          <span> Enterprise Collaboration Platform </span>
        </div>
      </div>

      <!-- =================================================
                 FORM PANEL
            ================================================== -->

      <div class="form-panel">
        <div class="form-content">
          <!-- BACK -->

          <button type="button" class="back-login" id="backLogin">
            ← Kembali ke Login
          </button>

          <!-- ICON -->

          <div class="form-icon">🔐</div>

          <!-- HEADER -->

          <div class="form-header">
            <h1>Lupa Password?</h1>

            <p>
              Masukkan email atau username yang terdaftar. Kami akan
              mengirimkan instruksi untuk membuat password baru.
            </p>
          </div>

          <!-- FORM -->

          <form id="forgotForm" novalidate>
            <div class="form-group">
              <label for="identity"> Email / Username </label>

              <div class="input-wrapper">
                <span class="input-icon"> ✉ </span>

                <input
                  type="text"
                  id="identity"
                  name="identity"
                  class="form-input"
                  placeholder="Masukkan email atau username"
                  autocomplete="username" />
              </div>

              <small id="identityError" class="error-message"></small>
            </div>

            <!-- BUTTON -->

            <button type="submit" id="submitButton" class="btn-submit">
              <span class="button-text"> Kirim Link Reset Password </span>

              <span class="spinner"></span>
            </button>

            <!-- MESSAGE -->

            <div id="formMessage" class="message"></div>
          </form>

          <!-- FOOTER -->

          <div class="form-footer">
            Untuk keamanan akun, jangan berikan kode atau link reset password
            kepada orang lain.
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->
  <script src="../js/forgot-password.js"></script>

</body>

</html>