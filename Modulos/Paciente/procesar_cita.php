<?php
include('../../Conexion.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: vacunas.php');
    exit;
}

// Recogemos y sanitizamos
$fecha        = $_POST['fecha'];                // YYYY-MM-DD
$hora         = $_POST['hora'];                 // HH:MM
$aviso        = trim($_POST['aviso']);
$doctor       = $link->real_escape_string($_POST['doctor_nombre']);
$especialidad = $link->real_escape_string($_POST['especialidad']);
$paciente     = $link->real_escape_string($_POST['paciente']);
$documento    = $link->real_escape_string($_POST['documento']);

// Derivamos el día de la semana en español
$timestamp = strtotime($fecha);
$diasSemana = ['domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
$dia = $diasSemana[ date('w', $timestamp) ];

// Insertamos en la tabla citas
$stmt = $link->prepare("
    INSERT INTO cita 
      (Fecha, Dia, NombreDoctor, Especialidad, HoradeAtencion, Aviso, NombredelPaciente, NumDocumento)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "ssssssss",
    $fecha,
    $dia,
    $doctor,
    $especialidad,
    $hora,
    $aviso,
    $paciente,
    $documento
);

if ($stmt->execute()) {
    // Si quieres un mensaje flash, podrías pasarlo por GET
    header('Location: vacunas.php?msg=cita_ok');
} else {
    header('Location: vacunas.php?msg=cita_err');
}

$stmt->close();
$link->close();
