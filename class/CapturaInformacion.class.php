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

    public function registrarUsuario($nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {
        $cp = new CapturaInformacion();

        $sql = "SELECT  Id_TipoSolicitante,
                        Descripcion,
                        Estado
                FROM TipoSolicitante
                WHERE Estado='1'";
        $data = $cp->database->query($sql);

        $html = "<option value ='-1'>Seleccione...</option>";
        for ($i = 0; $i < count($data); $i++) {
            $html .= "<option value='" . $data [$i]['Id_TipoSolicitante'] . "'>" . htmlspecialchars(ltrim(rtrim($data [$i]['Descripcion']))) . "</option>";
        }

        return $html;
    }

    public function registrarMascota($nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento) {
        $cp = new CapturaInformacion();

        $sql = "SELECT  Id_TipoSolicitante,
                        Descripcion,
                        Estado
                FROM TipoSolicitante
                WHERE Estado='1'";
        $data = $cp->database->query($sql);

        $html = "<option value ='-1'>Seleccione...</option>";
        for ($i = 0; $i < count($data); $i++) {
            $html .= "<option value='" . $data [$i]['Id_TipoSolicitante'] . "'>" . htmlspecialchars(ltrim(rtrim($data [$i]['Descripcion']))) . "</option>";
        }

        return $html;
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
                Where IdUsuario = " . $idMascota;
        $data = $this->database->query(utf8_decode($sql));

        return $data;
    }

    public function actualizarUsuario($idUsuario, $nombre, $genero, $edad, $direccionResidencia, $telefono, $correoElectronico, $contrasena, $confirmarContrasena) {
        $cp = new CapturaInformacion();

        $sql = "SELECT  Id_TipoSolicitante,
                        Descripcion,
                        Estado
                FROM TipoSolicitante
                WHERE Estado='1'";
        $data = $cp->database->query($sql);

        $html = "<option value ='-1'>Seleccione...</option>";
        for ($i = 0; $i < count($data); $i++) {
            $html .= "<option value='" . $data [$i]['Id_TipoSolicitante'] . "'>" . htmlspecialchars(ltrim(rtrim($data [$i]['Descripcion']))) . "</option>";
        }

        return $html;
    }

    public function actualizarMascota($idMascota, $nombre, $edad, $tipo, $rasgosFisicos, $tipoAlimento) {
        $cp = new CapturaInformacion();

        $sql = "SELECT  Id_TipoSolicitante,
                        Descripcion,
                        Estado
                FROM TipoSolicitante
                WHERE Estado='1'";
        $data = $cp->database->query($sql);

        $html = "<option value ='-1'>Seleccione...</option>";
        for ($i = 0; $i < count($data); $i++) {
            $html .= "<option value='" . $data [$i]['Id_TipoSolicitante'] . "'>" . htmlspecialchars(ltrim(rtrim($data [$i]['Descripcion']))) . "</option>";
        }

        return $html;
    }

    public function GuardarForm1($txtNombre, $slcTipoSolicitante, $txtCedula, $txtDireccion, $txtCelular, $txtCorreo, $slcTipoReclamoNvl1, $slcTipoReclamoNvl2, $txtFechaTran1, $txtHoraTran1, $txtIdenTerminal1, $txtNumTran1, $txtNomConvenioCorr, $txtNomConvenioErr, $txtValorTran1, $txtNumReferancia1, $txtNumCuentaAbono1,$txtNomConvenio2,$txtNumReferanciaErr,$txtNumReferanciaCorr, $slcTipoCta1, $slcBanco1, $txtNombreTitu1, $txtCedulaTitu1, $Usuario, $Nombre, $slcCiudad, $slcDepartamento, $txtObservacion) {
		
        $cp = new CapturaInformacion();
		
		
		
		$NomConvenioCorr = ($txtNomConvenioCorr != '') ? "'" . $txtNomConvenioCorr . "'" : 'NULL';
        $TipoReclamoNvl2 = ($slcTipoReclamoNvl2 != '') ? "'" . $slcTipoReclamoNvl2 . "'" : 'NULL';
        $NumCuentaAbono1 = ($txtNumCuentaAbono1 != '') ? "" . $txtNumCuentaAbono1 . "" : 'NULL';
		$NumTran1 = ($txtNumTran1 != '') ? "" . $txtNumTran1 . "" : 'NULL';
		$IdenTerminal1 = ($txtIdenTerminal1 != '') ? "'" . $txtIdenTerminal1 . "'" : 'NULL';
		$NumReferanciaErr = ($txtNumReferanciaErr != '') ? "'" . $txtNumReferanciaErr . "'" : 'NULL';
		$NumReferanciaCorr = ($txtNumReferanciaCorr != '') ? "'" . $txtNumReferanciaCorr . "'" : 'NULL';
		
		
		
		$NumReferancia1 = ($txtNumReferancia1 != '') ? "'" . $txtNumReferancia1 . "'" : 'NULL';
        $TipoCta1 = ($slcTipoCta1 != '') ? "'" . $slcTipoCta1 . "'" : 'NULL';
		$TipoCta1 = ($slcTipoCta1 != '-1') ? "'" . $slcTipoCta1 . "'" : 'NULL';
        $Banco1 = ($slcBanco1 != '') ? "'" . $slcBanco1 . "'" : 'NULL';        
        $Banco1 = ($slcBanco1 != '-1') ? "'" . $slcBanco1 . "'" : 'NULL';
		
        $sql = "INSERT INTO Gestion (
                    Tipo_Solicitante,
                    Documento,
                    Nombre,
                    Direccion,
                    Celular,
                    Correo_electronico,
                    Tipo_reclamo_nvl_1,
                    Tipo_reclamo_nvl_2,
                    Fecha_transaccion,
                    Hora_transaccion,
                    Identificacion_terminal_punto,
                    Numero_transaccion,
                    Nombre_convenio_correcto,
                    Nombre_convenio_errado,
					
					Nombre_convenio,
                    Valor_transaccion,
					Num_referencia_o_factura_errado,
					Num_referencia_o_factura_correcto,
                    
                    Num_referencia_o_factura,
                    Num_cuenta_abono,
                    Tipo_Cta,
                    Banco,
                    Nombre_titular,
                    Cedula,
                    Fecha_gestion,
                    Nombre_asesor,
                    Documento_asesor,
                    Ciudad,
                    Departamento,
                    Observacion
                ) VALUES (
                    '" . $slcTipoSolicitante . "',
                    '" . $txtCedula . "',
                    '" . $txtNombre . "',
                    '" . $txtDireccion . "',
                    '" . $txtCelular . "',
                    '" . $txtCorreo . "',
                    '" . $slcTipoReclamoNvl1 . "',
                    " . $TipoReclamoNvl2 . ",
                    '" . $txtFechaTran1 . "',
                    '" . $txtHoraTran1 . "',
                    " . $IdenTerminal1 . ",
                    " . $NumTran1 . ",
                    " . $NomConvenioCorr . ",
                    '" . $txtNomConvenioErr . "',
                    
					'" . $txtNomConvenio2. "',
					" . $txtValorTran1 . ",					
					" . $NumReferanciaErr . ",
                    " . $NumReferanciaCorr . ",
					
                    " . $NumReferancia1 . ",
                    " . $NumCuentaAbono1 . ",
                    " . $TipoCta1 . ",
                    " . $Banco1 . ",
                    '" . $txtNombreTitu1 . "',
                    '" . $txtCedulaTitu1 . "',
                    GETDATE(),
                    '" . $Nombre . "',
                    '" . $Usuario . "',
                    '" . $slcCiudad . "',
                    '" . $slcDepartamento . "',
                    '" . $txtObservacion . "'
                )";
				//echo $sql;
        $data = $cp->database->Insert($sql);
	
        

        return $data;
    }
}
