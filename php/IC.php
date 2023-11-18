<?php
include("Conexion.php");//Llama al archibo de conexión

session_start();//Inicia una sesión o reanuda la existente

$_SESSION['login']=false;//$_SESSION es una variable super global

//Recibir y guardar datos enviados  desde el formulario

$nickname =$_POST["nickname"];
$password =$_POST["contraseña"];

//Evaluando nackname ingresado

$consulta="SELECT * FROM persona WHERE Nickname = '$nickname' ";
$consulta=mysqli_query($conexion, $consulta);
$consulta=mysqli_fetch_array($consulta);

if($consulta)
{
    
    
    if(password_verify($password, $consulta['Password']))//Extrae password
    {
        $_SESSION['login']          =true;
        $_SESSION['nickname']       =$consulta['Nickname'];
        $_SESSION['nombre']         =$consulta['Nombre'];
        $_SESSION['apellidos']      =$consulta['Apellidos'];
        $_SESSION['edad']           =$consulta['Edad'];
        $_SESSION['descripcion']    =$consulta['Descripcion'];
        $_SESSION['fotoPerfil']      =$consulta['FotoPerfil'];

        header('Location:../miperfil.php');//Redirecciona a la pagina de mi perfil
    }
    else{
        echo "Contraseña incorrecta";
        echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
   }
}

else { 
    echo "El usuario no existe!!";
    echo "<br> <a href='../index.html'> Intentelo de nuevo. </a>";
}

//Cerrando la sesión
mysqli_close($conexion);
?>