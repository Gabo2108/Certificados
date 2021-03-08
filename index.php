<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="Plunings/css/estilos.css">
  <title>Certificado</title>
</head>

<body>


  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php endif; ?>

  <form  role="form" id="frmDatos">
    <div class="form">
      <h1>Login</h1>
      <div class="grupo">
        <input type="text" name="usu" id="name"> <span class="barra"></span>
        <label for="">Nombre</label>
      </div>
      <div class="grupo">
        <input type="password" name="password" id="password"> <span class="barra"></span>
        <label for="">Contraseña</label>
      </div>
      <button type="submit" name="Enviar">Inicio de sesión</button>
      <p class="warnings" id="warnings"></p>
    </div>
  </form>

  <!-- <script src="app.js "></script>
-->
</body>
<script src="Plunings/js/jquery.min.js"></script>
<script src="Plunings/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$('#frmDatos').submit(function(event) {
            event.preventDefault();
            var datos = $(this).serialize();
            console.log(datos);
            $.ajax({
                url: 'controlador/login.php',
                type: 'POST',
                data: datos,
                success: function(data) {
                    var smg = data;
                    console.log(smg);
                    console.log(datos);
                    if (smg == "Error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Usuario o Contraseña incorrectos!'
                        });
                    } if (smg == "1") {
                        location.href = 'view/menu.php';
                    }
                    if (smg == "3"){
                      location.href = 'view/form_docente.php';
                    }
                }
            });
        });
</script>
</html>