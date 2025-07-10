<?php
include('../../Conexion.php');

$mensaje = "";

// Eliminar
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $link->query("DELETE FROM cita WHERE IdCita = $id");
    header("Location: citas.php");
    exit();
}

// Insertar nueva cita
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha     = $_POST['fecha'];
    $dia       = $_POST['dia'];
    $doctor    = $_POST['doctor'];
    $especialidad = $_POST['especialidad'];
    $hora      = $_POST['hora'];
    $aviso     = $_POST['aviso'];
    $paciente  = $_POST['paciente'];
    $documento = $_POST['documento'];

    $stmt = $link->prepare("INSERT INTO cita (Fecha, Dia, NombreDoctor, Especialidad, HoradeAtencion, Aviso, NombredelPaciente, NumDocumento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fecha, $dia, $doctor, $especialidad, $hora, $aviso, $paciente, $documento);

    if (!$stmt->execute()) {
        $mensaje = "❌ Error al registrar la cita: " . $link->error;
    } else {
        header("Location: citas.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            min-height: 100vh;
        }
        .table-container {
            max-width: 1100px;
            background-color: #ffffffee;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin: 40px auto;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Administración</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="vacunas.php">Vacunas</a></li>
            <li class="nav-item"><a class="nav-link active" href="citas.php">Citas</a></li>
        </ul>
    </div>
</nav>

<div class="table-container">
    <h2 class="text-center mb-4">Listado de Citas</h2>

    <?php if ($mensaje): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCita">+ Nueva Cita</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Día</th>
                    <th>Doctor</th>
                    <th>Especialidad</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Documento</th>
                    <th>Aviso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $link->query("SELECT * FROM cita ORDER BY Fecha, HoradeAtencion");
                if ($result && $result->num_rows > 0):
                    while ($row = $result->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $row['IdCita'] ?></td>
                        <td><?= $row['Fecha'] ?></td>
                        <td><?= $row['Dia'] ?></td>
                        <td><?= htmlspecialchars($row['NombreDoctor']) ?></td>
                        <td><?= htmlspecialchars($row['Especialidad']) ?></td>
                        <td><?= $row['HoradeAtencion'] ?></td>
                        <td><?= htmlspecialchars($row['NombredelPaciente']) ?></td>
                        <td><?= $row['NumDocumento'] ?></td>
                        <td><?= htmlspecialchars($row['Aviso']) ?></td>
                        <td>
                            <a href="citas.php?eliminar=<?= $row['IdCita'] ?>" onclick="return confirm('¿Eliminar esta cita?')" class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; else: ?>
                    <tr><td colspan="10" class="text-center">No hay citas registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Nueva Cita -->
<div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCitaLabel">Registrar Nueva Cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Día</label>
            <input type="text" class="form-control" name="dia" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre del Doctor</label>
            <input type="text" class="form-control" name="doctor" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Especialidad</label>
            <input type="text" class="form-control" name="especialidad" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Hora de Atención</label>
            <input type="time" class="form-control" name="hora" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Aviso</label>
            <textarea class="form-control" name="aviso" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre del Paciente</label>
            <input type="text" class="form-control" name="paciente" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Número de Documento</label>
            <input type="text" class="form-control" name="documento" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar Cita</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-4">
    &copy; 2024 Sistema de Administración. Todos los derechos reservados.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
