/* =========================================================
   NPN ISP
   REPORT TODAY DETAIL
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
  initReportTodayDetail();
});

/* =========================================================
   MAIN INITIALIZATION
   ========================================================= */

function initReportTodayDetail() {
  const editorCard = document.getElementById("editorCard");
  const addDetailButton = document.getElementById("addDetailButton");
  const historyAddButton = document.getElementById("historyAddButton");
  const closeEditor = document.getElementById("closeEditor");
  const cancelEditor = document.getElementById("cancelEditor");
  const saveInformation = document.getElementById("saveInformation");
  const markDoneButton = document.getElementById("markDoneButton");

  let editor = null;

  /* =======================================================
     OPEN EDITOR
     ======================================================= */

  function openEditor() {
    if (!editorCard) return;

    editorCard.hidden = false;

    setTimeout(function () {
      editorCard.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
    }, 50);

    /* Initialize CKEditor only once */

    if (!editor) {
      const textarea = document.getElementById("detailEditor");

      if (!textarea) {
        console.error("Textarea #detailEditor tidak ditemukan.");
        return;
      }

      if (typeof ClassicEditor === "undefined") {
        console.error("CKEditor belum dimuat.");

        showToast("CKEditor belum berhasil dimuat.");

        return;
      }

      ClassicEditor.create(textarea, {
        toolbar: [
          "heading",
          "|",

          "bold",
          "italic",
          "underline",

          "|",

          "link",

          "bulletedList",
          "numberedList",

          "|",

          "blockQuote",

          "insertTable",

          "|",

          "undo",
          "redo",
        ],

        placeholder:
          "Tuliskan informasi, progress, kendala, atau tindak lanjut...",
      })

        .then(function (createdEditor) {
          editor = createdEditor;

          console.log("CKEditor berhasil diinisialisasi.");
        })

        .catch(function (error) {
          console.error("CKEditor error:", error);

          showToast("CKEditor gagal dimuat.");
        });
    }
  }

  /* =======================================================
     CLOSE EDITOR
     ======================================================= */

  function closeEditorBox() {
    if (!editorCard) return;

    editorCard.hidden = true;
  }

  /* =======================================================
     BUTTON EVENTS
     ======================================================= */

  if (addDetailButton) {
    addDetailButton.addEventListener("click", function () {
      openEditor();
    });
  }

  if (historyAddButton) {
    historyAddButton.addEventListener("click", function () {
      openEditor();
    });
  }

  if (closeEditor) {
    closeEditor.addEventListener("click", function () {
      closeEditorBox();
    });
  }

  if (cancelEditor) {
    cancelEditor.addEventListener("click", function () {
      if (editor) {
        editor.setData("");
      }

      closeEditorBox();
    });
  }

  /* =======================================================
     SAVE INFORMATION
     ======================================================= */

  if (saveInformation) {
    saveInformation.addEventListener("click", function () {
      saveReportInformation();
    });
  }

  /* =======================================================
     MARK DONE
     ======================================================= */

  if (markDoneButton) {
    markDoneButton.addEventListener("click", function () {
      markReportAsDone();
    });
  }

  /* =======================================================
     SAVE FUNCTION
     ======================================================= */

  function saveReportInformation() {
    if (!editor) {
      showToast("Editor belum siap.");

      return;
    }

    const content = editor.getData().trim();

    /* Remove HTML for empty validation */

    const plainText = content
      .replace(/<[^>]*>/g, "")
      .replace(/&nbsp;/g, " ")
      .trim();

    if (!plainText) {
      showToast("Silakan isi informasi terlebih dahulu.");

      return;
    }

    const timeline = document.getElementById("historyTimeline");

    if (!timeline) return;

    /* =====================================================
       CREATE TIMELINE ITEM
       ===================================================== */

    const item = document.createElement("div");

    item.className = "timeline-item";

    /* Current date */

    const now = new Date();

    const date = formatDate(now);

    const time = formatTime(now);

    /* Current user */

    const creator =
      document.getElementById("detailCreator")?.textContent.trim() ||
      "Administrator";

    item.innerHTML = `

      <div class="timeline-icon">

        <i class="fa-solid fa-pen"></i>

      </div>


      <div>

        <div class="timeline-header">

          <strong>
            Informasi terbaru
          </strong>

          <span>
            ${date} · ${time}
          </span>

        </div>


        <div class="timeline-body">

          ${content}

          <div style="
            margin-top:8px;
            color:#9aa5b3;
            font-size:8px;
          ">

            Ditambahkan oleh
            <strong>${escapeHtml(creator)}</strong>

          </div>

        </div>

      </div>

    `;

    /* Add newest item at top */

    timeline.prepend(item);

    /* Clear editor */

    editor.setData("");

    /* Close */

    closeEditorBox();

    /* Update history counter */

    updateHistoryCount();

    /* Toast */

    showToast("Informasi berhasil ditambahkan.");
  }

  /* =======================================================
     MARK AS DONE
     ======================================================= */

  function markReportAsDone() {
    const statusElements = document.querySelectorAll(".detail-status");

    statusElements.forEach(function (element) {
      element.classList.remove("progress");

      element.classList.add("done");

      element.innerHTML = `

        <i class="fa-solid fa-circle"></i>

        Done

      `;
    });

    /* Hero status */

    const detailStatusInfo = document.getElementById("detailStatusInfo");

    if (detailStatusInfo) {
      detailStatusInfo.textContent = "Done";
    }

    /* Sidebar status */

    const sideStatus = document.getElementById("sideStatus");

    if (sideStatus) {
      sideStatus.textContent = "Done";

      sideStatus.style.color = "#087b57";
    }

    /* Status description */

    const sideStatusDescription = document.getElementById(
      "sideStatusDescription",
    );

    if (sideStatusDescription) {
      sideStatusDescription.textContent = "Pekerjaan telah selesai";
    }

    /* Dot */

    const statusDot = document.getElementById("statusDot");

    if (statusDot) {
      statusDot.classList.remove("progress");

      statusDot.classList.add("done");
    }

    /* Button */

    const button = document.getElementById("markDoneButton");

    if (button) {
      button.innerHTML = `

        <i class="fa-solid fa-check"></i>

        Sudah Selesai

      `;

      button.disabled = true;

      button.style.opacity = "0.65";

      button.style.cursor = "default";
    }

    /* Toast */

    showToast("Laporan berhasil ditandai selesai.");
  }

  /* =======================================================
     HISTORY COUNTER
     ======================================================= */

  function updateHistoryCount() {
    const timeline = document.getElementById("historyTimeline");

    const counter = document.getElementById("historyCount");

    if (!timeline || !counter) {
      return;
    }

    const total = timeline.querySelectorAll(".timeline-item").length;

    counter.textContent = total + " Aktivitas";
  }

  /* =======================================================
     TOAST
     ======================================================= */

  function showToast(message) {
    const toast = document.getElementById("detailToast");

    if (!toast) return;

    toast.textContent = message;

    toast.classList.add("show");

    clearTimeout(window.reportToastTimer);

    window.reportToastTimer = setTimeout(function () {
      toast.classList.remove("show");
    }, 2800);
  }

  /* =======================================================
     DATE FORMAT
     ======================================================= */

  function formatDate(date) {
    const day = String(date.getDate()).padStart(2, "0");

    const month = String(date.getMonth() + 1).padStart(2, "0");

    const year = date.getFullYear();

    return `${day}-${month}-${year}`;
  }

  /* =======================================================
     TIME FORMAT
     ======================================================= */

  function formatTime(date) {
    const hours = String(date.getHours()).padStart(2, "0");

    const minutes = String(date.getMinutes()).padStart(2, "0");

    const seconds = String(date.getSeconds()).padStart(2, "0");

    return `${hours}:${minutes}:${seconds}`;
  }

  /* =======================================================
     ESCAPE HTML
     ======================================================= */

  function escapeHtml(value) {
    const div = document.createElement("div");

    div.textContent = value;

    return div.innerHTML;
  }

  /* =======================================================
     INITIAL HISTORY COUNT
     ======================================================= */

  updateHistoryCount();
}
