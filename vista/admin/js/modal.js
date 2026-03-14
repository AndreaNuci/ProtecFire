/* ============================
   Modal
   ============================ */

function openModal({ title, bodyHTML, footHTML }) {
  modalTitle.textContent = title || "Modal";
  modalBody.innerHTML = bodyHTML || "";
  modalFoot.innerHTML = footHTML || "";
  modal.classList.add("is-open");
  modal.setAttribute("aria-hidden", "false");
}

function closeModal() {
  modal.classList.remove("is-open");
  modal.setAttribute("aria-hidden", "true");
}

$$("[data-close]").forEach(x => x.addEventListener("click", closeModal));

document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") closeModal();
});