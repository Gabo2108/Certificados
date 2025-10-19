$(document).on("click", ".estudiante", function () {
  location.href = "estudiantes";
});
$(document).on("click", ".repbug", function () {
   var smg =document.getElementById('mensaje');
   smg.innerHTML='<div class="alert alert-danger" role="alert"><span class="fe fe-minus-circle fe-16 mr-2"></span> Esta funcionalidad aun se encuentra en desarrollo </div>';
   setTimeout(() => {
    smg.innerHTML="";
  }, 3000);
});
$(document).on("click", ".fecha", function () {
    $.ajax({
        type: "POST",
        url: "../ajax/selects.ajax.php",
        datatype: "json",
        data: { fecha: "hola" },
      }).then(function (data) {
        var datas = JSON.parse(data);
        $("#fecha").select2({theme: 'bootstrap4', data: datas });
      });
    })
$("#frmfecha").submit(function (event) {
  event.preventDefault();
  var datos = $(this).serialize();
  $.ajax({
            url: '../ajax/certificado.ajax.php',
            type: 'POST',
            data: datos,
            success: function(data) {
                var smg = data;
                if (smg == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Exito',
                        text: 'Se crearon los archivo correctamente',
                    }).then(function(result) {
                        if (result.value) {
                            location.reload();
                        }
                    })
                }
            },
            error: function(data) {
               Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Puede que no se hayan generado todos los certificados',
                    })
            }
        })	.done(function(res){
		console.log(res) 
	}) 
});

$("#frmponencia").submit(function (event) {
  event.preventDefault();
  var datos = $(this).serialize();
  console.log(datos);
  $.ajax({
    url: "../model/pdf_ponencia.php",
    type: "POST",
    data: datos,
    success: function (data) {
      var smg = data;
      console.log(smg);
      if (smg == "ok") {
        Swal.fire({
          icon: "success",
          title: "Exito",
          text: "Se creo el archivo correctamente",
        }).then(function (result) {
          if (result.value) {
            location.href = "certificados_menu.php";
          }
        });
      }
    },
  });
});
$("#eliminareg").submit(function (event) {
  event.preventDefault();
  var datos = $(this).serialize();
  console.log(datos);
  Swal.fire({
    title: "Estas seguro?",
    text: "Estos cambios no se pueden revertir!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "../controlador/eliminar_reg.php",
        type: "POST",
        data: datos,
        success: function (data) {
          var smg = data;
          console.log(smg);
          if (smg == "ok") {
            Swal.fire({
              icon: "success",
              title: "Exito",
              text: "Se eliminaron los registros correctamente",
            }).then(function (result) {
              if (result.value) {
                location.href = "certificados_menu.php";
              }
            });
          }
        },
      });
    }
  });
});
