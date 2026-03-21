<section class="view" id="view-reports">
  <div class="grid grid--2">
    <div class="card">
      <div class="card__head">
        <div>
          <h3>Reportes</h3>
          <p>Genera resúmenes para auditoría y toma de decisiones.</p>
        </div>
      </div>

      <div class="card__body">
        <div class="form">
          <label class="label">Rango (simulado)</label>
          <div class="row">
            <input class="input" id="repFrom" type="date" />
            <input class="input" id="repTo" type="date" />
          </div>

          <label class="label">Tipo</label>
          <select class="input" id="repType">
            <option value="alertas">Alertas</option>
            <option value="lecturas">Lecturas</option>
            <option value="dispositivos">Dispositivos</option>
          </select>

          <div class="row">
            <button class="btn btn--primary" id="btnGenerateReport">Generar</button>
            <button class="btn btn--ghost" id="btnExportCSV">Exportar CSV</button>
          </div>

          <div class="hint">
            * En este template, “Generar” construye una vista previa con datos mock. Conecta aquí tu backend.
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card__head">
        <div>
          <h3>Vista previa</h3>
          <p>Resultado del reporte (resumen).</p>
        </div>
      </div>

      <div class="card__body">
        <div class="report" id="reportPreview">
          <div class="empty">
            <div class="empty__icon">🧾</div>
            <div class="empty__title">Sin reporte</div>
            <div class="empty__text">Configura el rango y presiona “Generar”.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>