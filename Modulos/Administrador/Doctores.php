<?php
include('../../Conexion.php');
$mensaje = "";

// Insertar doctor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['DNI'])) {
    $dni = trim($_POST['DNI']);
    $nombre = trim($_POST['NombreDoc']);
    $especialidad = trim($_POST['Especialidad']);
    $telefono = trim($_POST['Telefono']);
    $horas = trim($_POST['horasdeTrabajo']);
    $dias = trim($_POST['DiasdeTrabajo']);
    $clave = trim($_POST['Contraseña']);

    // Validar si ya existe
    $verificar = $link->prepare("SELECT IdDoc FROM doctores WHERE DNI = ?");
    $verificar->bind_param("s", $dni);
    $verificar->execute();
    $verificar->store_result();

    if ($verificar->num_rows > 0) {
        $mensaje = "⚠️ El doctor con ese DNI ya está registrado.";
    } else {
        $insertar = $link->prepare("INSERT INTO doctores (DNI, NombreDoc, Especialidad, Telefono, horasdeTrabajo, DiasdeTrabajo, Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertar->bind_param("sssssss", $dni, $nombre, $especialidad, $telefono, $horas, $dias, $clave);

        if ($insertar->execute()) {
            $mensaje = "✅ Doctor registrado correctamente.";
        } else {
            $mensaje = "❌ Error al registrar: " . $insertar->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Doctores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to right, #6db3f2, #1e69de);
            min-height: 100vh;
        }

        .table-container {
            max-width: 1200px;
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Administración</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="pacientes.php">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link active" href="doctores.php">Doctores</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Tabla de Doctores -->
<div class="table-container">
    <h2 class="text-center mb-4">Listado de Doctores Disponibles</h2>

    <?php if (!empty($mensaje)): ?>
        <div class="alert <?= strpos($mensaje, '✅') !== false ? 'alert-success' : 'alert-warning' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDoctor">+ Agregar Doctor</button>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre del Doctor</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Horas de Trabajo</th>
                    <th>Días de Trabajo</th>
                    <th>Disponibilidad</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $result = $link->query("SELECT * FROM doctores");

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["NombreDoc"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Especialidad"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Telefono"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["horasdeTrabajo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["DiasdeTrabajo"]) . "</td>";

                        // Disponibilidad aleatoria
                        $disponible = rand(0, 1);
                        $estadoTexto = $disponible ? "Disponible" : "No disponible";
                        $estadoClase = $disponible ? "success" : "danger";

                        echo "<td><span class='badge bg-$estadoClase'>$estadoTexto</span></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No se encontraron doctores registrados.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Agregar Doctor -->
<div class="modal fade" id="modalDoctor" tabindex="-1" aria-labelledby="modalDoctorLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <label>DNI</label>
                    <input type="text" class="form-control" name="DNI" required>
                </div>
                <div class="mb-2">
                    <label>Nombre del Doctor</label>
                    <input type="text" class="form-control" name="NombreDoc" required>
                </div>
                <div class="mb-2">
                    <label>Especialidad</label>
                    <input type="text" class="form-control" name="Especialidad" required>
                </div>
                <div class="mb-2">
                    <label>Teléfono</label>
                    <input type="text" class="form-control" name="Telefono" required>
                </div>
                <div class="mb-2">
                    <label>Horas de Trabajo</label>
                    <input type="text" class="form-control" name="horasdeTrabajo" required>
                </div>
                <div class="mb-2">
                    <label>Días de Trabajo</label>
                    <input type="text" class="form-control" name="DiasdeTrabajo" required>
                </div>
                <div class="mb-2">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="Contraseña" required>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar Doctor</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
