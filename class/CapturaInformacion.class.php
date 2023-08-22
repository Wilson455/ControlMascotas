<?php

session_start();
require_once('DataBase.class.php');

class CapturaInformacion {

   var $database;

    public function __construct() {
        $this->database = DataBase::getDatabaseObject(DataBase::SQL_SERVER);
    }

	public function getDatosUsuario($_usuario) {
        $sql = "Select Id, NombreCompleto, CorreoElectronico
                From Usuario
                Where CorreoElectronico = '" . $_usuario . "'";
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function consultarPerfil($idUsuario) {
        $sql = "Select NombreCompleto, Genero, Edad, DireccionResidencia, Telefono, CorreoElectronico, Clave
                From Usuario
                Where Id = " . $idUsuario;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function listarMascotas($idUsuario) {
        $sql = "Select  Id, Nombre, Edad, Tipo
                From Mascota 
                Where IdUsuario = " . $idUsuario;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function consultarMascota($idMascota) {
        $sql = "Select Nombre, Edad, Tipo, RasgosFisicos, TipoAlimento
                From Mascota 
                Where Id = " . $idMascota;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function listarControlMedico($idMascota) {
        $sql = "Select  Id, IdMascota, Fecha, NombreProfesional
                From ControlMedico 
                Where IdMascota = " . $idMascota;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function consultarControlMedico($idControlMedico) {
        $sql = "Select NombreProfesional, Fecha, Diagnostico, Observaciones
                From ControlMedico 
                Where Id = " . $idControlMedico;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function listarProcedimientoVeterinario($idMascota) {
        $sql = "Select  Id, NombreProcedimiento, FechaProcedimiento
                From ProcedimientoVeterinario 
                Where IdMascota = " . $idMascota;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function consultarProcedimientoVeterinario($idProcedimientoVeterinario) {
        $sql = "Select NombreProcedimiento, FechaProcedimiento, ResultadoExamen, Tratamiento, RecomendacionesPertinentes
                From ProcedimientoVeterinario 
                Where Id = " . $idProcedimientoVeterinario;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function usuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {

        $sql = "Insert Into Usuario(NombreCompleto, Genero, Edad, DireccionResidencia, Telefono, CorreoElectronico, Clave, FechaCreacion)Values('$nombre', '$genero', '$edad', '$direccionResidencia', '$telefono', '$correoElectronico', '$contrasena', GETDATE())";
                var_dump($sql);
                die();
        $data = $this->database->Insert($sql);

        return $data;
    }

    public function registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento, $idUsuario) {

        $sql = "Insert Into Mascota(IdUsuario, Nombre, Edad, Tipo, RasgosFisicos, TipoAlimento, FechaCreacion)Values('$idUsuario','$nombre', '$edad', '$tipo', '$rasgosFisicos', '$tipoAlimento', GETDATE())";
        $data = $this->database->Insert($sql);

        return $data;
    }

    public function actualizarUsuario($idUsuario, $nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {

        $sql = "Update Usuario Set NombreCompleto = '$nombre', Genero = '$genero', Edad = '$edad', DireccionResidencia = '$direccionResidencia', Telefono = '$telefono', CorreoElectronico = '$correoElectronico', Clave = '$contrasena' Where Id= " . $idUsuario;
        $data = $this->database->nonReturnQuery($sql);

        return $data;
    }

    public function actualizarMascota($idMascota, $nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento) {

        $sql = "Update Mascota Set Nombre = '$nombre', Edad = '$edad', Tipo = '$tipo', RasgosFisicos = '$rasgosFisicos', TipoAlimento = '$tipoAlimento' Where Id= " . $idMascota;
        $data = $this->database->nonReturnQuery($sql);

        return $data;
    }

    public function registrarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idMascota) {

        $sql = "Insert Into ControlMedico(IdMascota, NombreProfesional, Fecha, Diagnostico, Observaciones, FechaCreacion)Values('$idMascota','$nombre', '$fecha', '$diagnostico', '$observaciones', GETDATE())";
        $data = $this->database->Insert($sql);

        return $data;
    }

    public function actualizarControlMedico($nombre, $fecha, $diagnostico, $observaciones, $idControlMedico) {

        $sql = "Update ControlMedico Set NombreProfesional = '$nombre', Fecha = '$fecha', Diagnostico = '$diagnostico', Observaciones = '$observaciones' Where Id= " . $idControlMedico;
        $data = $this->database->nonReturnQuery($sql);

        return $data;
    }

    public function registrarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idMascota) {

        $sql = "Insert Into ProcedimientoVeterinario(IdMascota, NombreProcedimiento, FechaProcedimiento, ResultadoExamen, Tratamiento, RecomendacionesPertinentes, FechaCreacion)Values('$idMascota','$nombre', '$fecha', '$resultadoExamen', '$tratamiento', '$recomendacionesPertinentes', GETDATE())";
        $data = $this->database->Insert($sql);

        return $data;
    }

    public function actualizarProcedimientoVeterinario($nombre, $fecha, $resultadoExamen, $tratamiento, $recomendacionesPertinentes, $idProcedimientoVeterinario) {

        $sql = "Update ProcedimientoVeterinario Set NombreProcedimiento = '$nombre', FechaProcedimiento = '$fecha', ResultadoExamen = '$resultadoExamen', Tratamiento = '$tratamiento', RecomendacionesPertinentes = '$recomendacionesPertinentes' Where Id= " . $idProcedimientoVeterinario;
        $data = $this->database->nonReturnQuery($sql);

        return $data;
    }
}
