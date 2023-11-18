<?php

include("Conexion.php");  //llama el archivo conexión

//datos enviados por el formulario

$nickname   = $_POST["nickname"];
$nombre     = $_POST["nombre"];
$apellidos  = $_POST["apellidos"];
$edad       = $_POST["edad"];
$descripcion =$_POST["descripcion"];
$email      = $_POST["correo"];
$password   = $_POST["contraseña"];

//Encriptar el valor

$passwordHash=password_hash($password, PASSWORD_BCRYPT);//PASWORD_BCRYPT es el algoritmo de encriptamiento

$fotoPerfil = "img/$nickname/perfil.png"; //ingresamos el nombre de la foto de perfil por defecto

//Evaluamos si el nickname ingresado ya existe

$consultaId="SELECT Nickname FROM persona WHERE Nickname= '$nickname' ";
$consultaId=mysqli_query($conexion, $consultaId);// devuelve un objeto con el resultado, false si hay error, true si se ejecuta
$consultaId=mysqli_fetch_array($consultaId); //devuelve un array o NULL

if(!$consultaId){   //si esta vacia entonces agregamos un nuevo usuario 

$sql = "INSERT INTO persona VALUES('$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";

//Ejecutamos y verificamos si se guardan los datos 
 
     if(mysqli_query($conexion, $sql)){
		 
    mkdir("../img/$nickname"); //crea una carpeta en imagenes para el usuario
	copy("../img/default.jpeg","../img/$nickname/perfil.png"); //copiamos nuestra foto por default
	
	echo "Tu cuenta ha sido creada.";
	echo "<br> <a href='../index.html'>Iniciar Sesion</a>";
	 }
	else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	 }
}

else {
echo "El Nombre de Usuario ya existe.";
echo "<br> <a href='../index.html'>Intentelo de nuevo.</a>";
}

//Cerrando la conexión 
mysqli_close($conexion);

?>
