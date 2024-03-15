<?php

require_once "conexion.php";

function IngresarClientes($pNombre, $pApellido, $pReferencia_id, $pTelefono, $pEmail) {
    
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("INSERT INTO clientes (nombre, apellido, referencia_id, telefono, email) values (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $iNombre, $iApellido, $iReferencia_id, $iTelefono, $iEmail);

            // set parametros y luego ejecutar
            $iNombre = $pNombre;
            $iApellido = $pApellido;
            $iReferencia_id = $pReferencia_id;
            $iTelefono  =  $pTelefono;
            $iEmail  =  $pEmail;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        //almacenar información en bitacora $th
        //throw $th;
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}

function EliminarClientes($pId_cliente) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        // formato de datos utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("DELETE FROM clientes where id_cliente = ?");
            $stmt->bind_param("i", $iId_cliente);

            // set parametros y luego ejecutar
            $iId_cliente = $pId_cliente;

            if ($stmt->execute()){
                $retorno = true;
            }
        }

    } catch (\Throwable $th) {
        //almacenar información en bitacora $th
        //throw $th;
        echo $th;
    }finally{
        Desconectar($oConexion);
    }

    return $retorno;
}