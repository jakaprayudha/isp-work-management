/* =========================================================
   NPN ISP - LAPORAN HARIAN
   File: js/report-today.js

   Khusus halaman:
   report-today.html

   Fungsi:
   1. Load sidebar
   2. Active menu
   3. Mobile sidebar
   4. Search laporan
   5. Filter status
   6. Tambah laporan
   7. Modal tambah data
   8. Detail laporan
   9. Ubah status menjadi Done
   10. Pagination dummy
   11. Toast notification

   CATATAN:
   Jangan menggunakan dashboard-admin.js pada halaman ini.
========================================================= */

document.addEventListener("DOMContentLoaded", async function () {
  await loadSidebar();

  initLaporanHarian();
});

/* =========================================================
   GLOBAL
========================================================= */

let currentFilter = "all";

let toastTimer = null;

/* =========================================================
   1. LOAD SIDEBAR
========================================================= */

async function loadSidebar() {
  const container = document.getElementById("sidebar-container");

  if (!container) {
    console.warn("Element #sidebar-container tidak ditemukan.");

    return;
  }

  try {
    const response = await fetch("../components/sidebar", {
      cache: "no-cache",
    });

    if (!response.ok) {
      throw new Error("HTTP " + response.status);
    }

    const html = await response.text();

    container.innerHTML = html;

    initSidebar();
  } catch (error) {
    console.error("Gagal memuat sidebar:", error);

    container.innerHTML = `

            <div class="sidebar-load-error">

                <div>

                    <i class="fa-solid fa-triangle-exclamation"></i>

                    <strong>
                        Sidebar gagal dimuat
                    </strong>

                    <small>
                        Periksa file
                        components/sidebar
                    </small>

                </div>

            </div>

        `;
  }
}

/* =========================================================
   2. SIDEBAR
========================================================= */

function initSidebar() {
  const sidebar = document.getElementById("sidebar");

  const mobileMenu = document.getElementById("mobileMenu");

  if (!sidebar) {
    console.warn("Element #sidebar tidak ditemukan.");

    return;
  }

  /* -----------------------------------------
       MOBILE MENU
    ----------------------------------------- */

  if (mobileMenu) {
    mobileMenu.addEventListener("click", function () {
      sidebar.classList.toggle("open");
    });
  }

  /* -----------------------------------------
       CURRENT PAGE
    ----------------------------------------- */

  let currentPage = window.location.pathname
    .split("/")
    .pop()
    .replace(".html", "")
    .toLowerCase();

  if (!currentPage) {
    currentPage = "dashboard-admin";
  }

  /* -----------------------------------------
       MENU ITEMS
    ----------------------------------------- */

  const menuItems = sidebar.querySelectorAll(".menu-item");

  menuItems.forEach(function (item) {
    const href = item.getAttribute("href");

    if (!href) {
      return;
    }

    const menuPage = href.split("/").pop().replace(".html", "").toLowerCase();

    /* Active */

    if (menuPage === currentPage) {
      item.classList.add("active");
    } else {
      item.classList.remove("active");
    }

    /* Click */

    item.addEventListener("click", function () {
      menuItems.forEach(function (menu) {
        menu.classList.remove("active");
      });

      item.classList.add("active");

      /* Mobile */

      if (window.innerWidth <= 1000) {
        sidebar.classList.remove("open");
      }
    });
  });
}

/* =========================================================
   3. INIT PAGE
========================================================= */

function initLaporanHarian() {
  initSearch();

  initHeaderSearch();

  initFilter();

  initAddButton();

  initDoneButtons();

  initModal();

  initPagination();

  updateSummary();

  applyTableFilter();
}

/* =========================================================
   4. TABLE SEARCH
========================================================= */

function initSearch() {
  const searchInput = document.getElementById("searchInput");

  if (!searchInput) {
    return;
  }

  searchInput.addEventListener("input", function () {
    applyTableFilter();
  });
}

/* =========================================================
   5. HEADER SEARCH
========================================================= */

/*
   Header menggunakan selector dashboard:

   .search

   tetapi ID kita buat khusus:

   #headerSearch

   Supaya tidak bentrok dengan dashboard.
*/

function initHeaderSearch() {
  const headerSearch = document.getElementById("headerSearch");

  const reportSearch = document.getElementById("searchInput");

  if (!headerSearch || !reportSearch) {
    return;
  }

  headerSearch.addEventListener("input", function () {
    reportSearch.value = headerSearch.value;

    applyTableFilter();
  });
}

/* =========================================================
   6. FILTER
========================================================= */

function initFilter() {
  const filterButton = document.getElementById("filterBtn");

  if (!filterButton) {
    return;
  }

  filterButton.addEventListener("click", function () {
    switch (currentFilter) {
      case "all":
        currentFilter = "progress";

        break;

      case "progress":
        currentFilter = "done";

        break;

      case "done":
        currentFilter = "all";

        break;
    }

    updateFilterLabel();

    applyTableFilter();
  });
}

/* =========================================================
   FILTER LABEL
========================================================= */

function updateFilterLabel() {
  const label = document.getElementById("filterLabel");

  if (!label) {
    return;
  }

  const labels = {
    all: "Semua Status",

    progress: "On Progress",

    done: "Done",
  };

  label.textContent = labels[currentFilter];
}

/* =========================================================
   7. APPLY FILTER
========================================================= */

function applyTableFilter() {
  const searchInput = document.getElementById("searchInput");

  const keyword = searchInput ? searchInput.value.trim().toLowerCase() : "";

  const rows = getRows();

  let visible = 0;

  rows.forEach(function (row) {
    const text = row.textContent.toLowerCase();

    const status = row.dataset.status || "";

    const matchSearch = keyword === "" || text.includes(keyword);

    const matchStatus = currentFilter === "all" || status === currentFilter;

    const show = matchSearch && matchStatus;

    if (show) {
      row.style.display = "";

      visible++;
    } else {
      row.style.display = "none";
    }
  });

  updateVisibleCount(visible);

  updateEmptyState(visible);
}

/* =========================================================
   GET ROWS
========================================================= */

function getRows() {
  const body = document.getElementById("reportBody");

  if (!body) {
    return [];
  }

  return Array.from(body.querySelectorAll("tr"));
}

/* =========================================================
   VISIBLE COUNT
========================================================= */

function updateVisibleCount(count) {
  const element = document.getElementById("visibleCount");

  if (element) {
    element.textContent = count;
  }
}

/* =========================================================
   EMPTY STATE
========================================================= */

function updateEmptyState(count) {
  const emptyState = document.getElementById("emptyState");

  if (!emptyState) {
    return;
  }

  if (count === 0) {
    emptyState.classList.remove("hidden");
  } else {
    emptyState.classList.add("hidden");
  }
}

/* =========================================================
   8. ADD BUTTON
========================================================= */

function initAddButton() {
  const addButton = document.getElementById("addButton");

  if (!addButton) {
    return;
  }

  addButton.addEventListener("click", function () {
    openModal();
  });
}

/* =========================================================
   9. MODAL
========================================================= */

function initModal() {
  const modal = document.getElementById("reportModal");

  const form = document.getElementById("reportForm");

  const closeButton = document.getElementById("closeModal");

  const cancelButton = document.getElementById("cancelModal");

  if (!modal) {
    return;
  }

  /* Close button */

  if (closeButton) {
    closeButton.addEventListener("click", closeModal);
  }

  /* Cancel */

  if (cancelButton) {
    cancelButton.addEventListener("click", closeModal);
  }

  /* Click overlay */

  modal.addEventListener("click", function (event) {
    if (event.target === modal) {
      closeModal();
    }
  });

  /* ESC */

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && modal.classList.contains("show")) {
      closeModal();
    }
  });

  /* Submit */

  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();

      saveNewReport();
    });
  }
}

/* =========================================================
   OPEN MODAL
========================================================= */

function openModal() {
  const modal = document.getElementById("reportModal");

  if (!modal) {
    return;
  }

  modal.classList.add("show");

  modal.setAttribute("aria-hidden", "false");

  const title = document.getElementById("judul");

  setTimeout(function () {
    if (title) {
      title.focus();
    }
  }, 100);
}

/* =========================================================
   CLOSE MODAL
========================================================= */

function closeModal() {
  const modal = document.getElementById("reportModal");

  if (!modal) {
    return;
  }

  modal.classList.remove("show");

  modal.setAttribute("aria-hidden", "true");
}

/* =========================================================
   10. SAVE REPORT
========================================================= */

function saveNewReport() {
  const titleInput = document.getElementById("judul");

  if (!titleInput) {
    return;
  }

  const title = titleInput.value.trim();

  if (!title) {
    showToast("Judul laporan wajib diisi.");

    titleInput.focus();

    return;
  }

  addReport(title);

  titleInput.value = "";

  closeModal();

  showToast("Laporan harian berhasil ditambahkan.");
}

/* =========================================================
   ADD REPORT TO TABLE
========================================================= */

function addReport(title) {
  const body = document.getElementById("reportBody");

  if (!body) {
    return;
  }

  const now = new Date();

  const id = Date.now();

  const day = String(now.getDate()).padStart(2, "0");

  const month = String(now.getMonth() + 1).padStart(2, "0");

  const year = now.getFullYear();

  const date = `${day}-${month}-${year}`;

  const hour = String(now.getHours()).padStart(2, "0");

  const minute = String(now.getMinutes()).padStart(2, "0");

  const second = String(now.getSeconds()).padStart(2, "0");

  const time = `${hour}:${minute}:${second}`;

  const row = document.createElement("tr");

  row.className = "progress";

  row.dataset.status = "progress";

  row.dataset.id = id;

  row.innerHTML = `

        <td class="no"></td>

        <td>

            <div class="creator">

                <strong>
                    jakaprayudha
                </strong>

                <span>
                    ${date}
                </span>

                <span>
                    ${time}
                </span>

            </div>

        </td>


        <td class="title">

            ${escapeHtml(title)}

        </td>


        <td>

            <span class="status">
                On Progress
            </span>

        </td>


        <td class="action">

            <a
                href="report-today-detail.html?id=${id}"
                class="report-action-btn btn-detail"
            >

                <i class="fa-regular fa-eye"></i>

                Detail

            </a>


            <button
                type="button"
                class="report-action-btn btn-done done-action"
            >

                <i class="fa-solid fa-check"></i>

                Done

            </button>

        </td>

    `;

  body.prepend(row);

  /* Button Done */

  const doneButton = row.querySelector(".done-action");

  if (doneButton) {
    doneButton.addEventListener("click", function () {
      markDone(row);
    });
  }

  renumberRows();

  updateSummary();

  applyTableFilter();
}

/* =========================================================
   RENUMBER TABLE
========================================================= */

function renumberRows() {
  const rows = getRows();

  rows.forEach(function (row, index) {
    const number = row.querySelector(".no");

    if (number) {
      number.textContent = index + 1;
    }
  });
}

/* =========================================================
   11. DONE BUTTON
========================================================= */

function initDoneButtons() {
  const buttons = document.querySelectorAll(".done-action");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      const row = button.closest("tr");

      markDone(row);
    });
  });
}

/* =========================================================
   MARK DONE
========================================================= */

function markDone(row) {
  if (!row) {
    return;
  }

  row.dataset.status = "done";

  row.classList.remove("progress");

  row.classList.add("done");

  const status = row.querySelector(".status");

  if (status) {
    status.textContent = "Done";
  }

  const button = row.querySelector(".done-action");

  if (button) {
    button.remove();
  }

  updateSummary();

  applyTableFilter();

  showToast("Status laporan berhasil diubah menjadi Done.");
}

/* =========================================================
   12. SUMMARY
========================================================= */

function updateSummary() {
  const rows = getRows();

  const total = rows.length;

  const progress = rows.filter(function (row) {
    return row.dataset.status === "progress";
  }).length;

  const done = rows.filter(function (row) {
    return row.dataset.status === "done";
  }).length;

  setText("totalCount", total);

  setText("progressCount", progress);

  setText("doneCount", done);
}

/* =========================================================
   SET TEXT
========================================================= */

function setText(id, value) {
  const element = document.getElementById(id);

  if (element) {
    element.textContent = value;
  }
}

/* =========================================================
   13. PAGINATION
========================================================= */

function initPagination() {
  const buttons = document.querySelectorAll(".page-btn");

  buttons.forEach(function (button) {
    button.addEventListener("click", function () {
      buttons.forEach(function (btn) {
        btn.classList.remove("active");
      });

      button.classList.add("active");
    });
  });
}

/* =========================================================
   14. TOAST
========================================================= */

function showToast(message) {
  let toast = document.getElementById("laporanToast");

  if (!toast) {
    toast = document.createElement("div");

    toast.id = "laporanToast";

    toast.className = "laporan-toast";

    document.body.appendChild(toast);
  }

  toast.textContent = message;

  toast.classList.add("show");

  clearTimeout(toastTimer);

  toastTimer = setTimeout(function () {
    toast.classList.remove("show");
  }, 2500);
}

/* =========================================================
   15. ESCAPE HTML
========================================================= */

function escapeHtml(value) {
  return String(value)
    .replaceAll("&", "&amp;")

    .replaceAll("<", "&lt;")

    .replaceAll(">", "&gt;")

    .replaceAll('"', "&quot;")

    .replaceAll("'", "&#039;");
}
