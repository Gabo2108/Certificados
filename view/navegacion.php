<?php
session_start();
if (empty($_SESSION['User'])) {
  header("location:../index.php");
}
$id = $_SESSION['Rol'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 , shrink-to-fit=no">
  <title>Nav</title>
  <link rel="stylesheet" href="../Plunings/css/nav.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

</head>

<body>
  <section>

    <nav class="navbar navbar-expand-lg navbar-dark bg-blue static-top">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../img/logo_carrera_blanco.png" alt="" width="100%">
        </a>
        <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse menu1" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="#" id="inicio">Inicio
              </a>
            </li>
            
            <li class="nav-item cerrars">
              <a href="#" id="btnsalir">Cerrar Sesion
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
<script>
  $('#btnsalir').click(function(event) {
    location.href = "../controlador/logout.php"
  });
  $('#inicio').click(function(event) {
    <?php if ($id == 1) {
    ?>
      location.href = "../view/menu.php";
    <?php
    } elseif($id ==3) {
    ?>
      location.href = "../view/form_docente.php";
    <?php
    } else{ ?>
      location.href = "../view/Administracion.php";
    <?php }
    ?>
  });
</script>

</html>