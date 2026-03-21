/* ============================
   Alertas
   ============================ */

function renderAlertsTable() {

  // ❌ IoT: filtros de datos
  /*
  const sev = $("#filterSeverity").value;
  const st = $("#filterStatus").value;
  */

  // ❌ IoT: procesamiento de alertas
  /*
  const filtered = alerts
    .slice()
    .sort((a, b) => b.at - a.at)
    .filter(a => !sev || a.severity === sev)
    .filter(a => !st || a.status === st);
  */

  const tbody = $("#tblAlerts");

  // ✅ UI: render visual (se deja activo)
  tbody.innerHTML = `
    <tr>
      <td colspan="9" style="text-align:center;">Vista deshabilitada (IoT comentado)</td>
    </tr>
  `;

  // ❌ IoT: eventos ligados a lógica de datos
  /*
  $$("[data-resolve]").forEach(btn => {
    btn.addEventListener("click", () => resolveAlert(Number(btn.dataset.resolve)));
  });

  $$("[data-viewalert]").forEach(btn => {
    btn.addEventListener("click", () => viewAlert(Number(btn.dataset.viewalert)));
  });*/
}


// ❌ IoT: cambiar estado de alerta
/*
function resolveAlert(id) {
  const a = alerts.find(x => x.id === id);
  if (!a) return;

  a.status = "Resuelta";
  renderAll();
}
*/


// ❌ IoT: obtener detalles de alerta
/*
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
        <div>
          Sugerencia: Verificar la zona, validar sensor y confirmar si la condición persiste.
        </div>
      </div>
    `,
    footHTML: `
      <button data-close="1">Cerrar</button>
      ${a.status === "Pendiente" ? `<button id="modalResolve">Resolver</button>` : ""}
    `
  });

  $("#modalResolve")?.addEventListener("click", () => {
    resolveAlert(a.id);
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
}
*/


// ❌ IoT: filtros que afectan datos
/*
$("#filterSeverity").addEventListener("change", renderAlertsTable);
$("#filterStatus").addEventListener("change", renderAlertsTable);
*/


// ❌ IoT: acción masiva sobre datos
/*
$("#btnBulkResolve").addEventListener("click", () => {
  alerts.forEach(a => {
    if (a.status === "Pendiente") a.status = "Resuelta";
  });
  renderAll();
});
*/