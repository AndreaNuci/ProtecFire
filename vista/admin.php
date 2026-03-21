<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ProtecFire Admin | Centro de Control IoT</title>

  <link rel="stylesheet" href="admin/css/admin.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>

<body>

  <?php include "admin/sidebar.php"; ?>

  <main class="main">
    <?php include "admin/topbar.php"; ?>

    <section class="content">
      <?php include "admin/dashboard.php"; ?>
      <?php include "admin/alertas.php"; ?>
      <?php include "admin/dispositivos.php"; ?>
      <?php include "admin/zonas.php"; ?>
      <?php include "admin/reportes.php"; ?>
      <?php include "admin/configuracion.php"; ?>
    </section>
  </main>

  <?php include "admin/modal.php"; ?>

  <script src="/vista/admin/js/state.js"></script>
  <script src="/vista/admin/js/dom.js"></script>
  <script src="/vista/admin/js/helpers.js"></script>
  <script src="/vista/admin/js/navigation.js"></script>
  <script src="/vista/admin/js/modal.js"></script>
  <script src="/vista/admin/js/render.js"></script>
  <script src="/vista/admin/js/alerts.js"></script>
  <script src="/vista/admin/js/devices.js"></script>
  <script src="/vista/admin/js/users.js"></script>
  <script src="/vista/admin/js/settings.js"></script>
  <script src="/vista/admin/js/reports.js"></script>
  <script src="/vista/admin/js/search.js"></script>
  <script src="/vista/admin/js/chart.js"></script>
  <script src="/vista/admin/js/simulation.js"></script>
  <script src="/vista/admin/js/init.js"></script>
  
</body>
</html>