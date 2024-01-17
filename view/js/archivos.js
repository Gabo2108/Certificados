// Seleccionar todos los elementos con la clase "item"
const items = document.querySelectorAll("#profile-tab");
window.onload = function() {
    getFileList('Certificado');
}
// Establecer el evento "click" para cada elemento
items.forEach((item) => {
  item.addEventListener("click", () => {
    // Seleccionar el elemento con la clase "active"
    const activeElement = document.querySelector(".active");
    const folderpath = item.textContent;
    getFileList(folderpath);

    // Verificar si el elemento seleccionado es diferente al elemento activo
    if (item !== activeElement) {
      // Agregar la clase "active" al elemento seleccionado y eliminarla del elemento activo
      item.classList.add("active");
      activeElement.classList.remove("active");
    }
  });
});

function getFileList(folder) { 
  if(folder=="Rar"){
    initiateAjaxRequest("./ajax/archivos.ajax.php","POST",{"Rar":folder},folder,callback_rar);
    
  }else{    
    initiateAjaxRequest("./ajax/archivos.ajax.php","POST",{"folderPath":folder},folder,callback_pdf);
  }
  }
  function callback_pdf(data,folder){
    let table = document.getElementById("tb-arch");
    let tableContent = "";
    if(data.length > 0){
      data.forEach(function(element) {
        tableContent += "<tr>";
        tableContent += "<td class='text-center'><div class='circle circle-sm bg-light'><span class='fe fe-file fe-16 text-muted'></span></div><span class='dot dot-md bg-warning mr-1'></span></td>";
        tableContent += "<th scope='row'>" + element.nombre + "<br /><span class='badge badge-light text-muted mr-2'>" + element.tamaño + "</span><span class='badge badge-light text-muted'>" + element.tipo + "</span></th>";
        tableContent += "<td class='text-muted'>" + element.fecha + "</td>";
        tableContent += "<td> <button type='button' id='del' elm='"+element.nombre+"' class='btn mb-2 btn-outline-link'><i class='fe fe-trash-2 fe-12 mr-2'></i></button> <a href='./documents/" +folder+"/" +element.nombre + "' download><button type='button' class='btn mb-2 btn-outline-link'><i class='fe fe-download fe-12 mr-2'></i></button></a></td>";
        tableContent += "</tr>";
       });
      table.innerHTML = tableContent;
    }else{
      table.innerHTML = "";
    }
  }
  function callback_rar(data,folder){
    let table = document.getElementById("tb-arch");
    let tableContent = "";
    if(data.length > 0){
      data.forEach(function(element) {
        tableContent += "<tr>";
        tableContent += "<td class='text-center'><div class='circle circle-sm bg-light'><span class='fe fe-archive fe-16 text-muted'></span></div><span class='dot dot-md bg-warning mr-1'></span></td>";
        tableContent += "<th scope='row'>" + element.nombre + "<br /><span class='badge badge-light text-muted mr-2'>" + element.tamaño + "</span><span class='badge badge-light text-muted'>" + element.tipo + "</span></th>";
        tableContent += "<td class='text-muted'>" + element.fecha + "</td>";
        tableContent += "<td> <button type='button' id='del' elm='"+element.nombre+"' class='btn mb-2 btn-outline-link'><i class='fe fe-trash-2 fe-12 mr-2'></i></button> <a href='./documents/" +folder+"/" +element.nombre + "' download><button type='button' class='btn mb-2 btn-outline-link'><i class='fe fe-download fe-12 mr-2'></i></button></a></td>";
        tableContent += "</tr>";
       });
      table.innerHTML = tableContent;
    }else{
      table.innerHTML = "";
    }
  }
  function initiateAjaxRequest(url,method,dato,folder,callback){
    $.ajax({
      url: url,
      type: method,
      data: dato,
      datatype: "json",
      success: function (data) {
        callback(data,folder);
      },
      error: function(data){
        callback(data);
      }
    });
  }