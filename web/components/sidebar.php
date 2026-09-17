<?php

/**
 * NPN - Network Productivity
 * Sidebar Component
 *
 * Active menu otomatis berdasarkan nama file halaman.
 */

$currentPage = basename($_SERVER['PHP_SELF']);

/**
 * Helper untuk menentukan menu aktif
 */
function isActive($pages)
{
  global $currentPage;

  if (!is_array($pages)) {
    $pages = [$pages];
  }

  return in_array($currentPage, $pages, true) ? 'active' : '';
}
?>

<aside class="sidebar" id="sidebar">

  <!-- =========================================
         BRAND
    ========================================== -->
  <div class="sidebar-brand">

    <div class="logo">
      <svg viewBox="0 0 100 100">

        <defs>
          <linearGradient id="npnGradient"
            x1="0"
            y1="1"
            x2="1"
            y2="0">

            <stop offset="0%" stop-color="#00a8e8" />
            <stop offset="100%" stop-color="#54baff" />

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
          d="M27 61 L40 42 L48 50 L68 29"
          fill="none"
          stroke="#fff"
          stroke-width="6"
          stroke-linecap="round"
          stroke-linejoin="round" />

        <circle
          cx="48"
          cy="50"
          r="4.5"
          fill="#00a8e8" />

      </svg>
    </div>

    <div class="brand-name">
      NPN
      <small>NETWORK PRODUCTIVITY</small>
    </div>

  </div>


  <!-- =========================================
         SIDEBAR SCROLL
    ========================================== -->
  <div class="sidebar-scroll">

    <!-- =====================================
             MENU
        ====================================== -->
    <div class="menu-label">
      Menu
    </div>


    <!-- Beranda -->
    <a
      href="../dashboard/administrator"
      class="menu-item <?= isActive('administrator.php') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-house"></i>
      </span>

      Beranda
    </a>


    <!-- Laporan Harian -->
    <a
      href="../admin/report-today"
      class="menu-item <?= isActive('report-today.php') ?>">
      <span class="menu-icon">
        <i class="fa-regular fa-file-lines"></i>
      </span>

      Laporan Harian
    </a>


    <!-- Pelanggan Approval -->
    <a
      href="customer-approval"
      class="menu-item <?= isActive('customer-approval.php') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-user-check"></i>
      </span>

      Pelanggan Approval

      <span class="menu-badge">
        8
      </span>
    </a>


    <!-- Pelanggan -->
    <a
      href="pelanggan"
      class="menu-item <?= isActive('pelanggan') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-users"></i>
      </span>

      Pelanggan
    </a>


    <!-- Layanan Instalasi -->
    <a
      href="layanan-instalasi"
      class="menu-item <?= isActive('layanan-instalasi') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-user-gear"></i>
      </span>

      Layanan Instalasi
    </a>


    <!-- Maps Pelanggan -->
    <a
      href="maps-pelanggan"
      class="menu-item <?= isActive('maps-pelanggan') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-map-location-dot"></i>
      </span>

      Maps Pelanggan
    </a>


    <!-- Data Teknis -->
    <a
      href="data-teknis"
      class="menu-item <?= isActive('data-teknis') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-server"></i>
      </span>

      Data Teknis
    </a>


    <!-- Arsip Dokumen -->
    <a
      href="arsip-dokumen"
      class="menu-item <?= isActive('arsip-dokumen') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-box-archive"></i>
      </span>

      Arsip Dokumen
    </a>


    <!-- Laporan BHP & USO -->
    <a
      href="laporan-bhp-uso"
      class="menu-item <?= isActive('laporan-bhp-uso') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-file-invoice"></i>
      </span>

      Laporan BHP &amp; USO
    </a>


    <!-- =====================================
             WHATSAPP
        ====================================== -->
    <div class="menu-label">
      WhatsApp
    </div>


    <!-- Broadcast -->
    <a
      href="broadcast"
      class="menu-item <?= isActive('broadcast') ?>">
      <span class="menu-icon">
        <i class="fa-brands fa-whatsapp"></i>
      </span>

      Broad Cast

      <span class="menu-badge yellow">
        24
      </span>
    </a>


    <!-- =====================================
             BILLING
        ====================================== -->
    <div class="menu-label">
      Billing
    </div>


    <!-- Faktur -->
    <a
      href="faktur"
      class="menu-item <?= isActive('faktur') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-file-invoice-dollar"></i>
      </span>

      Faktur
    </a>


    <!-- Billing -->
    <a
      href="billing"
      class="menu-item <?= isActive('billing') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-money-bill-transfer"></i>
      </span>

      Billing

      <span class="menu-badge yellow">
        17
      </span>
    </a>


    <!-- Cetak Billing -->
    <a
      href="cetak-billing"
      class="menu-item <?= isActive('cetak-billing') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-print"></i>
      </span>

      Cetak Billing
    </a>


    <!-- =====================================
             REFERENSI
        ====================================== -->
    <div class="menu-label">
      Referensi
    </div>


    <!-- Pegawai -->
    <a
      href="pegawai"
      class="menu-item <?= isActive('pegawai') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-user-tie"></i>
      </span>

      Pegawai
    </a>


    <!-- Vendor Layanan -->
    <a
      href="vendor-layanan"
      class="menu-item <?= isActive('vendor-layanan') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-building"></i>
      </span>

      Vendor Layanan
    </a>


    <!-- Jenis Dokumen -->
    <a
      href="jenis-dokumen"
      class="menu-item <?= isActive('jenis-dokumen') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-file-circle-plus"></i>
      </span>

      Jenis Dokumen
    </a>


    <!-- User -->
    <a
      href="user"
      class="menu-item <?= isActive('user') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-user-shield"></i>
      </span>

      User
    </a>


    <!-- =====================================
             LOG
        ====================================== -->
    <div class="menu-label">
      Log
    </div>


    <!-- Riwayat Surat -->
    <a
      href="riwayat-surat"
      class="menu-item <?= isActive('riwayat-surat') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-envelope-open-text"></i>
      </span>

      Riwayat Surat
    </a>


    <!-- Riwayat Data -->
    <a
      href="riwayat-data"
      class="menu-item <?= isActive('riwayat-data') ?>">
      <span class="menu-icon">
        <i class="fa-solid fa-clock-rotate-left"></i>
      </span>

      Riwayat Data
    </a>

  </div>


  <!-- =========================================
         USER
    ========================================== -->
  <div class="sidebar-user">

    <div class="sidebar-user-inner">

      <div class="avatar">
        JP
      </div>

      <div>
        <strong>
          Jaka Prayudha
        </strong>

        <span>
          Administrator
        </span>
      </div>

    </div>

  </div>

</aside>