<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Doctores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .table-container {
            max-width: 1200px;
            margin: auto;
        }
        .btn {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Principal.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pacientes.html">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vacunas.html">Vacunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="doctores.html">Doctores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor de Tabla -->
    <div class="table-container">
        <h2 class="text-center mb-4">Listado de Doctores</h2>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary">Agregar Doctor</button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Dr. Luis Gómez</td>
                    <td>Cardiología</td>
                    <td>+51 987654324</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Dra. Ana Martínez</td>
                    <td>Pediatría</td>
                    <td>+51 987654325</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Dr. Carlos Ramírez</td>
                    <td>Dermatología</td>
                    <td>+51 987654326</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Sistema de Administración. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
