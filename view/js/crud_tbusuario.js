var fila; //captura la fila, para editar o eliminar
$("#frmUsuarios").submit(function (e) {
  e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
  nombre = $.trim($("#Nombre").val());
  apellido = $.trim($("#Apellido").val());
  curso = $.trim($("#Cursos").val());
  rol = $.trim($("#Roles").val());
  pasw = $.trim($("#PASS").val());
  console.log(rol + " " + curso);
  $.ajax({
    url: "./ajax/usuarios.ajax.php",
    type: "POST",
    datatype: "json",
    data: {
      user_id: user_id,
      nombre: nombre,
      apellido: apellido,
      pasw: pasw,
      curso: curso,
      rol: rol,
    },
    success: function (data) {
      if (data) {
        tablaUsuarios.ajax.reload(null, false);
      } else {
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
    data: { cursos: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#Curso").select2({theme: 'bootstrap4', data: datas });
  });
  $.ajax({
    type: "POST",
    url: "./ajax/selects.ajax.php",
    datatype: "json",
    data: { Rol: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#Rol").select2({theme: 'bootstrap4', data: datas });
  });
});
$("#frmnuevousuario").submit(function (e) {
  //evita el comportambiento normal del submit, es decir, recarga total de la página
  nombre = $.trim($("#nombres").val());
  apellido = $.trim($("#apellidos").val());
  DNI = $.trim($("#dni").val());
  pasw = $.trim($("#passw").val());
  curso = $.trim($("#Curso").val());
  rol = $.trim($("#Rol").val());
  $.ajax({
    url: "./ajax/usuarios.ajax.php",
    type: "POST",
    datatype: "json",
    data: {
      nuevo: nombre,
      apellido: apellido,
      DNI: DNI,
      pasw: pasw,
      curso: curso,
      rol: rol
    },
    success: function (data) {
      if (data) {
        tablaUsuarios.ajax.reload(null, false);
        $("#frmnuevousuario").trigger("reset");
        $("#NuevoUsuario").modal("hide");
      } else {
        Swal.fire("Se produjo un error", "Intentelo de nuevo", "warning");
      }
    },
  });
});
//Editar
$(document).on("click", ".btnEditar", function () {
  opcion = 12; //editar
  fila = $(this).closest("tr");
  user_id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID
  apellido = fila.find("td:eq(1)").text();
  nombre = fila.find("td:eq(2)").text();
  curso = fila.find("td:eq(5)").text();
  rol = fila.find("td:eq(6)").text();
  pasw = fila.find("td:eq(4)").text();
  $("#Nombre").val(nombre);
  $("#Apellido").val(apellido);
  $("#PASS").val(pasw);
  $.ajax({
    type: "POST",
    url: "./ajax/selects.ajax.php",
    datatype: "json",
    data: { cursos: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#Cursos").select2({theme: 'bootstrap4', data: datas });
    var option = datas.find((x) => x.text == curso);
    $("#Cursos").val(option.id).trigger("change");
  });
  $.ajax({
    type: "POST",
    url: "./ajax/selects.ajax.php",
    datatype: "json",
    data: { Rol: "hola" },
  }).then(function (data) {
    var datas = JSON.parse(data);
    $("#Roles").select2({theme: 'bootstrap4', data: datas });
    var option = datas.find((x) => x.text == rol);
    $("#Roles").val(option.id).trigger("change");
  });
  $(".modal-header").css("background-color", "#007bff");
  $(".modal-header").css("color", "white");
  $("#EditarRegistro").modal("show");
});

//Borrar
$(document).on("click", ".btnBorrar", function () {
  fila = $(this);
  user_id = parseInt($(this).closest("tr").find("td:eq(0)").text()); //capturo el ID
  apellido = fila.closest("tr").find("td:eq(1)").text();
  nombre = fila.closest("tr").find("td:eq(2)").text();
  Swal.fire({
    title: "Eliminar usuario <br>" + apellido + " " + nombre,
    text: "Estos cambios no seran reversibles!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "./ajax/usuarios.ajax.php",
        type: "POST",
        datatype: "json",
        data: { del_id: user_id },
        success: function (data) {
          if (data) {
            tablaUsuarios.row(fila.parents("tr")).remove().draw();
          }
        },
      });
    }
  });
});
