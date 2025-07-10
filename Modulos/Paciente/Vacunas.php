<?php
include('../../Conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Vacunas por Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6db3f2, #1e69de);
            min-height: 100vh;
        }

        .table-container {
            max-width: 1100px;
            margin: 40px auto;
            background: #ffffffee;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        }

        .doctor-header {
            background-color: #1d3557;
            color: white;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .table-vacunas {
            margin-top: 10px;
        }

        .badge-empty {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Sistema de Pacientes</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link" href="Citas.php">Citas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="table-container">
    <h2 class="text-center mb-4">Vacunas por Doctor</h2>

    <?php
    $doctores = $link->query("SELECT * FROM doctores");

    if ($doctores && $doctores->num_rows > 0):
        while ($doctor = $doctores->fetch_assoc()):
            $doctor_id = $doctor['IdDoc'];

            echo "<div class='doctor-header'>";
            echo "<h5 class='mb-0'>👨‍⚕️ {$doctor['NombreDoc']} — {$doctor['Especialidad']} <span class='float-end'>📞 {$doctor['Telefono']}</span></h5>";
            echo "</div>";

            // Obtener vacunas asociadas a este doctor
            $vacunas = $link->query("SELECT * FROM vacunas WHERE doctor_id = $doctor_id");

            if ($vacunas && $vacunas->num_rows > 0): ?>
                <div class="table-responsive table-vacunas">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr class="table-primary">
                                <th>ID</th>
                                <th>Nombre Vacuna</th>
                                <th>Fabricante</th>
                                <th>Dosis Disponibles</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($vacuna = $vacunas->fetch_assoc()): ?>
                            <tr>
                                <td><?= $vacuna['id'] ?></td>
                                <td><?= htmlspecialchars($vacuna['Nombre']) ?></td>
                                <td><?= htmlspecialchars($vacuna['Fabricante']) ?></td>
                                <td><?= $vacuna['Vacu_disp'] ?></td>
                                <td class="text-center">
                                    <a href="?eliminar=<?= $vacuna['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar esta vacuna?')">Eliminar</a>
                                    <button class="btn btn-primary btn-sm btn-separar" data-bs-toggle="modal" data-bs-target="#modalCita"
                                        data-id="<?= $vacuna['id'] ?>"
                                        data-vacuna="<?= htmlspecialchars($vacuna['Nombre']) ?>"
                                        data-doctor="<?= htmlspecialchars($doctor['NombreDoc']) ?>"
                                        data-especialidad="<?= htmlspecialchars($doctor['Especialidad']) ?>">
                                        Separar Cita
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-muted mt-2">🔕 Este doctor aún no tiene vacunas registradas.</p>
            <?php endif; ?>
        <?php endwhile;
    else: ?>
        <p class="text-center">No hay doctores registrados.</p>
    <?php endif; ?>
</div>

<!-- Modal: Separar Cita -->
<div class="modal fade" id="modalCita" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="procesar_cita.php" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Separar Cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="vacuna_id" id="vacuna_id">
                <input type="hidden" name="doctor_nombre" id="doctor_nombre">
                <input type="hidden" name="especialidad" id="doctor_especialidad">

                <div class="mb-3">
                    <label class="form-label">Nombre del Paciente</label>
                    <input type="text" class="form-control" name="paciente" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Documento de Identidad</label>
                    <input type="text" class="form-control" name="documento" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hora</label>
                    <input type="time" class="form-control" name="hora" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mensaje para el Doctor</label>
                    <textarea class="form-control" name="aviso" rows="2" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Confirmar Cita</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.btn-separar').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('vacuna_id').value = btn.dataset.id;
            document.getElementById('doctor_nombre').value = btn.dataset.doctor;
            document.getElementById('doctor_especialidad').value = btn.dataset.especialidad;
        });
    });
</script>
</body>
</html>
