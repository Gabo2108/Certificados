<?php
session_start();
if (empty($_SESSION['User'])) {
    header("location:../index.php");
}
require '../controlador/filtro_certificados.php';
$filtro = filtro::mostrar();
$rol = filtro::mostrarcurso();
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
<style>
    .campo-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none'%3e%3cpath d='M7 7l3-3 3 3m0 6l-3 3-3-3' stroke='%23a1a1aa' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3e%3c/svg%3e");
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
        background-repeat: no-repeat;
        background-color: #fff;
        background-position: right 0.5rem center;
        background-size: 1.5em 1.5em;
        border-color: #d4d4d8;
        border-width: 1px;
        border-radius: 0.375rem;
        padding-top: 0.6rem;
        padding-right: 2.5rem;
        padding-bottom: 0.6rem;
        padding-left: 0.75rem;
        font-size: 1.1rem;
        line-height: 1.6rem;
    }
</style>

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
                <div class="col-md-3 contenedor">
                    <a id="modal-493243" href="#modal-container-493243" role="button" class="btn" data-toggle="modal"><img alt="Bootstrap Image Preview" src="../img/certificadoA4.jpg" /></a>
                    <h3>Generar Certificados</h3>
                </div>
                <div class="col-md-3 contenedor">
                    <a id="modal-493241" href="#modal-container-493241" role="button" class="btn" data-toggle="modal"><img alt="Bootstrap Image Preview" src="../img/PonenciaA4.jpg" /></a>
                    <h3>Generar Ponencias</h3>
                </div>

            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-3 contenedor">
                    <a id="uncertificado" role="button" class="btn" data-toggle="modal"><img alt="Bootstrap Image Preview" src="../img/icons/certificate.png" /></a>
                    <h3>Generar Certificado de un estudiante</h3>
                </div>
                <div class="col-md-3 contenedor">
                    <a href="#" id="btn_dponencia"><img alt="Bootstrap Image Preview" src="../img/icons/zip.png" /></a>
                    <h3>Desargar Ponencias</h3>
                </div>
            </div>
            <div class="col-md-3 contenedor">
                <a id="modal-493241" href="#modal-container-493242" role="button" class="btn" data-toggle="modal"><img alt="Bootstrap Image Preview" src="../img/icons/date_eliminar.png" /></a>
                <h3>Eliminar Registros</h3>
            </div>
        </div>

    </section>
    <!--Modal Filtro Certificado -->
    <div class="modal fade" id="modal-container-493243" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Elija la fecha de inicio para generar los Certificados
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="frmfecha">
                            <div class="form-group">
                                <label for="roles">
                                    Fechas
                                </label>
                                <select class="form-control" name="fecha" require id="roles">
                                    <option value="0">Seleccione una fecha</option>
                                    <?php foreach ($filtro as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value['est_fecha_inicio']; ?>">
                                            <?php echo $value['est_fecha_inicio']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="Submit" id="btncertificado" class="btn btn-primary">
                                Generar
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cerrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Eliminar registros -->
    <div class="modal fade" id="modal-container-493242" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Eliminar registros por fechas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="eliminareg">
                            <div class="form-group">
                                <label for="roles">
                                    Fechas
                                </label>
                                <select class="form-control" name="fecha" require id="roles">
                                    <option value="0">Seleccione una fecha</option>
                                    <?php foreach ($filtro as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value['est_fecha_inicio']; ?>">
                                            <?php echo $value['est_fecha_inicio']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="Submit" id="btncertificado" class="btn btn-danger">
                                Eliminar
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cerrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal ponencia -->
    <div class="modal fade" id="modal-container-493241" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Ingrese Datos para generar las ponencias
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="frmponencia">
                            <div class="form-group">
                                <label for="Nombre">
                                    Nombres
                                </label>
                                <input type="text" class="form-control" name="nombre" id="Nombre" />
                            </div>
                            <div class="form-group">
                                <label for="Apellido">
                                    Apellidos
                                </label>
                                <input type="text" class="form-control" name="apellido" id="Apellido" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ponencia">
                                    Elija la ponencia realizada
                                </label>
                                <select class="campo-select" name="curso" id="curso" style="width: 450px;">
                                    <?php foreach ($rol as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem; line-height: 0.6rem; " value="<?php echo $value['cur_nombre']; ?>">
                                            <?php echo $value['cur_nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail3">
                                    Año que se realizo la ponencia
                                </label>
                                <input type="date" class="form-control" name="fecha" require id="exampleInputEmail3" />
                            </div>
                            <button type="Submit" id="btnponencia" class="btn btn-primary">
                                Generar
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Cerrar
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
<script src="../Plunings/js/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../Plunings/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('#uncertificado').click(function(event) {
        location.href = "registros.php";
    });
</script>
<script>
    $('#frmfecha').submit(function(event) {
        event.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        $.ajax({
            url: '../model/pdf_certificado.php',
            type: 'POST',
            data: datos,
            success: function(data) {
                var smg = data;
                console.log(smg);
                if (smg == 'ok') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Se crearon los archivo correctamente',
                    }).then(function(result) {
                        if (result.value) {
                            location.href = "certificados_menu.php";
                        }
                    })
                }
            }
        });
    })
    $('#frmponencia').submit(function(event) {
        event.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        $.ajax({
            url: '../model/pdf_ponencia.php',
            type: 'POST',
            data: datos,
            success: function(data) {
                var smg = data;
                console.log(smg);
                if (smg == 'ok') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Se creo el archivo correctamente',
                    }).then(function(result) {
                        if (result.value) {
                            location.href = "certificados_menu.php";
                        }
                    })
                }
            }
        });
    })
    $('#btn_dponencia').click(function(event) {
        location.href = "ponencia.php";
    })
</script>
<script>
    $('#eliminareg').submit(function(event) {
        event.preventDefault();
        var datos = $(this).serialize();
        console.log(datos);
        Swal.fire({
            title: 'Estas seguro?',
            text: "Estos cambios no se pueden revertir!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../controlador/eliminar_reg.php',
                    type: 'POST',
                    data: datos,
                    success: function(data) {
                        var smg = data;
                        console.log(smg);
                        if (smg == 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: 'Se eliminaron los registros correctamente',
                            }).then(function(result) {
                                if (result.value) {
                                    location.href = "certificados_menu.php";
                                }
                            })
                        }
                    }
                });
            }
        })

    })
</script>

</html>