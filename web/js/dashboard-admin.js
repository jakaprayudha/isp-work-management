/* =========================================================
   NPN ADMIN DASHBOARD
   dashboard-admin.js
========================================================= */


/* =========================================================
   DOM READY
========================================================= */

document.addEventListener("DOMContentLoaded", async function () {

  /*
   * LOAD SIDEBAR COMPONENT
   */

  await loadSidebar();


  /*
   * INITIALIZE DASHBOARD
   */

  initDashboard();

});


/* =========================================================
   LOAD SIDEBAR
========================================================= */

async function loadSidebar() {

  const sidebarContainer =
    document.getElementById("sidebar-container");


  /*
   * Jika halaman tidak memiliki sidebar container
   */

  if (!sidebarContainer) {

    console.warn(
      "Element #sidebar-container tidak ditemukan."
    );

    return;

  }


  try {

    const response =
      await fetch("../components/sidebar.html");


    /*
     * Check HTTP response
     */

    if (!response.ok) {

      throw new Error(
        "Sidebar gagal dimuat: " +
        response.status +
        " " +
        response.statusText
      );

    }


    /*
     * Ambil HTML sidebar
     */

    const html =
      await response.text();


    /*
     * Inject sidebar ke halaman
     */

    sidebarContainer.innerHTML = html;


    /*
     * Initialize sidebar setelah HTML
     * berhasil dimasukkan
     */

    initSidebar();


  } catch (error) {

    console.error(
      "Error loading sidebar:",
      error
    );


    /*
     * Fallback error
     */

    sidebarContainer.innerHTML = `
      <div style="
        position:fixed;
        left:0;
        top:0;
        bottom:0;
        width:278px;
        padding:25px;
        display:flex;
        align-items:center;
        justify-content:center;
        text-align:center;
        color:#ef5350;
        background:#071a33;
        font-family:Inter,Arial,sans-serif;
        font-size:12px;
        z-index:9999;
      ">
        <div>
          <strong>Sidebar gagal dimuat.</strong>
          <br>
          <span style="
            display:block;
            margin-top:7px;
            color:#8fa1b8;
            font-size:10px;
          ">
            Periksa lokasi components/sidebar.html
          </span>
        </div>
      </div>
    `;

  }

}


/* =========================================================
   SIDEBAR
========================================================= */

function initSidebar() {

  const sidebar =
    document.getElementById("sidebar");


  const mobileMenu =
    document.getElementById("mobileMenu");


  /*
   * Jika sidebar tidak ditemukan
   */

  if (!sidebar) {

    console.warn(
      "Element #sidebar tidak ditemukan."
    );

    return;

  }


  /* =======================================================
     MOBILE MENU
  ======================================================= */

  if (mobileMenu) {

    mobileMenu.addEventListener(
      "click",
      function () {

        sidebar.classList.toggle("open");

      }
    );

  }


  /* =======================================================
     ACTIVE MENU
  ======================================================= */

  const menuItems =
    sidebar.querySelectorAll(".menu-item");


  /*
   * Ambil nama file halaman saat ini
   *
   * Contoh:
   * dashboard-admin.html
   *
   * hasil:
   * dashboard-admin
   */

  let currentPage =
    window.location.pathname
      .split("/")
      .pop()
      .replace(".html", "")
      .toLowerCase();


  /*
   * Jika URL kosong / root
   */

  if (!currentPage) {

    currentPage = "dashboard-admin";

  }


  menuItems.forEach(function (item) {

    const href =
      item.getAttribute("href");


    if (!href) {

      return;

    }


    /*
     * Ambil nama halaman dari href
     */

    const menuPage =
      href
        .split("/")
        .pop()
        .replace(".html", "")
        .toLowerCase();


    /*
     * Active berdasarkan halaman
     */

    if (menuPage === currentPage) {

      menuItems.forEach(function (menu) {

        menu.classList.remove("active");

      });


      item.classList.add("active");

    }


    /*
     * Klik menu
     */

    item.addEventListener(
      "click",
      function () {

        /*
         * Hapus active semua menu
         */

        menuItems.forEach(function (menu) {

          menu.classList.remove("active");

        });


        /*
         * Active menu yang dipilih
         */

        item.classList.add("active");


        /*
         * Close sidebar pada mobile
         */

        if (window.innerWidth <= 1000) {

          sidebar.classList.remove("open");

        }

      }
    );

  });

}


/* =========================================================
   DASHBOARD INITIALIZATION
========================================================= */

function initDashboard() {

  /*
   * Growth Chart
   */

  initGrowthChart();


  /*
   * Billing Chart
   */

  initBillingChart();


  /*
   * Quick Actions
   */

  initQuickActions();


  /*
   * Period Selector
   */

  initPeriodSelector();


  /*
   * Search
   */

  initSearch();


  /*
   * Notification
   */

  initNotification();

}


/* =========================================================
   GROWTH CHART
========================================================= */

function initGrowthChart() {

  const growthCanvas =
    document.getElementById("growthChart");


  /*
   * Canvas tidak tersedia
   */

  if (!growthCanvas) {

    console.warn(
      "growthChart tidak ditemukan."
    );

    return;

  }


  /*
   * Pastikan Chart.js tersedia
   */

  if (typeof Chart === "undefined") {

    console.error(
      "Chart.js belum dimuat."
    );

    return;

  }


  new Chart(growthCanvas, {

    type: "line",


    data: {

      labels: [
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Agu",
        "Sep"
      ],


      datasets: [

        {

          label: "Pelanggan",

          data: [
            820,
            890,
            940,
            1010,
            1085,
            1170,
            1248
          ],

          borderColor: "#0878d1",

          backgroundColor:
            "rgba(8,120,209,.08)",

          borderWidth: 2,

          pointRadius: 3,

          pointHoverRadius: 5,

          tension: 0.35,

          fill: true

        },


        {

          label: "Revenue (Jt)",

          data: [
            275,
            292,
            310,
            334,
            352,
            391,
            428
          ],

          borderColor: "#10a879",

          backgroundColor:
            "transparent",

          borderWidth: 2,

          pointRadius: 3,

          pointHoverRadius: 5,

          tension: 0.35,

          fill: false

        }

      ]

    },


    options: {

      responsive: true,

      maintainAspectRatio: false,


      interaction: {

        mode: "index",

        intersect: false

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

              size: 8

            }

          }

        },


        tooltip: {

          backgroundColor: "#071a33",

          titleFont: {

            size: 10,

            weight: "600"

          },

          bodyFont: {

            size: 9

          },

          padding: 10,

          cornerRadius: 7,

          displayColors: true

        }

      },


      scales: {

        x: {

          grid: {

            display: false

          },

          ticks: {

            color: "#8b98ad",

            font: {

              size: 8

            }

          }

        },


        y: {

          beginAtZero: false,

          grid: {

            color: "#edf1f5"

          },

          ticks: {

            color: "#8b98ad",

            font: {

              size: 8

            }

          }

        }

      }

    }

  });

}


/* =========================================================
   BILLING CHART
========================================================= */

function initBillingChart() {

  const billingCanvas =
    document.getElementById("billingChart");


  /*
   * Canvas tidak tersedia
   */

  if (!billingCanvas) {

    console.warn(
      "billingChart tidak ditemukan."
    );

    return;

  }


  /*
   * Pastikan Chart.js tersedia
   */

  if (typeof Chart === "undefined") {

    console.error(
      "Chart.js belum dimuat."
    );

    return;

  }


  new Chart(billingCanvas, {

    type: "bar",


    data: {

      labels: [
        "01-05",
        "06-10",
        "11-15",
        "16-20",
        "21-25",
        "26-30"
      ],


      datasets: [

        {

          label: "Paid",

          data: [
            48,
            62,
            55,
            71,
            42,
            40
          ],

          backgroundColor: "#0878d1",

          borderRadius: 5,

          barPercentage: 0.65,

          categoryPercentage: 0.75

        },


        {

          label: "Outstanding",

          data: [
            12,
            16,
            11,
            18,
            21,
            17
          ],

          backgroundColor: "#ffbd0b",

          borderRadius: 5,

          barPercentage: 0.65,

          categoryPercentage: 0.75

        }

      ]

    },


    options: {

      responsive: true,

      maintainAspectRatio: false,


      interaction: {

        mode: "index",

        intersect: false

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

              size: 8

            }

          }

        },


        tooltip: {

          backgroundColor: "#071a33",

          titleFont: {

            size: 10,

            weight: "600"

          },

          bodyFont: {

            size: 9

          },

          padding: 10,

          cornerRadius: 7

        }

      },


      scales: {

        x: {

          grid: {

            display: false

          },

          ticks: {

            color: "#8b98ad",

            font: {

              size: 8

            }

          }

        },


        y: {

          beginAtZero: true,

          grid: {

            color: "#edf1f5"

          },

          ticks: {

            color: "#8b98ad",

            font: {

              size: 8

            }

          }

        }

      }

    }

  });

}


/* =========================================================
   QUICK ACTIONS
========================================================= */

function initQuickActions() {

  const buttons =
    document.querySelectorAll(".quick");


  if (!buttons.length) {

    return;

  }


  buttons.forEach(function (button) {

    button.addEventListener(
      "click",
      function () {

        /*
         * Animation click
         */

        button.style.transform =
          "scale(.97)";


        setTimeout(function () {

          button.style.transform = "";

        }, 120);


        /*
         * Dummy action
         */

        console.log(
          "Quick Action:",
          button.innerText.trim()
        );

      }
    );

  });

}


/* =========================================================
   PERIOD SELECTOR
========================================================= */

function initPeriodSelector() {

  const selectors =
    document.querySelectorAll(".period");


  if (!selectors.length) {

    return;

  }


  selectors.forEach(function (select) {

    select.addEventListener(
      "change",
      function () {

        console.log(
          "Periode dipilih:",
          this.value
        );


        /*
         * Dummy feedback
         */

        showDashboardMessage(
          "Periode " +
          this.value +
          " dipilih."
        );

      }
    );

  });

}


/* =========================================================
   SEARCH
========================================================= */

function initSearch() {

  const search =
    document.querySelector(".search");


  if (!search) {

    return;

  }


  search.addEventListener(
    "keydown",
    function (event) {

      /*
       * Jalankan ketika ENTER
       */

      if (event.key !== "Enter") {

        return;

      }


      const keyword =
        search.value.trim();


      if (!keyword) {

        return;

      }


      console.log(
        "Search:",
        keyword
      );


      showDashboardMessage(
        'Pencarian: "' +
        keyword +
        '"'
      );

    }
  );

}


/* =========================================================
   NOTIFICATION
========================================================= */

function initNotification() {

  const notification =
    document.querySelector(".top-icon");


  if (!notification) {

    return;

  }


  notification.addEventListener(
    "click",
    function () {

      console.log(
        "Notification clicked."
      );


      showDashboardMessage(
        "Belum ada notifikasi baru."
      );

    }
  );

}


/* =========================================================
   DASHBOARD MESSAGE
========================================================= */

function showDashboardMessage(message) {

  /*
   * Cek apakah toast sudah ada
   */

  let toast =
    document.getElementById(
      "dashboard-toast"
    );


  /*
   * Buat toast jika belum ada
   */

  if (!toast) {

    toast =
      document.createElement("div");

    toast.id =
      "dashboard-toast";


    toast.style.position =
      "fixed";

    toast.style.right =
      "25px";

    toast.style.bottom =
      "25px";

    toast.style.zIndex =
      "9999";

    toast.style.padding =
      "12px 16px";

    toast.style.borderRadius =
      "9px";

    toast.style.color =
      "#fff";

    toast.style.background =
      "#071a33";

    toast.style.boxShadow =
      "0 10px 30px rgba(0,0,0,.18)";

    toast.style.fontSize =
      "10px";

    toast.style.fontFamily =
      "Inter, Arial, sans-serif";

    toast.style.opacity =
      "0";

    toast.style.transform =
      "translateY(10px)";

    toast.style.transition =
      ".25s ease";


    document.body.appendChild(
      toast
    );

  }


  /*
   * Set message
   */

  toast.textContent =
    message;


  /*
   * Show
   */

  requestAnimationFrame(function () {

    toast.style.opacity =
      "1";

    toast.style.transform =
      "translateY(0)";

  });


  /*
   * Hide
   */

  clearTimeout(
    toast.hideTimer
  );


  toast.hideTimer =
    setTimeout(function () {

      toast.style.opacity =
        "0";

      toast.style.transform =
        "translateY(10px)";

    }, 2500);

}