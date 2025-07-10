<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Paciente - Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-image: url('../../img/banner.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            min-height: 100vh;
        }

        .main-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 40px 30px;
            border-radius: 30px;
            background: rgba(255,255,255,0.92);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
        }

        .navbar {
            margin-bottom: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: scale(1.04);
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
        }

        .card img {
            width: 60px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .icon-circle {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #fff;
            padding: 18px;
            border-radius: 50%;
            display: inline-block;
        }

        .bg-vacunas { background-color: #0d6efd; }
        .bg-citas { background-color: #198754; }

        .btn-custom {
            width: 100%;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-regresar {
            position: absolute;
            top: 25px;
            right: 40px;
        }

        @media (max-width: 767px) {
            .main-container { padding: 20px 10px; }
            .btn-regresar { position: static; width: 100%; margin-top: 20px; }
        }
    </style>
</head>
<body>

<!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-heart-pulse-fill"></i> Sistema para los Pacientes
        </a>
    </div>
</nav>

<!-- Contenido principal -->
<div class="container main-container position-relative">
    <h2 class="text-center mb-5 fw-bold text-primary">¿A dónde desea ir?</h2>
    <div class="row g-4 justify-content-center">
        <!-- Vacunas -->
        <div class="col-md-6 col-sm-12">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="icon-circle bg-vacunas">
                        <i class="bi bi-capsule-pill"></i>
                    </div>
                    <h5 class="card-title text-primary">Vacunas</h5>
                    <p class="card-text">Registre las vacunas disponibles y consulte su historial.</p>
                    <button class="btn btn-primary btn-custom mt-2" onclick="window.location.href='vacunas.php'">
                        <i class="bi bi-arrow-right-circle"></i> Acceder
                    </button>
                </div>
            </div>
        </div>

        <!-- Citas -->
        <div class="col-md-6 col-sm-12">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="icon-circle bg-citas">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>
                    <h5 class="card-title text-success">Citas</h5>
                    <p class="card-text">Aquí podrá ver las citas médicas pendientes.</p>
                    <button class="btn btn-success btn-custom mt-2" onclick="window.location.href='Citas.php'">
                        <i class="bi bi-arrow-right-circle"></i> Acceder
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Regresar -->
    <button class="btn btn-warning btn-regresar mt-4" onclick="window.location.href='../../index.php'">
        <i class="bi bi-arrow-left-circle"></i> Regresar
    </button>
</div>

</body>
</html>
