/* ============================
   Configuración
   ============================ */

$("#formThresholds").addEventListener("submit", (e) => {
  e.preventDefault();

  thresholds.temp = Number($("#thTemp").value || thresholds.temp);
  thresholds.smoke = Number($("#thSmoke").value || thresholds.smoke);
  thresholds.gas = Number($("#thGas").value || thresholds.gas);

  $("#settingsHint").textContent = "✅ Umbrales guardados (mock). Recalcular riesgos...";
  setTimeout(() => {
    $("#settingsHint").textContent = "";
  }, 1600);

  renderAll();
});