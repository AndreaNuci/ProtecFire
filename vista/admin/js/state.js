/* ============================
   Estado mock
   ============================ */

let thresholds = {
  temp: 55,
  smoke: 180,
  gas: 220
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
  { id: 1, at: new Date(Date.now() - 1000 * 60 * 12), zoneId: "Z-02", deviceId: "ESP32-1002", type: "Humo", value: 210, severity: "Alta", status: "Pendiente" },
  { id: 2, at: new Date(Date.now() - 1000 * 60 * 35), zoneId: "Z-03", deviceId: "ESP32-1003", type: "Gas", value: 260, severity: "Alta", status: "Pendiente" },
  { id: 3, at: new Date(Date.now() - 1000 * 60 * 90), zoneId: "Z-02", deviceId: "ESP32-1002", type: "Temperatura", value: 58, severity: "Media", status: "Resuelta" },
  { id: 4, at: new Date(Date.now() - 1000 * 60 * 140), zoneId: "Z-01", deviceId: "ESP32-1001", type: "Temperatura", value: 41, severity: "Baja", status: "Resuelta" },
];

let trend = [];
let chartType = "line";
let trendChart = null;