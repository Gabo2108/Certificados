<?php
session_start();
if (empty($_SESSION['User'])) {
   header("location:../index.php");
}
require '../controlador/filtro_certificados.php';
$filtro = filtro::mostrar();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../Plunings/css/style.css">
   <link rel="stylesheet" href="../Plunings/css/bootstrap.min.css">
   <title>Menu</title>
</head>

<body>
   <section>
      <?php
      require('../view/navegacion.php');
      ?>
   </section>
   <!--menu-->
   <section id="tabla">
      <div class="container-fluid ">
         <div class="row">
            <div class="col-md-3 contenedor" >
               <a id="btncertificado"  role="button" class="btn" data-toggle="modal"><img alt="Bootstrap Image Preview" src="../img/icons/certificate.png" /></a>
               <h3>Certificados</h3>
            </div>
            <div class="col-md-3 contenedor">
               <a href="#" id="btncurso"><img alt="Bootstrap Image Preview" src="../img/icons/curso.png" /></a>
               <h3>curso</h3>
            </div>
            
         </div>
      </div>
      <div class="container-fluid ">
         <div class="row">
            <div class="col-md-3 contenedor">
               <a href="#" id="btnusu"><img alt="Bootstrap Image Preview" src="../img/icons/usuario.png" /></a>
               <h3>Usuarios</h3>
            </div>
            <div class="col-md-3 contenedor">
               <a href="#" id="btn_descargar"><img alt="Bootstrap Image Preview" src="../img/icons/zip.png" /></a>
               <h3>descargar zip</h3>
            </div>
         </div>
      </div>

</body>
<script src="../Plunings/js/jquery.min.js"></script>
<script src="../Plunings/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
   $('#btncertificado').click(function(event) {
      location.href = "certificados_menu.php";
   });
   $('#btn_descargar').click(function(event) {
      location.href = "descargar.php";
   })
   $('#btncurso').click(function(event) {
      location.href = "cursos.php";
   })
   $('#btnusu').click(function(event) {
      location.href = "usuarios.php";
   })
</script>

</html>