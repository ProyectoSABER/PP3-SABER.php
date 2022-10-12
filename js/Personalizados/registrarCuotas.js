//iniciamos jquery cuando se carga el DOM
$(document).ready(function () {
  
  //Ocultamos los elementos en el incio
  ocultarInputInicio();

  //Evento en Input Mes
  $("#InputMes").change(function () {
    //obtenemos año y mes seleccionado del input
    let añoSeleccionado = $(this).val().substr(0, 4);
    let mesSeleccionado = $(this).val().substr(5);

    //mostramos el selector de fecha de vencimiento
    if ($(this).val() == "") {
      resetCheckbox();
      resetInputValorCuota();
      $("#FVencimiento").attr("disabled", true);
      $("div .FVencimiento").hide();
    } else {
      $("div .FVencimiento").show(500);
      $("#FVencimiento").attr("disabled", false);
      $("#FVencimiento").val("");
    }
    validarInput("#InputMes");
    //mostramos el input#FVencimiento

    let date = new Date(añoSeleccionado, mesSeleccionado);
    let primerDia = new Date(date.getFullYear(), date.getMonth() - 1, 1);

    let fechainicio = fechaInicio(primerDia);
    let ultimoDia = new Date(date.getFullYear(), date.getMonth(), 0);

    primerDia = String(fechainicio.getDate()).padStart(2, "0");
    ultimoDia = ultimoDia.getDate();

    let fechaMinimaASeleccionar =
      añoSeleccionado + "-" + mesSeleccionado + "-" + primerDia;

    let fechaMaximaASeleccionar =
      añoSeleccionado + "-" + mesSeleccionado + "-" + ultimoDia;

    $("#FVencimiento").attr("min", fechaMinimaASeleccionar);
    $("#FVencimiento").attr("max", fechaMaximaASeleccionar);
  });

  //Evento en Input FechaVencimiento
  $("#FVencimiento").change(function () {
    //mostramos el selector de fecha de vencimiento

    if ($(this).val() == "") {
      resetCheckbox();
      resetInputValorCuota();
    } else {
      //mostramos los imputCheck
      $("div .Categoria_Socios").show(500);
    }
    validarInput("#FVencimiento");
  });

  //Evento en Input Check
  $(".checkSocio").change(function () {
    //mostramos los imput money
    let attrName = $(this).attr("name");

    $(this).siblings("div").toggle(500).children();
    var inputPrecioCuota = $(this)
      .siblings("div")
      .children("div:last")
      .children("input");
    if (
      $(this)
        .siblings("div")
        .children("div:last")
        .children("input")
        .attr("disabled") == "disabled"
    ) {
      $(this)
        .siblings("div")
        .children("div:last")
        .children("input")
        .attr("disabled", false);
    } else {
      $(this)
        .siblings("div")
        .children("div:last")
        .children("input")
        .attr("disabled", true)
        .val("");
    }
  });

  //Evento en ButtonRegistrar
  $("#btn_registrar").click(function (e) {
    e.preventDefault();
    iniciar_modalRegistrarCuota();
  });

  //Evento registrar contenido.
  $("#modal_reg").click(function (e) {  
    e.preventDefault();
    
    enviarDatos();
  });
  
  //evento limpiar modal
  $(".modal").on("hidden.bs.modal", function () {
    $(this).find("tbody").children("tr").remove(); //para borrar todos los datos que tega la tabla.
  });
});

function ocultarInputInicio() {
  $("div .FVencimiento").hide();
  $("#FVencimiento").attr("disabled", true);
  $(".Categoria_Socios").hide();
  $(".input_valorCuota").hide();
  $(".input_valorCuota input").attr("disabled", true);
}
//validamos campos, cargamos modal y mostramos por pantalla.
function iniciar_modalRegistrarCuota() {
  if (
    validarInput("#InputMes") &&
    validarInput("#FVencimiento") &&
    validarCheck(".checkSocio") &&
    validarInputClass(".inputVcuota")
  ) {
  datos = $("#formAñadirCuota").serialize();
    let datos2 = $("#formAñadirCuota").serializeArray();
    console.log(datos);

    cargarModal( "#modal_AñadirCuotas", datos2);
    $("#modal_AñadirCuotas").modal("show"); //Con esto se llama al modal desde jquery
    
    

  } else {
    console.log("Faltan válidar campos");
  }
}

//cargamos las filas de la tabal en el modal
function cargarModal(idModal, array) {
  if (array != null) {

    [{ ...mes }, { ...FechaVencimiento }, ...socios] = array; //Extraemos los objetos mes y fecha de vencimiento
    
    
    
    //modificamos el array >obj en un array manejable.
    let socio_cuota = [];

    socios.forEach((element) => {
      socio_cuota.push(element.value);
    });

    
  let row=[];
  let x=(socio_cuota.length/2) //como extraremos 2 elementos consecutivos del array, sacamos el cociente entre 2 para realizar la iteraccion, coomo el array se muta por cada vuelta, convienen extraer el largo del array antes de iniciar el bucle.
    for (let i = 0; i < x ; i++) {
      let tipoSocio=socio_cuota.shift();
      let valorCuota=socio_cuota.shift();

      row.push($(`<tr><td>${mes.value}</td><td>${FechaVencimiento.value}</td><td>${tipoSocio}</td><td>$${valorCuota}</td></tr>`))
      
      
      
    }
    
    $(idModal).find("tbody").append(row);
   
  }
}
function resetCheckbox() {
  $(".checkSocio").prop("checked", false);
}
function resetInputValorCuota() {
  $(".inputVcuota").attr("disabled", true).val("");
  $(".input_valorCuota").hide();
  $(".Categoria_Socios").hide();
}
//funcion que devuelve las fechas seleccionables de un mes
function fechaInicio(primerDia) {
  let hoy = new Date();
  hoy.setDate(hoy.getDate() + 1);
  return primerDia > hoy ? primerDia : hoy;
}

function validarInput(input) {
  if ($(input).val() != "") {
    $(input).addClass("is-valid");
    $(input).removeClass("is-invalid");

    return true;
  }
  $(input).removeClass("is-valid");
  $(input).addClass("is-invalid");
  return false;
}
function validarInputClass(input) {
  let estado = true;
  $(input).each(function (index, value) {
    if ($(this).attr("disabled") != "disabled") {
      if ($(this).val() != "") {
        $(this).addClass("is-valid");
        $(this).removeClass("is-invalid");

        estado = estado && true;
      } else {
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");

        estado = estado && false;
      }
    }
  });

  return estado;
}
function validarCheck(input) {
  let estado = $(`${input}:checked`).length > 0 ? true : false;

  if (!estado) {
    $(input).each(function (index, value) {
      $(this).removeClass("is-valid");
      $(this).addClass("is-invalid");
    });
  } else {
    $(input).each(function (index, value) {
      $(this).removeClass("is-invalid");
      $(this).addClass("is-valid");
    });
  }

  return estado;
}

function enviarDatos () { 
  datos = $("#formAñadirCuota").serialize();
  console.log(datos);

  if(datos){
    if (confirm("Deseas guardar las cuotas?")){
      agregar_datos(datos)
      }
      else{
        return
      }
      
  } 
 
  
}

function agregar_datos(datos){
  $.ajax({
      method:"POST",
      url:"Handler/cuotas/HandlerRegistrarCuota.php?guardar=true",
      data: datos,
      success: function(e){
          
          console.log(e)
          if (e==1) {
              alert("Registro Exitoso");
              
          }else{
              alert("Error de Registro");
          }

      }
  });
  
  return false;
}