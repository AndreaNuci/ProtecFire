/* ============================
   DOM refs
   ============================ */

const $ = (sel, el = document) => el.querySelector(sel);
const $$ = (sel, el = document) => Array.from(el.querySelectorAll(sel));

const sidebar = $(".sidebar");
const viewTitle = $("#viewTitle");
const viewSubtitle = $("#viewSubtitle");

const pillAlerts = $("#pillAlerts");
const sysStatusDot = $("#sysStatusDot");
const sysStatusText = $("#sysStatusText");
const lastSync = $("#lastSync");

const modal = $("#modal");
const modalTitle = $("#modalTitle");
const modalBody = $("#modalBody");
const modalFoot = $("#modalFoot");

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