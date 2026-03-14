<section class="view" id="view-settings">
  <div class="grid grid--2">
    <div class="card">
      <div class="card__head">
        <div>
          <h3>Umbrales de riesgo</h3>
          <p>Define parámetros para detectar condiciones fuera de rango.</p>
        </div>
      </div>

      <div class="card__body">
        <form class="form" id="formThresholds">
          <div class="field">
            <label class="label">Temperatura (°C) • Alerta</label>
            <input class="input" type="number" id="thTemp" min="0" step="1" />
          </div>

          <div class="field">
            <label class="label">Humo (ppm) • Alerta</label>
            <input class="input" type="number" id="thSmoke" min="0" step="1" />
          </div>

          <div class="field">
            <label class="label">Gas (ppm) • Alerta</label>
            <input class="input" type="number" id="thGas" min="0" step="1" />
          </div>

          <button class="btn btn--primary" type="submit">Guardar configuración</button>
          <div class="hint" id="settingsHint"></div>
        </form>
      </div>
    </div>

    <div class="card">
      <div class="card__head">
        <div>
          <h3>Políticas recomendadas</h3>
          <p>Buenas prácticas para operación 24/7.</p>
        </div>
      </div>

      <div class="card__body">
        <ul class="list">
          <li><b>Monitoreo continuo:</b> valida el heartbeat de dispositivos cada 60s.</li>
          <li><b>Alertamiento:</b> usa severidad según distancia al umbral y persistencia.</li>
          <li><b>Auditoría:</b> guarda historial de alertas y acciones tomadas.</li>
          <li><b>Disponibilidad:</b> tolera fallos con reintentos y colas de mensajes.</li>
          <li><b>Seguridad:</b> tokens por dispositivo + roles (admin/operador/visor).</li>
        </ul>
      </div>
    </div>
  </div>
</section>