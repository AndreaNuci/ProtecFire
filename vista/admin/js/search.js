/* ============================
   Búsqueda global
   ============================ */

$("#globalSearch").addEventListener("input", (e) => {
  const q = e.target.value.trim().toLowerCase();

  if (!q) {
    renderAll();
    return;
  }

  const alertsFiltered = alerts.filter(a =>
    String(a.id).includes(q) ||
    zoneName(a.zoneId).toLowerCase().includes(q) ||
    a.deviceId.toLowerCase().includes(q) ||
    a.type.toLowerCase().includes(q) ||
    a.status.toLowerCase().includes(q) ||
    a.severity.toLowerCase().includes(q)
  );

  const devicesFiltered = devices.filter(d =>
    d.id.toLowerCase().includes(q) ||
    zoneName(d.zoneId).toLowerCase().includes(q) ||
    d.type.toLowerCase().includes(q)
  );

  if ($("#view-alerts").classList.contains("is-visible")) {
    $("#tblAlerts").innerHTML = alertsFiltered
      .slice()
      .sort((a, b) => b.at - a.at)
      .map(a => `
        <tr>
          <td>${a.id}</td>
          <td>${fmtDateTime(a.at)}</td>
          <td>${zoneName(a.zoneId)}</td>
          <td>${a.deviceId}</td>
          <td>${a.type}</td>
          <td>${a.value}${a.type === "Temperatura" ? "°C" : "ppm"}</td>
          <td><span class="${severityBadge(a.severity)}">${a.severity}</span></td>
          <td><span class="${statusBadge(a.status)}">${a.status}</span></td>
          <td class="right">
            ${a.status === "Pendiente"
              ? `<button class="btn btn--primary" data-resolve="${a.id}">Resolver</button>`
              : `<button class="btn btn--ghost" data-viewalert="${a.id}">Ver</button>`
            }
          </td>
        </tr>
      `).join("");

    $$("[data-resolve]").forEach(btn => btn.addEventListener("click", () => resolveAlert(Number(btn.dataset.resolve))));
    $$("[data-viewalert]").forEach(btn => btn.addEventListener("click", () => viewAlert(Number(btn.dataset.viewalert))));
  }

  if ($("#view-devices").classList.contains("is-visible")) {
    $("#tblDevices").innerHTML = devicesFiltered.map(d => {
      const sig = rssiLabel(d.rssi);
      const online = d.online ? `<span class="badge badge--ok">Sí</span>` : `<span class="badge badge--bad">No</span>`;
      const batCls = d.battery >= 60 ? "badge--ok" : (d.battery >= 30 ? "badge--warn" : "badge--bad");

      return `
        <tr>
          <td>${d.id}</td>
          <td>${zoneName(d.zoneId)}</td>
          <td>${d.type}</td>
          <td>${online}</td>
          <td><span class="badge ${sig.cls}">${sig.label}</span></td>
          <td><span class="badge ${batCls}">${d.battery}%</span></td>
          <td class="right">
            <button class="btn btn--ghost" data-show="${d.id}">Ver</button>
            <button class="btn btn--ghost" data-edit="${d.id}">Editar</button>
          </td>
        </tr>
      `;
    }).join("");

    $$("[data-show]").forEach(btn => btn.addEventListener("click", () => showDevice(btn.dataset.show)));
    $$("[data-edit]").forEach(btn => btn.addEventListener("click", () => editDevice(btn.dataset.edit)));
  }
});

$("#btnLogout").addEventListener("click", () => {
  openModal({
    title: "Cerrar sesión",
    bodyHTML: `¿Deseas cerrar sesión? (mock)`,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cancelar</button>
      <button class="btn btn--primary" id="doLogout">Salir</button>
    `
  });

  $("#doLogout").addEventListener("click", () => {
    closeModal();
    alert("Sesión cerrada (mock). Redirige aquí a tu login.");
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
});