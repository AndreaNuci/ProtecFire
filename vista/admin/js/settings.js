/* ============================
   Configuración
   ============================ */

$("#formThresholds").addEventListener("submit", (e) => {
  e.preventDefault();

  // ❌ IoT: actualización de umbrales del sistema
  /*
  thresholds.temp = Number($("#thTemp").value || thresholds.temp);
  thresholds.smoke = Number($("#thSmoke").value || thresholds.smoke);
  thresholds.gas = Number($("#thGas").value || thresholds.gas);
  */

  // ✅ UI: mensaje visual
  $("#settingsHint").textContent = "✅ Umbrales guardados (mock). Recalcular riesgos...";
  setTimeout(() => {
    $("#settingsHint").textContent = "";
  }, 1600);

  // ❌ IoT: re-render del sistema con nuevos valores
  /*
  renderAll();
  */
});