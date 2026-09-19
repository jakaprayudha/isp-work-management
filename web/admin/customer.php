<?php

/**
 * NPN ISP - Master Customer
 * Dummy UI / frontend-ready page.
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Master Customer - NPN ISP</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <!-- Layout utama NPN -->
  <link rel="stylesheet" href="../css/dashboard-admin.css">

  <!-- CSS khusus Master Customer -->
  <link rel="stylesheet" href="../css/customer.css">
</head>

<body>

  <?php include __DIR__ . '/../components/sidebar.php'; ?>

  <main class="main">

    <?php include __DIR__ . '/../components/topbar.php'; ?>

    <section class="content customer-page">

      <!-- PAGE HEADER -->
      <div class="customer-page-header">
        <div class="customer-heading">
          <div class="customer-breadcrumb">
            <span>Home</span>
            <i class="fa-solid fa-chevron-right"></i>
            <strong>Pelanggan</strong>
          </div>

          <div class="customer-title-row">
            <div class="customer-title-icon">
              <i class="fa-solid fa-users"></i>
            </div>

            <div>
              <h1>Master Customer</h1>
              <p>Kelola seluruh data pelanggan NPN ISP dalam satu halaman.</p>
            </div>
          </div>
        </div>

        <div class="customer-header-actions">
          <button type="button" class="customer-btn customer-btn-success" id="exportCustomer">
            <i class="fa-solid fa-download"></i>
            Export
          </button>

          <button type="button" class="customer-btn customer-btn-primary" id="openAddCustomer">
            <i class="fa-solid fa-square-plus"></i>
            Tambah Data
          </button>
        </div>
      </div>

      <!-- SUMMARY -->
      <div class="customer-summary">
        <div class="customer-summary-card">
          <div class="customer-summary-icon blue">
            <i class="fa-solid fa-users"></i>
          </div>
          <div>
            <span>Total Customer</span>
            <strong id="totalCustomer">6</strong>
            <small>Seluruh pelanggan</small>
          </div>
        </div>

        <div class="customer-summary-card">
          <div class="customer-summary-icon green">
            <i class="fa-solid fa-circle-check"></i>
          </div>
          <div>
            <span>Aktif</span>
            <strong id="activeCustomer">4</strong>
            <small>Layanan berjalan</small>
          </div>
        </div>

        <div class="customer-summary-card">
          <div class="customer-summary-icon orange">
            <i class="fa-solid fa-clock"></i>
          </div>
          <div>
            <span>Menunggu Aktivasi</span>
            <strong id="pendingCustomer">1</strong>
            <small>Belum aktif</small>
          </div>
        </div>

        <div class="customer-summary-card">
          <div class="customer-summary-icon red">
            <i class="fa-solid fa-triangle-exclamation"></i>
          </div>
          <div>
            <span>Data Tidak Lengkap</span>
            <strong id="incompleteCustomer">1</strong>
            <small>Perlu diperiksa</small>
          </div>
        </div>
      </div>

      <!-- MASTER CARD -->
      <div class="customer-card">

        <div class="customer-card-header">
          <div>
            <span class="customer-eyebrow">CUSTOMER DATABASE</span>
            <h2>Daftar Pelanggan</h2>
            <p>Data pelanggan terdaftar dan informasi layanan.</p>
          </div>

          <div class="customer-result">
            <strong id="customerResultCount">6</strong>
            <span>customer</span>
          </div>
        </div>

        <!-- FILTER -->
        <div class="customer-filter">

          <div class="customer-search">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input
              type="search"
              id="customerSearch"
              placeholder="Cari nama, username, nomor regis, telepon...">
            <button type="button" id="clearCustomerSearch" aria-label="Hapus pencarian">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </div>

          <div class="customer-select">
            <i class="fa-solid fa-user-tag"></i>
            <select id="customerTypeFilter">
              <option value="all">Semua Jenis</option>
              <option value="corporate">Bisnis Corporate</option>
              <option value="retail">Retail / Broadband</option>
              <option value="personal">Personal</option>
            </select>
          </div>

          <div class="customer-select">
            <i class="fa-solid fa-signal"></i>
            <select id="customerStatusFilter">
              <option value="all">Semua Status</option>
              <option value="active">Aktif</option>
              <option value="pending">Menunggu Aktivasi</option>
              <option value="inactive">Tidak Aktif</option>
            </select>
          </div>

          <button type="button" class="customer-reset" id="resetCustomerFilter">
            <i class="fa-solid fa-rotate-left"></i>
            Reset
          </button>
        </div>

        <!-- TABLE -->
        <div class="customer-table-wrap">
          <table class="customer-table">
            <thead>
              <tr>
                <th width="60">No</th>
                <th>Pelanggan</th>
                <th>Nomor Registrasi</th>
                <th>Jenis</th>
                <th>Kontak</th>
                <th>Status</th>
                <th width="180">Aksi</th>
              </tr>
            </thead>

            <tbody id="customerTableBody">

              <tr class="customer-row"
                data-id="1"
                data-name="BRAM ADRIANTO PATTINAMA"
                data-username="Mirza"
                data-regis="REGNPN20260302001"
                data-type="retail"
                data-status="active">
                <td class="customer-no">01</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar"><i class="fa-solid fa-user"></i></div>
                    <div>
                      <strong>BRAM ADRIANTO PATTINAMA</strong>
                      <span>@Mirza</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260302001
                  </div>
                </td>
                <td>
                  <span class="customer-type retail">Retail / Broadband</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 081299319932</span>
                    <span><i class="fa-solid fa-envelope"></i> mitraedukasiglobalindo@gmail.com</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status active">
                    <i class="fa-solid fa-circle"></i> Aktif
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="1" href="customer-detail.php?id=1"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="1">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="1">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="customer-row"
                data-id="2"
                data-name="MTS YP KHADIJAH - DAGANG KLAMBIR"
                data-username="-"
                data-regis="REGNPN20260305001"
                data-type="corporate"
                data-status="pending">
                <td class="customer-no">02</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar corporate"><i class="fa-solid fa-building"></i></div>
                    <div>
                      <strong>MTS YP KHADIJAH - DAGANG KLAMBIR</strong>
                      <span>Belum ada username</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260305001
                  </div>
                </td>
                <td>
                  <span class="customer-type corporate">Bisnis Corporate</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 0822746376229</span>
                    <span><i class="fa-solid fa-envelope"></i> haditiya89@gmail.com</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status pending">
                    <i class="fa-solid fa-circle"></i> Menunggu Aktivasi
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="2" href="customer-detail.php?id=2"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="2">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="2">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="customer-row"
                data-id="3"
                data-name="PT METRO HOME NETWORK"
                data-username="metrohome"
                data-regis="REGNPN20260416001"
                data-type="retail"
                data-status="active">
                <td class="customer-no">03</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar corporate"><i class="fa-solid fa-building"></i></div>
                    <div>
                      <strong>PT METRO HOME NETWORK</strong>
                      <span>@metrohome</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260416001
                  </div>
                </td>
                <td>
                  <span class="customer-type retail">Retail / Broadband</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 081376220011</span>
                    <span><i class="fa-solid fa-envelope"></i> admin@metrohome.id</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status active">
                    <i class="fa-solid fa-circle"></i> Aktif
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="3" href="customer-detail.php?id=3"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="3">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="3">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="customer-row"
                data-id="4"
                data-name="LILI APRIYANTI"
                data-username="lili"
                data-regis="REGNPN20260416002"
                data-type="retail"
                data-status="active">
                <td class="customer-no">04</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar"><i class="fa-solid fa-user"></i></div>
                    <div>
                      <strong>LILI APRIYANTI</strong>
                      <span>@lili</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260416002
                  </div>
                </td>
                <td>
                  <span class="customer-type retail">Retail / Broadband</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 081263441122</span>
                    <span><i class="fa-solid fa-envelope"></i> lili@example.com</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status active">
                    <i class="fa-solid fa-circle"></i> Aktif
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="4" href="customer-detail.php?id=4"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="4">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="4">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="customer-row"
                data-id="5"
                data-name="PT SAHABAT MEDIA BROADBAND"
                data-username="sahabat"
                data-regis="REGNPN20260501001"
                data-type="corporate"
                data-status="active">
                <td class="customer-no">05</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar corporate"><i class="fa-solid fa-building"></i></div>
                    <div>
                      <strong>PT SAHABAT MEDIA BROADBAND</strong>
                      <span>@sahabat</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260501001
                  </div>
                </td>
                <td>
                  <span class="customer-type corporate">Bisnis Corporate</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 081278900112</span>
                    <span><i class="fa-solid fa-envelope"></i> admin@sahabat.id</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status active">
                    <i class="fa-solid fa-circle"></i> Aktif
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="5" href="customer-detail.php?id=5"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="5">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="5">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <tr class="customer-row"
                data-id="6"
                data-name="ASEP GANTENG"
                data-username="asepganteng"
                data-regis="REGNPN20260601001"
                data-type="personal"
                data-status="inactive">
                <td class="customer-no">06</td>
                <td>
                  <div class="customer-person">
                    <div class="customer-avatar"><i class="fa-solid fa-user"></i></div>
                    <div>
                      <strong>ASEP GANTENG</strong>
                      <span>@asepganteng</span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="customer-regis">
                    <i class="fa-regular fa-id-card"></i>
                    REGNPN20260601001
                  </div>
                </td>
                <td>
                  <span class="customer-type personal">Personal</span>
                </td>
                <td>
                  <div class="customer-contact">
                    <span><i class="fa-solid fa-phone"></i> 081234567890</span>
                    <span><i class="fa-solid fa-envelope"></i> asep@example.com</span>
                  </div>
                </td>
                <td>
                  <span class="customer-status inactive">
                    <i class="fa-solid fa-circle"></i> Tidak Aktif
                  </span>
                </td>
                <td>
                  <div class="customer-actions">
                    <a class="customer-action detail" data-action="detail" data-id="6" href="customer-detail.php?id=6"><i class="fa-regular fa-eye"></i> Detail</a>
                    <button type="button" class="customer-action edit" data-action="edit" data-id="6">
                      <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="customer-action delete" data-action="delete" data-id="6">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>

          <div class="customer-empty" id="customerEmpty" hidden>
            <div class="customer-empty-icon">
              <i class="fa-regular fa-folder-open"></i>
            </div>
            <h3>Data tidak ditemukan</h3>
            <p>Coba ubah kata pencarian atau filter yang digunakan.</p>
            <button type="button" class="customer-btn customer-btn-light" id="emptyReset">
              Reset Filter
            </button>
          </div>
        </div>

        <!-- FOOTER -->
        <div class="customer-card-footer">
          <div>
            Menampilkan <strong id="visibleCustomerCount">6</strong> customer
          </div>

          <div class="customer-pagination">
            <button type="button" disabled>
              <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button type="button" class="active">1</button>
            <button type="button">2</button>
            <button type="button">3</button>
            <button type="button">
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>

      </div>
    </section>
  </main>


  <!-- =========================================================
     MODAL TAMBAH / EDIT PELANGGAN
     ========================================================= -->

  <div
    class="customer-modal"
    id="customerFormModal"
    hidden
    aria-hidden="true">
    <div class="customer-modal-overlay"></div>

    <div
      class="customer-modal-dialog customer-form-dialog"
      role="dialog"
      aria-modal="true"
      aria-labelledby="customerFormTitle">

      <!-- =====================================================
         MODAL HEADER
         ===================================================== -->

      <div class="customer-modal-header">

        <div>
          <span class="customer-modal-eyebrow">
            MASTER CUSTOMER
          </span>

          <h2 id="customerFormTitle">
            Tambah Pelanggan
          </h2>

          <p>
            Lengkapi informasi pelanggan dan data perusahaan.
          </p>
        </div>

        <button
          type="button"
          class="customer-modal-close"
          data-close-customer-modal
          aria-label="Tutup">
          <i class="fa-solid fa-xmark"></i>
        </button>

      </div>


      <!-- =====================================================
         MODAL BODY
         ===================================================== -->

      <div class="customer-modal-body">

        <form
          id="customerForm"
          autocomplete="off">

          <!-- =================================================
             SECTION 01
             INFORMASI PELANGGAN
             ================================================= -->

          <section class="customer-form-section">

            <div class="customer-section-heading">

              <div class="customer-section-icon">
                <i class="fa-solid fa-user"></i>
              </div>

              <div>
                <h3>Informasi Pelanggan</h3>

                <p>
                  Tentukan jenis dan identitas utama pelanggan.
                </p>
              </div>

            </div>


            <div class="customer-form-grid">

              <!-- JENIS PELANGGAN -->

              <div class="customer-form-group full">

                <label for="customerType">
                  Jenis Pelanggan
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-users"></i>

                  <select
                    id="customerType"
                    name="customer_type"
                    required>

                    <option value="">
                      Pilih Jenis Pelanggan
                    </option>

                    <option value="retail">
                      Retail / Broadband
                    </option>

                    <option value="corporate">
                      Bisnis Corporate
                    </option>

                    <option value="personal">
                      Personal
                    </option>

                  </select>

                </div>

              </div>


              <!-- NAMA PELANGGAN -->

              <div class="customer-form-group">

                <label for="customerName">
                  Nama Pelaku Usaha
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-building"></i>

                  <input
                    type="text"
                    id="customerName"
                    name="name"
                    placeholder="Masukkan nama pelanggan / perusahaan"
                    required />

                </div>

              </div>


              <!-- NOMOR REGISTRASI -->

              <div class="customer-form-group">

                <label for="customerRegis">
                  Nomor Registrasi
                </label>

                <div class="customer-input-icon">

                  <i class="fa-regular fa-id-card"></i>

                  <input
                    type="text"
                    id="customerRegis"
                    name="registration_number"
                    placeholder="Contoh: REGNPN20260917001" />

                </div>

              </div>


              <!-- NOMOR TELEPON -->

              <div class="customer-form-group">

                <label for="customerPhone">
                  No. Telepon
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-phone"></i>

                  <input
                    type="tel"
                    id="customerPhone"
                    name="phone"
                    placeholder="Contoh: 081234567890"
                    required />

                </div>

              </div>


              <!-- EMAIL -->

              <div class="customer-form-group">

                <label for="customerEmail">
                  Email
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-envelope"></i>

                  <input
                    type="email"
                    id="customerEmail"
                    name="email"
                    placeholder="contoh@email.com"
                    required />

                </div>

              </div>

            </div>

          </section>


          <!-- =================================================
             SECTION 02
             DATA PERUSAHAAN
             ================================================= -->

          <section class="customer-form-section">

            <div class="customer-section-heading">

              <div class="customer-section-icon">
                <i class="fa-solid fa-building"></i>
              </div>

              <div>

                <h3>Data Perusahaan</h3>

                <p>
                  Informasi legalitas dan lokasi pelanggan.
                </p>

              </div>

            </div>


            <div class="customer-form-grid">

              <!-- NIB -->

              <div class="customer-form-group">

                <label for="customerNib">
                  NIB
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-file-signature"></i>

                  <input
                    type="text"
                    id="customerNib"
                    name="nib"
                    placeholder="Nomor Induk Berusaha" />

                </div>

              </div>


              <!-- NPWP -->

              <div class="customer-form-group">

                <label for="customerNpwp">
                  NPWP
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-file-invoice"></i>

                  <input
                    type="text"
                    id="customerNpwp"
                    name="npwp"
                    placeholder="Nomor Pokok Wajib Pajak" />

                </div>

              </div>


              <!-- ALAMAT -->

              <div class="customer-form-group full">

                <label for="customerAddress">
                  Alamat Kantor
                  <span>*</span>
                </label>

                <div class="customer-input-icon textarea-icon">

                  <i class="fa-solid fa-location-dot"></i>

                  <textarea
                    id="customerAddress"
                    name="address"
                    rows="4"
                    placeholder="Masukkan alamat lengkap kantor"
                    required></textarea>

                </div>

              </div>


              <!-- PROVINSI -->

              <div class="customer-form-group">

                <label for="customerProvince">
                  Provinsi
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-map"></i>

                  <select
                    id="customerProvince"
                    name="province"
                    required>

                    <option value="">
                      Pilih Provinsi
                    </option>

                    <option value="sumatera-utara">
                      Sumatera Utara
                    </option>

                    <option value="aceh">
                      Aceh
                    </option>

                    <option value="riau">
                      Riau
                    </option>

                    <option value="sumatera-barat">
                      Sumatera Barat
                    </option>

                    <option value="jakarta">
                      DKI Jakarta
                    </option>

                    <option value="jawa-barat">
                      Jawa Barat
                    </option>

                    <option value="jawa-tengah">
                      Jawa Tengah
                    </option>

                    <option value="jawa-timur">
                      Jawa Timur
                    </option>

                  </select>

                </div>

              </div>


              <!-- KABUPATEN -->

              <div class="customer-form-group">

                <label for="customerKabupaten">
                  Kabupaten / Kota
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-city"></i>

                  <select
                    id="customerKabupaten"
                    name="kabupaten"
                    required>

                    <option value="">
                      Pilih Kabupaten / Kota
                    </option>

                    <option value="deli-serdang">
                      Kabupaten Deli Serdang
                    </option>

                    <option value="medan">
                      Kota Medan
                    </option>

                    <option value="binjai">
                      Kota Binjai
                    </option>

                    <option value="serdang-bedagai">
                      Kabupaten Serdang Bedagai
                    </option>

                  </select>

                </div>

              </div>


              <!-- KECAMATAN -->

              <div class="customer-form-group">

                <label for="customerKecamatan">
                  Kecamatan
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-map-location-dot"></i>

                  <select
                    id="customerKecamatan"
                    name="kecamatan"
                    required>

                    <option value="">
                      Pilih Kecamatan
                    </option>

                    <option value="deli-tua">
                      Deli Tua
                    </option>

                    <option value="tanjung-morawa">
                      Tanjung Morawa
                    </option>

                    <option value="percuth-sei-tuan">
                      Percut Sei Tuan
                    </option>

                  </select>

                </div>

              </div>


              <!-- KELURAHAN -->

              <div class="customer-form-group">

                <label for="customerKelurahan">
                  Kelurahan / Desa
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-location-crosshairs"></i>

                  <select
                    id="customerKelurahan"
                    name="kelurahan"
                    required>

                    <option value="">
                      Pilih Kelurahan / Desa
                    </option>

                    <option value="deli-tua-timur">
                      Deli Tua Timur
                    </option>

                    <option value="kolam">
                      Kolam
                    </option>

                    <option value="bandar-khalipah">
                      Bandar Khalipah
                    </option>

                  </select>

                </div>

              </div>


              <!-- KODE POS -->

              <div class="customer-form-group">

                <label for="customerPostalCode">
                  Kode Pos
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-envelopes-bulk"></i>

                  <input
                    type="text"
                    id="customerPostalCode"
                    name="postal_code"
                    maxlength="10"
                    placeholder="Contoh: 20355"
                    required />

                </div>

              </div>


              <!-- TITIK KOORDINAT -->

              <div class="customer-form-group">

                <label for="customerCoordinate">
                  Titik Koordinat
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-location-dot"></i>

                  <input
                    type="text"
                    id="customerCoordinate"
                    name="coordinate"
                    placeholder="Contoh: 3.5612, 98.6738"
                    required />

                </div>

                <small class="customer-field-help">
                  Format latitude, longitude
                </small>

              </div>

            </div>

          </section>


          <!-- =================================================
             SECTION 03
             PENANGGUNG JAWAB
             ================================================= -->

          <section class="customer-form-section">

            <div class="customer-section-heading">

              <div class="customer-section-icon">
                <i class="fa-solid fa-user-tie"></i>
              </div>

              <div>

                <h3>Penanggung Jawab</h3>

                <p>
                  Informasi PIC yang dapat dihubungi.
                </p>

              </div>

            </div>


            <div class="customer-form-grid">

              <!-- JABATAN -->

              <div class="customer-form-group">

                <label for="customerPosition">
                  Jabatan
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-id-badge"></i>

                  <select
                    id="customerPosition"
                    name="position"
                    required>

                    <option value="">
                      Pilih Jabatan
                    </option>

                    <option value="owner">
                      Owner / Pemilik
                    </option>

                    <option value="director">
                      Direktur
                    </option>

                    <option value="manager">
                      Manager
                    </option>

                    <option value="admin">
                      Admin
                    </option>

                    <option value="pic">
                      PIC
                    </option>

                  </select>

                </div>

              </div>


              <!-- NAMA PIC -->

              <div class="customer-form-group">

                <label for="customerPicName">
                  Nama Lengkap
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-user"></i>

                  <input
                    type="text"
                    id="customerPicName"
                    name="pic_name"
                    placeholder="Nama lengkap penanggung jawab"
                    required />

                </div>

              </div>


              <!-- TELEPON PIC -->

              <div class="customer-form-group">

                <label for="customerPicPhone">
                  No. Telepon
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-phone"></i>

                  <input
                    type="tel"
                    id="customerPicPhone"
                    name="pic_phone"
                    placeholder="Nomor telepon PIC"
                    required />

                </div>

              </div>


              <!-- EMAIL PIC -->

              <div class="customer-form-group">

                <label for="customerPicEmail">
                  Email
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-envelope"></i>

                  <input
                    type="email"
                    id="customerPicEmail"
                    name="pic_email"
                    placeholder="Email PIC" />

                </div>

              </div>

            </div>

          </section>


          <!-- =================================================
             SECTION 04
             AKUN PELANGGAN
             ================================================= -->

          <section class="customer-form-section">

            <div class="customer-section-heading">

              <div class="customer-section-icon">
                <i class="fa-solid fa-shield-halved"></i>
              </div>

              <div>

                <h3>Akun Pelanggan</h3>

                <p>
                  Digunakan untuk akses pelanggan ke sistem.
                </p>

              </div>

            </div>


            <div class="customer-form-grid">

              <!-- USERNAME -->

              <div class="customer-form-group">

                <label for="customerUsername">
                  Username
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-at"></i>

                  <input
                    type="text"
                    id="customerUsername"
                    name="username"
                    placeholder="Username pelanggan"
                    autocomplete="username"
                    required />

                </div>

              </div>


              <!-- PASSWORD -->

              <div class="customer-form-group">

                <label for="customerPassword">
                  Password
                  <span>*</span>
                </label>

                <div class="customer-input-icon password-field">

                  <i class="fa-solid fa-lock"></i>

                  <input
                    type="password"
                    id="customerPassword"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="new-password"
                    required />

                  <button
                    type="button"
                    class="customer-password-toggle"
                    data-password-target="customerPassword"
                    aria-label="Tampilkan password">
                    <i class="fa-regular fa-eye"></i>
                  </button>

                </div>

              </div>


              <!-- ULANGI PASSWORD -->

              <div class="customer-form-group">

                <label for="customerPasswordConfirm">
                  Ulangi Password
                  <span>*</span>
                </label>

                <div class="customer-input-icon password-field">

                  <i class="fa-solid fa-lock"></i>

                  <input
                    type="password"
                    id="customerPasswordConfirm"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    autocomplete="new-password"
                    required />

                  <button
                    type="button"
                    class="customer-password-toggle"
                    data-password-target="customerPasswordConfirm"
                    aria-label="Tampilkan password">
                    <i class="fa-regular fa-eye"></i>
                  </button>

                </div>

              </div>


              <!-- STATUS -->

              <div class="customer-form-group">

                <label for="customerStatus">
                  Status Pelanggan
                  <span>*</span>
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-circle-check"></i>

                  <select
                    id="customerStatus"
                    name="status"
                    required>

                    <option value="active">
                      Aktif
                    </option>

                    <option value="pending">
                      Menunggu Aktivasi
                    </option>

                    <option value="inactive">
                      Tidak Aktif
                    </option>

                  </select>

                </div>

              </div>


              <!-- LAYANAN -->

              <div class="customer-form-group full">

                <label for="customerService">
                  Layanan
                </label>

                <div class="customer-input-icon">

                  <i class="fa-solid fa-wifi"></i>

                  <select
                    id="customerService"
                    name="service">

                    <option value="">
                      Pilih Layanan
                    </option>

                    <option value="internet">
                      Internet
                    </option>

                    <option value="metro">
                      Metro Ethernet
                    </option>

                    <option value="dedicated">
                      Dedicated Internet
                    </option>

                    <option value="broadband">
                      Broadband
                    </option>

                  </select>

                </div>

              </div>

            </div>

          </section>


          <!-- =================================================
             FORM NOTE
             ================================================= -->

          <div class="customer-form-note">

            <i class="fa-solid fa-circle-info"></i>

            <div>

              <strong>
                Informasi
              </strong>

              <p>
                Field bertanda
                <span>*</span>
                wajib diisi sebelum data disimpan.
              </p>

            </div>

          </div>

        </form>

      </div>


      <!-- =====================================================
         MODAL FOOTER
         ===================================================== -->

      <div class="customer-modal-footer">

        <button
          type="button"
          class="customer-btn customer-btn-secondary"
          data-close-customer-modal>

          <i class="fa-solid fa-xmark"></i>

          Batal

        </button>


        <button
          type="submit"
          form="customerForm"
          class="customer-btn customer-btn-primary"
          id="customerSubmitButton">

          <i class="fa-solid fa-floppy-disk"></i>

          <span id="customerSaveText">
            Simpan Data
          </span>

        </button>

      </div>

    </div>

  </div>

  <!-- =====================================================
     MODAL DETAIL
===================================================== -->
  <div class="customer-modal" id="customerDetailModal" hidden>
    <div class="customer-modal-overlay" data-close-customer-modal></div>

    <div class="customer-modal-dialog customer-detail-dialog">

      <div class="customer-modal-header">
        <div>
          <span class="customer-modal-eyebrow">CUSTOMER DETAIL</span>
          <h2>Informasi Pelanggan</h2>
          <p>Detail data master customer.</p>
        </div>

        <button type="button" class="customer-modal-close" data-close-customer-modal>
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <div class="customer-detail-body">

        <div class="customer-detail-profile">
          <div class="customer-detail-avatar" id="detailAvatar">
            <i class="fa-solid fa-user"></i>
          </div>

          <div>
            <span class="customer-detail-label">NAMA PELANGGAN</span>
            <h3 id="detailName">-</h3>
            <p id="detailUsername">@-</p>
          </div>

          <span class="customer-status active" id="detailStatus">
            <i class="fa-solid fa-circle"></i> Aktif
          </span>
        </div>

        <div class="customer-detail-grid">

          <div class="customer-detail-section">
            <div class="customer-detail-section-title">
              <i class="fa-solid fa-id-card"></i>
              Registrasi
            </div>

            <div class="customer-detail-item">
              <span>Nomor Registrasi</span>
              <strong id="detailRegis">-</strong>
            </div>

            <div class="customer-detail-item">
              <span>Jenis Pelanggan</span>
              <strong id="detailType">-</strong>
            </div>

            <div class="customer-detail-item">
              <span>Tanggal Aktif</span>
              <strong id="detailActiveDate">-</strong>
            </div>
          </div>

          <div class="customer-detail-section">
            <div class="customer-detail-section-title">
              <i class="fa-solid fa-address-book"></i>
              Kontak
            </div>

            <div class="customer-detail-item">
              <span>No. Telepon</span>
              <strong id="detailPhone">-</strong>
            </div>

            <div class="customer-detail-item">
              <span>Email</span>
              <strong id="detailEmail">-</strong>
            </div>

            <div class="customer-detail-item wide">
              <span>Alamat</span>
              <strong id="detailAddress">-</strong>
            </div>
          </div>

        </div>

      </div>

      <div class="customer-modal-footer">
        <button type="button" class="customer-btn customer-btn-light" data-close-customer-modal>
          Tutup
        </button>

        <button type="button" class="customer-btn customer-btn-primary" id="detailEditButton">
          <i class="fa-solid fa-pen"></i>
          Edit Customer
        </button>
      </div>

    </div>
  </div>


  <!-- DELETE CONFIRM -->
  <div class="customer-modal" id="customerDeleteModal" hidden>
    <div class="customer-modal-overlay" data-close-customer-modal></div>

    <div class="customer-confirm-dialog">

      <div class="customer-confirm-icon">
        <i class="fa-solid fa-trash"></i>
      </div>

      <h2>Hapus Customer?</h2>

      <p>
        Data customer yang dihapus akan dikeluarkan dari daftar master.
      </p>

      <div class="customer-confirm-name">
        <strong id="deleteCustomerName">-</strong>
        <span id="deleteCustomerRegis">-</span>
      </div>

      <div class="customer-confirm-actions">
        <button type="button" class="customer-btn customer-btn-light" data-close-customer-modal>
          Batal
        </button>

        <button type="button" class="customer-btn customer-btn-danger" id="confirmDeleteCustomer">
          <i class="fa-solid fa-trash"></i>
          Ya, Hapus
        </button>
      </div>

    </div>
  </div>


  <div class="customer-toast" id="customerToast">
    <div class="customer-toast-icon">
      <i class="fa-solid fa-check"></i>
    </div>
    <div>
      <strong id="customerToastTitle">Berhasil</strong>
      <span id="customerToastMessage">Data berhasil diproses.</span>
    </div>
  </div>


  <script src="../js//customer.js"></script>

</body>

</html>