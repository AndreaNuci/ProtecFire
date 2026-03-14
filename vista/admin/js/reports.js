/* ============================
   Reportes
   ============================ */

$("#btnGenerateReport").addEventListener("click", () => {
  const type = $("#repType").value;
  const from = $("#repFrom").value || "N/A";
  const to = $("#repTo").value || "N/A";

  let html = `
    <div style="display:flex;flex-direction:column;gap:10px">
      <div><b>Tipo:</b> ${type}</div>
      <div><b>Rango:</b> ${from} → ${to}</div>
      <hr style="border:0;border-top:1px solid rgba(255,255,255,.08)">
  `;

  if (type === "alertas") {
    const total = alerts.length;
    const pending = alerts.filter(a => a.status === "Pendiente").length;
    const high = alerts.filter(a => a.severity === "Alta").length;

    html += `
      <div><b>Total:</b> ${total}</div>
      <div><b>Pendientes:</b> ${pending}</div>
      <div><b>Severidad Alta:</b> ${high}</div>
    `;
  } else if (type === "lecturas") {
    const last = trend[trend.length - 1];
    html += `
      <div><b>Lecturas almacenadas (mock):</b> ${trend.length}</div>
      <div><b>Última:</b> ${last.temp}°C • ${last.smoke}ppm • ${last.gas}ppm</div>
    `;
  } else {
    const online = devices.filter(d => d.online).length;
    const offline = devices.filter(d => !d.online).length;
    html += `
      <div><b>Dispositivos:</b> ${devices.length}</div>
      <div><b>Online:</b> ${online}</div>
      <div><b>Offline:</b> ${offline}</div>
    `;
  }

  html += `</div>`;
  $("#reportPreview").innerHTML = html;
});

$("#btnExportCSV").addEventListener("click", () => {
  const header = ["id", "fecha", "zona", "dispositivo", "tipo", "valor", "severidad", "estado"];

  const rows = alerts
    .slice()
    .sort((a, b) => b.at - a.at)
    .map(a => [
      a.id,
      fmtDateTime(a.at),
      zoneName(a.zoneId),
      a.deviceId,
      a.type,
      a.value,
      a.severity,
      a.status
    ]);

  const csv = [header, ...rows]
    .map(r => r.map(x => `"${String(x).replaceAll('"', '""')}"`).join(","))
    .join("\n");

  const blob = new Blob([csv], { type: "text/csv;charset=utf-8" });
  const url = URL.createObjectURL(blob);

  const a = document.createElement("a");
  a.href = url;
  a.download = `protecfire_${Date.now()}_alertas.csv`;
  document.body.appendChild(a);
  a.click();
  a.remove();
  URL.revokeObjectURL(url);
});