$(document).ready(function () {
    var user_id, opcion;
    opcion = 5;

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
            { "data": "id_estudiante" },
            { "data": "est_apellido" },
            { "data": "est_nombre" },
            { "data": "cur_nombre" },
            { "data": "tip_nombre" },
            { "data": "est_fecha_inicio" },
            { "data": "est_fecha_fin" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-secondary btn-sm btngenerar'><i class='fas fa-file-pdf'></i></button><button class='btn btn-primary btn-sm btnEditar'><i class='fas fa-edit'></i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>" }
        ]
    });
    var fila; //captura la fila, para editar o eliminar
    $('#formUsuarios').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());
        apellido = $.trim($('#apellido').val());
        fecha_inicio = $.trim($('#fecha_ini').val());
        fecha_fin = $.trim($('#fecha_fin').val());
        $.ajax({
            url: "../controlador/crud_table.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, apellido: apellido, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, opcion: opcion },
            
            success: function (data) {
                
                tablaUsuarios.ajax.reload(null, false);
            }
        });
        $('#EditarRegistro').modal('hide');
    });
    //generar 1 certificado
    $(document).on("click", ".btngenerar", function () {
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        apellido = fila.find('td:eq(1)').text();
        nombre = fila.find('td:eq(2)').text();
        curso = fila.find('td:eq(3)').text();
        tipo = fila.find('td:eq(4)').text();
        fecha_inicio = fila.find('td:eq(5)').text();
        fecha_fin = fila.find('td:eq(6)').text();
            $.ajax({
                url: "../controlador/generar.php",
                type: "POST",
                datatype: "json",
                data: { user_id: user_id, nombre: nombre, apellido: apellido, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin, curso:curso, tipo:tipo },
                success: function (data) {
                    var smg = data;
                    console.log(smg);
                    if(smg=="ok"){
                        Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Se Genero el certificado correctamente correctamente',
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Algo salio mal...',
                            text: 'No se genero el certificado!',
                          })
                    }
                }
        }); 
        

    }) 
    //Editar        
    $(document).on("click", ".btnEditar", function () {
        opcion = 2;//editar
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        apellido = fila.find('td:eq(1)').text();
        nombre = fila.find('td:eq(2)').text();
        curso = fila.find('td:eq(3)').text();
        fecha_inicio = fila.find('td:eq(5)').text();
        fecha_fin = fila.find('td:eq(6)').text();
        $("#nombre").val(nombre);
        $("#apellido").val(apellido);
        $("#fecha_ini").val(fecha_inicio);
        $("#fecha_fin").val(fecha_fin);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $('#EditarRegistro').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + user_id + "?");
        if (respuesta) {
            $.ajax({
                url: "crud_table.php",
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
