<?php
include('../../Conexion.php');
$mensaje = "";

// 1. Eliminar vacuna
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $link->query("DELETE FROM vacunas WHERE id = $idEliminar");
    header("Location: vacunas.php");
    exit();
}

// 2. Agregar vacuna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'agregar') {
    $nombre     = trim($_POST['nombre']);
    $fabricante = trim($_POST['fabricante']);
    $dosis      = intval($_POST['dosis']);
    $fechacad   = $_POST['fechacad'];
    $doctor_id  = intval($_POST['doctor_id']);

    $stmt = $link->prepare("INSERT INTO vacunas (Nombre, Fabricante, Vacu_disp, FechaCad, doctor_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisi", $nombre, $fabricante, $dosis, $fechacad, $doctor_id);
    $stmt->execute();
    header("Location: vacunas.php");
    exit();
}

// 3. Editar vacuna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion']) && $_POST['accion'] == 'editar') {
    $id         = intval($_POST['id']);
    $nombre     = trim($_POST['nombre']);
    $fabricante = trim($_POST['fabricante']);
    $dosis      = intval($_POST['dosis']);
    $fechacad   = $_POST['fechacad'];
    $doctor_id  = intval($_POST['doctor_id']);

    $stmt = $link->prepare("UPDATE vacunas SET Nombre = ?, Fabricante = ?, Vacu_disp = ?, FechaCad = ?, doctor_id = ? WHERE id = ?");
    $stmt->bind_param("ssisii", $nombre, $fabricante, $dosis, $fechacad, $doctor_id, $id);
    $stmt->execute();
    header("Location: vacunas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Listado de Vacunas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #6db3f2, #1e69de);
      min-height: 100vh;
    }
    .table-container {
      max-width: 1100px;
      background-color: #ffffffdd;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      margin: 30px auto;
    }
    .table thead {
      background-color: #1d3557;
      color: white;
    }
    .btn { font-size: 0.875rem; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema de Administración</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="pacientes.php">Pacientes</a></li>
        <li class="nav-item"><a class="nav-link active" href="vacunas.php">Vacunas</a></li>
        <li class="nav-item"><a class="nav-link" href="doctores.php">Doctores</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="table-container">
  <h2 class="text-center mb-4">Listado de Vacunas</h2>

  <div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVacuna" onclick="abrirAgregar()">+ Agregar Vacuna</button>
  </div>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fabricante</th>
        <th>Dosis</th>
        <th>Fecha de Caducidad</th>
        <th>Doctor</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $link->query("SELECT vacunas.*, doctores.NombreDoc FROM vacunas LEFT JOIN doctores ON vacunas.doctor_id = doctores.IdDoc");
      if ($result && $result->num_rows > 0):
        while ($row = $result->fetch_assoc()):
      ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['Nombre']) ?></td>
          <td><?= htmlspecialchars($row['Fabricante']) ?></td>
          <td><?= $row['Vacu_disp'] ?></td>
          <td><?= $row['FechaCad'] ?></td>
          <td><?= htmlspecialchars($row['NombreDoc'] ?? 'Sin asignar') ?></td>
          <td class="text-center">
            <button class="btn btn-warning btn-sm me-1"
              onclick="abrirEditar(
                <?= $row['id'] ?>,
                `<?= htmlspecialchars($row['Nombre']) ?>`,
                `<?= htmlspecialchars($row['Fabricante']) ?>`,
                <?= $row['Vacu_disp'] ?>,
                `<?= $row['FechaCad'] ?>`,
                <?= $row['doctor_id'] ?? 'null' ?>
              )">Editar</button>
            <a href="vacunas.php?eliminar=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta vacuna?')">Eliminar</a>
          </td>
        </tr>
      <?php endwhile; else: ?>
        <tr><td colspan="7" class="text-center">No hay vacunas registradas.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalVacuna" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal">Agregar Vacuna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="vacuna_id">
        <input type="hidden" name="accion" id="accion" value="agregar">

        <div class="mb-3">
          <label class="form-label">Nombre de la Vacuna</label>
          <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Fabricante</label>
          <input type="text" class="form-control" name="fabricante" id="fabricante" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Dosis Requeridas</label>
          <input type="number" class="form-control" name="dosis" id="dosis" min="1" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Fecha de Caducidad</label>
          <input type="date" class="form-control" name="fechacad" id="fechacad" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Doctor Asignado</label>
          <select class="form-select" name="doctor_id" id="doctor_id" required>
            <option value="">-- Seleccionar Doctor --</option>
            <?php
            $doctores = $link->query("SELECT IdDoc, NombreDoc FROM doctores");
            while ($doc = $doctores->fetch_assoc()):
            ?>
              <option value="<?= $doc['IdDoc'] ?>"><?= htmlspecialchars($doc['NombreDoc']) ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function abrirAgregar() {
    document.getElementById("tituloModal").innerText = "Agregar Vacuna";
    document.getElementById("accion").value = "agregar";
    document.getElementById("vacuna_id").value = "";
    document.getElementById("nombre").value = "";
    document.getElementById("fabricante").value = "";
    document.getElementById("dosis").value = "";
    document.getElementById("fechacad").value = "";
    document.getElementById("doctor_id").value = "";
  }

  function abrirEditar(id, nombre, fabricante, dosis, fechacad, doctor_id) {
    const modal = new bootstrap.Modal(document.getElementById('modalVacuna'));
    document.getElementById("tituloModal").innerText = "Editar Vacuna";
    document.getElementById("accion").value = "editar";
    document.getElementById("vacuna_id").value = id;
    document.getElementById("nombre").value = nombre;
    document.getElementById("fabricante").value = fabricante;
    document.getElementById("dosis").value = dosis;
    document.getElementById("fechacad").value = fechacad;
    document.getElementById("doctor_id").value = doctor_id;
    modal.show();
  }
</script>
</body>
</html>
