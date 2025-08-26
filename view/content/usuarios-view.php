<?php
require_once "./controller/login.controlador.php";

$cerrar = new LoginControlador();
if ($_SESSION['rol'] != 1) {
    $url = SERVERURL . "permiso";
    echo $urllocation = '<script> window.location = "' . $url . '"</script>';
} else {

?>
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="mb-2 page-title">USUARIOS <span>/</span><button type="button" class="btn mb-2 btn-primary btn-add" data-toggle="modal" data-target="#NuevoUsuario"><span class="fe fe-plus-square fe-16 mr-2"></span>AGREGAR</button></h2>
                        <div class="row my-4">
                            <!-- Small table -->
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body table-responsive">
                                        <!-- table -->
                                        <table class="table  datatables" style="width: 100%;" id="tablaUsuarios">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Apellidos</th>
                                                    <th>Nombres</th>
                                                    <th>Usuarios</th>
                                                    <th>Contraseña</th>
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
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <!-- modal Agregar-->
    <div class="modal fade bd-example-modal-lg" id="NuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="card shadow ">
                    <div class="card-header">
                        <h5 class="modal-title " id="verticalModalTitle">Crear Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate id="frmnuevousuario" autocomplete="off">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" placeholder="Ex: Mark" required>
                                    <div class="valid-feedback"> Looks good! </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos" placeholder="Ex: Otto" required>
                                    <div class="valid-feedback"> Looks good! </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">DNI</label>
                                    <input type="text" placeholder="1234567890" class="form-control" minlength="10" maxlength="10" id="dni" required>
                                    <div class="invalid-feedback"> Ingrese su dni. </div>
                                </div>
                                <div class="col-md-6 mb-3">

                                    <label for="validationCustom03">Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control contrasenas" id="passw" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-light ver" onclick="mostrarpass()" type="button"><i class="fe fe-eye-off fe-10 icon-pass"></i></button>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback"> Ingrese una contraseña. </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-7 mb-3">
                                    <label for="validationCustom03">Curso</label>
                                    <select class="form-control select2" name="" id="Curso" required></select>
                                    <div class="invalid-feedback"> Seleccione un curso </div>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label for="validationCustom03">Rol</label>
                                    <select class="form-control campo-select" name="" id="Rol" required></select>
                                    <div class="invalid-feedback"> Seleccione un rol </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" form="frmnuevousuario" class="btn mb-2 btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- modal Editar-->
    <div class="modal fade" id="EditarRegistro" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Editar Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmUsuarios">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="Nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" id="Apellido" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <div class="input-group">
                                <input type="password" class="form-control contrasenas" id="PASS" required>
                                <div class="input-group-append">
                                    <button class="btn btn-light ver" onclick="mostrarpass()" type="button"><i class="fe fe-eye-off fe-10 icon-pass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Curso</label>
                                <select class="form-control select2" name="" style="width: 450px;" id="Cursos"></select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Rol</label>
                                <select class="campo-select" name="" id="Roles"></select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn mb-2 btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php
    echo '<script src=' . SERVERURL . 'view/js/tablas.js></script>';
    echo '<script src=' . SERVERURL . 'view/js/crud_tbusuario.js></script>';

    echo '<script src=' . SERVERURL . 'view/js/validarcaracteres.js></script>';
} ?>