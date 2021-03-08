$(document).ready(function () {
    var user_id, opcion;
    opcion = 6;

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
            { "data": "id_curso" },
            { "data": "cur_nombre" },
            { "data": "cur_codigo" },
            { "data": "tip_nombre" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    var fila; //captura la fila, para editar o eliminar
    $('#formUsuarios').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#curso').val());
        codigo = $.trim($('#codigo').val());
        tipo = $.trim($('#tipos').val());
        console.log(tipo);
        $.ajax({
            url: "../controlador/crud_table.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, codigo: codigo, tipo: tipo, opcion: opcion },

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
        codigo = $.trim($('#apellido').val());
        tipo = $.trim($('#tipo').val())
        opcion = 9;
        $.ajax({
            url: "../controlador/crud_table.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, codigo: codigo, tipo: tipo, opcion: opcion },

            success: function (data) {
                tablaUsuarios.ajax.reload(null, false);
            }
        });
    });

    //Editar        
    $(document).on("click", ".btnEditar", function () {
        opcion = 7;//editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        codigo = fila.find('td:eq(2)').text();
        nombre = fila.find('td:eq(1)').text();
        tipo = fila.find('td:eq(3)').text();
        $("#curso").val(nombre);
        $("#codigo").val(codigo);
        $('#selectDefault').val(tipo).html(tipo)
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $('#EditarRegistro').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        nombre = $(this).closest('tr').find('td:eq(1)').text();
        opcion = 8; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + nombre + "?");
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
