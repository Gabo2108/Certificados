<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Nomina de Estudiantes</h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body table-responsive">
                                    <!-- table -->
                                    <table class="table datatables" style="width: 100%;" id="tablaCertificados">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Apellidos</th>
                                                <th>Nombres</th>
                                                <th>Curso</th>
                                                <th>Horas</th>
                                                <th>Codigo</th>
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
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div>
    </main> <!-- main -->
</div> <!-- .wrapper -->
<!-- modal -->
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
                <form id="frmestudiante">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nombre" class="form-control" required onkeypress="return check(event)">
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text" id="apellido" class="form-control" required onkeypress="return check(event)">
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
echo '<script src=' . SERVERURL . 'view/js/crud_tbestudiante.js></script>'; ?>