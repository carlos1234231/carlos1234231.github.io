<?php
include("php/Conexion.php");
include("php/validar_sesion.php");

$nicknameA = $_GET['nickname'];
include("php/datos_amigo.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Los Betas</title>
    <link href="css/estilos.css" rel='stylesheet' type='text/css'>
  </head>
  <body>
    <header>
      <div id="logo">
        <!-- id para trabajar con css -->
        <img src="img/logo.png" alt="logo" height="50" width="325" />
      </div>
      <nav class="menu">
        <ul>
          <li>
            <a href="index.html">Inicio</a> 
          </li>
          <li>
            <a href="miperfil.php">Mi Perfil</a>
          </li>
          <li>
            <a href="amigos.php">Mis Amigos</a>
          </li>
          <li>
            <a href="fotos.php">Mis Fotos</a>
          </li>
          <li>
            <a href="agregar.php">Agregar Amigos</a>
          </li>
          <li>
            <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
          </li>
        </ul>
      </nav>
    </header>
    <section id="perfil">
        <img src="<?php echo "FotoPerfilA" ?>" />
        <h1><?php echo "$nombreA $apellidosA" ?></h1>
        <p><?php echo "$descripcionA" ?></p>
    </section>

    <section id="recuadros">
        <h2>Mis Amigos</h2>
        <?php 
        $consulta="SELECT * FROM persona P WHERE P.Nickname in (SELECT A.Nickname2 FROM amistad A WHERE A.Nickname1='$nicknameA') LIMIT 3";  
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)) {
        ?>
        <section class="recuadro">
            <img src="<php? echo $fila['FotoPerfil']?>" height="177">
            <h2> <?php echo $fila['Nombre']. "" . $fila['Apellidos']?></h2>
            <p class="parrafo">
            <?php echo $fila['Descripcion']?>
            </p>
            <a href="<?php echo "perfil_amigo.php?nickname=". $fila['Nickname']?>" class="boton">Ver Perfil</a><br></br>
    </section>
        <?php
        }
        ?>
    <section id="recuadros">
        <h2>Mis Fotos</h2>
        <?php
        $consulta="SELECT * FROM fotos F WHERE F.Nickname='$nicknameA' LIMIT 3"; 
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)) {
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['NombreFotos']?>" height="200" width="280">
        </section>
        <?php
        }
        ?>
    </section>

    <footer>
      <p>Copyright &copy; Los Betas</p>
    </footer>
  </body>
</html>
