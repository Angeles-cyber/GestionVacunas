<?php 
session_start(); 

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "base_posta");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario']; 
    $contrasena = $_POST['contrasena']; 

    // Consulta segura usando statement preparado
    $stmt = $conn->prepare("SELECT * FROM doctores WHERE DNI = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $contrasena === $user['contraseña']) {
        $_SESSION['admin'] = $user['DNI'];
        header("Location: principal.php");
        exit();
    } else {
        $mensaje = "⚠️ Acceso denegado. Usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login – Doctor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            min-height: 100vh;
            background: url('../../img/fondopaciente.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255,255,255,0.97);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            padding: 40px 30px;
            max-width: 400px;
            width: 100%;
        }
        .login-title {
            font-size: 2.2rem;
            font-weight: bold;
            color: #198754;
            margin-bottom: 10px;
        }
        .login-subtitle {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 25px;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-login {
            background: #198754;
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .btn-login:hover {
            background: #157347;
        }
        .mensaje {
            margin-bottom: 15px;
            color: #d90429;
            font-weight: 500;
            text-align: center;
        }
        .enlace {
            text-align: right;
            margin-top: 10px;
        }
        .enlace a {
            font-size: 13px;
            color: #0d6efd;
            text-decoration: none;
        }
        .enlace a:hover {
            text-decoration: underline;
        }
        .icon-user {
            font-size: 3rem;
            color: #198754;
            display: block;
            margin: 0 auto 10px auto;
        }
    </style>
</head>
<body>
    <div class="login-card mx-auto">
        <i class="bi bi-person-circle icon-user"></i>
        <div class="login-title text-center">Bienvenido Doctor</div>
        <div class="login-subtitle text-center mb-3">Inicie sesión para acceder al sistema</div>
        <?php if (!empty($mensaje)) echo "<div class='mensaje'>$mensaje</div>"; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="usuario" class="form-label"><i class="bi bi-person"></i> Usuario</label>
                <input type="text" name="usuario" id="usuario" class="form-control" required autocomplete="username">
            </div>
            <div class="mb-2">
                <label for="contrasena" class="form-label"><i class="bi bi-lock"></i> Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required autocomplete="current-password">
            </div>
            <button type="submit" class="btn btn-login w-100 mt-3">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
            </button>
        </form>
    </div>
</body>
</html>
