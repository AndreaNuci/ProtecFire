<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>