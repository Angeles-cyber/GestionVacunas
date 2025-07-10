<?php
include('../../Conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Pacientes</title>
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

        .btn {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>

<!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Administración</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" href="pacientes.php">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link" href="doctores.php">Doctores</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<div class="table-container">
    <h2 class="text-center mb-4">Listado de Pacientes</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre y Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Tipo de Seguro</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $result = $link->query("SELECT * FROM paciente");

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["NombreApe"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["TipoDocumento"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["NumDocumento"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["FechaNacimiento"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Celular"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Correo"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["TipoSeguro"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Contraseña"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No se encontraron registros.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
