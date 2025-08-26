function Letras(e) {
  tecla = document.all ? e.keyCode : e.which;

  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {
    return true;
  }

  // Patrón de entrada, en este caso solo acepta numeros y letras
  patron = /[a-zñàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}
function codigo(e) {
  tecla = document.all ? e.keyCode : e.which;

  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {
    return true;
  }

  // Patrón de entrada, en este caso solo acepta numeros y letras
  patron = /[a-z0-9ñàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ-]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}
function horas(e) {
  tecla = document.all ? e.keyCode : e.which;

  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {
    return true;
  }
  patron = /[0-9]/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}
function mayus(e) {
  e.value = e.value.toUpperCase();
}
function mostrarpass(e) {
  var ver = $(".contrasenas");
  var icon = $(".icon-pass");
  if (ver.attr("type") == "password") {
    ver.attr("type", "text");
    icon.removeClass("fe-eye-off").addClass("fe-eye");
  } else {
    ver.attr("type", "password");
    icon.removeClass("fe-eye").addClass("fe-eye-off");
  }
}
