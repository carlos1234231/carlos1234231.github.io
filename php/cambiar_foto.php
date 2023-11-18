<?php
include("validar_sesion.php");

$ubicacion="../img/$nickname/perfil.png";
$archivo= $_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
    echo"El archivo ha sido subido";
    header('Location :../miperfil.php'); //Redireccionar a la página mi perfil
} 

else{
    echo "Ha ocurrido un eror, intentelo de nuevo" ;
    echo "<br> <a href='../miperfil.php'> Volver.</a>";
}

?>