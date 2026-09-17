<?php

/**
 * NPN ISP
 * Customer Approval
 * 
 * Halaman Approval Pelanggan
 */
?>
<!DOCTYPE html>
<html lang="id">

<head>

  <meta charset="UTF-8">

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

  <title>Customer Approval - NPN ISP</title>


  <!-- =====================================================
         FONT
         ===================================================== -->

  <link
    rel="preconnect"
    href="https://fonts.googleapis.com">

  <link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin>

  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">


  <!-- =====================================================
         FONT AWESOME
         ===================================================== -->

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


  <!-- =====================================================
         DASHBOARD CSS
         ===================================================== -->

  <link
    rel="stylesheet"
    href="../css/dashboard-admin.css">


  <!-- =====================================================
         CUSTOMER APPROVAL CSS
         ===================================================== -->

  <link
    rel="stylesheet"
    href="../css/customer-approval.css">

</head>


<body>


  <!-- =====================================================
         SIDEBAR
         ===================================================== -->

  <?php include __DIR__ . '/../components/sidebar.php'; ?>


  <!-- =====================================================
         MAIN
         ===================================================== -->

  <main class="main">


    <!-- =================================================
             TOPBAR
             ================================================= -->

    <?php include __DIR__ . '/../components/topbar.php'; ?>


    <!-- =================================================
             PAGE
             ================================================= -->

    <section class="content ca-page">


      <!-- =================================================
                 PAGE HEADER
                 ================================================= -->

      <div class="ca-page-header">


        <div class="ca-header-left">


          <div class="ca-breadcrumb">

            <span>
              Pelanggan
            </span>

            <i class="fa-solid fa-chevron-right"></i>

            <strong>
              Customer Approval
            </strong>

          </div>


          <div class="ca-title-row">

            <div class="ca-title-icon">

              <i class="fa-solid fa-user-check"></i>

            </div>


            <div>

              <h1>
                Customer Approval
              </h1>

              <p>
                Kelola dan verifikasi pengajuan
                pelanggan baru sebelum diaktifkan.
              </p>

            </div>

          </div>

        </div>


        <div class="ca-header-actions">

          <button
            type="button"
            class="ca-btn ca-btn-light"
            id="caRefreshButton">

            <i class="fa-solid fa-rotate"></i>

            Refresh

          </button>

        </div>


      </div>



      <!-- =================================================
                 SUMMARY
                 ================================================= -->

      <div class="ca-summary-grid">


        <!-- TOTAL -->

        <div class="ca-summary-card">

          <div class="ca-summary-icon total">

            <i class="fa-solid fa-users"></i>

          </div>

          <div class="ca-summary-content">

            <span>
              Total Pengajuan
            </span>

            <strong id="caTotal">
              2
            </strong>

            <small>
              Semua pengajuan pelanggan
            </small>

          </div>

        </div>



        <!-- MENUNGGU -->

        <div class="ca-summary-card">

          <div class="ca-summary-icon pending">

            <i class="fa-solid fa-clock"></i>

          </div>

          <div class="ca-summary-content">

            <span>
              Menunggu Approval
            </span>

            <strong id="caPending">
              2
            </strong>

            <small>
              Membutuhkan verifikasi
            </small>

          </div>

        </div>



        <!-- LENGKAP -->

        <div class="ca-summary-card">

          <div class="ca-summary-icon complete">

            <i class="fa-solid fa-circle-check"></i>

          </div>

          <div class="ca-summary-content">

            <span>
              Data Lengkap
            </span>

            <strong id="caComplete">
              0
            </strong>

            <small>
              Siap diproses
            </small>

          </div>

        </div>



        <!-- TIDAK LENGKAP -->

        <div class="ca-summary-card">

          <div class="ca-summary-icon incomplete">

            <i class="fa-solid fa-triangle-exclamation"></i>

          </div>

          <div class="ca-summary-content">

            <span>
              Data Tidak Lengkap
            </span>

            <strong id="caIncomplete">
              2
            </strong>

            <small>
              Perlu dilengkapi
            </small>

          </div>

        </div>


      </div>



      <!-- =================================================
                 MAIN CARD
                 ================================================= -->

      <div class="ca-card">


        <!-- =================================================
                     CARD HEADER
                     ================================================= -->

        <div class="ca-card-header">


          <div>

            <h2>
              Daftar Pengajuan Pelanggan
            </h2>

            <p>
              Periksa informasi pelanggan sebelum
              melakukan approval.
            </p>

          </div>


          <div class="ca-card-tools">

            <div class="ca-result-info">

              <strong id="caResultCount">
                2
              </strong>

              pengajuan

            </div>

          </div>


        </div>



        <!-- =================================================
                     FILTER
                     ================================================= -->

        <div class="ca-filter">


          <!-- SEARCH -->

          <div class="ca-search">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
              type="search"
              id="caSearch"
              placeholder="Cari nama, username, nomor regis, NIB...">

            <button
              type="button"
              id="caClearSearch"
              aria-label="Hapus pencarian">

              <i class="fa-solid fa-xmark"></i>

            </button>

          </div>



          <!-- STATUS -->

          <div class="ca-select-wrap">

            <i class="fa-solid fa-filter"></i>

            <select id="caStatusFilter">

              <option value="all">
                Semua Status
              </option>

              <option value="incomplete">
                Tidak Lengkap
              </option>

              <option value="complete">
                Lengkap
              </option>

            </select>

          </div>



          <!-- TYPE -->

          <div class="ca-select-wrap">

            <i class="fa-solid fa-users"></i>

            <select id="caTypeFilter">

              <option value="all">
                Semua Pelanggan
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



        <!-- =================================================
                     TABLE HEADER
                     ================================================= -->

        <div class="ca-table-header">

          <div>
            Pengajuan Pelanggan
          </div>

          <div class="ca-table-header-status">
            Status
          </div>

          <div>
            Aksi
          </div>

        </div>



        <!-- =================================================
                     CUSTOMER LIST
                     ================================================= -->

        <div
          class="ca-list"
          id="caCustomerList">



          <!-- =================================================
                         CUSTOMER 1
                         ================================================= -->

          <article
            class="ca-customer"
            data-name="asdasd"
            data-username="asepganteng"
            data-regis="REGNPN20260407001"
            data-status="incomplete"
            data-type="corporate">


            <!-- NUMBER -->

            <div class="ca-number">
              01
            </div>



            <!-- CUSTOMER MAIN -->

            <div class="ca-customer-main">


              <!-- AVATAR -->

              <div class="ca-avatar">

                <i class="fa-solid fa-building"></i>

              </div>


              <!-- IDENTITY -->

              <div class="ca-identity">

                <div class="ca-name-row">

                  <h3>
                    asdasd
                  </h3>

                  <span class="ca-type-badge">
                    Bisnis Corporate
                  </span>

                </div>


                <div class="ca-regis">

                  <i class="fa-regular fa-id-card"></i>

                  REGNPN20260407001

                </div>


                <div class="ca-user">

                  <i class="fa-solid fa-user"></i>

                  @asepganteng

                </div>

              </div>


            </div>



            <!-- CUSTOMER DATA -->

            <div class="ca-data-grid">


              <!-- TANGGAL -->

              <div class="ca-data-item">

                <span>
                  <i class="fa-regular fa-calendar"></i>
                  Tanggal Aktif
                </span>

                <strong>
                  -
                </strong>

              </div>


              <!-- NIB -->

              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-file-signature"></i>
                  NIB
                </span>

                <strong>
                  -
                </strong>

              </div>


              <!-- NPWP -->

              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-file-invoice"></i>
                  NPWP
                </span>

                <strong>
                  -
                </strong>

              </div>


              <!-- TELEPON -->

              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-phone"></i>
                  No. Telepon
                </span>

                <strong>
                  065452654556
                </strong>

              </div>


              <!-- EMAIL -->

              <div class="ca-data-item ca-data-wide">

                <span>
                  <i class="fa-solid fa-envelope"></i>
                  Email
                </span>

                <strong>
                  nt49pyyin0@ruutukf.com
                </strong>

              </div>


              <!-- ALAMAT -->

              <div class="ca-data-item ca-data-wide">

                <span>
                  <i class="fa-solid fa-location-dot"></i>
                  Alamat
                </span>

                <strong>
                  hhgfh
                </strong>

              </div>


            </div>



            <!-- STATUS -->

            <div class="ca-status-area">


              <span class="ca-status ca-status-incomplete">

                <i class="fa-solid fa-circle"></i>

                Tidak Lengkap

              </span>


              <small>
                4 data perlu dilengkapi
              </small>

            </div>



            <!-- ACTION -->

            <div class="ca-actions">


              <button
                type="button"
                class="ca-action-btn ca-detail-btn"
                data-id="1">

                <i class="fa-regular fa-eye"></i>

                Detail

              </button>


              <button
                type="button"
                class="ca-action-btn ca-approve-btn"
                data-id="1">

                <i class="fa-solid fa-check"></i>

                Terima

              </button>


            </div>


          </article>



          <!-- =================================================
                         CUSTOMER 2
                         ================================================= -->

          <article
            class="ca-customer"
            data-name="1"
            data-username="pHqghUme"
            data-regis="REGNPN20260529001"
            data-status="incomplete"
            data-type="corporate">


            <!-- NUMBER -->

            <div class="ca-number">
              02
            </div>



            <!-- CUSTOMER MAIN -->

            <div class="ca-customer-main">


              <div class="ca-avatar">

                <i class="fa-solid fa-building"></i>

              </div>


              <div class="ca-identity">


                <div class="ca-name-row">

                  <h3>
                    1
                  </h3>

                  <span class="ca-type-badge">
                    Bisnis Corporate
                  </span>

                </div>


                <div class="ca-regis">

                  <i class="fa-regular fa-id-card"></i>

                  REGNPN20260529001

                </div>


                <div class="ca-user">

                  <i class="fa-solid fa-user"></i>

                  @pHqghUme

                </div>


              </div>

            </div>



            <!-- DATA -->

            <div class="ca-data-grid">


              <div class="ca-data-item">

                <span>
                  <i class="fa-regular fa-calendar"></i>
                  Tanggal Aktif
                </span>

                <strong>
                  -
                </strong>

              </div>


              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-file-signature"></i>
                  NIB
                </span>

                <strong>
                  -
                </strong>

              </div>


              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-file-invoice"></i>
                  NPWP
                </span>

                <strong>
                  -
                </strong>

              </div>


              <div class="ca-data-item">

                <span>
                  <i class="fa-solid fa-phone"></i>
                  No. Telepon
                </span>

                <strong>
                  1
                </strong>

              </div>


              <div class="ca-data-item ca-data-wide">

                <span>
                  <i class="fa-solid fa-envelope"></i>
                  Email
                </span>

                <strong>
                  testing@example.com
                </strong>

              </div>


              <div class="ca-data-item ca-data-wide">

                <span>
                  <i class="fa-solid fa-location-dot"></i>
                  Alamat
                </span>

                <strong>
                  555
                </strong>

              </div>


            </div>



            <!-- STATUS -->

            <div class="ca-status-area">


              <span class="ca-status ca-status-incomplete">

                <i class="fa-solid fa-circle"></i>

                Tidak Lengkap

              </span>


              <small>
                4 data perlu dilengkapi
              </small>

            </div>



            <!-- ACTION -->

            <div class="ca-actions">


              <button
                type="button"
                class="ca-action-btn ca-detail-btn"
                data-id="2">

                <i class="fa-regular fa-eye"></i>

                Detail

              </button>


              <button
                type="button"
                class="ca-action-btn ca-approve-btn"
                data-id="2">

                <i class="fa-solid fa-check"></i>

                Terima

              </button>


            </div>


          </article>


        </div>



        <!-- =================================================
                     EMPTY STATE
                     ================================================= -->

        <div
          class="ca-empty"
          id="caEmpty"
          hidden>

          <div class="ca-empty-icon">

            <i class="fa-regular fa-folder-open"></i>

          </div>

          <h3>
            Data tidak ditemukan
          </h3>

          <p>
            Tidak ada pengajuan pelanggan
            yang sesuai dengan pencarian atau filter.
          </p>

          <button
            type="button"
            class="ca-btn ca-btn-light"
            id="caResetFilter">

            Reset Filter

          </button>

        </div>



        <!-- =================================================
                     FOOTER
                     ================================================= -->

        <div class="ca-card-footer">


          <div class="ca-showing">

            Menampilkan

            <strong id="caShowing">
              1–2
            </strong>

            dari

            <strong id="caTotalFooter">
              2
            </strong>

            pengajuan

          </div>


          <div class="ca-pagination">

            <button
              type="button"
              disabled>

              <i class="fa-solid fa-chevron-left"></i>

            </button>

            <button
              type="button"
              class="active">

              1

            </button>

            <button
              type="button"
              disabled>

              <i class="fa-solid fa-chevron-right"></i>

            </button>

          </div>


        </div>


      </div>


    </section>


  </main>



  <!-- =====================================================
         DETAIL MODAL
         ===================================================== -->

  <div
    class="ca-modal"
    id="caDetailModal"
    hidden>


    <div
      class="ca-modal-overlay"
      data-close-modal>
    </div>


    <div class="ca-modal-dialog">


      <div class="ca-modal-header">

        <div>

          <span class="ca-modal-label">
            CUSTOMER DETAIL
          </span>

          <h2>
            Informasi Pelanggan
          </h2>

        </div>


        <button
          type="button"
          class="ca-modal-close"
          data-close-modal>

          <i class="fa-solid fa-xmark"></i>

        </button>

      </div>



      <div class="ca-modal-body">


        <div class="ca-modal-profile">


          <div class="ca-modal-avatar">

            <i class="fa-solid fa-building"></i>

          </div>


          <div>

            <h3 id="modalCustomerName">
              asdasd
            </h3>

            <p id="modalCustomerRegis">
              REGNPN20260407001
            </p>

          </div>


          <span
            class="ca-status ca-status-incomplete"
            id="modalCustomerStatus">

            <i class="fa-solid fa-circle"></i>

            Tidak Lengkap

          </span>

        </div>



        <div class="ca-modal-section">

          <div class="ca-modal-section-title">

            <i class="fa-solid fa-user"></i>

            Data Identitas

          </div>


          <div class="ca-modal-grid">


            <div>

              <span>
                Nama
              </span>

              <strong id="modalName">
                asdasd
              </strong>

            </div>


            <div>

              <span>
                Username
              </span>

              <strong id="modalUsername">
                asepganteng
              </strong>

            </div>


            <div>

              <span>
                Jenis Pelanggan
              </span>

              <strong>
                Bisnis Corporate
              </strong>

            </div>


            <div>

              <span>
                Nomor Registrasi
              </span>

              <strong id="modalRegis">
                REGNPN20260407001
              </strong>

            </div>


          </div>

        </div>



        <div class="ca-modal-section">

          <div class="ca-modal-section-title">

            <i class="fa-solid fa-address-book"></i>

            Informasi Kontak

          </div>


          <div class="ca-modal-grid">


            <div>

              <span>
                No. Telepon
              </span>

              <strong>
                065452654556
              </strong>

            </div>


            <div>

              <span>
                Email
              </span>

              <strong>
                nt49pyyin0@ruutukf.com
              </strong>

            </div>


            <div class="wide">

              <span>
                Alamat
              </span>

              <strong>
                hhgfh
              </strong>

            </div>


          </div>

        </div>



        <div class="ca-modal-section">

          <div class="ca-modal-section-title">

            <i class="fa-solid fa-list-check"></i>

            Kelengkapan Data

          </div>


          <div class="ca-check-list">


            <div class="ca-check-item danger">

              <i class="fa-solid fa-circle-xmark"></i>

              <span>
                NIB belum tersedia
              </span>

            </div>


            <div class="ca-check-item danger">

              <i class="fa-solid fa-circle-xmark"></i>

              <span>
                NPWP belum tersedia
              </span>

            </div>


            <div class="ca-check-item danger">

              <i class="fa-solid fa-circle-xmark"></i>

              <span>
                Tanggal aktif belum tersedia
              </span>

            </div>


            <div class="ca-check-item success">

              <i class="fa-solid fa-circle-check"></i>

              <span>
                Nomor telepon tersedia
              </span>

            </div>


            <div class="ca-check-item success">

              <i class="fa-solid fa-circle-check"></i>

              <span>
                Email tersedia
              </span>

            </div>


          </div>

        </div>


      </div>



      <div class="ca-modal-footer">

        <button
          type="button"
          class="ca-btn ca-btn-light"
          data-close-modal>

          Tutup

        </button>


        <button
          type="button"
          class="ca-btn ca-btn-success"
          id="modalApproveButton">

          <i class="fa-solid fa-check"></i>

          Terima Pelanggan

        </button>

      </div>


    </div>

  </div>



  <!-- =====================================================
         APPROVAL CONFIRM MODAL
         ===================================================== -->

  <div
    class="ca-modal"
    id="caConfirmModal"
    hidden>


    <div
      class="ca-modal-overlay"
      data-close-modal>
    </div>


    <div class="ca-confirm-dialog">


      <div class="ca-confirm-icon">

        <i class="fa-solid fa-user-check"></i>

      </div>


      <h2>
        Terima Pelanggan?
      </h2>


      <p>

        Pelanggan ini akan dipindahkan ke
        daftar pelanggan aktif setelah proses approval.

      </p>


      <div class="ca-confirm-customer">

        <strong id="confirmCustomerName">
          asdasd
        </strong>

        <span id="confirmCustomerRegis">
          REGNPN20260407001
        </span>

      </div>


      <div class="ca-confirm-actions">

        <button
          type="button"
          class="ca-btn ca-btn-light"
          data-close-modal>

          Batal

        </button>


        <button
          type="button"
          class="ca-btn ca-btn-success"
          id="confirmApproveButton">

          <i class="fa-solid fa-check"></i>

          Ya, Terima

        </button>

      </div>


    </div>

  </div>



  <!-- =====================================================
         TOAST
         ===================================================== -->

  <div
    class="ca-toast"
    id="caToast">

    <div class="ca-toast-icon">

      <i class="fa-solid fa-check"></i>

    </div>

    <div>

      <strong id="caToastTitle">
        Berhasil
      </strong>

      <span id="caToastMessage">
        Data berhasil diproses.
      </span>

    </div>

  </div>



  <!-- =====================================================
         JS
         ===================================================== -->

  <script src="../js/customer-approval.js"></script>


</body>

</html>