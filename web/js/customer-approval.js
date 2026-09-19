/* =========================================================
   NPN ISP
   CUSTOMER APPROVAL
   Page-specific JavaScript
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  initCustomerApproval();
});

/* =========================================================
   MAIN
========================================================= */

function initCustomerApproval() {
  initSearch();
  initFilter();
  initClearSearch();
  initDetailButtons();
  initApproveButtons();
  initModal();
  initPagination();

  updateCustomerCount();
}

/* =========================================================
   DATA
========================================================= */

const customerData = [
  {
    id: 1,
    name: "asdasd",
    code: "CRTNPN20260407001",
    regis: "REGNPN20260407001",
    username: "asepganteng",
    nib: "-",
    npwp: "-",
    phone: "065452654556",
    email: "nt49pyyin0@ruutukf.com",
    address: "hhgfh",
    activeDate: "-",
    type: "Bisnis Corporate",
    completeness: "Tidak Lengkap",
    status: "incomplete",
  },
  {
    id: 2,
    name: "1",
    code: "CRTNPN20260529001",
    regis: "REGNPN20260529001",
    username: "pHqghUme",
    nib: "-",
    npwp: "-",
    phone: "1",
    email: "testing@example.com",
    address: "555",
    activeDate: "-",
    type: "Bisnis Corporate",
    completeness: "Tidak Lengkap",
    status: "incomplete",
  },
];

/* =========================================================
   SEARCH
========================================================= */

function initSearch() {
  const input = document.getElementById("caSearch");

  if (!input) return;

  input.addEventListener("input", function () {
    const keyword = this.value.toLowerCase().trim();

    const searchBox = this.closest(".ca-search");

    if (searchBox) {
      searchBox.classList.toggle("has-value", keyword.length > 0);
    }

    filterCustomers(keyword);
  });
}

function filterCustomers(keyword = "") {
  const items = document.querySelectorAll(".ca-customer");

  let visible = 0;

  items.forEach(function (item) {
    const text = item.textContent.toLowerCase();

    const match = keyword === "" || text.includes(keyword);

    item.style.display = match ? "" : "grid";

    if (!match) {
      item.style.display = "none";
    } else {
      visible++;
    }
  });

  updateVisibleCount(visible);
  showEmptyState(visible === 0);
}

/* =========================================================
   FILTER STATUS
========================================================= */

function initFilter() {
  const filter = document.getElementById("caStatusFilter");

  if (!filter) return;

  filter.addEventListener("change", function () {
    applyFilters();
  });
}

function applyFilters() {
  const input = document.getElementById("caSearch");
  const filter = document.getElementById("caStatusFilter");

  const keyword = input ? input.value.toLowerCase().trim() : "";

  const status = filter ? filter.value : "all";

  const items = document.querySelectorAll(".ca-customer");

  let visible = 0;

  items.forEach(function (item) {
    const text = item.textContent.toLowerCase();

    const itemStatus = item.dataset.status || "";

    const keywordMatch = keyword === "" || text.includes(keyword);

    const statusMatch = status === "all" || itemStatus === status;

    const show = keywordMatch && statusMatch;

    item.style.display = show ? "grid" : "none";

    if (show) {
      visible++;
    }
  });

  updateVisibleCount(visible);
  showEmptyState(visible === 0);
}

/* =========================================================
   CLEAR SEARCH
========================================================= */

function initClearSearch() {
  const button = document.getElementById("caClearSearch");

  if (!button) return;

  button.addEventListener("click", function () {
    const input = document.getElementById("caSearch");

    if (!input) return;

    input.value = "";

    const searchBox = input.closest(".ca-search");

    if (searchBox) {
      searchBox.classList.remove("has-value");
    }

    applyFilters();

    input.focus();
  });
}

/* =========================================================
   DETAIL BUTTON
========================================================= */

function initDetailButtons() {
  document.addEventListener("click", function (event) {
    const button = event.target.closest(".ca-detail-btn");

    if (!button) return;

    const id = button.dataset.id;

    if (!id) return;

    openCustomerDetail(id);
  });
}

function openCustomerDetail(id) {
  const customer = customerData.find((item) => String(item.id) === String(id));

  if (!customer) {
    showToast("Data tidak ditemukan", "Data pelanggan tidak tersedia.");

    return;
  }

  populateDetailModal(customer);

  openModal("caDetailModal");
}

/* =========================================================
   DETAIL MODAL
========================================================= */

function populateDetailModal(customer) {
  const mappings = {
    caDetailName: customer.name,

    caDetailCode: customer.code,

    caDetailRegis: customer.regis,

    caDetailUsername: customer.username,

    caDetailNIB: customer.nib,

    caDetailNPWP: customer.npwp,

    caDetailPhone: customer.phone,

    caDetailEmail: customer.email,

    caDetailAddress: customer.address,

    caDetailActiveDate: customer.activeDate,

    caDetailType: customer.type,
  };

  Object.keys(mappings).forEach(function (id) {
    const element = document.getElementById(id);

    if (element) {
      element.textContent = mappings[id];
    }
  });

  const status = document.getElementById("caDetailStatus");

  if (status) {
    status.className =
      "ca-status " +
      (customer.status === "complete"
        ? "ca-status-complete"
        : "ca-status-incomplete");

    status.innerHTML =
      customer.status === "complete"
        ? '<i class="fa-solid fa-circle"></i> Lengkap'
        : '<i class="fa-solid fa-circle"></i> Tidak Lengkap';
  }

  const approveButton = document.getElementById("caModalApprove");

  if (approveButton) {
    approveButton.dataset.id = customer.id;
  }
}

/* =========================================================
   APPROVE
========================================================= */

function initApproveButtons() {
  document.addEventListener("click", function (event) {
    const button = event.target.closest(".ca-approve-btn");

    if (!button) return;

    const id = button.dataset.id;

    if (!id) return;

    openApprovalConfirm(id);
  });
}

/* =========================================================
   APPROVAL CONFIRMATION
========================================================= */

function openApprovalConfirm(id) {
  const customer = customerData.find((item) => String(item.id) === String(id));

  if (!customer) return;

  const name = document.getElementById("caConfirmName");

  const code = document.getElementById("caConfirmCode");

  if (name) {
    name.textContent = customer.name;
  }

  if (code) {
    code.textContent = customer.regis;
  }

  const confirmButton = document.getElementById("caConfirmApprove");

  if (confirmButton) {
    confirmButton.dataset.id = customer.id;
  }

  openModal("caConfirmModal");
}

/* =========================================================
   CONFIRM APPROVAL
========================================================= */

document.addEventListener("click", function (event) {
  const button = event.target.closest("#caConfirmApprove");

  if (!button) return;

  const id = button.dataset.id;

  approveCustomer(id);
});

function approveCustomer(id) {
  const customer = customerData.find((item) => String(item.id) === String(id));

  if (!customer) return;

  customer.status = "complete";

  customer.completeness = "Lengkap";

  const item = document.querySelector(`.ca-customer[data-id="${id}"]`);

  if (item) {
    item.dataset.status = "complete";

    const status = item.querySelector(".ca-status");

    if (status) {
      status.className = "ca-status ca-status-complete";

      status.innerHTML = '<i class="fa-solid fa-circle"></i> Lengkap';
    }

    const approve = item.querySelector(".ca-approve-btn");

    if (approve) {
      approve.remove();
    }
  }

  closeAllModals();

  updateSummary();

  applyFilters();

  showToast(
    "Pelanggan disetujui",
    `${customer.name} berhasil dipindahkan ke status lengkap.`,
  );
}

/* =========================================================
   MODAL
========================================================= */

function initModal() {
  document.addEventListener("click", function (event) {
    const closeButton = event.target.closest("[data-ca-close]");

    if (closeButton) {
      const modal = closeButton.closest(".ca-modal");

      if (modal) {
        closeModal(modal.id);
      }

      return;
    }

    if (event.target.classList.contains("ca-modal-overlay")) {
      const modal = event.target.closest(".ca-modal");

      if (modal) {
        closeModal(modal.id);
      }
    }
  });

  document.addEventListener("keydown", function (event) {
    if (event.key !== "Escape") {
      return;
    }

    closeAllModals();
  });
}

function openModal(id) {
  const modal = document.getElementById(id);

  if (!modal) return;

  modal.hidden = false;

  document.body.classList.add("ca-modal-open");
}

function closeModal(id) {
  const modal = document.getElementById(id);

  if (!modal) return;

  modal.hidden = true;

  const visible = document.querySelector(".ca-modal:not([hidden])");

  if (!visible) {
    document.body.classList.remove("ca-modal-open");
  }
}

function closeAllModals() {
  document.querySelectorAll(".ca-modal").forEach(function (modal) {
    modal.hidden = true;
  });

  document.body.classList.remove("ca-modal-open");
}

/* =========================================================
   PAGINATION
========================================================= */

function initPagination() {
  document.addEventListener("click", function (event) {
    const button = event.target.closest(".ca-pagination button");

    if (!button) return;

    if (button.disabled) return;

    if (button.classList.contains("active")) {
      return;
    }

    const page = button.dataset.page;

    if (!page) return;

    setPagination(page);
  });
}

function setPagination(page) {
  document.querySelectorAll(".ca-pagination button").forEach(function (button) {
    button.classList.toggle("active", button.dataset.page === page);
  });

  /*
   * Dummy pagination.
   * Nanti bisa diganti AJAX/API.
   */

  showToast("Halaman " + page, "Data halaman berhasil dimuat.");
}

/* =========================================================
   SUMMARY
========================================================= */

function updateSummary() {
  const total = customerData.length;

  const complete = customerData.filter(
    (item) => item.status === "complete",
  ).length;

  const incomplete = customerData.filter(
    (item) => item.status === "incomplete",
  ).length;

  setText("caTotalCount", total);

  setText("caCompleteCount", complete);

  setText("caIncompleteCount", incomplete);

  const pending = incomplete;

  setText("caPendingCount", pending);
}

function updateCustomerCount() {
  updateSummary();

  const items = document.querySelectorAll(".ca-customer");

  updateVisibleCount(items.length);
}

function updateVisibleCount(count) {
  const element = document.getElementById("caVisibleCount");

  if (element) {
    element.textContent = count;
  }
}

function setText(id, value) {
  const element = document.getElementById(id);

  if (element) {
    element.textContent = value;
  }
}

/* =========================================================
   EMPTY STATE
========================================================= */

function showEmptyState(show) {
  let empty = document.getElementById("caEmptyState");

  const list = document.querySelector(".ca-list");

  if (!list) return;

  if (show) {
    if (empty) {
      empty.hidden = false;
      return;
    }

    empty = document.createElement("div");

    empty.id = "caEmptyState";

    empty.className = "ca-empty";

    empty.innerHTML = `
      <div class="ca-empty-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>

      <h3>Data tidak ditemukan</h3>

      <p>
        Tidak ada pelanggan yang sesuai
        dengan pencarian atau filter yang dipilih.
      </p>

      <button
        type="button"
        class="ca-btn ca-btn-light"
        id="caResetFilter"
      >
        <i class="fa-solid fa-rotate-left"></i>
        Reset Filter
      </button>
    `;

    list.appendChild(empty);

    const reset = document.getElementById("caResetFilter");

    if (reset) {
      reset.addEventListener("click", resetFilters);
    }
  } else {
    if (empty) {
      empty.hidden = true;
    }
  }
}

function resetFilters() {
  const input = document.getElementById("caSearch");

  const filter = document.getElementById("caStatusFilter");

  if (input) {
    input.value = "";

    const searchBox = input.closest(".ca-search");

    if (searchBox) {
      searchBox.classList.remove("has-value");
    }
  }

  if (filter) {
    filter.value = "all";
  }

  applyFilters();
}

/* =========================================================
   TOAST
========================================================= */

function showToast(title, message) {
  let toast = document.getElementById("caToast");

  if (!toast) {
    toast = document.createElement("div");

    toast.id = "caToast";

    toast.className = "ca-toast";

    toast.innerHTML = `
      <div class="ca-toast-icon">
        <i class="fa-solid fa-check"></i>
      </div>

      <div>
        <strong></strong>
        <span></span>
      </div>
    `;

    document.body.appendChild(toast);
  }

  const titleElement = toast.querySelector("strong");

  const messageElement = toast.querySelector("span");

  if (titleElement) {
    titleElement.textContent = title;
  }

  if (messageElement) {
    messageElement.textContent = message;
  }

  toast.classList.add("show");

  clearTimeout(window.caToastTimer);

  window.caToastTimer = setTimeout(function () {
    toast.classList.remove("show");
  }, 3500);
}

/* =========================================================
   BODY MODAL LOCK
========================================================= */

const caModalStyle = document.createElement("style");

caModalStyle.textContent = `
  body.ca-modal-open {
    overflow: hidden;
  }
`;

document.head.appendChild(caModalStyle);
