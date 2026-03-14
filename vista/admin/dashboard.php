<section class="view is-visible" id="view-dashboard">
  <div class="grid grid--kpi">
    <div class="card kpi">
      <div class="kpi__label">Dispositivos activos</div>
      <div class="kpi__value" id="kpiDevices">--</div>
      <div class="kpi__meta"><span class="status status--ok"></span> Online</div>
    </div>

    <div class="card kpi">
      <div class="kpi__label">Alertas hoy</div>
      <div class="kpi__value" id="kpiAlertsToday">--</div>
      <div class="kpi__meta"><span class="status status--warn"></span> Revisar pendientes</div>
    </div>

    <div class="card kpi">
      <div class="kpi__label">Zonas críticas</div>
      <div class="kpi__value" id="kpiCriticalZones">--</div>
      <div class="kpi__meta">Según umbrales configurados</div>
    </div>

    <div class="card kpi">
      <div class="kpi__label">Última lectura</div>
      <div class="kpi__value" id="kpiLastReading">--</div>
      <div class="kpi__meta">Temperatura • Humo • Gas</div>
    </div>
  </div>

  <div class="grid grid--2">
    <div class="card">
      <div class="card__head">
        <div>
          <h3>Tendencia (últimas 12 lecturas)</h3>
          <p>Temperatura, humo y gas (valores normalizados).</p>
        </div>
        <div class="segmented" role="tablist">
          <button class="segmented__btn is-active" data-chart="line">Línea</button>
          <button class="segmented__btn" data-chart="bar">Barras</button>
        </div>
      </div>
      <div class="card__body">
        <canvas id="chartTrend" height="120"></canvas>
      </div>
    </div>

    <div class="card">
      <div class="card__head">
        <div>
          <h3>Estado por zonas</h3>
          <p>Clasificación de riesgo ambiental.</p>
        </div>
      </div>

      <div class="card__body">
        <div class="zones" id="zonesList"></div>
      </div>
    </div>
  </div>

  <div class="grid grid--2">
    <div class="card">
      <div class="card__head">
        <div>
          <h3>Alertas recientes</h3>
          <p>Últimos eventos detectados por el sistema.</p>
        </div>
        <button class="btn btn--ghost" data-go="alerts">Ver todo</button>
      </div>

      <div class="card__body">
        <div class="tablewrap">
          <table class="table">
            <thead>
              <tr>
                <th>Hora</th>
                <th>Zona</th>
                <th>Tipo</th>
                <th>Severidad</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody id="tblAlertsRecent"></tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card__head">
        <div>
          <h3>Dispositivos con señal baja</h3>
          <p>Recomendación: revisar conectividad o energía.</p>
        </div>
        <button class="btn btn--ghost" data-go="devices">Administrar</button>
      </div>

      <div class="card__body">
        <div class="tablewrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Zona</th>
                <th>Señal</th>
                <th>Batería</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody id="tblWeakDevices"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>