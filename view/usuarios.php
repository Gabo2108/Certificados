<?php
session_start();
if (empty($_SESSION['User'])) {
    header("location:../index.php");
}
require '../controlador/filtro_certificados.php';
$curso = filtro::mostrarcursos();
$rol = filtro::mostrarol();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administracion</title>
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
    <section id="tabla">
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Nomina de <b>Docentes</b></h2>
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
                                    <th>Apellido</th>
                                    <th>Nombre</th>
                                    <th>Curso</th>
                                    <th>Rol</th>
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
                            <label>Apellido</label>
                            <input type="text" id="apellido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>DNI</label>
                            <input type="text" id="DNI" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" id="pasw" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Curso</label>
                                <select class="campo-select" name="" id="Curso" style="width: 450px;">
                                    <?php foreach ($curso as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem;
        line-height: 0.6rem; " value="<?php echo $value['id_curso']; ?>">
                                            <?php echo $value['cur_nombre']; ?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Rol</label>
                                <select class="campo-select" name="" id="Rol">
                                    <?php foreach ($rol as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem; line-height: 0.6rem; "  value="<?php echo $value['id_rol']; ?>">
                                            <?php echo $value['rol_nombre']; ?></option>
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
                            <input type="text" id="Nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" id="Apellido" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Curso</label>
                                <select class="campo-select" name="" style="width: 450px;" id="Cursos">
                                <option value="activo" select="selected" id="curso">texto</option>
                                    
                                    <?php foreach ($curso as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem; line-height: 0.6rem; " value="<?php echo $value['id_curso']; ?>">
                                            <?php echo $value['cur_nombre']; ?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Rol</label>
                                <select class="campo-select" name="" id="Roles">
                                <option value="activo" select="selected" id="rol">texto</option>
                                    
                                    <?php foreach ($rol as $key => $value) {
                                    ?>
                                        <option style=" font-size: 0.9rem; line-height: 0.6rem;" value="<?php echo $value['id_rol']; ?>">
                                            <?php echo $value['rol_nombre']; ?></option>
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
    <script type="text/javascript" src="../Plunings/JS/crudusuario.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>