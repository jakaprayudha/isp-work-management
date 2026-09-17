<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>NPN — Enterprise Platform</title>
  <link rel="stylesheet" href="css/auth.css">
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
    <section class="login-container">
      <!-- =================================================
                 LEFT BRAND PANEL
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

                <!-- orbit -->

                <ellipse
                  cx="50"
                  cy="50"
                  rx="42"
                  ry="17"
                  fill="none"
                  stroke="url(#npnGradient)"
                  stroke-width="7"
                  transform="rotate(-42 50 50)" />

                <!-- circle -->

                <circle
                  cx="50"
                  cy="50"
                  r="27"
                  fill="none"
                  stroke="url(#npnGradient)"
                  stroke-width="8" />

                <!-- N -->

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

          <!-- HERO -->

          <h2>
            Connect.
            <br />

            <span>Collaborate.</span>

            <br />

            Get Things Done.
          </h2>

          <p class="brand-description">
            Platform kolaborasi terintegrasi untuk mengelola request,
            assignment, task, progress, SLA, hingga escalation dalam satu
            workflow yang terukur.
          </p>

          <!-- FEATURES -->

          <div class="feature-list">
            <div class="feature">
              <div class="feature-check">✓</div>

              Smart Request Management
            </div>

            <div class="feature">
              <div class="feature-check">✓</div>

              Task & Assignment
            </div>

            <div class="feature">
              <div class="feature-check">✓</div>

              SLA Monitoring
            </div>

            <div class="feature">
              <div class="feature-check">✓</div>

              Escalation Control
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
                 LOGIN PANEL
            ================================================== -->

      <div class="form-panel">
        <div class="form-content">
          <!-- HEADER -->

          <div class="form-header">
            <h1>Welcome back</h1>

            <p>Masuk ke workspace NPN untuk melanjutkan aktivitas Anda.</p>
          </div>

          <!-- FORM -->

          <form id="loginForm" novalidate>
            <!-- USERNAME -->

            <div class="form-group">
              <label for="username"> Username </label>

              <div class="input-wrapper">
                <span class="input-icon"> 👤 </span>

                <input
                  type="text"
                  id="username"
                  name="username"
                  class="form-input"
                  placeholder="Masukkan username"
                  autocomplete="username"
                  autofocus />
              </div>

              <small id="usernameError" class="error-message"></small>
            </div>

            <!-- PASSWORD -->

            <div class="form-group">
              <label for="password"> Password </label>

              <div class="input-wrapper">
                <span class="input-icon"> 🔒 </span>

                <input
                  type="password"
                  id="password"
                  name="password"
                  class="form-input"
                  placeholder="Masukkan password"
                  autocomplete="current-password" />

                <button
                  type="button"
                  id="togglePassword"
                  class="password-toggle">
                  Show
                </button>
              </div>

              <small id="passwordError" class="error-message"></small>
            </div>

            <!-- OPTIONS -->

            <div class="form-options">
              <label class="remember">
                <input type="checkbox" id="remember" />

                Ingat saya
              </label>

              <a href="auth/forgot-password">
                <button type="button" class="forgot" id="forgotPassword">
                  Lupa password?
                </button>
              </a>
            </div>

            <!-- LOGIN -->

            <button type="submit" class="btn-login" id="loginButton">
              <span class="button-text"> Masuk ke NPN </span>

              <span class="spinner"></span>
            </button>

            <!-- MESSAGE -->

            <div id="formMessage" class="message"></div>
          </form>

          <!-- REGISTER -->

          <div class="register-area">
            Belum memiliki akun?

            <a href="auth/register">
              <button
                type="button"
                class="register-button"
                id="registerButton">
                Daftar sekarang
              </button>
            </a>
          </div>

          <!-- SECURITY -->

          <div class="security">
            <span class="security-icon"> ● </span>

            Secure enterprise authentication
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->
  <script src="js/login.js"></script>

</body>

</html>