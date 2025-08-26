var fila; //captura la fila, para editar o eliminar
$("#frmCursos").submit(function (e) {
  e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
  nombre = $.trim($("#nombre").val());
  codigo = $.trim($("#codigo").val());
  horas = $.trim($("#horas").val());
  tipo = $.trim($("#tipo").val());
  $.ajax({
    url: "./ajax/curso.ajax.php",
    type: "POST",
    datatype: "json",
    data: {
      curso_id: curso_id,
      nombre: nombre,
      horas: horas,
      codigo: codigo,
      tipo: tipo,
    },
    success: function (data) {
        if (data) {
            tablaCursos.ajax.reload(null, false);
        }else{
            Swal.fire("Se produjo un error", "Intentelo de nuevo", "warning");
        }
    },
  });
  $("#EditarRegistro").modal("hide");
});
//add

$(document).on("click", ".btn-add", function () {
  $.ajax({
    type: "POST",
    url: "./ajax/selects.ajax.php",
    datatype: "json",
    data: { tipo: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#tipos").select2({ theme: 'bootstrap4',data: datas });
  });});
$("#frmCurso").submit(function (e) {
  //evita el comportambiento normal del submit, es decir, recarga total de la página
  nombre = $.trim($("#nuevos").val());
  codigo = $.trim($("#codigos").val());
  horas = $.trim($("#horas").val());
  tipo = $.trim($("#tipos").val());
  $.ajax({
    url: "./ajax/curso.ajax.php",
    type: "POST",
    datatype: "json",
    data: {
      nuevo: nombre,
      codigo: codigo,
      horas: horas,
      tipo: tipo,
    },
    success: function (data) {
        if (data) {
            tablaCursos.ajax.reload(null, false);
        }else{
            Swal.fire("Se produjo un error", "Intentelo de nuevo", "warning");
        }
    },
  });
  $("#NuevoCurso").modal("hide");
});

//Editar
$(document).on("click", ".btnEditar", function () {
  fila = $(this).closest("tr");
  curso_id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
  horas = fila.find("td:eq(2)").text();
  codigo = fila.find("td:eq(3)").text();
  nombre = fila.find("td:eq(1)").text();
  tipo = fila.find("td:eq(4)").text();
  $("#nombre").val(nombre);
  $("#horas").val(horas);
  $("#codigo").val(codigo);
  $.ajax({
    type: "POST",
    url: "./ajax/selects.ajax.php",
    datatype: "json",
    data: { tipo: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#tipo").select2({theme: 'bootstrap4',data: datas });
    var option = datas.find((x) => x.text == tipo);
    $("#tipo").val(option.id).trigger("change");
  });
  $(".modal-header").css("background-color", "#007bff");
  $(".modal-header").css("color", "white");
  $("#EditarRegistro").modal("show");
});

//Borrar
$(document).on("click", ".btnBorrar", function () {
  fila = $(this);
  curso_id = parseInt($(this).closest("tr").find("td:eq(0)").text()); //capturo el ID
  nombre = fila.closest("tr").find("td:eq(1)").text();
  Swal.fire({
    title: "Eliminar curso <br>" + nombre,
    text: "Estos cambios no seran reversibles!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "./ajax/curso.ajax.php",
        type: "POST",
        datatype: "json",
        data: { del_id: curso_id },
        success: function (data) {
          if (data) {
            tablaCursos.row(fila.parents("tr")).remove().draw();
          }
        },
      });
    }
  });
});
