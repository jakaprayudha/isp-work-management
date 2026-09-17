const form = document.getElementById("forgotForm");

const identity = document.getElementById("identity");

const identityError = document.getElementById("identityError");

const submitButton = document.getElementById("submitButton");

const formMessage = document.getElementById("formMessage");

const backLogin = document.getElementById("backLogin");

/* =====================================================
         VALIDATION
      ===================================================== */

function validateForm() {
  let valid = true;

  identity.classList.remove("invalid");

  identityError.textContent = "";

  if (!identity.value.trim()) {
    identity.classList.add("invalid");

    identityError.textContent = "Email atau username wajib diisi.";

    valid = false;
  }

  return valid;
}

/* =====================================================
         INPUT
      ===================================================== */

identity.addEventListener("input", function () {
  identity.classList.remove("invalid");

  identityError.textContent = "";

  formMessage.textContent = "";
});

/* =====================================================
         SUBMIT
      ===================================================== */

form.addEventListener("submit", function (event) {
  event.preventDefault();

  formMessage.textContent = "";

  formMessage.className = "message";

  if (!validateForm()) {
    return;
  }

  submitButton.classList.add("loading");

  /*
              =================================================
              BACKEND YII2

              Contoh:

              fetch("/site/forgot-password", {

                  method: "POST",

                  headers: {
                      "Content-Type":
                          "application/json"
                  },

                  body: JSON.stringify({
                      identity:
                          identity.value
                  })

              })

              =================================================
              */

  setTimeout(function () {
    submitButton.classList.remove("loading");

    formMessage.textContent =
      "Jika akun ditemukan, instruksi reset password telah dikirim.";

    formMessage.className = "message success";

    identity.value = "";
  }, 1000);
});

/* =====================================================
         BACK TO LOGIN
      ===================================================== */

backLogin.addEventListener("click", function () {
  /*
   * Jika menggunakan Yii2:
   *
   * window.location.href =
   *     "/site/login";
   *
   */

  window.history.back();
});
