<?php
include("php/conexion.php");
include("php/validar_sesion.php");
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
    <section id="recuadros">
        <h2>Agregar Amigos</h2>
        <?php 
        $consulta="SELECT * FROM persona P WHERE P.Nickname !='$nickname' and P.Nickname not in (SELECT A.Nickname2 FROM amistad A WHERE A.Nickname1='$nickname')";  
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)) {
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil']?>" height="177">
            <h2> <?php echo $fila['Nombre']. "" . $fila['Apellidos']?></h2>
            <p class="parrafo">
            <?php echo $fila['Descripcion']?>
            </p>
            <a href="<?php echo "perfil_amigo.php?nickname=". $fila['Nickname']?>" class="boton">Ver Perfil</a><br></br>
            <a href="<?php echo "php/agregar_amigo.php?nickname=". $fila['Nickname']?>" class="boton">Agregar amigo</a><br></br>
    </section>
        <?php
        }
        ?>
        <footer>
      <p>Copyright &copy; Los Betas</p>
    </footer>
  </body>
</html>