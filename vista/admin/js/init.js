/* ============================
   Init
   ============================ */

trend = buildTrendFromZones();

renderAll();
initTrendChart();
openView("dashboard");

/* Opcional
setInterval(() => {
  simulateReading();
  renderAll();
  updateTrendChart();
}, 7000);
*/