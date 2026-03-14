/* ============================
   Simulación
   ============================ */

function simulateReading() {
  const z = zones[Math.floor(Math.random() * zones.length)];

  z.last.temp = clamp(z.last.temp + rand(-2, 6), 20, 90);
  z.last.smoke = clamp(z.last.smoke + rand(-10, 30), 20, 450);
  z.last.gas = clamp(z.last.gas + rand(-10, 35), 20, 450);
  z.updatedAt = new Date();

  trend.push({
    label: fmtTime(new Date()),
    temp: Math.round(z.last.temp),
    smoke: Math.round(z.last.smoke),
    gas: Math.round(z.last.gas)
  });

  if (trend.length > 12) trend.shift();

  const triggers = [];

  if (z.last.temp >= thresholds.temp) {
    triggers.push({
      type: "Temperatura",
      value: Math.round(z.last.temp),
      severity: z.last.temp >= thresholds.temp + 10 ? "Alta" : "Media"
    });
  }

  if (z.last.smoke >= thresholds.smoke) {
    triggers.push({
      type: "Humo",
      value: Math.round(z.last.smoke),
      severity: z.last.smoke >= thresholds.smoke + 80 ? "Alta" : "Media"
    });
  }

  if (z.last.gas >= thresholds.gas) {
    triggers.push({
      type: "Gas",
      value: Math.round(z.last.gas),
      severity: z.last.gas >= thresholds.gas + 80 ? "Alta" : "Media"
    });
  }

  if (triggers.length) {
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

  const dev = devices[Math.floor(Math.random() * devices.length)];
  dev.rssi = clamp(dev.rssi + rand(-6, 4), -100, -45);
  dev.battery = clamp(dev.battery + rand(-2, 1), 0, 100);

  if (Math.random() < 0.06) dev.online = !dev.online;
}

$("#btnSimulate").addEventListener("click", () => {
  simulateReading();
  renderAll();
  updateTrendChart();
});