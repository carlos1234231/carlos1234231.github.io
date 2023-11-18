<?php
session_start(); //Inicia una nueva sesión o reanuda la existente
$_SESSION=array(); //Limpia las variables super globales de sesión

session_destroy(); //Destruye todas las variables existentes
header('location: ../index.html');
?>