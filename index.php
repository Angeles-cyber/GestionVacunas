<?php include('head.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión de Vacunas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to right, #6db3f2, #1e69de);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .welcome-container {
            background: #ffffffee;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            text-align: center;
            max-width: 1000px;
            width: 100%;
        }

        .welcome-container h1 {
            font-weight: bold;
            color: #1d3557;
            margin-bottom: 40px;
        }

        .user-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px 20px;
            width: 250px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .user-card img {
            width: 120px;
        }

        .user-card h2 {
            font-size: 1.3rem;
            margin-top: 15px;
            color: #333;
        }

        .btn-anim {
            margin-top: 15px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .btn-anim:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .user-wrapper {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>

    <div class="welcome-container">
        <h1>BIENVENIDOS AL SISTEMA DE GESTIÓN DE VACUNAS</h1>

        <div class="user-wrapper">

            <!-- ADMINISTRADOR -->
            <div class="text-center user-card">
                <img src="img/Admin.icon.png" alt="Administrador">
                <h2>ADMINISTRADOR</h2>
                <button class="btn btn-primary btn-anim" onclick="window.location.href='Modulos/Administrador/Login.php'">ENTRAR</button>
            </div>

            <!-- DOCTOR -->
            <div class="text-center user-card">
                <img src="img/Doctor.icon.png" alt="Doctor">
                <h2>DOCTOR</h2>
                <button class="btn btn-success btn-anim" onclick="window.location.href='Modulos/Doctor/Login.php'">ENTRAR</button>
            </div>

            <!-- PACIENTE -->
            <div class="text-center user-card">
                <img src="img/paciente.icon.png" alt="Paciente">
                <h2>PACIENTE</h2>
                <button class="btn btn-warning btn-anim" onclick="window.location.href='Modulos/Paciente/Login.php'">ENTRAR</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
