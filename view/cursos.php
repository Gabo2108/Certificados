<?php
session_start();
if (empty($_SESSION['User'])) {
    header("location:../index.php");
}
require '../controlador/filtro_certificados.php';
$rol = filtro::mostrartipo();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cursos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../Classes/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Classes/assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../Plunings/css/tabla.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>

<body>
    <section>
        <?php
        require('../view/navegacion.php');
        ?>
    </section>
    <section id="tabla">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Nomina de <b>Cursos y Ponencias</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#AgregarRegistro" class="btn " data-toggle="modal"><i class="fas fa-calendar-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-striped table-hover table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>N° </th>
                                    <th>Curso</th>
                                    <th>Codigo</th>
                                    <th>tipo</th>
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
    <!-- modal agregar-->
    <div id="AgregarRegistro" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content">

                <form id="formadd">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" id="apellido" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Tipo</label>
                                <select class="campo-select" name="" id="tipo">
                                    <?php foreach ($rol as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem; line-height: 0.6rem; " value="<?php echo $value['id_tipo']; ?>">
                                            <?php echo $value['tip_nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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
    <!--modal editar -->
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
                            <input type="text" id="curso" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" id="codigo" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6"  >
                                <label>Tipo</label>
                                <select name="" id="tipos">
                                    <option value="activo" select="selected" id="selectDefault">texto</option>
                                    <?php foreach ($rol as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value['id_tipo']; ?>">
                                            <?php echo $value['tip_nombre']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
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



    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../Classes/assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../Classes/assets/popper/popper.min.js"></script>
    <script src="../Classes/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../Classes/assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../Plunings/JS/script_curso.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>