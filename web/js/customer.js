/**
 * =========================================================
 * NPN ISP - MASTER CUSTOMER
 * customer.js
 *
 * Detail  -> customer-detail.php?id=ID
 * Edit    -> customerFormModal
 * Tambah  -> customerFormModal kosong
 * Delete  -> confirmation modal
 * =========================================================
 */

document.addEventListener("DOMContentLoaded", function () {
  initCustomer();
});

/* =========================================================
   DATA DUMMY
   Nantinya bagian ini tinggal diganti API / database
   ========================================================= */

const customerData = {
  1: {
    id: 1,
    type: "retail",
    typeLabel: "Retail / Broadband",

    businessName: "BRAM ADRIANTO PATTINAMA",

    phone: "081299319932",
    email: "mitraedukasiglobalindo@gmail.com",

    address: "Jl. Seksama / M. Nawi Harahap",

    province: "sumatera-utara",
    kabupaten: "medan",
    kecamatan: "medan-amplas",
    kelurahan: "harjosari",
    postal_code: "20219",

    coordinate: "3.5489, 98.7034",

    position: "owner",
    pic_name: "Bram Adrianto Pattinama",
    pic_phone: "081299319932",
    pic_email: "mitraedukasiglobalindo@gmail.com",

    username: "Mirza",

    status: "active",

    service: "broadband",

    regis: "REGNPN20260302001",
    active_date: "-",
    nib: "",
    npwp: "",
  },

  2: {
    id: 2,
    type: "corporate",
    typeLabel: "Bisnis Corporate",

    businessName: "MTS YP KHADIJAH - DAGANG KLAMBIR",

    phone: "0822746376229",
    email: "haditiya89@gmail.com",

    address:
      "Jl. Sei Blumai Hilir, Buntu Bedimbar, Kec. Tj. Morawa, Kabupaten Deli Serdang, Sumatera Utara 20362",

    province: "sumatera-utara",
    kabupaten: "deli-serdang",
    kecamatan: "tanjung-morawa",
    kelurahan: "kolam",
    postal_code: "20362",

    coordinate: "3.5281, 98.7201",

    position: "admin",
    pic_name: "Haditiya",
    pic_phone: "0822746376229",
    pic_email: "haditiya89@gmail.com",

    username: "pHqghUme",

    status: "pending",

    service: "internet",

    regis: "REGNPN20260305001",
    active_date: "-",
    nib: "",
    npwp: "",
  },

  3: {
    id: 3,
    type: "retail",
    typeLabel: "Retail / Broadband",

    businessName: "LILI APRIYANTI",

    phone: "081234567890",
    email: "lili@example.com",

    address: "Jl. Brigjend Katamso",

    province: "sumatera-utara",
    kabupaten: "medan",
    kecamatan: "medan-amplas",
    kelurahan: "harjosari",
    postal_code: "20148",

    coordinate: "3.5632, 98.7102",

    position: "pic",
    pic_name: "Lili Apriyanti",
    pic_phone: "081234567890",
    pic_email: "lili@example.com",

    username: "lili",

    status: "active",

    service: "broadband",

    regis: "REGNPN20260416001",
    active_date: "-",
    nib: "",
    npwp: "",
  },

  4: {
    id: 4,
    type: "corporate",
    typeLabel: "Bisnis Corporate",

    businessName: "PT NUSA NETWORK",

    phone: "081377778888",
    email: "admin@nusanetwork.id",

    address: "Deli Tua, Deli Serdang",

    province: "sumatera-utara",
    kabupaten: "deli-serdang",
    kecamatan: "deli-tua",
    kelurahan: "deli-tua-timur",
    postal_code: "20355",

    coordinate: "3.5082, 98.6841",

    position: "manager",
    pic_name: "Rizky",
    pic_phone: "081377778888",
    pic_email: "admin@nusanetwork.id",

    username: "nusanetwork",

    status: "active",

    service: "metro",

    regis: "REGNPN20260417001",
    active_date: "17-04-2026",
    nib: "1234567890",
    npwp: "12.345.678.9-012.000",
  },

  5: {
    id: 5,
    type: "retail",
    typeLabel: "Retail / Broadband",

    businessName: "TOKO MAJU JAYA",

    phone: "081355566677",
    email: "tokomajujaya@gmail.com",

    address: "Tanjung Morawa",

    province: "sumatera-utara",
    kabupaten: "deli-serdang",
    kecamatan: "tanjung-morawa",
    kelurahan: "kolam",
    postal_code: "20362",

    coordinate: "3.5268, 98.7011",

    position: "owner",
    pic_name: "Maju Jaya",
    pic_phone: "081355566677",
    pic_email: "tokomajujaya@gmail.com",

    username: "majujaya",

    status: "active",

    service: "broadband",

    regis: "REGNPN20260501001",
    active_date: "01-05-2026",
    nib: "",
    npwp: "",
  },

  6: {
    id: 6,
    type: "corporate",
    typeLabel: "Bisnis Corporate",

    businessName: "PT SUMBER DATA INDONESIA",

    phone: "081288899900",
    email: "admin@sumberdata.id",

    address: "Kota Medan",

    province: "sumatera-utara",
    kabupaten: "medan",
    kecamatan: "medan-amplas",
    kelurahan: "harjosari",
    postal_code: "20219",

    coordinate: "3.5521, 98.7018",

    position: "director",
    pic_name: "Andi",
    pic_phone: "081288899900",
    pic_email: "admin@sumberdata.id",

    username: "sumberdata",

    status: "pending",

    service: "dedicated",

    regis: "REGNPN20260515001",
    active_date: "-",
    nib: "9876543210",
    npwp: "98.765.432.1-012.000",
  },
};

/* =========================================================
   GLOBAL STATE
   ========================================================= */

let currentCustomerId = null;
let customerModalMode = "add";

/* =========================================================
   INIT
   ========================================================= */

function initCustomer() {
  initAddCustomer();

  initCustomerActions();

  initCloseModal();

  initPasswordToggle();

  initCustomerForm();

  initSearch();

  initFilter();

  initResetFilter();

  initExport();

  initEscapeKey();

  updateCustomerSummary();
}

/* =========================================================
   TAMBAH CUSTOMER
   ========================================================= */

function initAddCustomer() {
  const button = document.getElementById("openAddCustomer");

  if (!button) return;

  button.addEventListener("click", function () {
    openCustomerFormModal("add");
  });
}

/* =========================================================
   CUSTOMER ACTIONS
   DETAIL / EDIT / DELETE
   ========================================================= */

function initCustomerActions() {
  document.addEventListener("click", function (event) {
    const actionButton = event.target.closest("[data-action]");

    if (!actionButton) return;

    const action = actionButton.dataset.action;

    const id = actionButton.dataset.id;

    if (!id) return;

    if (action === "edit") {
      openCustomerFormModal("edit", id);

      return;
    }

    if (action === "delete") {
      openDeleteModal(id);

      return;
    }
  });
}

/* =========================================================
   OPEN FORM MODAL
   ========================================================= */

function openCustomerFormModal(mode = "add", id = null) {
  const modal = document.getElementById("customerFormModal");

  if (!modal) {
    console.error("customerFormModal tidak ditemukan.");

    return;
  }

  const form = document.getElementById("customerForm");

  if (!form) {
    console.error("customerForm tidak ditemukan.");

    return;
  }

  customerModalMode = mode;

  currentCustomerId = id;

  if (mode === "edit") {
    const customer = customerData[id];

    if (!customer) {
      showCustomerToast(
        "Data tidak ditemukan",
        "Customer yang ingin diedit tidak tersedia.",
        "error",
      );

      return;
    }

    fillCustomerForm(customer);

    setFormEditMode();
  } else {
    resetCustomerForm();

    setFormAddMode();
  }

  modal.hidden = false;

  modal.setAttribute("aria-hidden", "false");

  document.body.classList.add("customer-modal-open");

  setTimeout(function () {
    const firstInput = modal.querySelector(
      "input:not([type='hidden']):not([disabled])",
    );

    if (firstInput) {
      firstInput.focus();
    }
  }, 100);
}

/* =========================================================
   ADD MODE
   ========================================================= */

function setFormAddMode() {
  const title = document.getElementById("customerFormTitle");

  const saveText = document.getElementById("customerSaveText");

  if (title) {
    title.textContent = "Tambah Pelanggan";
  }

  if (saveText) {
    saveText.textContent = "Simpan Data";
  }
}

/* =========================================================
   EDIT MODE
   ========================================================= */

function setFormEditMode() {
  const title = document.getElementById("customerFormTitle");

  const saveText = document.getElementById("customerSaveText");

  if (title) {
    title.textContent = "Edit Pelanggan";
  }

  if (saveText) {
    saveText.textContent = "Simpan Perubahan";
  }
}

/* =========================================================
   FILL FORM
   ========================================================= */

function fillCustomerForm(customer) {
  setValue("customerType", customer.type);

  setValue("customerBusinessName", customer.businessName);

  setValue("customerPhone", customer.phone);

  setValue("customerEmail", customer.email);

  setValue("customerAddress", customer.address);

  setValue("customerProvince", customer.province);

  setValue("customerKabupaten", customer.kabupaten);

  setValue("customerKecamatan", customer.kecamatan);

  setValue("customerKelurahan", customer.kelurahan);

  setValue("customerPostalCode", customer.postal_code);

  setValue("customerCoordinate", customer.coordinate);

  setValue("customerPosition", customer.position);

  setValue("customerPicName", customer.pic_name);

  setValue("customerPicPhone", customer.pic_phone);

  setValue("customerPicEmail", customer.pic_email);

  setValue("customerUsername", customer.username);

  setValue("customerStatus", customer.status);

  setValue("customerService", customer.service);

  /*
   * Password sengaja dikosongkan
   * ketika EDIT.
   */

  const password = document.getElementById("customerPassword");

  const passwordConfirm = document.getElementById("customerPasswordConfirm");

  if (password) {
    password.value = "";

    password.required = false;

    password.placeholder = "Kosongkan jika tidak ingin mengubah";
  }

  if (passwordConfirm) {
    passwordConfirm.value = "";

    passwordConfirm.required = false;

    passwordConfirm.placeholder = "Ulangi password baru jika diubah";
  }
}

/* =========================================================
   SET VALUE
   ========================================================= */

function setValue(elementId, value) {
  const element = document.getElementById(elementId);

  if (!element) return;

  element.value = value ?? "";
}

/* =========================================================
   RESET FORM
   ========================================================= */

function resetCustomerForm() {
  const form = document.getElementById("customerForm");

  if (!form) return;

  form.reset();

  const password = document.getElementById("customerPassword");

  const passwordConfirm = document.getElementById("customerPasswordConfirm");

  if (password) {
    password.required = true;

    password.placeholder = "Masukkan password";
  }

  if (passwordConfirm) {
    passwordConfirm.required = true;

    passwordConfirm.placeholder = "Ulangi password";
  }

  currentCustomerId = null;
}

/* =========================================================
   CLOSE MODAL
   ========================================================= */

function initCloseModal() {
  document.addEventListener("click", function (event) {
    const closeButton = event.target.closest("[data-close-customer-modal]");

    if (!closeButton) return;

    closeCustomerModal();
  });
}

/* =========================================================
   CLOSE ALL CUSTOMER MODALS
   ========================================================= */

function closeCustomerModal() {
  const modals = document.querySelectorAll(".customer-modal");

  modals.forEach(function (modal) {
    modal.hidden = true;

    modal.setAttribute("aria-hidden", "true");
  });

  document.body.classList.remove("customer-modal-open");
}

/* =========================================================
   PASSWORD TOGGLE
   ========================================================= */

function initPasswordToggle() {
  document.addEventListener("click", function (event) {
    const button = event.target.closest(".customer-password-toggle");

    if (!button) return;

    const targetId = button.dataset.passwordTarget;

    const input = document.getElementById(targetId);

    if (!input) return;

    const icon = button.querySelector("i");

    if (input.type === "password") {
      input.type = "text";

      if (icon) {
        icon.classList.remove("fa-eye");

        icon.classList.add("fa-eye-slash");
      }

      button.setAttribute("aria-label", "Sembunyikan password");
    } else {
      input.type = "password";

      if (icon) {
        icon.classList.remove("fa-eye-slash");

        icon.classList.add("fa-eye");
      }

      button.setAttribute("aria-label", "Tampilkan password");
    }
  });
}

/* =========================================================
   FORM SUBMIT
   ========================================================= */

function initCustomerForm() {
  const form = document.getElementById("customerForm");

  if (!form) return;

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    if (!form.checkValidity()) {
      form.reportValidity();

      return;
    }

    const password = document.getElementById("customerPassword");

    const passwordConfirm = document.getElementById("customerPasswordConfirm");

    /*
     * Password hanya wajib sama
     * jika diisi.
     */

    if (
      password &&
      passwordConfirm &&
      password.value !== passwordConfirm.value
    ) {
      showCustomerToast(
        "Password tidak sama",
        "Pastikan password dan konfirmasi password sama.",
        "error",
      );

      passwordConfirm.focus();

      return;
    }

    const button = document.getElementById("customerSubmitButton");

    const saveText = document.getElementById("customerSaveText");

    if (button) {
      button.disabled = true;

      button.classList.add("is-loading");
    }

    if (customerModalMode === "edit") {
      if (saveText) {
        saveText.textContent = "Menyimpan...";
      }
    } else {
      if (saveText) {
        saveText.textContent = "Menyimpan...";
      }
    }

    /*
     * Dummy delay.
     * Nantinya ganti AJAX / fetch API.
     */

    setTimeout(function () {
      if (button) {
        button.disabled = false;

        button.classList.remove("is-loading");
      }

      if (customerModalMode === "edit") {
        showCustomerToast("Berhasil", "Data pelanggan berhasil diperbarui.");
      } else {
        showCustomerToast("Berhasil", "Pelanggan baru berhasil ditambahkan.");
      }

      closeCustomerModal();
    }, 700);
  });
}

/* =========================================================
   SEARCH
   ========================================================= */

function initSearch() {
  const search = document.getElementById("customerSearch");

  if (!search) return;

  search.addEventListener("input", function () {
    const keyword = search.value.toLowerCase().trim();

    filterCustomerRows(keyword);
  });
}

/* =========================================================
   FILTER
   ========================================================= */

function initFilter() {
  const filter = document.getElementById("customerFilter");

  if (!filter) return;

  filter.addEventListener("change", function () {
    const keyword =
      document.getElementById("customerSearch")?.value.toLowerCase().trim() ||
      "";

    filterCustomerRows(keyword);
  });
}

/* =========================================================
   FILTER ROW
   ========================================================= */

function filterCustomerRows(keyword = "") {
  const filter = document.getElementById("customerFilter");

  const filterValue = filter?.value || "all";

  const rows = document.querySelectorAll(".customer-table tbody tr");

  let visible = 0;

  rows.forEach(function (row) {
    const text = row.textContent.toLowerCase();

    const status = row.dataset.status || "";

    const type = row.dataset.type || "";

    const matchKeyword = !keyword || text.includes(keyword);

    const matchFilter =
      filterValue === "all" || filterValue === status || filterValue === type;

    const show = matchKeyword && matchFilter;

    row.style.display = show ? "" : "none";

    if (show) {
      visible++;
    }
  });

  const count = document.getElementById("visibleCustomerCount");

  if (count) {
    count.textContent = visible;
  }

  const empty = document.getElementById("customerEmpty");

  if (empty) {
    empty.hidden = visible !== 0;
  }
}

/* =========================================================
   RESET FILTER
   ========================================================= */

function initResetFilter() {
  const reset = document.getElementById("emptyReset");

  if (!reset) return;

  reset.addEventListener("click", function () {
    const search = document.getElementById("customerSearch");

    const filter = document.getElementById("customerFilter");

    if (search) {
      search.value = "";
    }

    if (filter) {
      filter.value = "all";
    }

    filterCustomerRows("");
  });
}

/* =========================================================
   DELETE MODAL
   ========================================================= */

function openDeleteModal(id) {
  const customer = customerData[id];

  if (!customer) return;

  currentCustomerId = id;

  const name = document.getElementById("deleteCustomerName");

  const regis = document.getElementById("deleteCustomerRegis");

  if (name) {
    name.textContent = customer.businessName;
  }

  if (regis) {
    regis.textContent = customer.regis;
  }

  const modal = document.getElementById("customerDeleteModal");

  if (!modal) return;

  modal.hidden = false;

  modal.setAttribute("aria-hidden", "false");

  document.body.classList.add("customer-modal-open");
}

/* =========================================================
   CONFIRM DELETE
   ========================================================= */

document.addEventListener("click", function (event) {
  const button = event.target.closest("#confirmDeleteCustomer");

  if (!button) return;

  const id = currentCustomerId;

  if (!id) return;

  const customer = customerData[id];

  /*
   * Dummy delete.
   * Nantinya ganti API.
   */

  delete customerData[id];

  closeCustomerModal();

  showCustomerToast("Berhasil", "Customer berhasil dihapus.");

  currentCustomerId = null;
});

/* =========================================================
   EXPORT
   ========================================================= */

function initExport() {
  const button = document.getElementById("exportCustomer");

  if (!button) return;

  button.addEventListener("click", function () {
    exportCustomersCSV();
  });
}

function exportCustomersCSV() {
  const rows = [
    [
      "No",
      "Nomor Registrasi",
      "Nama Pelanggan",
      "Jenis",
      "Username",
      "Telepon",
      "Email",
      "Status",
    ],
  ];

  Object.values(customerData).forEach(function (customer, index) {
    rows.push([
      index + 1,
      customer.regis,
      customer.businessName,
      customer.typeLabel,
      customer.username,
      customer.phone,
      customer.email,
      customer.status,
    ]);
  });

  const csv = rows
    .map(function (row) {
      return row
        .map(function (value) {
          return `"${String(value ?? "").replace(/"/g, '""')}"`;
        })
        .join(",");
    })
    .join("\n");

  const blob = new Blob([csv], {
    type: "text/csv;charset=utf-8;",
  });

  const url = URL.createObjectURL(blob);

  const link = document.createElement("a");

  link.href = url;

  link.download = "master-customer.csv";

  document.body.appendChild(link);

  link.click();

  link.remove();

  URL.revokeObjectURL(url);

  showCustomerToast("Export Berhasil", "Data customer berhasil diexport.");
}

/* =========================================================
   SUMMARY
   ========================================================= */

function updateCustomerSummary() {
  const customers = Object.values(customerData);

  const total = customers.length;

  const active = customers.filter(
    (customer) => customer.status === "active",
  ).length;

  const pending = customers.filter(
    (customer) => customer.status === "pending",
  ).length;

  setText("totalCustomer", total);

  setText("activeCustomer", active);

  setText("pendingCustomer", pending);
}

function setText(id, value) {
  const element = document.getElementById(id);

  if (element) {
    element.textContent = value;
  }
}

/* =========================================================
   ESC KEY
   ========================================================= */

function initEscapeKey() {
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeCustomerModal();
    }
  });
}

/* =========================================================
   TOAST
   ========================================================= */

function showCustomerToast(title, message, type = "success") {
  const toast = document.getElementById("customerToast");

  if (!toast) {
    alert(title + "\n\n" + message);

    return;
  }

  const titleElement = document.getElementById("customerToastTitle");

  const messageElement = document.getElementById("customerToastMessage");

  if (titleElement) {
    titleElement.textContent = title;
  }

  if (messageElement) {
    messageElement.textContent = message;
  }

  toast.classList.remove("show", "error");

  if (type === "error") {
    toast.classList.add("error");
  }

  requestAnimationFrame(function () {
    toast.classList.add("show");
  });

  clearTimeout(window.customerToastTimer);

  window.customerToastTimer = setTimeout(function () {
    toast.classList.remove("show");
  }, 3200);
}
