<?php
//Carga la funciones comunes top y footer
require('common.php');

//Carga el modelo para este controlador
require("models/peliculas.php");

class Peliculas extends Common
{
	public $PeliculasModel;

	function __construct()
	{
		//Se crea el objeto que instancia al modelo que se va a utilizar

		$this->PeliculasModel = new PeliculasModel();
		$this->PeliculasModel->connect();
	}

	function __destruct()
	{
		//Se destruye el objeto que instancia al modelo que se va a utilizar
		$this->PeliculasModel->close();
	}

	//Funcion que genera la vista inicial de admin
	function admin()
	{
		
		require('views/admin/adminlogin.php');
	}
	function accesoAdmin(){
		echo $this->PeliculasModel->validaAdmin($_REQUEST['usuario'],$_REQUEST['clave']);
	}
	function validauser(){
		
		$ok = $this->PeliculasModel->validauser($_REQUEST['usuario'],$_REQUEST['clave']);
		if($ok!=0){
			setcookie('iduser',$ok);
			echo $ok;
		}else{
			echo 0;
		}
	}
	function user()
	{
		$clave = $correo = "";
		if(isset($_REQUEST['clave'])){
			$clave = $_REQUEST['clave'];
		}
		if(isset($_REQUEST['correo'])){
			$correo = $_REQUEST['correo'];
		}
		require('views/usuarios/usuarioinicio.php');
	}
	function principaladmin()
	{
		require('views/admin/adminpeliculas.php');
	}
	function inicio()
	{
		require('views/principal.php');
	}
	function vistaRegistro()
	{
		require('views/usuarios/registrousuario.php');
	}
	function registroUsuario()
	{
		
	}
	function listarPelis(){
		$peli = $this->PeliculasModel->listaPeli();
		while($p = $peli->fetch_object()){
			
		}
	}
	function verpeli(){
		require('views/verpelicula.php');
	}
	


}


?>
