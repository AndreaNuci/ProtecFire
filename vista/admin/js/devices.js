/* ============================
   Dispositivos
   ============================ */

function renderDevicesTable() {
  const tbody = $("#tblDevices");

  tbody.innerHTML = devices.map(d => {
    const sig = rssiLabel(d.rssi);
    const online = d.online
      ? `<span class="badge badge--ok">Sí</span>`
      : `<span class="badge badge--bad">No</span>`;
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

function showDevice(deviceId) {
  const d = devices.find(x => x.id === deviceId);
  if (!d) return;

  const z = zones.find(x => x.id === d.zoneId);
  const history = trend.slice(-8);
  const sig = rssiLabel(d.rssi);
  const batCls = d.battery >= 60 ? "badge--ok" : (d.battery >= 30 ? "badge--warn" : "badge--bad");

  $("#deviceDetailSub").textContent = `${d.id} • ${zoneName(d.zoneId)}`;

  $("#deviceDetail").innerHTML = `
    <div class="row" style="justify-content:space-between;">
      <div>
        <div style="font-weight:900;font-size:16px">${d.id}</div>
        <div style="color:#aab4c3;font-size:12px;margin-top:6px">${d.type} • Zona ${z?.id || d.zoneId}</div>
      </div>
      <div class="row">
        <span class="badge ${d.online ? "badge--ok" : "badge--bad"}">${d.online ? "Online" : "Offline"}</span>
        <span class="badge ${sig.cls}">Señal: ${sig.label} (${d.rssi})</span>
        <span class="badge ${batCls}">Batería: ${d.battery}%</span>
      </div>
    </div>

    <div style="margin-top:14px" class="tablewrap">
      <table class="table" style="min-width:560px">
        <thead>
          <tr>
            <th>Hora</th>
            <th>Temp (°C)</th>
            <th>Humo (ppm)</th>
            <th>Gas (ppm)</th>
            <th>Riesgo</th>
          </tr>
        </thead>
        <tbody>
          ${history.map(h => {
            const risk = riskFromValues(h);
            return `
              <tr>
                <td>${h.label}</td>
                <td>${h.temp}</td>
                <td>${h.smoke}</td>
                <td>${h.gas}</td>
                <td><span class="badge ${risk.cls}">${risk.label}</span></td>
              </tr>
            `;
          }).join("")}
        </tbody>
      </table>
    </div>
  `;
}

function editDevice(deviceId) {
  const d = devices.find(x => x.id === deviceId);
  if (!d) return;

  const zoneOptions = zones.map(z =>
    `<option value="${z.id}" ${z.id === d.zoneId ? "selected" : ""}>${z.name} (${z.id})</option>`
  ).join("");

  openModal({
    title: "Editar dispositivo",
    bodyHTML: `
      <div class="form">
        <div class="field">
          <label class="label">ID</label>
          <input class="input" id="edId" value="${d.id}" disabled />
        </div>
        <div class="field">
          <label class="label">Zona</label>
          <select class="input" id="edZone">${zoneOptions}</select>
        </div>
        <div class="field">
          <label class="label">Tipo</label>
          <input class="input" id="edType" value="${d.type}" />
        </div>
        <div class="row">
          <label class="label" style="margin:0">Online</label>
          <input type="checkbox" id="edOnline" ${d.online ? "checked" : ""} />
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cancelar</button>
      <button class="btn btn--primary" id="btnSaveDevice">Guardar</button>
    `
  });

  $("#btnSaveDevice").addEventListener("click", () => {
    d.zoneId = $("#edZone").value;
    d.type = $("#edType").value.trim() || d.type;
    d.online = $("#edOnline").checked;
    renderAll();
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
}

$("#btnAddDevice").addEventListener("click", () => {
  const zoneOptions = zones.map(z => `<option value="${z.id}">${z.name} (${z.id})</option>`).join("");

  openModal({
    title: "Agregar dispositivo",
    bodyHTML: `
      <div class="form">
        <div class="field">
          <label class="label">ID (ej. ESP32-2001)</label>
          <input class="input" id="newDevId" placeholder="ESP32-2001" />
        </div>
        <div class="field">
          <label class="label">Zona</label>
          <select class="input" id="newDevZone">${zoneOptions}</select>
        </div>
        <div class="field">
          <label class="label">Tipo</label>
          <input class="input" id="newDevType" placeholder="ESP32 + MQ-2" />
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cancelar</button>
      <button class="btn btn--primary" id="btnCreateDevice">Crear</button>
    `
  });

  $("#btnCreateDevice").addEventListener("click", () => {
    const id = $("#newDevId").value.trim();
    const zoneId = $("#newDevZone").value;
    const type = $("#newDevType").value.trim() || "ESP32";

    if (!id) {
      alert("Ingresa un ID válido.");
      return;
    }

    if (devices.some(d => d.id === id)) {
      alert("Ese ID ya existe.");
      return;
    }

    devices.push({ id, zoneId, type, online: true, rssi: -70, battery: 70 });
    renderAll();
    closeModal();
  });

  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
});