<?php
include('../../Conexion.php');

// Eliminar vacuna si se recibe ID por GET
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $link->query("DELETE FROM vacunas WHERE id = $idEliminar");
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
    .btn {
      font-size: 0.875rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema para Doctor</a>
    <ul class="navbar-nav ms-auto">
      <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
      <li class="nav-item"><a class="nav-link active" href="vacunas.php">Vacunas</a></li>
      <li class="nav-item"><a class="nav-link" href="citas.php">Citas</a></li>
    </ul>
  </div>
</nav>

<!-- Contenido -->
<div class="table-container">
  <h2 class="text-center mb-4">Listado de Vacunas</h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Fabricante</th>
          <th>Dosis</th>
          <th>Fecha de Caducidad</th>
          <th class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $link->query("SELECT * FROM vacunas");
        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['Nombre']) ?></td>
            <td><?= htmlspecialchars($row['Fabricante']) ?></td>
            <td><?= $row['Vacu_disp'] ?></td>
            <td><?= $row['FechaCad'] ?></td>
            <td class="text-center">
              <a href="vacunas.php?eliminar=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('¿Eliminar esta vacuna?')">Eliminar</a>
            </td>
          </tr>
        <?php endwhile; else: ?>
          <tr>
            <td colspan="6" class="text-center">No hay vacunas registradas.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
