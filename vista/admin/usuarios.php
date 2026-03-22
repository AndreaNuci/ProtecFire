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