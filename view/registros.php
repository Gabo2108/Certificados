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

<body>
    <section>
        <?php
        require('../view/navegacion.php');
        ?>
    </section>
    <section id="tabla">
        <div class="container tabla">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Nomina de <b>Registros</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="descarga_uno.php" class="btn ">Descargas</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tablaUsuarios" class="table table-striped table-hover table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>N°</th>
                                    <th>Apellidos</th>
                                    <th>Nombres</th>
                                    <th>Curso</th>
                                    <th>Tipo</th>
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
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../Classes/assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../Classes/assets/popper/popper.min.js"></script>
    <script src="../Classes/assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../Classes/assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../Plunings/JS/scrip_acciones_admin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>