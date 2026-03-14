/* ============================
   Render general
   ============================ */

function renderAll() {
  updateSystemStatus();
  renderKPIs();
  renderZonesSidebarList();
  renderAlertsRecent();
  renderWeakDevices();
  renderAlertsTable();
  renderDevicesTable();
  renderZonesGrid();
  renderUsersTable();
  renderSettingsForm();
  updatePills();
}

function updateSystemStatus() {
  const pendingHigh = alerts.filter(a => a.status === "Pendiente" && a.severity === "Alta").length;

  if (pendingHigh >= 2) {
    sysStatusDot.className = "status status--bad";
    sysStatusText.textContent = "Atención: incidentes críticos";
  } else if (pendingHigh === 1) {
    sysStatusDot.className = "status status--warn";
    sysStatusText.textContent = "Precaución: alerta crítica";
  } else {
    sysStatusDot.className = "status status--ok";
    sysStatusText.textContent = "Operando normal";
  }

  lastSync.textContent = `Última sync: ${fmtDateTime(new Date())}`;
}

function renderKPIs() {
  $("#kpiDevices").textContent = devices.filter(d => d.online).length;

  const today = new Date();
  const isToday = (d) => {
    const x = new Date(d);
    return x.getFullYear() === today.getFullYear()
      && x.getMonth() === today.getMonth()
      && x.getDate() === today.getDate();
  };

  $("#kpiAlertsToday").textContent = alerts.filter(a => isToday(a.at)).length;

  const criticalZones = zones.filter(z => riskFromValues(z.last).label === "Crítico").length;
  $("#kpiCriticalZones").textContent = criticalZones;

  const last = trend[trend.length - 1];
  if (last) {
    $("#kpiLastReading").textContent = `${last.temp}°C • ${last.smoke}ppm • ${last.gas}ppm`;
  }
}

function renderZonesSidebarList() {
  const box = $("#zonesList");
  box.innerHTML = zones.map(z => {
    const risk = riskFromValues(z.last);
    return `
      <div class="zoneItem">
        <div class="zoneItem__col">
          <div class="zoneItem__name">${z.name}</div>
          <div class="zoneItem__meta">${z.location} • ${z.id}</div>
        </div>
        <div class="zoneItem__risk">
          <span class="badge ${risk.cls}">${risk.label}</span>
        </div>
      </div>
    `;
  }).join("");
}

function renderAlertsRecent() {
  const tbody = $("#tblAlertsRecent");
  const recent = alerts.slice().sort((a, b) => b.at - a.at).slice(0, 6);

  tbody.innerHTML = recent.map(a => `
    <tr>
      <td>${fmtTime(a.at)}</td>
      <td>${zoneName(a.zoneId)}</td>
      <td>${a.type}</td>
      <td><span class="${severityBadge(a.severity)}">${a.severity}</span></td>
      <td><span class="${statusBadge(a.status)}">${a.status}</span></td>
    </tr>
  `).join("");
}

function renderWeakDevices() {
  const tbody = $("#tblWeakDevices");
  const weak = devices
    .filter(d => d.rssi <= -80 || d.battery <= 30 || !d.online)
    .slice(0, 6);

  tbody.innerHTML = weak.map(d => {
    const sig = rssiLabel(d.rssi);
    const online = d.online
      ? `<span class="badge badge--ok">Online</span>`
      : `<span class="badge badge--bad">Offline</span>`;
    const batCls = d.battery >= 60 ? "badge--ok" : (d.battery >= 30 ? "badge--warn" : "badge--bad");

    return `
      <tr>
        <td>${d.id}</td>
        <td>${zoneName(d.zoneId)}</td>
        <td><span class="badge ${sig.cls}">${sig.label} (${d.rssi})</span></td>
        <td><span class="badge ${batCls}">${d.battery}%</span></td>
        <td>${online}</td>
      </tr>
    `;
  }).join("");
}

function renderZonesGrid() {
  const grid = $("#zonesGrid");
  grid.innerHTML = zones.map(z => {
    const risk = riskFromValues(z.last);
    return `
      <div class="zoneCard">
        <div class="zoneCard__top">
          <div class="zoneCard__name">${z.name}</div>
          <span class="badge ${risk.cls}">${risk.label}</span>
        </div>
        <div class="zoneCard__muted">${z.location} • ${z.id}</div>
        <div class="zoneCard__vals">
          <div class="miniVal">
            <div class="miniVal__k">Temp</div>
            <div class="miniVal__v">${z.last.temp}°C</div>
          </div>
          <div class="miniVal">
            <div class="miniVal__k">Humo</div>
            <div class="miniVal__v">${z.last.smoke} ppm</div>
          </div>
          <div class="miniVal">
            <div class="miniVal__k">Gas</div>
            <div class="miniVal__v">${z.last.gas} ppm</div>
          </div>
        </div>
      </div>
    `;
  }).join("");
}

function renderSettingsForm() {
  $("#thTemp").value = thresholds.temp;
  $("#thSmoke").value = thresholds.smoke;
  $("#thGas").value = thresholds.gas;
}

function updatePills() {
  const pending = alerts.filter(a => a.status === "Pendiente").length;
  pillAlerts.textContent = pending;
}