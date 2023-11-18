<?php
session_start();//Inicia una nueva sesion o reanuda la exitente
$login=$_SESSION['login'];

if(!$login)
{
    header('Location:../index.html');
}

else {
    $nickname = $_SESSION['nickname'];
}

?>