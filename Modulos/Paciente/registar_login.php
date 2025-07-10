<?php
include('../../Conexion.php');
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NombreApe       = trim($_POST['NombreApe']);
    $TipoDocumento   = trim($_POST['TipoDocumento']);
    $NumDocumento    = trim($_POST['NumDocumento']);
    $FechaNacimiento = trim($_POST['FechaNacimiento']);
    $Celular         = trim($_POST['Celular']);
    $Correo          = trim($_POST['Correo']);
    $TipoSeguro      = trim($_POST['TipoSeguro']);
    $Contraseña      = trim($_POST['Contraseña']);

    $stmt = $link->prepare("SELECT id FROM paciente WHERE TipoDocumento = ? AND NumDocumento = ?");
    $stmt->bind_param("ss", $TipoDocumento, $NumDocumento);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensaje = "⚠️ El paciente ya está registrado.";
    } else {
        $sql = "INSERT INTO paciente (NombreApe, TipoDocumento, NumDocumento, FechaNacimiento, Celular, Correo, TipoSeguro, Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ssssssss", $NombreApe, $TipoDocumento, $NumDocumento, $FechaNacimiento, $Celular, $Correo, $TipoSeguro, $Contraseña);

        if ($stmt->execute()) {
            $mensaje = "✅ Paciente registrado correctamente.";
        } else {
            $mensaje = "❌ Error al registrar: " . $stmt->error;
        }
    }

    $stmt->close();
    $link->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6db3f2, #1e69de);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: #ffffffee;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
            max-width: 500px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            color: #1d3557;
            font-weight: bold;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #1e69de;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #144ca1;
        }

        .btn-back {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #555;
            font-size: 0.9rem;
        }

        .alert {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Registro de Nuevo Paciente</h2>

    <?php if (!empty($mensaje)): ?>
        <div class="alert <?= strpos($mensaje, '✅') !== false ? 'alert-success' : 'alert-warning' ?>">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="NombreApe">Nombre y Apellido</label>
            <input type="text" class="form-control" name="NombreApe" required>
        </div>

        <div class="mb-3">
            <label for="TipoDocumento">Tipo de Documento</label>
            <input type="text" class="form-control" name="TipoDocumento" required>
        </div>

        <div class="mb-3">
            <label for="NumDocumento">Número de Documento</label>
            <input type="text" class="form-control" name="NumDocumento" required>
        </div>

        <div class="mb-3">
            <label for="FechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" name="FechaNacimiento" required>
        </div>

        <div class="mb-3">
            <label for="Celular">Celular</label>
            <input type="text" class="form-control" name="Celular" required>
        </div>

        <div class="mb-3">
            <label for="Correo">Correo</label>
            <input type="email" class="form-control" name="Correo" required>
        </div>

        <div class="mb-3">
            <label for="TipoSeguro">Tipo de Seguro</label>
            <input type="text" class="form-control" name="TipoSeguro" required>
        </div>

        <div class="mb-3">
            <label for="Contraseña">Contraseña</label>
            <input type="password" class="form-control" name="Contraseña" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrar</button>
        <a href="Login.php" class="btn-back d-block text-center">← Volver al inicio</a>
    </form>
</div>

</body>
</html>
