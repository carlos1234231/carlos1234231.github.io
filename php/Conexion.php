<?php

//declarar variables

$servidor = "localhost"; //el servidor sera el localhost 
$usuario="root";          //el usuario de la base de datos
$contrasena="";          
$BD="red_social";         //el nombre de la base de datos 

//creando la conexión
$conexion=mysqli_connect($servidor, $usuario, $contrasena, $BD);

//verificando la conexión
if(!$conexion) {
	echo "Falló la conexión <br>";
	die("Connection failed".mysqli_connect_error());
}
else{
   //echo "Conexión exitosa";
}   

?>