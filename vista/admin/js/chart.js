/* ============================
   Tendencia / Chart
   ============================ */

$$(".segmented__btn").forEach(btn => {
  btn.addEventListener("click", () => {
    $$(".segmented__btn").forEach(b => b.classList.remove("is-active"));
    btn.classList.add("is-active");
    chartType = btn.dataset.chart;
    initTrendChart(true);
  });
});

function buildTrendFromZones() {
  const arr = [];

  for (let i = 11; i >= 0; i--) {
    const avg = zones.reduce((acc, z) => ({
      temp: acc.temp + z.last.temp,
      smoke: acc.smoke + z.last.smoke,
      gas: acc.gas + z.last.gas
    }), { temp: 0, smoke: 0, gas: 0 });

    const n = zones.length || 1;
    const base = {
      temp: Math.round(avg.temp / n + rand(-3, 3)),
      smoke: Math.round(avg.smoke / n + rand(-15, 15)),
      gas: Math.round(avg.gas / n + rand(-18, 18)),
    };

    arr.push({
      label: `-${i}m`,
      ...base
    });
  }

  return arr;
}

function initTrendChart(recreate = false) {
  const ctx = $("#chartTrend");
  if (!ctx) return;

  if (trendChart && recreate) {
    trendChart.destroy();
    trendChart = null;
  }

  const labels = trend.map(x => x.label);
  const data = {
    labels,
    datasets: [
      { label: "Temperatura (°C)", data: trend.map(x => x.temp) },
      { label: "Humo (ppm)", data: trend.map(x => x.smoke) },
      { label: "Gas (ppm)", data: trend.map(x => x.gas) },
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
        x: { ticks: { color: "#aab4c3" }, grid: { color: "rgba(255,255,255,.06)" } },
        y: { ticks: { color: "#aab4c3" }, grid: { color: "rgba(255,255,255,.06)" } }
      }
    }
  });
}

function updateTrendChart() {
  if (!trendChart) return initTrendChart();

  trendChart.data.labels = trend.map(x => x.label);
  trendChart.data.datasets[0].data = trend.map(x => x.temp);
  trendChart.data.datasets[1].data = trend.map(x => x.smoke);
  trendChart.data.datasets[2].data = trend.map(x => x.gas);
  trendChart.update();
}