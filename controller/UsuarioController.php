<?php

session_start();
require_once('../class/CapturaInformacion.class.php');
$captura = new CapturaInformacion;

$_SESSION['Usuario'] = htmlentities($_POST['usuario']);
$clave = htmlentities($_POST['password']);

$sql = "Insert Into Usuario(NombreCompleto, Genero, Edad, DireccionResidencia, Telefono, CorreoElectronico, Clave, FechaCreacion)Values('".$_POST['nombre']."', '".$_POST['genero']."', '".$_POST['edad']."', '".$_POST['direccionResidencia']."', '".$_POST['telefono']."', '".$_POST['correoElectronico']."', '".$_POST['contrasena']."', GETDATE())";
echo $sql;
$data = $captura->database->Insert(utf8_decode($sql));


if (!$data || !$data[0]) {
    $_SESSION['error'] = 1;
    header("Location: ../login.php");
    exit;
}
echo '<script language="javascript">alert("Usuario Registrado Correctamente");</script>';
header("Location: ../login.php");
?>