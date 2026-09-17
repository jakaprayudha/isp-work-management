const form = document.getElementById("loginForm");

const username = document.getElementById("username");

const password = document.getElementById("password");

const usernameError = document.getElementById("usernameError");

const passwordError = document.getElementById("passwordError");

const loginButton = document.getElementById("loginButton");

const togglePassword = document.getElementById("togglePassword");

const forgotPassword = document.getElementById("forgotPassword");

const registerButton = document.getElementById("registerButton");

const formMessage = document.getElementById("formMessage");

/* =====================================================
         PASSWORD TOGGLE
      ===================================================== */

togglePassword.addEventListener("click", function () {
  const visible = password.type === "text";

  password.type = visible ? "password" : "text";

  togglePassword.textContent = visible ? "Show" : "Hide";
});

/* =====================================================
         VALIDATION
      ===================================================== */

function validateForm() {
  let valid = true;

  username.classList.remove("invalid");

  password.classList.remove("invalid");

  usernameError.textContent = "";

  passwordError.textContent = "";

  if (!username.value.trim()) {
    username.classList.add("invalid");

    usernameError.textContent = "Username wajib diisi.";

    valid = false;
  }

  if (!password.value) {
    password.classList.add("invalid");

    passwordError.textContent = "Password wajib diisi.";

    valid = false;
  }

  return valid;
}

/* =====================================================
         INPUT CLEANUP
      ===================================================== */

username.addEventListener("input", function () {
  username.classList.remove("invalid");

  usernameError.textContent = "";
});

password.addEventListener("input", function () {
  password.classList.remove("invalid");

  passwordError.textContent = "";
});

/* =====================================================
         LOGIN
      ===================================================== */

form.addEventListener("submit", function (event) {
  event.preventDefault();

  formMessage.textContent = "";

  formMessage.className = "message";

  if (!validateForm()) {
    return;
  }

  loginButton.classList.add("loading");

  /*
              =================================================
              BACKEND YII2

              Nantinya bagian ini dapat diganti dengan:

              fetch("/site/login", {
                  method: "POST",
                  headers: {
                      "Content-Type":
                          "application/json"
                  },
                  body: JSON.stringify({
                      username:
                          username.value,
                      password:
                          password.value
                  })
              })

              =================================================
              */

  setTimeout(function () {
    loginButton.classList.remove("loading");

    formMessage.textContent = "Login berhasil divalidasi.";

    formMessage.classList.add("success");
  }, 900);
});

/* =====================================================
         FORGOT PASSWORD
      ===================================================== */

forgotPassword.addEventListener("click", function () {
  formMessage.textContent = "Silakan lanjut ke halaman reset password.";

  formMessage.className = "message info";
});

/* =====================================================
         REGISTER
      ===================================================== */

registerButton.addEventListener("click", function () {
  formMessage.textContent = "Silakan lanjut ke halaman registrasi.";

  formMessage.className = "message info";
});
