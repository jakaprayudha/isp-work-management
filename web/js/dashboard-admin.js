document.addEventListener("DOMContentLoaded", () => {
  initSidebar();
  initDashboard();
});

/* =========================================================
   DASHBOARD DATA
========================================================= */

const dashboardData = {
  monthly: {
    labels: ["Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep"],

    customers: [820, 890, 940, 1010, 1085, 1170, 1248],

    revenue: [275, 292, 310, 334, 352, 391, 428],
  },

  billing: {
    labels: ["01-05", "06-10", "11-15", "16-20", "21-25", "26-30"],

    paid: [48, 62, 55, 71, 42, 40],

    outstanding: [12, 16, 11, 18, 21, 17],
  },

  summary: {
    customers: 1248,

    activeCustomers: 1172,

    newCustomers: 78,

    revenue: 428000000,

    outstanding: 84000000,

    workOrders: 326,

    completedWorkOrders: 287,

    pendingWorkOrders: 39,

    technicians: 42,
  },
};

/* =========================================================
   DASHBOARD INITIALIZATION
========================================================= */

function initDashboard() {
  initGrowthChart();

  initBillingChart();

  initQuickActions();

  initPeriodSelector();

  initSearch();

  initNotification();

  updateDashboardSummary();

  initUserMenu();
}

/* =========================================================
   SIDEBAR
========================================================= */

function initSidebar() {
  const sidebar = document.getElementById("sidebar");

  const mobileMenu = document.getElementById("mobileMenu");

  if (!sidebar) {
    console.warn("Element #sidebar tidak ditemukan.");

    return;
  }

  /* -----------------------------------------------------
       MOBILE MENU
    ----------------------------------------------------- */

  if (mobileMenu) {
    mobileMenu.addEventListener("click", () => {
      sidebar.classList.toggle("open");
    });
  }

  /* -----------------------------------------------------
       ACTIVE MENU
    ----------------------------------------------------- */

  const menuItems = sidebar.querySelectorAll(".menu-item");

  let currentPage = window.location.pathname
    .split("/")
    .pop()
    .split("?")[0]
    .replace(".php", "")
    .replace(".html", "")
    .toLowerCase();

  if (!currentPage) {
    currentPage = "dashboard";
  }

  menuItems.forEach((item) => {
    const href = item.getAttribute("href");

    if (!href) {
      return;
    }

    const menuPage = href
      .split("/")
      .pop()
      .split("?")[0]
      .replace(".php", "")
      .replace(".html", "")
      .replace(/\/$/, "")
      .toLowerCase();

    if (
      menuPage === currentPage ||
      (currentPage === "index" && menuPage === "dashboard")
    ) {
      item.classList.add("active");
    }

    item.addEventListener("click", () => {
      menuItems.forEach((menu) => {
        menu.classList.remove("active");
      });

      item.classList.add("active");

      if (window.innerWidth <= 1000) {
        sidebar.classList.remove("open");
      }
    });
  });
}

/* =========================================================
   GROWTH CHART
========================================================= */

let growthChart = null;

function initGrowthChart() {
  const canvas = document.getElementById("growthChart");

  if (!canvas) {
    return;
  }

  if (typeof Chart === "undefined") {
    console.error("Chart.js belum dimuat.");

    return;
  }

  const data = dashboardData.monthly;

  if (growthChart) {
    growthChart.destroy();
  }

  growthChart = new Chart(canvas, {
    type: "line",

    data: {
      labels: data.labels,

      datasets: [
        {
          label: "Pelanggan",

          data: data.customers,

          borderColor: "#0878d1",

          backgroundColor: "rgba(8,120,209,.08)",

          borderWidth: 2,

          pointRadius: 3,

          pointHoverRadius: 5,

          tension: 0.35,

          fill: true,
        },

        {
          label: "Revenue (Jt)",

          data: data.revenue,

          borderColor: "#10a879",

          backgroundColor: "transparent",

          borderWidth: 2,

          pointRadius: 3,

          pointHoverRadius: 5,

          tension: 0.35,

          fill: false,
        },
      ],
    },

    options: {
      responsive: true,

      maintainAspectRatio: false,

      interaction: {
        mode: "index",

        intersect: false,
      },

      plugins: {
        legend: {
          position: "bottom",

          labels: {
            usePointStyle: true,

            boxWidth: 8,

            boxHeight: 8,

            padding: 15,

            font: {
              size: 9,
            },
          },
        },

        tooltip: {
          backgroundColor: "#071a33",

          titleFont: {
            size: 10,

            weight: "600",
          },

          bodyFont: {
            size: 9,
          },

          padding: 10,

          cornerRadius: 7,
        },
      },

      scales: {
        x: {
          grid: {
            display: false,
          },

          ticks: {
            color: "#8b98ad",

            font: {
              size: 8,
            },
          },
        },

        y: {
          beginAtZero: false,

          grid: {
            color: "#edf1f5",
          },

          ticks: {
            color: "#8b98ad",

            font: {
              size: 8,
            },
          },
        },
      },
    },
  });
}

/* =========================================================
   BILLING CHART
========================================================= */

let billingChart = null;

function initBillingChart() {
  const canvas = document.getElementById("billingChart");

  if (!canvas) {
    return;
  }

  if (typeof Chart === "undefined") {
    console.error("Chart.js belum dimuat.");

    return;
  }

  const data = dashboardData.billing;

  if (billingChart) {
    billingChart.destroy();
  }

  billingChart = new Chart(canvas, {
    type: "bar",

    data: {
      labels: data.labels,

      datasets: [
        {
          label: "Paid",

          data: data.paid,

          backgroundColor: "#0878d1",

          borderRadius: 5,

          barPercentage: 0.65,

          categoryPercentage: 0.75,
        },

        {
          label: "Outstanding",

          data: data.outstanding,

          backgroundColor: "#ffbd0b",

          borderRadius: 5,

          barPercentage: 0.65,

          categoryPercentage: 0.75,
        },
      ],
    },

    options: {
      responsive: true,

      maintainAspectRatio: false,

      interaction: {
        mode: "index",

        intersect: false,
      },

      plugins: {
        legend: {
          position: "bottom",

          labels: {
            usePointStyle: true,

            boxWidth: 8,

            boxHeight: 8,

            padding: 15,

            font: {
              size: 9,
            },
          },
        },

        tooltip: {
          backgroundColor: "#071a33",

          titleFont: {
            size: 10,

            weight: "600",
          },

          bodyFont: {
            size: 9,
          },

          padding: 10,

          cornerRadius: 7,
        },
      },

      scales: {
        x: {
          grid: {
            display: false,
          },

          ticks: {
            color: "#8b98ad",

            font: {
              size: 8,
            },
          },
        },

        y: {
          beginAtZero: true,

          grid: {
            color: "#edf1f5",
          },

          ticks: {
            color: "#8b98ad",

            font: {
              size: 8,
            },
          },
        },
      },
    },
  });
}

/* =========================================================
   UPDATE DASHBOARD SUMMARY
========================================================= */

function updateDashboardSummary() {
  const summary = dashboardData.summary;

  /*
   * Gunakan data-value sebagai selector.
   *
   * Contoh:
   *
   * <div data-dashboard="customers"></div>
   *
   */

  setDashboardValue("customers", formatNumber(summary.customers));

  setDashboardValue("activeCustomers", formatNumber(summary.activeCustomers));

  setDashboardValue("newCustomers", formatNumber(summary.newCustomers));

  setDashboardValue("revenue", formatCurrency(summary.revenue));

  setDashboardValue("outstanding", formatCurrency(summary.outstanding));

  setDashboardValue("workOrders", formatNumber(summary.workOrders));

  setDashboardValue(
    "completedWorkOrders",
    formatNumber(summary.completedWorkOrders),
  );

  setDashboardValue(
    "pendingWorkOrders",
    formatNumber(summary.pendingWorkOrders),
  );

  setDashboardValue("technicians", formatNumber(summary.technicians));
}

/* =========================================================
   SET DASHBOARD VALUE
========================================================= */

function setDashboardValue(key, value) {
  const elements = document.querySelectorAll(`[data-dashboard="${key}"]`);

  elements.forEach((element) => {
    element.textContent = value;
  });
}

/* =========================================================
   QUICK ACTIONS
========================================================= */

function initQuickActions() {
  const buttons = document.querySelectorAll(".quick");

  if (!buttons.length) {
    return;
  }

  buttons.forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault();

      const action = button.dataset.action || button.innerText.trim();

      button.classList.add("clicked");

      setTimeout(() => {
        button.classList.remove("clicked");
      }, 150);

      handleQuickAction(action);
    });
  });
}

/* =========================================================
   QUICK ACTION HANDLER
========================================================= */

function handleQuickAction(action) {
  const value = action.toLowerCase();

  if (value.includes("customer") || value.includes("pelanggan")) {
    window.location.href = "customers";

    return;
  }

  if (
    value.includes("work") ||
    value.includes("order") ||
    value.includes("pekerjaan")
  ) {
    window.location.href = "work-orders";

    return;
  }

  if (value.includes("invoice") || value.includes("tagihan")) {
    window.location.href = "invoices";

    return;
  }

  if (value.includes("technician") || value.includes("teknisi")) {
    window.location.href = "technicians";

    return;
  }

  showDashboardMessage("Action: " + action);
}

/* =========================================================
   PERIOD SELECTOR
========================================================= */

function initPeriodSelector() {
  const selectors = document.querySelectorAll(".period");

  if (!selectors.length) {
    return;
  }

  selectors.forEach((select) => {
    select.addEventListener("change", () => {
      const period = select.value;

      updatePeriodData(period);
    });
  });
}

/* =========================================================
   PERIOD DATA
========================================================= */

function updatePeriodData(period) {
  /*
   * Untuk sementara menggunakan data simulasi.
   * Nanti bagian ini bisa diganti API PHP/MySQL.
   */

  const periodData = {
    "7d": {
      customers: [1178, 1192, 1204, 1210, 1224, 1235, 1248],

      revenue: [51, 55, 58, 61, 63, 67, 73],
    },

    "30d": {
      customers: [1050, 1090, 1125, 1160, 1190, 1220, 1248],

      revenue: [305, 326, 341, 357, 379, 402, 428],
    },

    "90d": {
      customers: [820, 890, 940, 1010, 1085, 1170, 1248],

      revenue: [275, 292, 310, 334, 352, 391, 428],
    },

    year: {
      customers: [620, 710, 790, 850, 920, 1010, 1085, 1170, 1248],

      revenue: [180, 205, 228, 247, 275, 292, 310, 352, 428],
    },
  };

  const selected = periodData[period];

  if (!selected) {
    return;
  }

  /*
   * Update growth chart
   */

  if (growthChart) {
    growthChart.data.datasets[0].data = selected.customers;

    growthChart.data.datasets[1].data = selected.revenue;

    growthChart.update();
  }

  showDashboardMessage("Data periode diperbarui.");
}

/* =========================================================
   SEARCH
========================================================= */

function initSearch() {
  const search = document.querySelector(".search");

  if (!search) {
    return;
  }

  search.addEventListener("keydown", (event) => {
    if (event.key !== "Enter") {
      return;
    }

    const keyword = search.value.trim();

    if (!keyword) {
      return;
    }

    performSearch(keyword);
  });
}

/* =========================================================
   SEARCH HANDLER
========================================================= */

function performSearch(keyword) {
  console.log("Search:", keyword);

  /*
   * Nanti dapat diarahkan ke:
   *
   * search?q=keyword
   */

  window.location.href = "search?q=" + encodeURIComponent(keyword);
}

/* =========================================================
   NOTIFICATION
========================================================= */

function initNotification() {
  const notification = document.querySelector(".top-icon");

  if (!notification) {
    return;
  }

  notification.addEventListener("click", () => {
    showNotificationPanel();
  });
}

/* =========================================================
   NOTIFICATION PANEL
========================================================= */

function showNotificationPanel() {
  let panel = document.getElementById("notificationPanel");

  if (panel) {
    panel.classList.toggle("show");

    return;
  }

  panel = document.createElement("div");

  panel.id = "notificationPanel";

  panel.className = "notification-panel";

  panel.innerHTML = `

        <div class="notification-header">

            <strong>Notifications</strong>

            <button
                type="button"
                class="notification-close">
                ×
            </button>

        </div>


        <div class="notification-item">

            <div class="notification-icon">
                <i class="fa-solid fa-file-invoice"></i>
            </div>

            <div>
                <strong>Invoice baru</strong>
                <p>3 invoice menunggu pembayaran.</p>
            </div>

        </div>


        <div class="notification-item">

            <div class="notification-icon">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>

            <div>
                <strong>Work order</strong>
                <p>5 pekerjaan membutuhkan assignment.</p>
            </div>

        </div>


        <div class="notification-item">

            <div class="notification-icon">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>

            <div>
                <strong>SLA Warning</strong>
                <p>2 pekerjaan mendekati batas SLA.</p>
            </div>

        </div>

    `;

  document.body.appendChild(panel);

  requestAnimationFrame(() => {
    panel.classList.add("show");
  });

  const close = panel.querySelector(".notification-close");

  close.addEventListener("click", () => {
    panel.classList.remove("show");
  });
}

/* =========================================================
   USER MENU
========================================================= */

function initUserMenu() {
  const userMenu = document.querySelector(".user-menu");

  if (!userMenu) {
    return;
  }

  userMenu.addEventListener("click", () => {
    showUserMenu();
  });
}

/* =========================================================
   USER MENU PANEL
========================================================= */

function showUserMenu() {
  let menu = document.getElementById("userDropdown");

  if (menu) {
    menu.classList.toggle("show");

    return;
  }

  menu = document.createElement("div");

  menu.id = "userDropdown";

  menu.className = "user-dropdown";

  menu.innerHTML = `

        <a href="profile">
            <i class="fa-regular fa-user"></i>
            Profile
        </a>

        <a href="settings">
            <i class="fa-solid fa-gear"></i>
            Settings
        </a>

        <div class="dropdown-divider"></div>

        <a href="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
        </a>

    `;

  const userMenu = document.querySelector(".user-menu");

  userMenu.appendChild(menu);

  requestAnimationFrame(() => {
    menu.classList.add("show");
  });
}

/* =========================================================
   NUMBER FORMAT
========================================================= */

function formatNumber(value) {
  return new Intl.NumberFormat("id-ID").format(value);
}

/* =========================================================
   CURRENCY FORMAT
========================================================= */

function formatCurrency(value) {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",

    currency: "IDR",

    maximumFractionDigits: 0,
  }).format(value);
}

/* =========================================================
   DASHBOARD TOAST
========================================================= */

function showDashboardMessage(message) {
  let toast = document.getElementById("dashboard-toast");

  if (!toast) {
    toast = document.createElement("div");

    toast.id = "dashboard-toast";

    toast.style.position = "fixed";

    toast.style.right = "25px";

    toast.style.bottom = "25px";

    toast.style.zIndex = "99999";

    toast.style.padding = "12px 16px";

    toast.style.borderRadius = "9px";

    toast.style.color = "#fff";

    toast.style.background = "#071a33";

    toast.style.boxShadow = "0 10px 30px rgba(0,0,0,.18)";

    toast.style.fontSize = "12px";

    toast.style.fontFamily = "Inter, Arial, sans-serif";

    toast.style.opacity = "0";

    toast.style.transform = "translateY(10px)";

    toast.style.transition = ".25s ease";

    document.body.appendChild(toast);
  }

  toast.textContent = message;

  requestAnimationFrame(() => {
    toast.style.opacity = "1";

    toast.style.transform = "translateY(0)";
  });

  clearTimeout(toast.hideTimer);

  toast.hideTimer = setTimeout(() => {
    toast.style.opacity = "0";

    toast.style.transform = "translateY(10px)";
  }, 2500);
}
