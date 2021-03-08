$(document).ready(function () {
    var user_id, opcion;
    opcion = 10;

    tablaUsuarios = $('#tablaUsuarios').DataTable({
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
            "url": "../controlador/crud_table.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "id_docente" },
            { "data": "doc_apellido" },
            { "data": "doc_nombre" },
            { "data": "cur_nombre" },
            { "data": "rol_nombre" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }

        ]
    });
    var fila; //captura la fila, para editar o eliminar
    $('#formUsuarios').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#Nombre').val());
        apellido = $.trim($('#Apellido').val());
        curso = $.trim($('#Cursos').val());
        rol = $.trim($('#Roles').val());
        $.ajax({
            url: "../controlador/crud_table.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, apellido: apellido, curso: curso, rol: rol, opcion: opcion },
            success: function (data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#EditarRegistro').modal('hide');
    });
    //add
    $('#formadd').submit(function (e) {
        //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());
        apellido = $.trim($('#apellido').val());
        DNI = $.trim($('#DNI').val());
        pasw = $.trim($('#pasw').val());
        curso = $.trim($('#Curso').val());
        rol = $.trim($('#Rol').val());
        opcion = 11;
        $.ajax({
            url: "../controlador/crud_table.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, apellido: apellido, DNI: DNI, pasw: pasw, curso: curso, rol: rol, opcion: opcion },

            success: function (data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
    });
    //Editar        
    $(document).on("click", ".btnEditar", function () {
        opcion = 12;//editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        apellido = fila.find('td:eq(2)').text();
        nombre = fila.find('td:eq(1)').text();
        curso = fila.find('td:eq(3)').text();
        rol = fila.find('td:eq(4)').text();
        $("#Nombre").val(nombre);
        $("#Apellido").val(apellido);
        $('#curso').val(curso).html(curso);
        $('#rol').val(rol).html(rol);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $('#EditarRegistro').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 13; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + user_id + "?");
        if (respuesta) {
            $.ajax({
                url: "../controlador/crud_table.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, user_id: user_id },
                success: function () {
                    tablaUsuarios.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

});    