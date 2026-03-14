<section class="view" id="view-devices">
  <div class="grid grid--2">
    <div class="card">
      <div class="card__head">
        <div>
          <h3>Dispositivos IoT</h3>
          <p>Alta, estado y salud de sensores (ej. ESP32).</p>
        </div>
        <button class="btn btn--primary" id="btnAddDevice">+ Agregar</button>
      </div>

      <div class="card__body">
        <div class="tablewrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Zona</th>
                <th>Tipo</th>
                <th>Online</th>
                <th>Señal</th>
                <th>Batería</th>
                <th class="right">Acción</th>
              </tr>
            </thead>
            <tbody id="tblDevices"></tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card__head">
        <div>
          <h3>Detalle</h3>
          <p id="deviceDetailSub">Selecciona un dispositivo para ver lecturas recientes.</p>
        </div>
      </div>

      <div class="card__body">
        <div class="detail" id="deviceDetail">
          <div class="empty">
            <div class="empty__icon">📡</div>
            <div class="empty__title">Sin selección</div>
            <div class="empty__text">Haz clic en “Ver” para mostrar el historial del dispositivo.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>