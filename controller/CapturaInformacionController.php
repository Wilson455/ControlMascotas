<?php
require_once('../class/CapturaInformacion.class.php');
require_once('../class/XML.class.php');

switch ($_POST['metodo']) {
    case 'consultarPerfil':
        XML::xmlResponse(consultarPerfil($_POST['idUsuario']));
        break;
    case 'listarMascotas':
        XML::xmlResponse(listarMascotas($_POST['idUsuario']));
        break;
    case 'consultarMascota':
        XML::xmlResponse(consultarMascota($_POST['idMascota']));
        break;
    case 'listarControlMedico':
        XML::xmlResponse(listarControlMedico($_POST['idMascota']));
        break;
    case 'consultarControlMedico':
        XML::xmlResponse(consultarControlMedico($_POST['idControlMedico']));
        break;
    case 'listarProcedimientoVeterinario':
        XML::xmlResponse(listarProcedimientoVeterinario($_POST['idMascota']));
        break;
    case 'consultarProcedimientoVeterinario':
        XML::xmlResponse(consultarProcedimientoVeterinario($_POST['idProcedimientoVeterinario']));
        break;
    case 'listarIndicadorSalud':
        XML::xmlResponse(listarIndicadorSalud($_POST['idMascota']));
        break;
    case 'consultarIndicadorSalud':
        XML::xmlResponse(consultarIndicadorSalud($_POST['idIndicadorSalud']));
        break;
    case 'listarCondicionSalud':
        XML::xmlResponse(listarCondicionSalud($_POST['idMascota']));
        break;
    case 'consultarCondicionSalud':
        XML::xmlResponse(consultarCondicionSalud($_POST['idCondicionSalud']));
        break;
    case 'usuario':
        XML::xmlResponse(usuario($_POST['nombre'], $_POST['genero'], $_POST['edad'], $_POST['direccionResidencia'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['contrasena'], $_POST['confirmarContrasena']));
        break;
    case 'registrarMascota':
        XML::xmlResponse(registrarMascota($_POST['nombre'], $_POST['edad'], $_POST['tipo'], $_POST['rasgosFisicos'], $_POST['tipoAlimento'], $_POST['idUsuario']));
        break;
    case 'actualizarUsuario':
        XML::xmlResponse(actualizarUsuario($_POST['idUsuario'], $_POST['nombre'], $_POST['genero'], $_POST['edad'], $_POST['direccionResidencia'], $_POST['telefono'], $_POST['correoElectronico'], $_POST['contrasena'], $_POST['confirmarContrasena']));
        break;
    case 'actualizarMascota':
        XML::xmlResponse(actualizarMascota($_POST['idMascota'], $_POST['nombre'], $_POST['edad'], $_POST['tipo'], $_POST['rasgosFisicos'], $_POST['tipoAlimento']));
        break;
    case 'registrarControlMedico':
        XML::xmlResponse(registrarControlMedico($_POST['nombre'], $_POST['fecha'], $_POST['diagnostico'], $_POST['observaciones'], $_POST['idMascota']));
        break;
    case 'actualizarControlMedico':
        XML::xmlResponse(actualizarControlMedico($_POST['nombre'], $_POST['fecha'], $_POST['diagnostico'], $_POST['observaciones'], $_POST['idControlMedico']));
        break;
    case 'registrarProcedimientoVeterinario':
        XML::xmlResponse(registrarProcedimientoVeterinario($_POST['nombre'], $_POST['fecha'], $_POST['resultadoExamen'], $_POST['tratamiento'], $_POST['recomendacionesPertinentes'], $_POST['idMascota']));
        break;
    case 'actualizarProcedimientoVeterinario':
        XML::xmlResponse(actualizarProcedimientoVeterinario($_POST['nombre'], $_POST['fecha'], $_POST['resultadoExamen'], $_POST['tratamiento'], $_POST['recomendacionesPertinentes'], $_POST['idProcedimientoVeterinario']));
        break;
    case 'registrarIndicadorSalud':
        XML::xmlResponse(registrarIndicadorSalud($_POST['peso'], $_POST['fechaVacunacion'], $_POST['otrosValores'], $_POST['idMascota']));
        break;
    case 'actualizarIndicadorSalud':
        XML::xmlResponse(actualizarIndicadorSalud($_POST['peso'], $_POST['fechaVacunacion'], $_POST['otrosValores'], $_POST['idIndicadorSalud']));
        break;
    case 'registrarCondicionSalud':
        XML::xmlResponse(registrarCondicionSalud($_POST['nombre'], $_POST['descripcion'], $_POST['tratamiento'], $_POST['idMascota']));
        break;
    case 'actualizarCondicionSalud':
        XML::xmlResponse(actualizarCondicionSalud($_POST['nombre'], $_POST['descripcion'], $_POST['tratamiento'], $_POST['idCondicionSalud']));
        break;
    default:
        echo "No se encontro el metodo";
        break;
}

function consultarPerfil($idUsuario) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarPerfil($idUsuario);
    $xml = "";
    if ($data) {
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
    $xml = "";
    if ($data) {
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
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
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

function listarControlMedico($idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->listarControlMedico($idMascota);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        IdMascota='".$data[$i]['IdMascota']."'
                        Fecha='".$data[$i]['Fecha']."'
                        NombreProfesional='".$data[$i]['NombreProfesional']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarControlMedico($idControlMedico) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarControlMedico($idControlMedico);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        NombreProfesional='".$data[$i]['NombreProfesional']."'
                        Fecha='".$data[$i]['Fecha']."'
                        Diagnostico='".$data[$i]['Diagnostico']."'
                        Observaciones='".$data[$i]['Observaciones']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function listarProcedimientoVeterinario($idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->listarProcedimientoVeterinario($idMascota);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        NombreProcedimiento='".$data[$i]['NombreProcedimiento']."'
                        FechaProcedimiento='".$data[$i]['FechaProcedimiento']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarProcedimientoVeterinario($idProcedimientoVeterinario) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarProcedimientoVeterinario($idProcedimientoVeterinario);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        NombreProcedimiento='".$data[$i]['NombreProcedimiento']."'
                        FechaProcedimiento='".$data[$i]['FechaProcedimiento']."'
                        ResultadoExamen='".$data[$i]['ResultadoExamen']."'
                        Tratamiento='".$data[$i]['Tratamiento']."'
                        RecomendacionesPertinentes='".$data[$i]['RecomendacionesPertinentes']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function listarIndicadorSalud($idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->listarIndicadorSalud($idMascota);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        Peso='".$data[$i]['Peso']."'
                        FechaVacunacion='".$data[$i]['FechaVacunacion']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarIndicadorSalud($idIndicadorSalud) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarIndicadorSalud($idIndicadorSalud);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Peso='".$data[$i]['Peso']."'
                        FechaVacunacion='".$data[$i]['FechaVacunacion']."'
                        OtrosValores='".$data[$i]['OtrosValores']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function listarCondicionSalud($idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->listarCondicionSalud($idMascota);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Id='".$data[$i]['Id']."'
                        Nombre='".$data[$i]['Nombre']."'
                        Descripcion='".$data[$i]['Descripcion']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function consultarCondicionSalud($idCondicionSalud) {
    $captura = new CapturaInformacion();
    $data = $captura->consultarCondicionSalud($idCondicionSalud);
    $xml = "";
    if ($data) {
        for($i = 0; $i < count($data); $i++){
            $xml .= "<registro
                        Nombre='".$data[$i]['Nombre']."'
                        Descripcion='".$data[$i]['Descripcion']."'
                        Tratamiento='".$data[$i]['Tratamiento']."'
                    >EXITOSO</registro>";
        }
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function usuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {
    var_dump($nombre);
    die();
    $captura = new CapturaInformacion();
    $data = $captura->usuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena);
    $xml = "";
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento, $idUsuario) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento, $idUsuario);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
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

function registrarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idMascota);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idControlMedico) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idControlMedico);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function registrarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idMascota);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idProcedimientoVeterinario) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idProcedimientoVeterinario);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function registrarIndicadorSalud($peso, $fechaVacunacion, $otrosValores, $idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarIndicadorSalud($peso, $fechaVacunacion, $otrosValores, $idMascota);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarIndicadorSalud($peso, $fechaVacunacion, $otrosValores, $idIndicadorSalud) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarIndicadorSalud($peso, $fechaVacunacion, $otrosValores, $idIndicadorSalud);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function registrarCondicionSalud($nombre, $descripcion, $tratamiento, $idMascota) {
    $captura = new CapturaInformacion();
    $data = $captura->registrarCondicionSalud($nombre, $descripcion, $tratamiento, $idMascota);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}

function actualizarCondicionSalud($nombre, $descripcion, $tratamiento, $idCondicionSalud) {
    $captura = new CapturaInformacion();
    $data = $captura->actualizarCondicionSalud($nombre, $descripcion, $tratamiento, $idCondicionSalud);
    if ($data) {
        $xml .= "<registro><![CDATA[" . $data . "]]></registro>";
    } else {
        $xml = "<registro>NOEXITOSO</registro>";
    }
    return $xml;
}
?>

