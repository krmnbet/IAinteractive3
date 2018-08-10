<?php
//Carga la clase de coneccion con sus metodos para consultas o transacciones
//require("models/connection.php"); // funciones mySQL 
require("models/connection_sqli_manual.php"); // funciones mySQLi

class PeliculasModel extends Connection
{
	 function validaAdmin($user,$clave)
	{
		$myQuery = "SELECT * FROM administrador where usuario='".$user."' and contrasena='".$clave."';";
		$row = $this->query($myQuery);
        if($row->num_rows>0){
            return 1;
        }else{
            return 0;
        }
	}
	 function validauser($user,$clave)
	{
		$myQuery = "SELECT * FROM usuarios where correo='".$user."' and contrasena='".$clave."';";
		$row = $this->query($myQuery);
        if($row->num_rows>0){
        	$r = $row->fetch_object();
            return $r->iduser;
        }else{
            return 0;
        }
	}
	 function insertauser($user,$clave,$correo)
	{
		$myQuery = "insert  into usuarios(nombre,correo,contrasena) values ('".$user."','".$correo."','".$clave."');";
		if($this->query($myQuery)){
			return 1;
        }else{
            return 0;
        }
	}
	 function listaPeli()
	{
		$myQuery = "SELECT * FROM peliculas;";
		$row = $this->query($myQuery);
        if($row->num_rows>0){
            return $row;
        }else{
            return 0;
        }
	}

    
}
?>
