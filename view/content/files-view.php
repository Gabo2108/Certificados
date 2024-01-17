<?php
require_once './controller/archivos.controlador.php';
$ra =  ArchivosControlador::Ctr_Explorar_carpetas();
?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="page-title">Archivos</h2>
                    </div>
                </div> <!-- .card-deck -->
                <div class="row align-items-center mb-3 border-bottom no-gutters">
                    <div class="col">
                        <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                            <?php for ($i = 2; $i < count($ra); $i++) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($i == 2) ? 'active' : ''; ?>" id="profile-tab" data-folder="../<?php echo $ra[$i] ?>" data-toggle="tab" role="tab" aria-selected="true"><?php echo $ra[$i] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <table  id="tb-arch" class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="w-50">Nombre</th>
                            <th>Fecha</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->
<?php
    echo '<script src=' . SERVERURL . 'view/js/archivos.js></script>';
 ?>