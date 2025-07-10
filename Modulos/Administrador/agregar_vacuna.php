<?php
include('../../Conexion.php');

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fabricante = $_POST['fabricante'];
    $dosis = intval($_POST['dosis']);

    $stmt = $link->prepare("INSERT INTO vacunas (Nombre, Fabricante, Vacu_disp) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $fabricante, $dosis);

    if ($stmt->execute()) {
        header("Location: vacunas.php");
        exit();
    } else {
        $mensaje = "Error al agregar la vacuna: " . $link->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Vacuna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Agregar Nueva Vacuna</h2>

        <?php if ($mensaje): ?>
            <div class="alert alert-danger"><?= $mensaje ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Vacuna</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante</label>
                <input type="text" class="form-control" id="fabricante" name="fabricante" required>
            </div>
            <div class="mb-3">
                <label for="dosis" class="form-label">Dosis Requeridas</label>
                <input type="number" class="form-control" id="dosis" name="dosis" min="1" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="vacunas.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar Vacuna</button>
            </div>
        </form>
    </div>
</body>
</html>
