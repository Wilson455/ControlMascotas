<?php

session_start();
require_once('../class/CapturaInformacionUsuario.class.php');
$captura = new CapturaInformacion;

$_SESSION['Usuario'] = htmlentities($_POST['usuario']);
$clave = htmlentities($_POST['password']);

$sql = "SELECT  Usuario as nombre
        FROM    Usuario 
        WHERE   Usuario = '" . $_SESSION['Usuario'] . "' 
         AND ClaveIn = '" . $clave . "'";
$data = $captura->database->query(utf8_decode($sql));


if (!$data || !$data[0]) {
    $_SESSION['error'] = 1;
    header("Location: ../login.php");
    exit;
}

$_SESSION['logged'] = true;
header("Location: ../inicio.php");
?>