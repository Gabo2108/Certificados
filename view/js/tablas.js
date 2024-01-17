$(document).ready(function () {
    tablaCertificado = $('#tablaCertificados').DataTable({
        responsive: true,
        autoWidth: true,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide con lo que busca ",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        "ajax": {
            "url": "./ajax/tablas.ajax.php",
            "method": 'POST', //usamos el metodo POST
            "data": { tbestudiante: 'consultar' }, //enviamos para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_estudiante" },
            { "data": "est_apellido" },
            { "data": "est_nombre" },
            { "data": "cur_nombre" },
            { "data": "cur_horas" },
            { "data": "cur_codigo" },
            { "data": "est_fecha_inicio" },
            { "data": "est_fecha_fin" },
            {
                data: null,
                className: "center",
                defaultContent: '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item btngenerar" href="#"><span class="fe fe-file fe-16"></span>PDF</a><a class="dropdown-item btnEditar" href="#"><span class="fe fe-edit-3 fe-16"></span>Editar</a><a class="dropdown-item btnBorrar" href="#"><span class="fe fe-alert-octagon fe-16">Borrar</a></div>'
            }
        ]
    });
    tablaUsuarios = $('#tablaUsuarios').DataTable({
        responsive: true,
        autoWidth: true,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide con lo que busca ",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        "ajax": {
            "url": "./ajax/tablas.ajax.php",
            "method": 'POST', //usamos el metodo POST
            "data": { tbusuarios: 'consultar' }, //enviamos para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_docente" },
            { "data": "doc_apellido" },
            { "data": "doc_nombre" },
            { "data": "doc_cedula" },
            { "data": "doc_contrasenia" },
            { "data": "cur_nombre" },
            { "data": "rol_nombre" },
            {
                data: null,
                className: "center",
                defaultContent: '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Action</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item btnEditar" href="#"><span class="fe fe-edit-3 fe-16"></span>Editar</a><a class="dropdown-item btnBorrar" href="#"><span class="fe fe-alert-octagon fe-16">Borrar</a></div>'
            }
        ]
    });
    tablaCursos = $('#tablaCursos').DataTable({
        responsive: true,
        autoWidth: true,
        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Ningun registro coincide con lo que busca ",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        "ajax": {
            "url": "./ajax/tablas.ajax.php",
            "method": 'POST', //usamos el metodo POST
            "data": { tbcursos: 'consultar' }, //enviamos para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_curso" },
            { "data": "cur_nombre" },
            { "data": "cur_horas" },
            { "data": "cur_codigo" },
            { "data": "tip_nombre" },
            {
                data: null,
                className: "center",
                defaultContent: '<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="text-muted sr-only">Acciones</span></button><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item btnEditar" href="#"><span class="fe fe-edit-3 fe-16"></span>Editar</a><a class="dropdown-item btnBorrar" href="#"><span class="fe fe-alert-octagon fe-16">Borrar</a></div>'
            }
        ]
    });
});