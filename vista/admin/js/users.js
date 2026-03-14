/* ============================
   Usuarios
   ============================ */

function renderUsersTable() {
  const tbody = $("#tblUsers");

  tbody.innerHTML = users.map((u, idx) => {
    const stCls = u.status === "Activo" ? "badge--ok" : "badge--warn";
    return `
      <tr>
        <td>${u.name}</td>
        <td>${u.email}</td>
        <td>${u.role}</td>
        <td><span class="badge ${stCls}">${u.status}</span></td>
        <td class="right">
          <button class="btn btn--ghost" data-edituser="${idx}">Editar</button>
          <button class="btn btn--ghost" data-toggleuser="${idx}">
            ${u.status === "Activo" ? "Suspender" : "Activar"}
          </button>
        </td>
      </tr>
    `;
  }).join("");

  $$("[data-edituser]").forEach(btn => btn.addEventListener("click", () => editUser(Number(btn.dataset.edituser))));
  $$("[data-toggleuser]").forEach(btn => btn.addEventListener("click", () => toggleUser(Number(btn.dataset.toggleuser))));
}

function editUser(idx) {
  const u = users[idx];
  if (!u) return;

  openModal({
    title: "Editar usuario",
    bodyHTML: `
      <div class="form">
        <div class="field">
          <label class="label">Nombre</label>
          <input class="input" id="uName" value="${u.name}" />
        </div>
        <div class="field">
          <label class="label">Correo</label>
          <input class="input" id="uEmail" value="${u.email}" />
        </div>
        <div class="field">
          <label class="label">Rol</label>
          <select class="input" id="uRole">
            ${["Administrador", "Operador", "Visor"].map(r => `<option ${r === u.role ? "selected" : ""}>${r}</option>`).join("")}
          </select>
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cancelar</button>
      <button class="btn btn--primary" id="btnSaveUser">Guardar</button>
    `
  });

  $("#btnSaveUser").addEventListener("click", () => {
    u.name = $("#uName").value.trim() || u.name;
    u.email = $("#uEmail").value.trim() || u.email;
    u.role = $("#uRole").value;
    renderUsersTable();
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
}

function toggleUser(idx) {
  const u = users[idx];
  if (!u) return;
  u.status = u.status === "Activo" ? "Suspendido" : "Activo";
  renderUsersTable();
}

$("#btnAddUser").addEventListener("click", () => {
  openModal({
    title: "Nuevo usuario",
    bodyHTML: `
      <div class="form">
        <div class="field">
          <label class="label">Nombre</label>
          <input class="input" id="nuName" placeholder="Nombre Apellido" />
        </div>
        <div class="field">
          <label class="label">Correo</label>
          <input class="input" id="nuEmail" placeholder="correo@dominio.com" />
        </div>
        <div class="field">
          <label class="label">Rol</label>
          <select class="input" id="nuRole">
            <option>Administrador</option>
            <option>Operador</option>
            <option>Visor</option>
          </select>
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cancelar</button>
      <button class="btn btn--primary" id="btnCreateUser">Crear</button>
    `
  });

  $("#btnCreateUser").addEventListener("click", () => {
    const name = $("#nuName").value.trim();
    const email = $("#nuEmail").value.trim();
    const role = $("#nuRole").value;

    if (!name || !email) {
      alert("Nombre y correo son obligatorios.");
      return;
    }

    users.push({ name, email, role, status: "Activo" });
    renderUsersTable();
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
});