<?php

function identificate()
{
    return "<h1>Hola mundo!</h1>";
}

function estaIdentificado(){
	if(isset($_SESSION['nombre'])) return true;
	else return false;
}

function haCaducado(){
	if(time()-$_SESSION['cuando']>3600) return true;
	else return false;
}

function entrar($usu,$con){
	$respuesta=false;
	$datos="mysql:host=localhost;dbname=peluqueria";
	$conexion=new PDO($datos,"root","root");
	$orden="SELECT NOMBRE, ID_CLIENTE FROM CLIENTES ";
	$orden.="WHERE NOMBRE=:u ";
	$orden.="AND CONTRASENNA=:c";
	$resultado=$conexion->prepare($orden);
	$resultado->execute([':u' => $usu,':c' => $con]);
	if($registro=$resultado->fetch()){
		$_SESSION['nombre']=$registro[0];
		$_SESSION['id']=$registro[1];
		$_SESSION['cuando']=time();
		$respuesta=true;
	}else{
		unset($_SESSION['nombre']);
		unset($_SESSION['cuando']);
	}
	return $respuesta;
}

function cerrarSesion()
{
	unset($_SESSION['nombre']);
	unset($_SESSION['id']);
	unset($_SESSION['cuando']);
}

function peticionSQL($orden)
{
	$conexion=new mysqli("127.0.0.1", "root", "root", "peluqueria");
	if(mysqli_connect_errno())
	{
		die ("Tenemos un problema con la base de datos(".mysqli_connect_error().", adios.");
	}
	else
	{
		$resultado=$conexion->query($orden);
		$conexion->close();
		return $resultado;
	}
}

?>