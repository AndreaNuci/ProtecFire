/* ============================
   Navegación
   ============================ */

function openView(key) {
  Object.entries(views).forEach(([k, el]) => {
    el.classList.toggle("is-visible", k === key);
  });

  viewTitle.textContent = keyLabel(key);
  viewSubtitle.textContent = subtitles[key] || "";
}

$$(".nav__item").forEach(btn => {
  btn.addEventListener("click", () => {
    $$(".nav__item").forEach(b => b.classList.remove("is-active"));
    btn.classList.add("is-active");
    openView(btn.dataset.view);
  });
});

$$("[data-go]").forEach(btn => {
  btn.addEventListener("click", () => {
    const target = btn.dataset.go;
    const navBtn = $(`.nav__item[data-view="${target}"]`);
    if (navBtn) navBtn.click();
  });
});

$("#btnToggleSidebar")?.addEventListener("click", () => {
  sidebar.classList.toggle("is-open");
});

document.addEventListener("click", (e) => {
  if (window.innerWidth <= 860 && sidebar.classList.contains("is-open")) {
    const clickedInside = e.target.closest(".sidebar") || e.target.closest("#btnToggleSidebar");
    if (!clickedInside) sidebar.classList.remove("is-open");
  }
});

/* ============================
   Logout
   ============================ */

$("#btnLogout")?.addEventListener("click", () => {
  window.location.href = "/controlador/logout.php";
});