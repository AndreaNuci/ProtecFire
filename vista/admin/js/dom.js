/* ============================
   DOM refs
   ============================ */

// ✅ UI: helpers para seleccionar elementos
const $ = (sel, el = document) => el.querySelector(sel);
const $$ = (sel, el = document) => Array.from(el.querySelectorAll(sel));

// ✅ UI: layout general
const sidebar = $(".sidebar");
const viewTitle = $("#viewTitle");
const viewSubtitle = $("#viewSubtitle");

// ❌ IoT: indicadores de estado del sistema
/*
const pillAlerts = $("#pillAlerts"); // contador de alertas
const sysStatusDot = $("#sysStatusDot"); // indicador visual (online/offline sistema)
const sysStatusText = $("#sysStatusText"); // texto de estado del sistema
const lastSync = $("#lastSync"); // última sincronización con backend/sensores
*/

// ✅ UI: modal (estructura visual)
const modal = $("#modal");
const modalTitle = $("#modalTitle");
const modalBody = $("#modalBody");
const modalFoot = $("#modalFoot");

// ✅ UI: referencias a vistas/páginas
const views = {
  dashboard: $("#view-dashboard"),
  alerts: $("#view-alerts"),
  devices: $("#view-devices"),
  zones: $("#view-zones"),
  reports: $("#view-reports"),
  users: $("#view-users"),
  settings: $("#view-settings"),
};

// ❌ IoT (conceptual): descripciones relacionadas al sistema IoT/monitoreo
/*
const subtitles = {
  dashboard: "Centro de control y monitoreo en tiempo real.",
  alerts: "Eventos detectados por sensores y su gestión.",
  devices: "Inventario y salud de dispositivos IoT.",
  zones: "Mapa lógico de zonas y riesgo ambiental.",
  reports: "Generación de reportes y exportación.",
  users: "Control de accesos y roles.",
  settings: "Umbrales, políticas y parámetros del sistema."
};
*/