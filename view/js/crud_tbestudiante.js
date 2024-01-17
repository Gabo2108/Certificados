var fila; //captura la fila, para editar o eliminar
    $('#frmestudiante').submit(function (e) {
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());
        apellido = $.trim($('#apellido').val());
        fecha_inicio = $.trim($('#fecha_ini').val());
        fecha_fin = $.trim($('#fecha_fin').val());
        $.ajax({
            url: "./ajax/estudiante.ajax.php",
            type: "POST",
            datatype: "json",
            data: { user_id: user_id, nombre: nombre, apellido: apellido, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin},
            
            success: function (data) {
                if (data) {
                    tablaCertificado.ajax.reload(null, false);
                }else{
                    Swal.fire("Se produjo un error", "Intentelo de nuevo", "warning");
                }    
            }
        });
        $('#EditarRegistro').modal('hide');
    });
    //generar 1 certificado
    $(document).on("click", ".btngenerar", function () {
        fila = $(this).closest("tr");
        user_id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID
            $.ajax({
                url: "./ajax/certificado.ajax.php",
                type: "POST",
                datatype: "json",
                data: { user_id: user_id},
                beforeSend: function(){
                    Swal.fire({
                        title:"Cargando", 
                        imageUrl: "https://www.boasnotas.com/img/loading2.gif",
                        imageWidth: 50,
                        imageHeight: 50,
                        imageAlt: "Custom image",
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        //icon: "success"
                    });
                },
                success: function (data) {
                    var smg = data;
                    if(smg==true){
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
        fecha_inicio = fila.find('td:eq(6)').text();
        fecha_fin = fila.find('td:eq(7)').text();
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
        user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()); //capturo el ID		            
        apellido = fila.closest("tr").find('td:eq(1)').text();
        Swal.fire({
            title: "Eliminar "+apellido,
            text: "Estos cambios no seran reversibles!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "./ajax/estudiante.ajax.php",
                    type: "POST",
                    datatype: "json",
                    data: {  del_id: user_id },
                    success: function (data) {
                        if (data) {
                            tablaCertificado.row(fila.parents('tr')).remove().draw();
                        }
                        
                    }
                });
            }
          })
    });