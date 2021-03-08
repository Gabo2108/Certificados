<?php
session_start();
if (empty($_SESSION['User'])) {
    header("location:../index.php");
}
$id = $_SESSION['User'];
// Esto devolverá todos los archivos de esa carpeta

$path = "D:\\Server\\root\\Entregable\\certificados\\Archivosrar\\";
$rar = preg_grep('~\.(rar|zip)$~', scandir($path));
$num = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Plunings/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<style>
    .center {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding-right: 200px;
        height: 50px;
    }
</style>

<body>
    <section>
        <?php
        require('../view/navegacion.php');
        ?>
    </section>
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="container crearse">
                            <div class="vertical-center center">
                                <button class="btn btn-success" id="crear">Crear nuevo archivo comprimido</button>
                            </div>
                        </div>
                        <table class="table acciones">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Archivo
                                    </th>
                                    <th>
                                        Descargar
                                    </th>
                                    <th>
                                        Eliminar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                for ($i = 2; $i < count($rar) + 2; $i++) {
                                    $num++;
                                ?>
                                    <!-- Visualización del nombre del archivo !-->

                                    <tr>
                                        <th scope="row"><?php echo $num; ?></th>
                                        <td><?php echo $rar[$i]; ?></td>
                                        <td>
                                            <a title="Descargar Archivo" href="../certificados/Archivosrar/<?php echo $rar[$i]; ?>" download="<?php echo $rar[$i]; ?>">
                                                <button class="btn btn-primary ">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a title="Eliminar Archivo" elm="<?php echo $rar[$i]; ?>" id="eliminar">
                                                <button class="btn btn-danger btn_eliminarRol"><i class="fas fa-trash-alt"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="../Plunings/js/jquery.min.js"></script>
<script src="../Plunings/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $('.acciones').on("click", "#eliminar", function() {
        var eliminar = $(this).attr("elm");
        Swal.fire({
            title: 'Estas seguro?',
            text: "Va ha eliminar este Registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar!'
        }).then((result) => {
            console.log(eliminar);
            if (result.isConfirmed) {
                $.ajax({
                    url: "../controlador/eliminar.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        eliminar: eliminar
                    },
                    success: function(data) {
                        var smg = data;
                        console.log(smg);
                        if (smg == "ok") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Exito',
                                text: 'Se elimino el archivo',
                            }).then(function(result) {
                                if (result.value) {
                                    location.href = "descargar.php";
                                }
                            })

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'error',
                                text: ' No se elimino el archivo',
                            })
                        }
                    }
                })
            }
        })
    })
</script>
<Script>
    $('.crearse').on("click", "#crear", function() {
        var crear = 1;
        $.ajax({
            url: "../controlador/comprimirzip.php",
            type: "POST",
            datatype: "json",
            data: {
                crear: crear
            },
            success: function(data) {
                var smg = data;
                console.log(smg);
                if (smg == "Creado") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Se creo el archivo',
                    }).then(function(result) {
                        if (result.value) {
                            location.href = "descargar.php";
                        }
                    })

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: ' No se creo el archivo',
                    })
                }
            }
        })
    
    })
</Script>

</html>