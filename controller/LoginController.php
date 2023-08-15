<?php

session_start();
require_once('../class/CapturaInformacion.class.php');
$captura = new CapturaInformacion;

$_SESSION['Usuario'] = htmlentities($_POST['usuario']);
$clave = htmlentities($_POST['password']);

$sql = "SELECT  NombreCompleto as nombre
        FROM    Usuario 
        WHERE   CorreoElectronico = '" . $_SESSION['Usuario'] . "' 
         AND Clave = '" . $clave . "'";
$data = $captura->database->query(utf8_decode($sql));


if (!$data || !$data[0]) {
    $_SESSION['error'] = 1;
    header("Location: ../login.php");
    exit;
}

$_SESSION['logged'] = true;
header("Location: ../inicio.php");
?>