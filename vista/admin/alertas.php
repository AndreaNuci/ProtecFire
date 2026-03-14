<section class="view" id="view-alerts">
  <div class="card">
    <div class="card__head">
      <div>
        <h3>Gestión de alertas</h3>
        <p>Filtra, prioriza y resuelve eventos críticos.</p>
      </div>

      <div class="row">
        <select id="filterSeverity" class="input">
          <option value="">Severidad: Todas</option>
          <option value="Alta">Alta</option>
          <option value="Media">Media</option>
          <option value="Baja">Baja</option>
        </select>

        <select id="filterStatus" class="input">
          <option value="">Estado: Todos</option>
          <option value="Pendiente">Pendiente</option>
          <option value="Resuelta">Resuelta</option>
        </select>

        <button class="btn btn--primary" id="btnBulkResolve">Resolver pendientes</button>
      </div>
    </div>

    <div class="card__body">
      <div class="tablewrap">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Fecha/Hora</th>
              <th>Zona</th>
              <th>Dispositivo</th>
              <th>Tipo</th>
              <th>Valor</th>
              <th>Severidad</th>
              <th>Estado</th>
              <th class="right">Acción</th>
            </tr>
          </thead>
          <tbody id="tblAlerts"></tbody>
        </table>
      </div>
    </div>
  </div>
</section>