<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NPN — Registrasi Pelanggan</title>
    <link rel="stylesheet" href="../css/register.css">

</head>

<body>

    <div class="background-grid"></div>

    <main class="page">

        <section class="register-shell">

            <!-- BRAND PANEL -->
            <aside class="brand-panel">

                <div class="brand">

                    <div class="brand-logo">

                        <div class="logo">
                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="logoGradient" x1="0" y1="1" x2="1" y2="0">
                                        <stop offset="0%" stop-color="#00a8e8" />
                                        <stop offset="100%" stop-color="#54baff" />
                                    </linearGradient>
                                </defs>

                                <ellipse
                                    cx="50" cy="50" rx="42" ry="17"
                                    fill="none"
                                    stroke="url(#logoGradient)"
                                    stroke-width="7"
                                    transform="rotate(-42 50 50)" />

                                <circle
                                    cx="50" cy="50" r="27"
                                    fill="none"
                                    stroke="url(#logoGradient)"
                                    stroke-width="8" />

                                <path
                                    d="M27 61 L40 42 L48 50 L68 29"
                                    fill="none"
                                    stroke="#fff"
                                    stroke-width="6"
                                    stroke-linecap="round"
                                    stroke-linejoin="round" />

                                <circle cx="48" cy="50" r="4.5" fill="#00a8e8" />
                            </svg>
                        </div>

                        <div class="brand-name">
                            NPN
                            <span>Network Productivity</span>
                        </div>

                    </div>

                    <h2>
                        Start your
                        <br>
                        <span>NPN journey.</span>
                    </h2>

                    <p class="brand-description">
                        Buat akun pelanggan dan nikmati proses
                        request, kolaborasi, task, monitoring SLA,
                        hingga penyelesaian layanan secara terstruktur.
                    </p>

                    <div class="steps">

                        <div class="step">
                            <div class="step-number">01</div>
                            <div>
                                <strong>Buat Akun</strong>
                                Lengkapi informasi perusahaan dan PIC.
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">02</div>
                            <div>
                                <strong>Verifikasi</strong>
                                Akun akan diproses untuk verifikasi.
                            </div>
                        </div>

                        <div class="step">
                            <div class="step-number">03</div>
                            <div>
                                <strong>Mulai Berkolaborasi</strong>
                                Akses workspace dan mulai membuat request.
                            </div>
                        </div>

                    </div>

                </div>

                <div class="brand-footer">
                    © 2026 NPN · Enterprise Collaboration Platform
                </div>

            </aside>


            <!-- FORM PANEL -->
            <section class="form-panel">

                <div style="width:100%;">

                    <div class="form-top">

                        <div class="form-title">
                            <h1>Registrasi Pelanggan</h1>
                            <p>
                                Daftarkan perusahaan Anda untuk mendapatkan
                                akses ke platform NPN.
                            </p>
                        </div>

                        <button
                            type="button"
                            class="login-link"
                            id="loginLink">
                            ← Sudah punya akun? Login
                        </button>

                    </div>


                    <form id="registerForm" novalidate>

                        <!-- JENIS PELANGGAN -->
                        <div class="section">

                            <div class="section-header">
                                <div class="section-icon">◆</div>

                                <div>
                                    <h2>Jenis Pelanggan</h2>
                                    <p>Pilih kategori pelanggan Anda</p>
                                </div>
                            </div>

                            <div class="grid">

                                <div class="field full">

                                    <label for="customerType">
                                        Jenis Pelanggan <span class="required">*</span>
                                    </label>

                                    <select
                                        id="customerType"
                                        name="customer_type"
                                        class="select">
                                        <option value="">Pilih Jenis Pelanggan</option>
                                        <option value="perusahaan">Perusahaan</option>
                                        <option value="instansi">Instansi Pemerintah</option>
                                        <option value="yayasan">Yayasan</option>
                                        <option value="organisasi">Organisasi</option>
                                        <option value="perorangan">Perorangan</option>
                                    </select>

                                    <small class="error" id="customerTypeError"></small>

                                </div>

                            </div>
                        </div>


                        <!-- DATA PERUSAHAAN -->
                        <div class="section">

                            <div class="section-header">
                                <div class="section-icon">▦</div>

                                <div>
                                    <h2>Data Perusahaan</h2>
                                    <p>Informasi utama pelanggan</p>
                                </div>
                            </div>

                            <div class="grid">

                                <div class="field full">
                                    <label for="businessName">
                                        Nama Pelaku Usaha <span class="required">*</span>
                                    </label>

                                    <input
                                        id="businessName"
                                        name="business_name"
                                        class="input"
                                        type="text"
                                        placeholder="Masukkan nama perusahaan / instansi" />

                                    <small class="error" id="businessNameError"></small>
                                </div>


                                <div class="field">
                                    <label for="businessPhone">
                                        No. Telepon <span class="required">*</span>
                                    </label>

                                    <input
                                        id="businessPhone"
                                        name="business_phone"
                                        class="input"
                                        type="tel"
                                        placeholder="08xxxxxxxxxx" />

                                    <small class="error" id="businessPhoneError"></small>
                                </div>


                                <div class="field">
                                    <label for="email">
                                        Email <span class="required">*</span>
                                    </label>

                                    <input
                                        id="email"
                                        name="email"
                                        class="input"
                                        type="email"
                                        placeholder="email@perusahaan.com" />

                                    <small class="error" id="emailError"></small>
                                </div>


                                <div class="field full">
                                    <label for="address">
                                        Alamat Kantor <span class="required">*</span>
                                    </label>

                                    <textarea
                                        id="address"
                                        name="address"
                                        class="textarea"
                                        placeholder="Masukkan alamat lengkap kantor"></textarea>

                                    <small class="error" id="addressError"></small>
                                </div>


                                <div class="field">
                                    <label for="province">
                                        Provinsi <span class="required">*</span>
                                    </label>

                                    <select id="province" name="province" class="select">
                                        <option value="">Pilih Provinsi</option>
                                        <option>Sumatera Utara</option>
                                        <option>DKI Jakarta</option>
                                        <option>Jawa Barat</option>
                                        <option>Jawa Tengah</option>
                                        <option>Jawa Timur</option>
                                        <option>Bali</option>
                                        <option>Sumatera Selatan</option>
                                        <option>Kalimantan Timur</option>
                                        <option>Sulawesi Selatan</option>
                                    </select>

                                    <small class="error" id="provinceError"></small>
                                </div>


                                <div class="field">
                                    <label for="regency">
                                        Kabupaten / Kota <span class="required">*</span>
                                    </label>

                                    <select id="regency" name="regency" class="select">
                                        <option value="">Pilih Kabupaten / Kota</option>
                                        <option>Medan</option>
                                        <option>Deli Serdang</option>
                                        <option>Serdang Bedagai</option>
                                        <option>Binjai</option>
                                        <option>Jakarta Selatan</option>
                                        <option>Bandung</option>
                                        <option>Surabaya</option>
                                    </select>

                                    <small class="error" id="regencyError"></small>
                                </div>


                                <div class="field">
                                    <label for="district">
                                        Kecamatan <span class="required">*</span>
                                    </label>

                                    <select id="district" name="district" class="select">
                                        <option value="">Pilih Kecamatan</option>
                                        <option>Medan Kota</option>
                                        <option>Medan Selayang</option>
                                        <option>Deli Tua</option>
                                        <option>Lubuk Pakam</option>
                                    </select>

                                    <small class="error" id="districtError"></small>
                                </div>


                                <div class="field">
                                    <label for="village">
                                        Kelurahan / Desa <span class="required">*</span>
                                    </label>

                                    <select id="village" name="village" class="select">
                                        <option value="">Pilih Kelurahan / Desa</option>
                                        <option>Kelurahan A</option>
                                        <option>Kelurahan B</option>
                                        <option>Desa A</option>
                                        <option>Desa B</option>
                                    </select>

                                    <small class="error" id="villageError"></small>
                                </div>


                                <div class="field">
                                    <label for="postalCode">
                                        Kode Pos <span class="required">*</span>
                                    </label>

                                    <input
                                        id="postalCode"
                                        name="postal_code"
                                        class="input"
                                        type="text"
                                        inputmode="numeric"
                                        maxlength="5"
                                        placeholder="Contoh: 20111" />

                                    <small class="error" id="postalCodeError"></small>
                                </div>


                                <div class="field full">
                                    <label for="coordinate">
                                        Titik Koordinat <span class="required">*</span>
                                    </label>

                                    <input
                                        id="coordinate"
                                        name="coordinate"
                                        class="input"
                                        type="text"
                                        placeholder="Contoh: 3.595196, 98.672226" />

                                    <small class="hint">
                                        Format latitude, longitude.
                                    </small>

                                    <small class="error" id="coordinateError"></small>
                                </div>

                            </div>
                        </div>


                        <!-- PENANGGUNG JAWAB -->
                        <div class="section">

                            <div class="section-header">
                                <div class="section-icon">◉</div>

                                <div>
                                    <h2>Penanggung Jawab</h2>
                                    <p>Informasi PIC utama pelanggan</p>
                                </div>
                            </div>

                            <div class="grid">

                                <div class="field">
                                    <label for="position">
                                        Jabatan <span class="required">*</span>
                                    </label>

                                    <select id="position" name="position" class="select">
                                        <option value="">Pilih Jabatan</option>
                                        <option>Direktur</option>
                                        <option>Manager</option>
                                        <option>Owner</option>
                                        <option>IT Manager</option>
                                        <option>Administrator</option>
                                        <option>Lainnya</option>
                                    </select>

                                    <small class="error" id="positionError"></small>
                                </div>


                                <div class="field">
                                    <label for="fullName">
                                        Nama Lengkap <span class="required">*</span>
                                    </label>

                                    <input
                                        id="fullName"
                                        name="full_name"
                                        class="input"
                                        type="text"
                                        placeholder="Nama lengkap PIC" />

                                    <small class="error" id="fullNameError"></small>
                                </div>


                                <div class="field">
                                    <label for="picPhone">
                                        No. Telepon <span class="required">*</span>
                                    </label>

                                    <input
                                        id="picPhone"
                                        name="pic_phone"
                                        class="input"
                                        type="tel"
                                        placeholder="08xxxxxxxxxx" />

                                    <small class="error" id="picPhoneError"></small>
                                </div>

                            </div>
                        </div>


                        <!-- AKUN -->
                        <div class="section">

                            <div class="section-header">
                                <div class="section-icon">⌘</div>

                                <div>
                                    <h2>Akun Pelanggan</h2>
                                    <p>Gunakan akun ini untuk login ke NPN</p>
                                </div>
                            </div>

                            <div class="grid">

                                <div class="field full">

                                    <label for="username">
                                        Username <span class="required">*</span>
                                    </label>

                                    <input
                                        id="username"
                                        name="username"
                                        class="input"
                                        type="text"
                                        autocomplete="username"
                                        placeholder="Buat username" />

                                    <small class="hint">
                                        Gunakan 4–30 karakter tanpa spasi.
                                    </small>

                                    <small class="error" id="usernameError"></small>

                                </div>


                                <div class="field">

                                    <label for="password">
                                        Password <span class="required">*</span>
                                    </label>

                                    <div class="input-wrap password-wrap">

                                        <input
                                            id="password"
                                            name="password"
                                            class="input"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Buat password" />

                                        <button
                                            type="button"
                                            class="toggle-password"
                                            data-target="password">
                                            Show
                                        </button>

                                    </div>

                                    <div class="password-strength">
                                        <span id="strengthBar"></span>
                                    </div>

                                    <small class="hint" id="strengthText">
                                        Gunakan minimal 8 karakter.
                                    </small>

                                    <small class="error" id="passwordError"></small>

                                </div>


                                <div class="field">

                                    <label for="confirmPassword">
                                        Ulangi Password <span class="required">*</span>
                                    </label>

                                    <div class="input-wrap password-wrap">

                                        <input
                                            id="confirmPassword"
                                            name="confirm_password"
                                            class="input"
                                            type="password"
                                            autocomplete="new-password"
                                            placeholder="Ulangi password" />

                                        <button
                                            type="button"
                                            class="toggle-password"
                                            data-target="confirmPassword">
                                            Show
                                        </button>

                                    </div>

                                    <small class="error" id="confirmPasswordError"></small>

                                </div>

                            </div>
                        </div>


                        <!-- TERMS -->

                        <label class="terms">

                            <input
                                type="checkbox"
                                id="terms" />

                            <span>
                                Saya menyetujui
                                <a href="#" onclick="return false;">Syarat & Ketentuan</a>
                                serta
                                <a href="#" onclick="return false;">Kebijakan Privasi</a>
                                NPN.
                            </span>

                        </label>


                        <!-- ACTIONS -->

                        <div class="actions">

                            <button
                                type="button"
                                class="btn btn-secondary"
                                id="cancelButton">
                                Kembali ke Login
                            </button>

                            <button
                                type="submit"
                                class="btn btn-primary"
                                id="submitButton">
                                <span class="button-text">
                                    Daftar Sekarang
                                </span>

                                <span class="spinner"></span>
                            </button>

                        </div>


                        <div
                            id="formMessage"
                            class="message"></div>


                        <div class="security">
                            ● Data registrasi diproses secara aman dan terenkripsi.
                        </div>

                    </form>

                </div>

            </section>

    </main>


    <script src="../js/register.js"></script>

</body>

</html>