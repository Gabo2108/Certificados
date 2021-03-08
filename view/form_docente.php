<?php
session_start();
if (empty($_SESSION['User'])) {
    header("location:../index.php");
}
$filtro = $_SESSION['User'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Docente</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../Classes/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Classes/assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Plunings/css/tabla.css">
</head>

<body>
    <section>
        <?php
        require('../view/navegacion.php');
        ?>
    </section>
    <section id="tabla" idoc="<?php echo $filtro; ?>">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Nomina de <b>Estudiantes</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#subirArchivo" class="btn " data-toggle="modal"><i class="material-icons"></i> <span>Subir Archivo</span></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-striped table-hover table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>N°
                                    </th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Fecha de inicio</th>
                                    <th>Fecha de finalizacion</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--modales -->
    <div id="EditarRegistro" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formUsuarios">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" id="apellido" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Fecha de inicio</label>
                                <input type="date" id="fecha_ini" class="form-control" required>
                            </div>
                            <div class="col-lg-6">
                                <label>Fecha de fin</label>
                                <input type="date" id="fecha_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal de subida de archivo-->

    <div id="subirArchivo" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content">

                <form method="POST" id="subidaExcel" enctype="multipart/form-data">

                    <div class="modal-header">

                        <h4 class="modal-title">Subir un Archivo</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>

                    <div class="modal-body">

                        <input type="file" id="archivos" name="archivo1" accept=".xlsx, .xslm, .xlsb, .xltx">

                    </div>

                    <div class="modal-footer">

                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">

                        <input type="submit" class="btn btn-info" onclick="Funcion1();" name="Mostrar" value="Subir Archivo">

                    </div>

                </form>

                <?php

                include '../model/Subir_Archivo.php';

                ?>

            </div>

        </div>

    </div>
 

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../Classes/assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../Classes/assets/popper/popper.min.js"></script>
    <script src="../Classes/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../Classes/assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../Plunings/JS/scrip_acciones.js"></script>
    
    </script>
</body>

</html>