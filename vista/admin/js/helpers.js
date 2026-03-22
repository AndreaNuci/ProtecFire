/* ============================
   Helpers
   ============================ */

// ✅ General: formateo de hora
function fmtTime(d) {
  const dd = new Date(d);
  const hh = String(dd.getHours()).padStart(2, "0");
  const mm = String(dd.getMinutes()).padStart(2, "0");
  return `${hh}:${mm}`;
}

// ✅ General: formateo de fecha y hora
function fmtDateTime(d) {
  const dd = new Date(d);
  const yyyy = dd.getFullYear();
  const mm = String(dd.getMonth() + 1).padStart(2, "0");
  const day = String(dd.getDate()).padStart(2, "0");
  return `${yyyy}-${mm}-${day} ${fmtTime(dd)}`;
}

// ❌ IoT: obtener nombre de zona desde datos del sistema
/*
function zoneName(zoneId) {
  return zones.find(z => z.id === zoneId)?.name || zoneId;
}
*/

// ❌ IoT: cálculo de riesgo según lecturas y umbrales
/*
function riskFromValues({ temp, smoke, gas }) {
  const overT = temp >= thresholds.temp;
  const overS = smoke >= thresholds.smoke;
  const overG = gas >= thresholds.gas;
  const hits = [overT, overS, overG].filter(Boolean).length;

  if (hits >= 2) return { label: "Crítico", cls: "badge--bad" };
  if (hits === 1) return { label: "Medio", cls: "badge--warn" };
  return { label: "Normal", cls: "badge--ok" };
}
*/

// ✅ UI: estilos visuales por severidad
function severityBadge(sev) {
  if (sev === "Alta") return "badge badge--bad";
  if (sev === "Media") return "badge badge--warn";
  return "badge badge--ok";
}

// ✅ UI: estilos visuales por estado
function statusBadge(st) {
  if (st === "Pendiente") return "badge badge--warn";
  return "badge badge--ok";
}

// ❌ IoT: clasificación de calidad de señal del dispositivo
/*
function rssiLabel(rssi) {
  if (rssi >= -70) return { label: "Buena", cls: "badge--ok" };
  if (rssi >= -85) return { label: "Media", cls: "badge--warn" };
  return { label: "Baja", cls: "badge--bad" };
}
*/

// ✅ UI/Navegación: etiquetas de secciones
function keyLabel(key) {
  const map = {
    dashboard: "Dashboard",
    alerts: "Alertas",
    devices: "Dispositivos",
    zones: "Zonas",
    reports: "Reportes",
    users: "Usuarios",
    settings: "Configuración"
  };
  return map[key] || key;
}

// ❌ IoT: generación de ID para nuevas alertas del sistema
/*
function nextAlertId() {
  return Math.max(0, ...alerts.map(a => a.id)) + 1;
}
*/

// ❌ IoT: simulación de variaciones de datos
/*
function rand(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}
*/

// ✅ General: limitar valores dentro de un rango
function clamp(v, min, max) {
  return Math.max(min, Math.min(max, v));
}