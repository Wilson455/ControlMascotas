<?php

session_start();
require_once('../class/CapturaInformacion.class.php');
require_once('../class/XML.class.php');

switch ($_POST['metodo']) {
    case 'registrarUsuario':
        XML::xmlResponse(registrarUsuario($_POST['nombre'], $_POST['genero'], $_POST['edad'], $_POST['direccionResidencia'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['contrasena'], $_POST['confirmarContrasena']));
        break;
    case 'registrarMascota':
        XML::xmlResponse(registrarMascota($_POST['nombre'], $_POST['edad'], $_POST['tipo'], $_POST['rasgosFisicos'], $_POST['tipoAlimento']));
        break;
    case 'consultarPerfil':
        XML::xmlResponse(consultarPerfil($_POST['idUsuario']));
        break;
    case 'listarMascotas':
        XML::xmlResponse(listarMascotas($_POST['idUsuario']));
        break;
    case 'consultarMascota':
        XML::xmlResponse(consultarMascota($_POST['idMascota'],));
        break;
    case 'actualizarUsuario':
        XML::xmlResponse(actualizarUsuario($_POST['idUsuario'], $_POST['nombre'], $_POST['genero'], $_POST['edad'], $_POST['direccionResidencia'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['contrasena'], $_POST['confirmarContrasena']));
        break;
    case 'actualizarMascota':
        XML::xmlResponse(actualizarMascota($_POST['idMascota'], $_POST['nombre'], $_POST['edad'], $_POST['tipo'], $_POST['rasgosFisicos'], $_POST['tipoAlimento']));
        break;
}

function registrarUsuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarUsuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarPerfil($idUsuario) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarPerfil($idUsuario);
    if ($data) {
        $xml .= "";
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        NombreCompleto='".$data[$i]['NombreCompleto']."'
                        Genero='".$data[$i]['Genero']."'
                        Edad='".$data[$i]['Edad']."'
                        DireccionResidencia='".$data[$i]['DireccionResidencia']."'
                        Telefono='".$data[$i]['Telefono']."'
                        CorreoElectronico='".$data[$i]['CorreoElectronico']."'
                        Clave='".$data[$i]['Clave']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function listarMascotas($idUsuario) {
    $captura = new CapturaInformacion();
    $data = $captura->listarMascotas($idUsuario);
    if ($data) {
        $xml .= "";
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        Nombre='".$data[$i]['Nombre']."'
                        Edad='".$data[$i]['Edad']."'
                        Tipo='".$data[$i]['Tipo']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarMascota($idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarMascota($idMascota);
    if ($data) {
        $xml .= "";
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        Nombre='".$data[$i]['Nombre']."'
                        Edad='".$data[$i]['Edad']."'
                        Tipo='".$data[$i]['Tipo']."'
                        RasgosFisicos='".$data[$i]['RasgosFisicos']."'
                        TipoAlimento='".$data[$i]['TipoAlimento']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarUsuario($idUsuario, $nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarUsuario($idUsuario, $nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarMascota($idMascota, $nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarMascota($idMascota, $nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function GuardarForm1($txtNombre, $slcTipoSolicitante, $txtCedula, $txtDireccion, $txtCelular, $txtCorreo, $slcTipoReclamoNvl1, $slcTipoReclamoNvl2, $txtFechaTran1, $txtHoraTran1, $txtIdenTerminal1, $txtNumTran1, $txtNomConvenioCorr, $txtNomConvenioErr, $txtValorTran1, $txtNumReferancia1, $txtNumCuentaAbono1,$txtNomConvenio2,$txtNumReferanciaErr,$txtNumReferanciaCorr, $slcTipoCta1, $slcBanco1, $txtNombreTitu1, $txtCedulaTitu1, $Usuario, $Nombre, $slcCiudad, $slcDepartamento, $txtObservacion) {
    $captura = new CapturaInformacion();
    $data = $captura->GuardarForm1($txtNombre, $slcTipoSolicitante, $txtCedula, $txtDireccion, $txtCelular, $txtCorreo, $slcTipoReclamoNvl1, $slcTipoReclamoNvl2, $txtFechaTran1, $txtHoraTran1, $txtIdenTerminal1, $txtNumTran1, $txtNomConvenioCorr, $txtNomConvenioErr, $txtValorTran1, $txtNumReferancia1, $txtNumCuentaAbono1,$txtNomConvenio2,$txtNumReferanciaErr,$txtNumReferanciaCorr, $slcTipoCta1, $slcBanco1, $txtNombreTitu1, $txtCedulaTitu1, $Usuario, $Nombre, $slcCiudad, $slcDepartamento, $txtObservacion);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}
?>

