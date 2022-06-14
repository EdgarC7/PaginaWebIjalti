<?php

@include 'config.php';
session_start();

if (isset($_POST['submit'])){
  $correo = mysqli_real_escape_string($conn, $_POST['CorreoElectronico']);
  $contraseña = md5($_POST['Contraseña']);

  $select = " SELECT * FROM usuarios WHERE correo = '$correo' && contraseña = '$contraseña'";

  $result = mysqli_query($conn, $select);

  $row = mysqli_num_rows($result);

  if($row == 1){
    $_SESSION['CorreoElectronico'] = $correo;
    header('location:IntUsuProf.php');
  }
  else{
    $error[] = 'Correo o contraseña incorrecta';
  }

};

?>

<!DOCTYPE html>
<html>
  <!--  This source code is exported from pxCode, you can get more document from https://www.pxcode.io  -->
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link
      rel="stylesheet"
      type="text/css"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="css/common.css" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="css/IniciarSesion.css" />
  </head>

  <body style="display: flex; flex-direction: column">
    <div
      style="--src:url(/assets/018546329ea923d06efe6812bf9a9238.png)"
      class="iniciar-sesion iniciar-sesion-block layout"
    >
      <div class="iniciar-sesion-flex1 layout">
        <h2 class="iniciar-sesion-medium-title layout">Iniciar sesión</h2>
        <div class="iniciar-sesion-flex2 layout">
          <div class="iniciar-sesion-flex2-item">
            <div class="iniciar-sesion-cover-block1 layout">
              <div class="iniciar-sesion-cover-block1-item">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/5037b87665450aab69c59ca57378a47d.png)"
                  class="iniciar-sesion-image layout"
                ></div>
              </div>
              <div class="iniciar-sesion-cover-block1-spacer"></div>
              <div class="iniciar-sesion-small-text-body layout">Ingresar con Google</div>
            </div>
          </div>
          <div class="iniciar-sesion-flex2-spacer"></div>
          <div class="iniciar-sesion-flex2-item">
            <div class="iniciar-sesion-cover-block2 layout">
              <div class="iniciar-sesion-cover-block2-item">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/2303a87489ac6b89c93fee94b7816c22.png)"
                  class="iniciar-sesion-icon layout"
                ></div>
              </div>
              <div class="iniciar-sesion-cover-block2-spacer"></div>
              <div class="iniciar-sesion-small-text-body layout1">Ingresar con Facebook</div>
            </div>
          </div>
          <div class="iniciar-sesion-flex2-spacer1"></div>
          <div class="iniciar-sesion-flex2-item1">
            <div class="iniciar-sesion-cover-block3 layout">
              <div class="iniciar-sesion-cover-block3-item">
                <div
                  style="--src:url(http://localhost/PaginaWebFinal/assets/0c9806ea3660136deed51beda1131df3.png)"
                  class="iniciar-sesion-icon layout1"
                ></div>
              </div>
              <div class="iniciar-sesion-cover-block3-spacer"></div>
              <div class="iniciar-sesion-small-text-body layout2">Ingresar con LinkedIn</div>
            </div>
          </div>
        </div>
        <h4 class="iniciar-sesion-highlights layout">- O -</h4>
        <form action="" method="post">
        <?php
          if (isset($error)){
            foreach ($error as $error){
              echo '<span class ="msgerror" 
              style = "font: 16px/2.18 Abel, Helvetica, Arial, serif;
              letter-spacing: 1.28px; 
              color: red;
              padding-left: 32%;">'.$error. '</span>';
            }
          }
          ?>
        <div class="iniciar-sesion-block1 layout">
          <input class="iniciar-sesion-highlights1 layout" type = "email" placeholder="Correo Electrónico" name="CorreoElectronico" maxlength="30" required>
          <hr class="iniciar-sesion-line layout1" />
        </div>
        <div class="iniciar-sesion-flex layout">
          <input class="iniciar-sesion-highlights1 layout" type = "password" id ="psw" placeholder="Contraseña" name="Contraseña" maxlength="18" required>
          <hr class="iniciar-sesion-line layout1" />
        </div>
        <input type = "submit" name ="submit" value="Iniciar sesión" class="iniciar-sesion-cover-block layout">
        </form>
        <a href="Cuenta.php" style="text-decoration: none;"><h5 class="iniciar-sesion-highlights11 layout">¿No tienes cuenta? Crear cuenta</h5></a>
      </div>
    </div>
  </body>
</html>
