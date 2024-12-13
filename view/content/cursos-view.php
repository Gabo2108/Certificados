<div class="wrapper">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">CURSOS <span>/</span><button type="button" class="btn mb-2 btn-primary btn-add" data-toggle="modal" data-target="#NuevoCurso"><span class="fe fe-plus-square fe-16 mr-2"></span>AGREGAR</button></h2>
                    <div class="row my-4">
                        <!-- Small table -->
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body table-responsive">
                                    <!-- table -->
                                    <table class="table datatables" style="width: 100%;" id="tablaCursos">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Curso</th>
                                                <th>Horas</th>
                                                <th>Codigo</th>
                                                <th>Tipo</th>
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
<!-- modal Agregar -->
<div class="modal fade" id="NuevoCurso" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #007bff;">
                <h5 class="modal-title"  id="verticalModalTitle">Nuevo Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCurso">
                <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombres" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>horas</label>
                            <input type="text" id="horas" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" id="codigos" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Tipo</label>
                                <select class="campo-select" name="" id="tipos"></select>
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
<!-- modal Editar -->
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
                <form id="frmCursos">
                <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>horas</label>
                            <input type="text" id="hora" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Codigo</label>
                            <input type="text" id="codigo" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-6">
                                <label>Tipo</label>
                                <select class="campo-select" name="" id="tipo"></select>
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
echo '<script src=' . SERVERURL . 'view/js/crud_tbcursos.js></script>'; ?>