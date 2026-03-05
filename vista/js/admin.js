/* ============================
   ProtecFire Admin (Mock)
   - Dashboard / Alertas / Devices / Zonas / Reportes / Usuarios / Config
   ============================ */

const $ = (sel, el=document) => el.querySelector(sel);
const $$ = (sel, el=document) => Array.from(el.querySelectorAll(sel));

/* ---------- Estado mock ---------- */
let thresholds = {
  temp: 55,    // °C
  smoke: 180,  // ppm
  gas: 220     // ppm
};

let zones = [
  { id: "Z-01", name: "Almacén principal", location: "CDMX", last: { temp: 41, smoke: 90, gas: 110 }, updatedAt: null },
  { id: "Z-02", name: "Cocina industrial", location: "CDMX", last: { temp: 58, smoke: 210, gas: 190 }, updatedAt: null },
  { id: "Z-03", name: "Área eléctrica", location: "Edo. Méx.", last: { temp: 49, smoke: 120, gas: 260 }, updatedAt: null },
  { id: "Z-04", name: "Estacionamiento", location: "Jalisco", last: { temp: 36, smoke: 60, gas: 80 }, updatedAt: null },
];

let devices = [
  { id: "ESP32-1001", zoneId: "Z-01", type: "ESP32 + DHT22", online: true,  rssi: -61, battery: 82 },
  { id: "ESP32-1002", zoneId: "Z-02", type: "ESP32 + MQ-2",  online: true,  rssi: -78, battery: 55 },
  { id: "ESP32-1003", zoneId: "Z-03", type: "ESP32 + MQ-135",online: true,  rssi: -85, battery: 39 },
  { id: "ESP32-1004", zoneId: "Z-04", type: "ESP32 + MQ-2",  online: false, rssi: -92, battery: 21 },
];

let users = [
  { name: "Admin Principal", email: "admin@protecfire.com", role: "Administrador", status: "Activo" },
  { name: "Operador Turno A", email: "operadorA@protecfire.com", role: "Operador", status: "Activo" },
  { name: "Visor Auditoría", email: "visor@protecfire.com", role: "Visor", status: "Suspendido" },
];

let alerts = [
  { id: 1, at: new Date(Date.now() - 1000*60*12), zoneId: "Z-02", deviceId: "ESP32-1002", type: "Humo", value: 210, severity: "Alta", status: "Pendiente" },
  { id: 2, at: new Date(Date.now() - 1000*60*35), zoneId: "Z-03", deviceId: "ESP32-1003", type: "Gas",  value: 260, severity: "Alta", status: "Pendiente" },
  { id: 3, at: new Date(Date.now() - 1000*60*90), zoneId: "Z-02", deviceId: "ESP32-1002", type: "Temperatura", value: 58, severity: "Media", status: "Resuelta" },
  { id: 4, at: new Date(Date.now() - 1000*60*140),zoneId: "Z-01", deviceId: "ESP32-1001", type: "Temperatura", value: 41, severity: "Baja", status: "Resuelta" },
];

let trend = buildTrendFromZones(); // 12 lecturas

/* ---------- UI refs ---------- */
const sidebar = $(".sidebar");
const viewTitle = $("#viewTitle");
const viewSubtitle = $("#viewSubtitle");

const pillAlerts = $("#pillAlerts");
const sysStatusDot = $("#sysStatusDot");
const sysStatusText = $("#sysStatusText");
const lastSync = $("#lastSync");

const views = {
  dashboard: $("#view-dashboard"),
  alerts: $("#view-alerts"),
  devices: $("#view-devices"),
  zones: $("#view-zones"),
  reports: $("#view-reports"),
  users: $("#view-users"),
  settings: $("#view-settings"),
};

const subtitles = {
  dashboard: "Centro de control y monitoreo en tiempo real.",
  alerts: "Eventos detectados por sensores y su gestión.",
  devices: "Inventario y salud de dispositivos IoT.",
  zones: "Mapa lógico de zonas y riesgo ambiental.",
  reports: "Generación de reportes y exportación.",
  users: "Control de accesos y roles.",
  settings: "Umbrales, políticas y parámetros del sistema."
};

/* ---------- Navegación ---------- */
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

function openView(key){
  Object.entries(views).forEach(([k, el]) => el.classList.toggle("is-visible", k === key));
  viewTitle.textContent = keyLabel(key);
  viewSubtitle.textContent = subtitles[key] || "";
}

function keyLabel(key){
  const map = {
    dashboard:"Dashboard",
    alerts:"Alertas",
    devices:"Dispositivos",
    zones:"Zonas",
    reports:"Reportes",
    users:"Usuarios",
    settings:"Configuración"
  };
  return map[key] || key;
}

/* ---------- Sidebar mobile ---------- */
$("#btnToggleSidebar")?.addEventListener("click", () => sidebar.classList.toggle("is-open"));
document.addEventListener("click", (e) => {
  if (window.innerWidth <= 860 && sidebar.classList.contains("is-open")) {
    const clickedInside = e.target.closest(".sidebar") || e.target.closest("#btnToggleSidebar");
    if (!clickedInside) sidebar.classList.remove("is-open");
  }
});

/* ---------- Modal ---------- */
const modal = $("#modal");
const modalTitle = $("#modalTitle");
const modalBody = $("#modalBody");
const modalFoot = $("#modalFoot");

function openModal({title, bodyHTML, footHTML}){
  modalTitle.textContent = title || "Modal";
  modalBody.innerHTML = bodyHTML || "";
  modalFoot.innerHTML = footHTML || "";
  modal.classList.add("is-open");
  modal.setAttribute("aria-hidden", "false");
}
function closeModal(){
  modal.classList.remove("is-open");
  modal.setAttribute("aria-hidden", "true");
}
$$("[data-close]").forEach(x => x.addEventListener("click", closeModal));
document.addEventListener("keydown", (e)=> { if (e.key === "Escape") closeModal(); });

/* ---------- Helpers ---------- */
function fmtTime(d){
  const dd = new Date(d);
  const hh = String(dd.getHours()).padStart(2,"0");
  const mm = String(dd.getMinutes()).padStart(2,"0");
  return `${hh}:${mm}`;
}
function fmtDateTime(d){
  const dd = new Date(d);
  const yyyy = dd.getFullYear();
  const mm = String(dd.getMonth()+1).padStart(2,"0");
  const day = String(dd.getDate()).padStart(2,"0");
  return `${yyyy}-${mm}-${day} ${fmtTime(dd)}`;
}
function zoneName(zoneId){
  return zones.find(z=>z.id===zoneId)?.name || zoneId;
}
function riskFromValues({temp, smoke, gas}){
  const overT = temp >= thresholds.temp;
  const overS = smoke >= thresholds.smoke;
  const overG = gas >= thresholds.gas;
  const hits = [overT, overS, overG].filter(Boolean).length;
  if (hits >= 2) return { label:"Crítico", cls:"badge--bad" };
  if (hits === 1) return { label:"Medio", cls:"badge--warn" };
  return { label:"Normal", cls:"badge--ok" };
}
function severityBadge(sev){
  if (sev === "Alta") return `badge badge--bad`;
  if (sev === "Media") return `badge badge--warn`;
  return `badge badge--ok`;
}
function statusBadge(st){
  if (st === "Pendiente") return `badge badge--warn`;
  return `badge badge--ok`;
}
function rssiLabel(rssi){
  // RSSI: más cerca a 0 es mejor
  if (rssi >= -70) return { label: "Buena", cls:"badge--ok" };
  if (rssi >= -85) return { label: "Media", cls:"badge--warn" };
  return { label: "Baja", cls:"badge--bad" };
}

/* ---------- Render ---------- */
function renderAll(){
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

function updateSystemStatus(){
  const pendingHigh = alerts.filter(a => a.status==="Pendiente" && a.severity==="Alta").length;
  if (pendingHigh >= 2){
    sysStatusDot.className = "status status--bad";
    sysStatusText.textContent = "Atención: incidentes críticos";
  } else if (pendingHigh === 1){
    sysStatusDot.className = "status status--warn";
    sysStatusText.textContent = "Precaución: alerta crítica";
  } else {
    sysStatusDot.className = "status status--ok";
    sysStatusText.textContent = "Operando normal";
  }
  lastSync.textContent = `Última sync: ${fmtDateTime(new Date())}`;
}

function renderKPIs(){
  $("#kpiDevices").textContent = devices.filter(d=>d.online).length;
  const today = new Date();
  const isToday = (d) => {
    const x = new Date(d);
    return x.getFullYear()===today.getFullYear() && x.getMonth()===today.getMonth() && x.getDate()===today.getDate();
  };
  $("#kpiAlertsToday").textContent = alerts.filter(a => isToday(a.at)).length;

  const criticalZones = zones.filter(z => riskFromValues(z.last).label === "Crítico").length;
  $("#kpiCriticalZones").textContent = criticalZones;

  const last = trend[trend.length-1];
  $("#kpiLastReading").textContent = `${last.temp}°C • ${last.smoke}ppm • ${last.gas}ppm`;
}

function renderZonesSidebarList(){
  const box = $("#zonesList");
  box.innerHTML = zones
    .map(z => {
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

function renderAlertsRecent(){
  const tbody = $("#tblAlertsRecent");
  const recent = alerts
    .slice()
    .sort((a,b)=>b.at - a.at)
    .slice(0,6);

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

function renderWeakDevices(){
  const tbody = $("#tblWeakDevices");
  const weak = devices
    .filter(d => d.rssi <= -80 || d.battery <= 30 || !d.online)
    .slice(0,6);

  tbody.innerHTML = weak.map(d => {
    const sig = rssiLabel(d.rssi);
    const online = d.online ? `<span class="badge badge--ok">Online</span>` : `<span class="badge badge--bad">Offline</span>`;
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

function renderAlertsTable(){
  const sev = $("#filterSeverity").value;
  const st  = $("#filterStatus").value;

  const filtered = alerts
    .slice()
    .sort((a,b)=>b.at - a.at)
    .filter(a => !sev || a.severity === sev)
    .filter(a => !st  || a.status === st);

  const tbody = $("#tblAlerts");
  tbody.innerHTML = filtered.map(a => `
    <tr>
      <td>${a.id}</td>
      <td>${fmtDateTime(a.at)}</td>
      <td>${zoneName(a.zoneId)}</td>
      <td>${a.deviceId}</td>
      <td>${a.type}</td>
      <td>${a.value}${a.type==="Temperatura" ? "°C" : "ppm"}</td>
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

  // acciones
  $$("[data-resolve]").forEach(btn => {
    btn.addEventListener("click", () => resolveAlert(Number(btn.dataset.resolve)));
  });
  $$("[data-viewalert]").forEach(btn => {
    btn.addEventListener("click", () => viewAlert(Number(btn.dataset.viewalert)));
  });
}

function renderDevicesTable(){
  const tbody = $("#tblDevices");
  tbody.innerHTML = devices.map(d => {
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

  $$("[data-show]").forEach(btn => btn.addEventListener("click", ()=> showDevice(btn.dataset.show)));
  $$("[data-edit]").forEach(btn => btn.addEventListener("click", ()=> editDevice(btn.dataset.edit)));
}

function renderZonesGrid(){
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

function renderUsersTable(){
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

  $$("[data-edituser]").forEach(btn => btn.addEventListener("click", ()=> editUser(Number(btn.dataset.edituser))));
  $$("[data-toggleuser]").forEach(btn => btn.addEventListener("click", ()=> toggleUser(Number(btn.dataset.toggleuser))));
}

function renderSettingsForm(){
  $("#thTemp").value = thresholds.temp;
  $("#thSmoke").value = thresholds.smoke;
  $("#thGas").value = thresholds.gas;
}

function updatePills(){
  const pending = alerts.filter(a=>a.status==="Pendiente").length;
  pillAlerts.textContent = pending;
}

/* ---------- Acciones: Alertas ---------- */
function resolveAlert(id){
  const a = alerts.find(x=>x.id===id);
  if (!a) return;
  a.status = "Resuelta";
  renderAll();
}
function viewAlert(id){
  const a = alerts.find(x=>x.id===id);
  if (!a) return;
  openModal({
    title: `Alerta #${a.id}`,
    bodyHTML: `
      <div style="display:flex;flex-direction:column;gap:10px;">
        <div><b>Fecha/Hora:</b> ${fmtDateTime(a.at)}</div>
        <div><b>Zona:</b> ${zoneName(a.zoneId)} (${a.zoneId})</div>
        <div><b>Dispositivo:</b> ${a.deviceId}</div>
        <div><b>Tipo:</b> ${a.type}</div>
        <div><b>Valor:</b> ${a.value}${a.type==="Temperatura" ? "°C" : "ppm"}</div>
        <div><b>Severidad:</b> <span class="${severityBadge(a.severity)}">${a.severity}</span></div>
        <div><b>Estado:</b> <span class="${statusBadge(a.status)}">${a.status}</span></div>
        <div style="color:#aab4c3;font-size:12px;line-height:1.4">
          Sugerencia: Verificar la zona, validar sensor y confirmar si la condición persiste.
        </div>
      </div>
    `,
    footHTML: `
      <button class="btn btn--ghost" data-close="1">Cerrar</button>
      ${a.status==="Pendiente" ? `<button class="btn btn--primary" id="modalResolve">Resolver</button>` : ""}
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
  alerts.forEach(a => { if (a.status==="Pendiente") a.status="Resuelta"; });
  renderAll();
});

/* ---------- Acciones: Dispositivos ---------- */
function showDevice(deviceId){
  const d = devices.find(x=>x.id===deviceId);
  if (!d) return;

  const z = zones.find(x=>x.id===d.zoneId);
  const history = trend.slice(-8); // mock
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
          ${history.map(h=>{
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

function editDevice(deviceId){
  const d = devices.find(x=>x.id===deviceId);
  if (!d) return;

  const zoneOptions = zones.map(z => `<option value="${z.id}" ${z.id===d.zoneId?"selected":""}>${z.name} (${z.id})</option>`).join("");

  openModal({
    title: `Editar dispositivo`,
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
          <input type="checkbox" id="edOnline" ${d.online?"checked":""} />
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
    if (!id){
      alert("Ingresa un ID válido.");
      return;
    }
    if (devices.some(d => d.id === id)){
      alert("Ese ID ya existe.");
      return;
    }
    devices.push({ id, zoneId, type, online:true, rssi:-70, battery:70 });
    renderAll();
    closeModal();
  });
  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
});

/* ---------- Acciones: Usuarios ---------- */
function editUser(idx){
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
            ${["Administrador","Operador","Visor"].map(r => `<option ${r===u.role?"selected":""}>${r}</option>`).join("")}
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

function toggleUser(idx){
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
    if (!name || !email) { alert("Nombre y correo son obligatorios."); return; }
    users.push({ name, email, role, status:"Activo" });
    renderUsersTable();
    closeModal();
  });
  $$("[data-close]", modal).forEach(x => x.addEventListener("click", closeModal));
});

/* ---------- Configuración ---------- */
$("#formThresholds").addEventListener("submit", (e) => {
  e.preventDefault();
  thresholds.temp = Number($("#thTemp").value || thresholds.temp);
  thresholds.smoke = Number($("#thSmoke").value || thresholds.smoke);
  thresholds.gas = Number($("#thGas").value || thresholds.gas);

  $("#settingsHint").textContent = "✅ Umbrales guardados (mock). Recalcular riesgos...";
  setTimeout(()=> $("#settingsHint").textContent = "", 1600);

  // Recalcula riesgos / renderiza
  renderAll();
});

/* ---------- Reportes ---------- */
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

  if (type === "alertas"){
    const total = alerts.length;
    const pending = alerts.filter(a=>a.status==="Pendiente").length;
    const high = alerts.filter(a=>a.severity==="Alta").length;
    html += `
      <div><b>Total:</b> ${total}</div>
      <div><b>Pendientes:</b> ${pending}</div>
      <div><b>Severidad Alta:</b> ${high}</div>
    `;
  } else if (type === "lecturas"){
    const last = trend[trend.length-1];
    html += `
      <div><b>Lecturas almacenadas (mock):</b> ${trend.length}</div>
      <div><b>Última:</b> ${last.temp}°C • ${last.smoke}ppm • ${last.gas}ppm</div>
    `;
  } else {
    const online = devices.filter(d=>d.online).length;
    const offline = devices.filter(d=>!d.online).length;
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
  // Export simple de alertas (mock)
  const header = ["id","fecha","zona","dispositivo","tipo","valor","severidad","estado"];
  const rows = alerts
    .slice()
    .sort((a,b)=>b.at - a.at)
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

  const csv = [header, ...rows].map(r => r.map(x => `"${String(x).replaceAll('"','""')}"`).join(",")).join("\n");
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

/* ---------- Search global ---------- */
$("#globalSearch").addEventListener("input", (e) => {
  const q = e.target.value.trim().toLowerCase();
  if (!q){
    renderAll();
    return;
  }

  // filtra alertas y dispositivos
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

  // aplica solo a tablas visibles
  if ($("#view-alerts").classList.contains("is-visible")){
    // render tabla de alertas con filtro por búsqueda (sin tocar selects)
    $("#tblAlerts").innerHTML = alertsFiltered
      .slice().sort((a,b)=>b.at-a.at)
      .map(a => `
        <tr>
          <td>${a.id}</td>
          <td>${fmtDateTime(a.at)}</td>
          <td>${zoneName(a.zoneId)}</td>
          <td>${a.deviceId}</td>
          <td>${a.type}</td>
          <td>${a.value}${a.type==="Temperatura" ? "°C" : "ppm"}</td>
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

  if ($("#view-devices").classList.contains("is-visible")){
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

    $$("[data-show]").forEach(btn => btn.addEventListener("click", ()=> showDevice(btn.dataset.show)));
    $$("[data-edit]").forEach(btn => btn.addEventListener("click", ()=> editDevice(btn.dataset.edit)));
  }
});

/* ---------- Logout (mock) ---------- */
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

/* ---------- Simulación de lectura ---------- */
$("#btnSimulate").addEventListener("click", () => {
  simulateReading();
  renderAll();
  updateTrendChart();
});

/* ---------- Tendencia / Chart ---------- */
let chartType = "line";
let trendChart = null;

$$(".segmented__btn").forEach(btn => {
  btn.addEventListener("click", () => {
    $$(".segmented__btn").forEach(b => b.classList.remove("is-active"));
    btn.classList.add("is-active");
    chartType = btn.dataset.chart;
    initTrendChart(true);
  });
});

function buildTrendFromZones(){
  // 12 lecturas mock, se basan en promedio de zonas
  const arr = [];
  for (let i=11;i>=0;i--){
    const avg = zones.reduce((acc,z)=>({
      temp: acc.temp + z.last.temp,
      smoke: acc.smoke + z.last.smoke,
      gas: acc.gas + z.last.gas
    }), {temp:0,smoke:0,gas:0});

    const n = zones.length || 1;
    const base = {
      temp: Math.round(avg.temp/n + rand(-3,3)),
      smoke: Math.round(avg.smoke/n + rand(-15,15)),
      gas: Math.round(avg.gas/n + rand(-18,18)),
    };

    arr.push({
      label: `-${i}m`,
      ...base
    });
  }
  return arr;
}

function initTrendChart(recreate=false){
  const ctx = $("#chartTrend");
  if (!ctx) return;

  if (trendChart && recreate){
    trendChart.destroy();
    trendChart = null;
  }

  const labels = trend.map(x => x.label);
  const data = {
    labels,
    datasets: [
      { label:"Temperatura (°C)", data: trend.map(x=>x.temp) },
      { label:"Humo (ppm)", data: trend.map(x=>x.smoke) },
      { label:"Gas (ppm)", data: trend.map(x=>x.gas) },
    ]
  };

  trendChart = new Chart(ctx, {
    type: chartType,
    data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { labels: { color: "#e8edf4" } },
        tooltip: { enabled: true }
      },
      scales: {
        x: { ticks: { color:"#aab4c3" }, grid: { color:"rgba(255,255,255,.06)" } },
        y: { ticks: { color:"#aab4c3" }, grid: { color:"rgba(255,255,255,.06)" } }
      }
    }
  });
}

function updateTrendChart(){
  if (!trendChart) return initTrendChart();
  trendChart.data.labels = trend.map(x => x.label);
  trendChart.data.datasets[0].data = trend.map(x => x.temp);
  trendChart.data.datasets[1].data = trend.map(x => x.smoke);
  trendChart.data.datasets[2].data = trend.map(x => x.gas);
  trendChart.update();
}

/* ---------- Simulación: genera lectura y alertas ---------- */
function simulateReading(){
  // 1) elige una zona random y modifica lecturas
  const z = zones[Math.floor(Math.random()*zones.length)];
  z.last.temp = clamp(z.last.temp + rand(-2,6), 20, 90);
  z.last.smoke = clamp(z.last.smoke + rand(-10,30), 20, 450);
  z.last.gas = clamp(z.last.gas + rand(-10,35), 20, 450);
  z.updatedAt = new Date();

  // 2) actualiza trend
  trend.push({
    label: fmtTime(new Date()),
    temp: Math.round(z.last.temp),
    smoke: Math.round(z.last.smoke),
    gas: Math.round(z.last.gas)
  });
  if (trend.length > 12) trend.shift();

  // 3) si supera umbral => alerta
  const triggers = [];
  if (z.last.temp >= thresholds.temp) triggers.push({ type:"Temperatura", value: Math.round(z.last.temp), severity: z.last.temp >= thresholds.temp + 10 ? "Alta" : "Media" });
  if (z.last.smoke >= thresholds.smoke) triggers.push({ type:"Humo", value: Math.round(z.last.smoke), severity: z.last.smoke >= thresholds.smoke + 80 ? "Alta" : "Media" });
  if (z.last.gas >= thresholds.gas) triggers.push({ type:"Gas", value: Math.round(z.last.gas), severity: z.last.gas >= thresholds.gas + 80 ? "Alta" : "Media" });

  if (triggers.length){
    const d = devices.find(x => x.zoneId === z.id) || devices[0];
    triggers.forEach(t => {
      alerts.unshift({
        id: nextAlertId(),
        at: new Date(),
        zoneId: z.id,
        deviceId: d?.id || "N/A",
        type: t.type,
        value: t.value,
        severity: t.severity,
        status: "Pendiente"
      });
    });
    alerts = alerts.slice(0, 120);
  }

  // 4) degrada/recupera señal y batería en un dispositivo
  const dev = devices[Math.floor(Math.random()*devices.length)];
  dev.rssi = clamp(dev.rssi + rand(-6,4), -100, -45);
  dev.battery = clamp(dev.battery + rand(-2,1), 0, 100);
  // online/offline aleatorio suave
  if (Math.random() < 0.06) dev.online = !dev.online;
}

function nextAlertId(){
  return (Math.max(0, ...alerts.map(a=>a.id)) + 1);
}
function rand(min,max){ return Math.floor(Math.random()*(max-min+1))+min; }
function clamp(v,min,max){ return Math.max(min, Math.min(max, v)); }

/* ---------- Init ---------- */
renderAll();
initTrendChart();

/* Fix: re-render al cambiar vista con selects */
openView("dashboard");

/* (Opcional) ejemplo de refresco periódico:
setInterval(()=>{ simulateReading(); renderAll(); updateTrendChart(); }, 7000);
*/