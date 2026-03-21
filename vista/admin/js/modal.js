/* ============================
   Modal
   ============================ */

// ✅ UI: abrir modal (interfaz visual)
function openModal({ title, bodyHTML, footHTML }) {
  modalTitle.textContent = title || "Modal";
  modalBody.innerHTML = bodyHTML || "";
  modalFoot.innerHTML = footHTML || "";
  modal.classList.add("is-open");
  modal.setAttribute("aria-hidden", "false");
}

// ✅ UI: cerrar modal
function closeModal() {
  modal.classList.remove("is-open");
  modal.setAttribute("aria-hidden", "true");
}

// ✅ UI: botones de cierre
$$("[data-close]").forEach(x => x.addEventListener("click", closeModal));

// ✅ UI: cerrar con tecla ESC
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") closeModal();
});