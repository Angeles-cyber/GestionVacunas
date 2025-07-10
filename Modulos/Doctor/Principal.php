
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Doctor - Principal</title>
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
            max-width: 1100px;
            margin: 40px auto;
            padding: 40px 30px 30px 30px;
            border-radius: 30px;
            background: rgba(255,255,255,0.92);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
        }
        .navbar {
            margin-bottom: 0;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.13);
            transition: transform 0.2s, box-shadow 0.2s;
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        }
        .card:hover {
            transform: translateY(-6px) scale(1.04);
            box-shadow: 0 8px 24px rgba(0,0,0,0.18);
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
        }
        .card img {
            width: 60px;
            margin-bottom: 10px;
        }
        .icon-circle {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #fff;
            padding: 18px;
            border-radius: 50%;
            display: inline-block;
        }
        .bg-vacunas { background: #0d6efd; }
        .bg-citas { background: #198754; }
        .bg-doctores { background: #6f42c1; }
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
            .main-container { padding: 20px 5px; }
            .btn-regresar { position: static; width: 100%; margin-top: 20px; }
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-hospital"></i> Sistema de Gestión de Vacunas
            </a>
        </div>
    </nav>

    <div class="container main-container position-relative">
        <h2 class="text-center mb-5 fw-bold text-primary">¿A dónde desea ir?</h2>
        <div class="row g-4 justify-content-center">
            <!-- Vacunas -->
            <div class="col-md-4 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-circle bg-vacunas mb-2">
                            <i class="bi bi-capsule"></i>
                        </div>
                        <h5 class="card-title text-primary">Vacunas</h5>
                        <p class="card-text">Registre y consulte las vacunas disponibles para los pacientes.</p>
                        <button class="btn btn-primary btn-custom mt-2" onclick="window.location.href='vacunas.php'">
                            <i class="bi bi-arrow-right-circle"></i> Acceder
                        </button>
                    </div>
                </div>
            </div>
            <!-- Citas -->
            <div class="col-md-4 col-sm-6">
                <div class="card text-center h-100">
                    <div class="card-body">
                        <div class="icon-circle bg-citas mb-2">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h5 class="card-title text-success">Citas</h5>
                        <p class="card-text">Consulte y gestione las citas pendientes de sus pacientes.</p>
                        <button class="btn btn-success btn-custom mt-2" onclick="window.location.href='Citas.php'">
                            <i class="bi bi-arrow-right-circle"></i> Acceder
                        </button>
                    </div>
                </div>
            </div>
  
        </div>
        <button class="btn btn-warning btn-regresar mt-4" onclick="window.location.href='../../index.php'">
            <i class="bi bi-arrow-left-circle"></i> Regresar
        </button>
    </div>
</body>
</html>
