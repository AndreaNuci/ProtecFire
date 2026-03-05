<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ProtecFire Admin | Centro de Control IoT</title>


   <link rel="stylesheet" href="css/admin.css">
  <!-- Chart.js (para gráficas) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>

<body>
  <!-- Sidebar -->
  <aside class="sidebar" aria-label="Barra lateral">
    <div class="brand">
      <div class="brand__logo">PF</div>
      <div class="brand__text">
        <div class="brand__name">ProtecFire</div>
        <div class="brand__sub">Admin • IoT</div>
      </div>
    </div>

    <nav class="nav">
      <button class="nav__item is-active" data-view="dashboard">
        <span class="nav__dot"></span> Dashboard
      </button>
      <button class="nav__item" data-view="alerts">
        <span class="nav__dot"></span> Alertas
        <span class="pill" id="pillAlerts">0</span>
      </button>
      <button class="nav__item" data-view="devices">
        <span class="nav__dot"></span> Dispositivos
      </button>
      <button class="nav__item" data-view="zones">
        <span class="nav__dot"></span> Zonas
      </button>
      <button class="nav__item" data-view="reports">
        <span class="nav__dot"></span> Reportes
      </button>
      <button class="nav__item" data-view="users">
        <span class="nav__dot"></span> Usuarios
      </button>
      <button class="nav__item" data-view="settings">
        <span class="nav__dot"></span> Configuración
      </button>
    </nav>

    <div class="sidebar__footer">
      <div class="mini">
        <div class="mini__title">Estado del sistema</div>
        <div class="mini__row">
          <span class="status status--ok" id="sysStatusDot"></span>
          <span id="sysStatusText">Operando normal</span>
        </div>
        <div class="mini__muted" id="lastSync">Última sync: --</div>
      </div>

      <button class="btn btn--ghost w-full" id="btnLogout">Cerrar sesión</button>
    </div>
  </aside>

  <!-- Main -->
  <main class="main">
    <!-- Topbar -->
    <header class="topbar">
      <button class="iconbtn only-mobile" id="btnToggleSidebar" aria-label="Abrir menú">
        ☰
      </button>

      <div class="topbar__title">
        <h1 id="viewTitle">Dashboard</h1>
        <p id="viewSubtitle">Centro de control y monitoreo en tiempo real.</p>
      </div>

      <div class="topbar__actions">
        <div class="search">
          <input id="globalSearch" type="search" placeholder="Buscar (dispositivo, zona, alerta)..." />
        </div>

        <button class="btn btn--primary" id="btnSimulate">Simular lectura</button>
      </div>
    </header>

    <!-- Views -->
    <section class="content">

      <!-- DASHBOARD -->
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

      <!-- ALERTS -->
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

      <!-- DEVICES -->
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

      <!-- ZONES -->
      <section class="view" id="view-zones">
        <div class="card">
          <div class="card__head">
            <div>
              <h3>Zonas</h3>
              <p>Visualiza riesgos y última lectura por ubicación.</p>
            </div>
          </div>

          <div class="card__body">
            <div class="zonesGrid" id="zonesGrid"></div>
          </div>
        </div>
      </section>

      <!-- REPORTS -->
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

      <!-- USERS -->
      <section class="view" id="view-users">
        <div class="card">
          <div class="card__head">
            <div>
              <h3>Usuarios</h3>
              <p>Administra accesos al sistema.</p>
            </div>
            <button class="btn btn--primary" id="btnAddUser">+ Nuevo usuario</button>
          </div>

          <div class="card__body">
            <div class="tablewrap">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th class="right">Acción</th>
                  </tr>
                </thead>
                <tbody id="tblUsers"></tbody>
              </table>
            </div>
          </div>
        </div>
      </section>

      <!-- SETTINGS -->
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

    </section>
  </main>

  <!-- Modal -->
  <div class="modal" id="modal" aria-hidden="true">
    <div class="modal__backdrop" data-close="1"></div>
    <div class="modal__panel" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
      <div class="modal__head">
        <h3 id="modalTitle">Modal</h3>
        <button class="iconbtn" data-close="1" aria-label="Cerrar">✕</button>
      </div>
      <div class="modal__body" id="modalBody"></div>
      <div class="modal__foot" id="modalFoot"></div>
    </div>
  </div>
   <script src="../vista/js/admin.js"></script>
</body>
</html>