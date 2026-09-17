const form = document.getElementById("registerForm");
const submitButton = document.getElementById("submitButton");
const message = document.getElementById("formMessage");

const fields = {
  customerType: "Jenis pelanggan",
  businessName: "Nama pelaku usaha",
  businessPhone: "No. telepon",
  email: "Email",
  address: "Alamat kantor",
  province: "Provinsi",
  regency: "Kabupaten / Kota",
  district: "Kecamatan",
  village: "Kelurahan / Desa",
  postalCode: "Kode pos",
  coordinate: "Titik koordinat",
  position: "Jabatan",
  fullName: "Nama lengkap",
  picPhone: "No. telepon PIC",
  username: "Username",
  password: "Password",
  confirmPassword: "Ulangi password",
};

function errorElement(id) {
  return document.getElementById(id + "Error");
}

function clearValidation() {
  Object.keys(fields).forEach((id) => {
    const element = document.getElementById(id);
    const error = errorElement(id);

    if (element) element.classList.remove("invalid");
    if (error) error.textContent = "";
  });

  message.textContent = "";
  message.className = "message";
}

function setError(id, text) {
  const element = document.getElementById(id);
  const error = errorElement(id);

  if (element) element.classList.add("invalid");
  if (error) error.textContent = text;
}

function validateForm() {
  let valid = true;

  Object.keys(fields).forEach((id) => {
    const element = document.getElementById(id);

    if (!element || !element.value.trim()) {
      setError(id, fields[id] + " wajib diisi.");
      valid = false;
    }
  });

  const email = document.getElementById("email");

  if (email.value.trim()) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email.value.trim())) {
      setError("email", "Format email tidak valid.");
      valid = false;
    }
  }

  const username = document.getElementById("username");

  if (username.value.trim()) {
    if (!/^[a-zA-Z0-9._-]{4,30}$/.test(username.value.trim())) {
      setError("username", "Username 4–30 karakter tanpa spasi.");
      valid = false;
    }
  }

  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirmPassword");

  if (password.value.length > 0 && password.value.length < 8) {
    setError("password", "Password minimal 8 karakter.");
    valid = false;
  }

  if (
    password.value &&
    confirmPassword.value &&
    password.value !== confirmPassword.value
  ) {
    setError("confirmPassword", "Password tidak sama.");
    valid = false;
  }

  const postalCode = document.getElementById("postalCode");

  if (postalCode.value && !/^\d{5}$/.test(postalCode.value)) {
    setError("postalCode", "Kode pos harus 5 digit.");
    valid = false;
  }

  const terms = document.getElementById("terms");

  if (!terms.checked) {
    message.textContent = "Anda harus menyetujui Syarat & Ketentuan.";
    message.className = "message error";
    valid = false;
  }

  return valid;
}

/* PASSWORD SHOW/HIDE */
document.querySelectorAll(".toggle-password").forEach((button) => {
  button.addEventListener("click", () => {
    const target = document.getElementById(button.dataset.target);

    const visible = target.type === "text";

    target.type = visible ? "password" : "text";

    button.textContent = visible ? "Show" : "Hide";
  });
});

/* PASSWORD STRENGTH */
const password = document.getElementById("password");

const strengthBar = document.getElementById("strengthBar");

const strengthText = document.getElementById("strengthText");

password.addEventListener("input", () => {
  const value = password.value;

  let score = 0;

  if (value.length >= 8) score++;
  if (/[A-Z]/.test(value)) score++;
  if (/[0-9]/.test(value)) score++;
  if (/[^A-Za-z0-9]/.test(value)) score++;

  const widths = ["0%", "25%", "50%", "75%", "100%"];

  strengthBar.style.width = widths[score];

  const labels = [
    "Gunakan minimal 8 karakter.",
    "Password lemah.",
    "Password cukup.",
    "Password kuat.",
    "Password sangat kuat.",
  ];

  strengthText.textContent = labels[score];
});

/* CLEAR FIELD ERRORS */
Object.keys(fields).forEach((id) => {
  const element = document.getElementById(id);

  if (!element) return;

  element.addEventListener("input", () => {
    element.classList.remove("invalid");

    const error = errorElement(id);

    if (error) error.textContent = "";

    message.textContent = "";
  });

  element.addEventListener("change", () => {
    element.classList.remove("invalid");

    const error = errorElement(id);

    if (error) error.textContent = "";
  });
});

/* SUBMIT */
form.addEventListener("submit", (event) => {
  event.preventDefault();

  clearValidation();

  if (!validateForm()) return;

  submitButton.classList.add("loading");

  /*
                HUBUNGKAN KE BACKEND YII2 DI SINI.

                Contoh:

                const formData = new FormData(form);

                fetch("/site/register", {
                    method: "POST",
                    body: formData
                })
                .then(...)
            */

  setTimeout(() => {
    submitButton.classList.remove("loading");

    message.textContent =
      "Registrasi berhasil divalidasi. Silakan lanjutkan proses verifikasi.";

    message.className = "message success";
  }, 900);
});

/* BACK TO LOGIN */
function goToLogin() {
  window.location.href = "../index";
}

document.getElementById("loginLink").addEventListener("click", goToLogin);

document.getElementById("cancelButton").addEventListener("click", goToLogin);
