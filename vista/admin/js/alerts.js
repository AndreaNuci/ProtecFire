/* ============================
   Alertas
   ============================ */

function renderAlertsTable() {
  const sev = $("#filterSeverity").value;
  const st = $("#filterStatus").value;

  const filtered = alerts
    .slice()
    .sort((a, b) => b.at - a.at)
    .filter(a => !sev || a.severity === sev)
    .filter(a => !st || a.status === st);

  const tbody = $("#tblAlerts");
  tbody.innerHTML = filtered.map(a => `
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

  $$("[data-resolve]").forEach(btn => {
    btn.addEventListener("click", () => resolveAlert(Number(btn.dataset.resolve)));
  });

  $$("[data-viewalert]").forEach(btn => {
    btn.addEventListener("click", () => viewAlert(Number(btn.dataset.viewalert)));
  });
}

function resolveAlert(id) {
  const a = alerts.find(x => x.id === id);
  if (!a) return;
  a.status = "Resuelta";
  renderAll();
}

function viewAlert(id) {
  const a = alerts.find(x => x.id === id);
  if (!a) return;

  openModal({
    title: `Alerta #${a.id}`,
    bodyHTML: `
      <div style="display:flex;flex-direction:column;gap:10px;">
        <div><b>Fecha/Hora:</b> ${fmtDateTime(a.at)}</div>
        <div><b>Zona:</b> ${zoneName(a.zoneId)} (${a.zoneId})</div>
        <div><b>Dispositivo:</b> ${a.deviceId}</div>
        <div><b>Tipo:</b> ${a.type}</div>
        <div><b>Valor:</b> ${a.value}${a.type === "Temperatura" ? "°C" : "ppm"}</div>
        <div><b>Severidad:</b> <span class="${severityBadge(a.severity)}">${a.severity}</span></div>
        <div><b>Estado:</b> <span class="${statusBadge(a.status)}">${a.status}</span></div>
        <div style="color:#aab4c3;font-size:12px;line-height:1.4">
          Sugerencia: Verificar la zona, validar sensor y confirmar si la condición persiste.
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cerrar</button>
      ${a.status === "Pendiente" ? `<button class="btn btn--primary" id="modalResolve">Resolver</button>` : ""}
    `
  });

  $("#modalResolve")?.addEventListener("click", () => {
    resolveAlert(a.id);
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
}

$("#filterSeverity").addEventListener("change", renderAlertsTable);
$("#filterStatus").addEventListener("change", renderAlertsTable);

$("#btnBulkResolve").addEventListener("click", () => {
  alerts.forEach(a => {
    if (a.status === "Pendiente") a.status = "Resuelta";
  });
  renderAll();
});