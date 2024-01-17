<?php
require_once "./controller/login.controlador.php";

$cerrar = new LoginControlador();
if ($_SESSION['rol'] != 1) {
    $url = SERVERURL . "permiso";
    echo $urllocation = '<script> window.location = "' . $url . '"</script>';
} else { ?>
    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row my-4">
                            <div class="col-6 col-lg-3">
                                <div class="card shadow mb-4 btn mb-2 fecha" data-toggle="modal" data-target="#allModal">
                                    <div class="card-body">
                                        <i class="fe fe-file-text fe-32 text-primary"></i>
                                        <h3 class="h5 mt-4 mb-1">Certificados Masivos</h3>
                                        <p class="text-muted">Genera certificados por fechas de todos los cursos</p>
                                    </div> <!-- .card-body -->
                                </div><!-- .card -->
                            </div> <!-- .col-md-->
                            <div class="col-6 col-lg-3">
                                <div class="card shadow mb-4 btn mb-2 estudiante">
                                    <div class="card-body">
                                        <i class="fe fe-file fe-32 text-success"></i>
                                        <h3 class="h5 mt-4 mb-1">Certificado Unico</h3>
                                        <p class="text-muted">Genera el certificado de un unico estudiante</p>
                                    </div> <!-- .card-body -->
                                </div> <!-- .card -->
                            </div> <!-- .col-md-->
                            <div class="col-6 col-lg-3">
                                <div class="card shadow mb-4 btn mb-2" data-toggle="modal" data-target="#ponenciaModal">
                                    <div class="card-body">
                                        <i class="fe fe-file fe-32 text-warning"></i>
                                        <a href="#">
                                            <h3 class="h5 mt-4 mb-1">Ponencia</h3>
                                        </a>
                                        <p class="text-muted">Genera un certificado de la ponencia</p>
                                    </div> <!-- .card-body -->
                                </div> <!-- .card -->
                            </div> <!-- .col-md-->
                            <div class="col-6 col-lg-3">
                                <div class="card shadow repbug mb-4 btn mb-2">
                                    <div class="card-body">
                                        <i class="fe fe-alert-triangle fe-32 text-danger"></i>
                                        <h3 class="h5 mt-4 mb-1">BUGS o Errores</h3>
                                        <p class="text-muted">Reportar un error o bug</p>
                                    </div> <!-- .card-body -->
                                </div> <!-- .card -->
                            </div> <!-- .col-md-->
                        </div> <!-- .row -->

                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
            <div id="mensaje"></div>
        </main> <!-- main -->
    </div> <!-- .wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="allModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Certificados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmfecha">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Seleccione la fecha de inicio de los cursos</label>
                            <select class="form-control" id="fecha" name="fecha" require></select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" form="frmfecha" class="btn mb-2 btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Ponencia -->
    <div class="modal fade" id="ponenciaModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui urna, cursus mollis cursus vitae, fringilla vel augue. In vitae dui ut ex fringilla consectetur. Sed vulputate ante arcu, non vehicula mauris porttitor quis. Praesent tempor varius orci sit amet sodales. Nullam feugiat condimentum posuere. Vivamus bibendum mattis mi, vitae placerat lorem sagittis nec. Proin ac magna iaculis, faucibus odio sit amet, volutpat felis. Proin eleifend suscipit eros, quis vulputate tellus condimentum eget. Maecenas eget dui velit. Aenean in maximus est, sit amet convallis tortor. In vel bibendum mauris, id rhoncus lectus. Suspendisse ullamcorper bibendum tellus a tincidunt. Donec feugiat dolor lectus, sed ullamcorper ante rutrum non. Mauris vestibulum, metus sit amet lobortis fringilla, dui est venenatis ligula, a euismod sem augue vel lorem. Nunc feugiat eget tortor vel tristique. Mauris lobortis efficitur ligula, et consectetur lectus maximus sed. </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn mb-2 btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php
    echo '<script src=' . SERVERURL . 'view/js/certificados.js></script>';
} ?>