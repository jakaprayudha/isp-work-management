<!doctype html>
<html lang="id">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Laporan Harian | NPN ISP</title>

   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet" />
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
   <link rel="stylesheet" href="../css/dashboard-admin.css" />
   <link rel="stylesheet" href="../css/report-today-detail.css" />
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

      <!-- TOPBAR SAMA DENGAN DASHBOARD -->
      <?php include __DIR__ . '/../components/topbar.php'; ?>


      <!-- =================================================
           DETAIL LAPORAN
           ================================================= -->
      <section class="content report-detail-page">


         <!-- ===============================================
              BREADCRUMB
              =============================================== -->

         <div class="detail-breadcrumb">

            <a href="report-today.php">
               Laporan Harian
            </a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>
               Detail Laporan
            </span>

         </div>



         <!-- ===============================================
              HEADER DETAIL
              =============================================== -->

         <div class="detail-hero">

            <div class="detail-hero-main">


               <!-- ICON -->

               <div class="detail-icon">

                  <i class="fa-regular fa-clipboard"></i>

               </div>



               <!-- INFORMASI UTAMA -->

               <div>

                  <div class="detail-meta">

                     <span
                        class="detail-number"
                        id="detailNumber">
                        LAPORAN #4
                     </span>


                     <span class="detail-status detail-status-progress">
                        <i class="fa-solid fa-circle"></i>
                        <span id="detailStatusText">On Progress</span>
                     </span>

                  </div>



                  <h2 id="detailTitle">

                     PENAMBAHAN MITRA BARU
                     (PT RAHA NETWORK BERSAMA -
                     DESA KOLAM TEMBUNG)
                     &amp; PAK LUKMAN (BELAWAN)
                     ON Progres PEMBUATAN PT

                  </h2>


                  <p class="detail-subtitle">

                     Detail pekerjaan dan histori
                     aktivitas laporan harian.

                  </p>

               </div>

            </div>



            <!-- =========================================
                 ACTION HEADER
                 ========================================= -->

            <div class="detail-actions">

               <a
                  href="report-today"
                  class="detail-btn secondary">

                  <i class="fa-solid fa-arrow-left"></i>

                  Kembali

               </a>


               <button
                  type="button"
                  class="detail-btn primary"
                  id="addDetailButton">

                  <i class="fa-solid fa-plus"></i>

                  Tambah Informasi

               </button>

            </div>

         </div>



         <!-- =================================================
              DETAIL GRID
              ================================================= -->

         <div class="detail-grid">


            <!-- =================================================
                 MAIN CONTENT
                 ================================================= -->

            <div class="detail-main">


               <!-- =============================================
                    INFORMASI LAPORAN
                    ============================================= -->

               <div class="detail-card">

                  <div class="detail-card-header">

                     <div>

                        <h3>
                           Informasi Laporan
                        </h3>

                        <p>
                           Data utama laporan
                        </p>

                     </div>

                  </div>


                  <div class="info-grid">


                     <!-- DIBUAT OLEH -->

                     <div class="info-item">

                        <span class="info-label">
                           Dibuat Oleh
                        </span>

                        <strong id="detailCreator">
                           adit89
                        </strong>

                     </div>


                     <!-- TANGGAL -->

                     <div class="info-item">

                        <span class="info-label">
                           Tanggal
                        </span>

                        <strong id="detailDate">
                           07-11-2025
                        </strong>

                     </div>


                     <!-- WAKTU -->

                     <div class="info-item">

                        <span class="info-label">
                           Waktu
                        </span>

                        <strong id="detailTime">
                           15:57:34
                        </strong>

                     </div>


                     <!-- STATUS -->

                     <div class="info-item">

                        <span class="info-label">
                           Status
                        </span>

                        <strong id="detailStatusInfo">
                           On Progress
                        </strong>

                     </div>


                  </div>

               </div>



               <!-- =============================================
                    DESKRIPSI LAPORAN
                    ============================================= -->

               <div class="detail-card">

                  <div class="detail-card-header">

                     <div>

                        <h3>
                           Deskripsi Laporan
                        </h3>

                        <p>
                           Ringkasan pekerjaan
                        </p>

                     </div>

                  </div>


                  <div
                     class="description"
                     id="detailDescription">

                     <p>

                        PENAMBAHAN MITRA BARU untuk
                        PT RAHA NETWORK BERSAMA
                        di Desa Kolam Tembung serta
                        tindak lanjut dengan Pak Lukman
                        di Belawan terkait proses
                        pembuatan PT.

                     </p>


                     <p>

                        Progress masih berjalan dan
                        membutuhkan koordinasi lanjutan
                        dengan tim terkait dokumen dan
                        proses administrasi.

                     </p>

                  </div>

               </div>



               <!-- =============================================
                    TAMBAH INFORMASI
                    CKEDITOR
                    ============================================= -->

               <div
                  class="detail-card"
                  id="editorCard"
                  hidden>


                  <!-- HEADER -->

                  <div class="detail-card-header">

                     <div>

                        <h3>
                           Tambah Informasi
                        </h3>

                        <p>
                           Tambahkan progress,
                           kendala, atau tindak lanjut.
                        </p>

                     </div>


                     <button
                        type="button"
                        class="add-information"
                        id="closeEditor">

                        <i class="fa-solid fa-xmark"></i>

                        Tutup

                     </button>

                  </div>



                  <!-- CKEDITOR -->

                  <div class="editor-box">

                     <textarea
                        id="detailEditor"
                        name="detail"
                        placeholder="Tuliskan informasi atau progress terbaru..."></textarea>

                  </div>



                  <!-- FOOTER -->

                  <div class="editor-footer">

                     <span class="editor-note">

                        <i class="fa-solid fa-circle-info"></i>

                        Informasi akan masuk ke histori laporan.

                     </span>


                     <div class="editor-actions">


                        <button
                           type="button"
                           class="detail-btn secondary"
                           id="cancelEditor">

                           Batal

                        </button>


                        <button
                           type="button"
                           class="detail-btn primary"
                           id="saveInformation">

                           <i class="fa-solid fa-floppy-disk"></i>

                           Simpan Informasi

                        </button>


                     </div>

                  </div>

               </div>



               <!-- =============================================
                    HISTORI INFORMASI
                    ============================================= -->

               <div class="detail-card">


                  <!-- HEADER -->

                  <div class="detail-card-header">

                     <div>

                        <h3>
                           Histori Informasi
                        </h3>

                        <p>
                           Perkembangan laporan
                        </p>

                     </div>


                     <button
                        type="button"
                        class="add-information"
                        id="historyAddButton">

                        <i class="fa-solid fa-plus"></i>

                        Tambah

                     </button>

                  </div>



                  <!-- TIMELINE -->

                  <div
                     class="timeline"
                     id="historyTimeline">


                     <!-- ====================================
                          HISTORI 1
                          ==================================== -->

                     <div class="timeline-item">

                        <div class="timeline-icon">

                           <i class="fa-solid fa-plus"></i>

                        </div>


                        <div>

                           <div class="timeline-header">

                              <strong>
                                 Laporan dibuat
                              </strong>

                              <span>
                                 07-11-2025 · 15:57:34
                              </span>

                           </div>


                           <div class="timeline-body">

                              Laporan dibuat oleh
                              <strong>adit89</strong>
                              mengenai penambahan
                              mitra baru.

                           </div>

                        </div>

                     </div>



                     <!-- ====================================
                          HISTORI 2
                          ==================================== -->

                     <div class="timeline-item">

                        <div class="timeline-icon">

                           <i class="fa-solid fa-user"></i>

                        </div>


                        <div>

                           <div class="timeline-header">

                              <strong>
                                 Progress pekerjaan
                              </strong>

                              <span>
                                 07-11-2025 · 16:20:12
                              </span>

                           </div>


                           <div class="timeline-body">

                              Proses koordinasi dengan
                              pihak terkait untuk
                              kelengkapan dokumen
                              penambahan mitra.

                           </div>

                        </div>

                     </div>



                     <!-- ====================================
                          HISTORI 3
                          ==================================== -->

                     <div class="timeline-item">

                        <div class="timeline-icon">

                           <i class="fa-solid fa-file-lines"></i>

                        </div>


                        <div>

                           <div class="timeline-header">

                              <strong>
                                 Follow Up Dokumen
                              </strong>

                              <span>
                                 08-11-2025 · 09:10:21
                              </span>

                           </div>


                           <div class="timeline-body">

                              Menunggu tindak lanjut
                              terkait dokumen administrasi
                              dan proses pembuatan PT.

                           </div>

                        </div>

                     </div>


                  </div>

               </div>


            </div>



            <!-- =================================================
                 RIGHT SIDEBAR
                 ================================================= -->

            <aside class="detail-sidebar">


               <!-- =============================================
                    STATUS
                    ============================================= -->

               <div class="detail-card side-card">

                  <div class="side-title">

                     Status Laporan

                     <i class="fa-solid fa-circle-info"></i>

                  </div>


                  <div class="current-status">

                     <div
                        class="status-dot progress"
                        id="statusDot">
                     </div>


                     <div>

                        <strong id="sideStatus">
                           On Progress
                        </strong>

                        <span id="sideStatusDescription">
                           Pekerjaan masih berjalan
                        </span>

                     </div>

                  </div>


                  <button
                     type="button"
                     class="mark-done"
                     id="markDoneButton">

                     <i class="fa-solid fa-check"></i>

                     Tandai Selesai

                  </button>

               </div>



               <!-- =============================================
                    INFORMASI CEPAT
                    ============================================= -->

               <div class="detail-card side-card">

                  <div class="side-title">

                     Informasi Cepat

                     <i class="fa-solid fa-circle-info"></i>

                  </div>


                  <div class="quick-info">


                     <div class="quick-info-row">

                        <span>
                           ID Laporan
                        </span>

                        <strong id="quickId">
                           #4
                        </strong>

                     </div>


                     <div class="quick-info-row">

                        <span>
                           Dibuat
                        </span>

                        <strong id="quickDate">
                           07 Nov 2025
                        </strong>

                     </div>


                     <div class="quick-info-row">

                        <span>
                           Oleh
                        </span>

                        <strong id="quickCreator">
                           adit89
                        </strong>

                     </div>


                     <div class="quick-info-row">

                        <span>
                           Histori
                        </span>

                        <strong id="historyCount">
                           3 Aktivitas
                        </strong>

                     </div>


                  </div>

               </div>



               <!-- =============================================
                    PIC
                    ============================================= -->

               <div class="detail-card side-card">

                  <div class="side-title">

                     PIC / Penanggung Jawab

                     <i class="fa-solid fa-user"></i>

                  </div>


                  <div class="current-status">


                     <div
                        class="detail-icon"
                        style="
                           width:36px;
                           height:36px;
                           flex:0 0 36px;
                           border-radius:9px;
                           font-size:12px;
                        ">

                        <i class="fa-solid fa-user"></i>

                     </div>


                     <div>

                        <strong
                           style="color:#34455e;"
                           id="picName">

                           adit89

                        </strong>

                        <span id="picTeam">

                           Tim Operasional

                        </span>

                     </div>


                  </div>

               </div>


            </aside>


         </div>


      </section>

   </main>



   <!-- =====================================================
        TOAST
        ===================================================== -->

   <div
      class="report-detail-toast"
      id="detailToast"
      role="status"
      aria-live="polite">
   </div>



   <!-- =====================================================
        CKEDITOR
        ===================================================== -->

   <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>



   <!-- =====================================================
        REPORT DETAIL JS
        ===================================================== -->

   <script src="../js/report-today-detail.js"></script>

</body>

</html>