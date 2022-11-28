$(document).ready(function () {
  incial();
  const socioSeleccionado = {
      nSocio: null,
      nombre: null,
      apellido: null,
      tipoSocio: null,
      dniSocio: null,
    },
    bibliotecario = { id: null, nombre: null, apellido: null };

  DetCuotasSeleccionadas = {};
  ordenEleccion();
});
async function ordenEleccion() {
  //escucha el cambio de checker buscar socio
  $(":radio").change(function (e) {
    e.preventDefault();
    tipoBusqueda = radioChecked("#container_RadioCheck1");
    attrDelInputbuscador(tipoBusqueda);
    limpiarCampos();
  });
  //escucha la pulsacion teclas del input buscar socio
  $("#search-input").keyup(function (e) {
    $("#table-Socios>tbody").html("");
    if ($("#search-input").val()) {
      let search = $(this).val();
      buscarDatodeSocio(
        radioChecked("#container_RadioCheck1"),
        search,
        cargarDatosSocios
      );
    }
  });
  //escucha el click del input buscar socio

  $("#search-input").click(function (e) {
    limpiarCampos();
  });

  let espera = await clickrowTable("#table-Socios>tbody");

  espera = await dblclickrowTableSeleccionarSocio("#table-Socios>tbody");

}

function limpiarCampos() {
  $("#detFact-fecha").html(`Fecha:`);
  $("#detFact-nSocio").html(`N° Socio:`);
  $("#detFact-nomApellSocio").html(`Nombre y Apellido Socio:`);
  $("#detFact-tipoSocio").html(`Tipo Socio:`);
  $("#detFact-dniSocio").html(`DNI Socio:`);
  //limpiar tabla seleccionar Socios
  $("#table-Socios>tbody").html("")
  $("#search-input").val();
}

//Eventos Interfaz
function insertarSpinner(idSpinner, idUbicacion) {
  let template = `<div id="${idSpinner}" class="spinner-border text-primary">
      <span class="visually-hidden">Loading..</span>
    </div>`;
  $(`${idUbicacion}`).html(template);
}
function eliminarSpinner(idSpinner) {
  $(`#${idSpinner}`).remove();
}
function ocultarAcordion(idAcordion) {
  $(`#${idAcordion}`).collapse("hide");

  //acordion1
}
function mostrarAcordion(idAcordion) {
  $(`#${idAcordion}`).collapse("show");
}
function radioChecked(idContenedor) {
  return $(idContenedor).find(":checked").val();
}
//funcion que inicializa el radio 1
function incial() {
  $(":radio:first").attr("checked", true);
 
  $("#CobrarCuotas").hide();
  $("#ConfirmarCuotas").hide();
  var tipoBusqueda = radioChecked("#container_RadioCheck1");
  attrDelInputbuscador(tipoBusqueda);
  ocultarAcordion("acordion2");
      ocultarAcordion("acordion3");
      mostrarAcordion("acordion1");
      limpiarCampos();

}

function attrDelInputbuscador(val) {
  if (val == "DNI") {
    $("#search-input").val("");

    $("#search-input").attr("type", "number");
    $("#search-input").attr("min", "10000000");
    $("#search-input").attr("max", "10000000");
  }
  if (val == "N°SOCIO") {
    $("#search-input").val("");
    $("#search-input").attr("type", "number");
    $("#search-input").attr("min", "0");
    $("#search-input").attr("max", "9999");
  }
  if (val == "NOMBREAPELLIDO") {
    $("#search-input").val("");
    $("#search-input").attr("type", "search");
    $("#search-input").removeAttr("min");
    $("#search-input").removeAttr("max");
    $("#search-input").attr("minlength", 1);
    $("#search-input").attr("maxlength", 25);
    $("#search-input").attr("pattern", "[A-Za-z]+");
  }
}
function intercambiarSeleccionados(principal, classInt = "table-primary") {
  $("tbody > tr").removeAttr("class");
  $(principal).addClass(classInt);
  return principal;
}
//Eventos mixtos??

async function clickrowTable(id) {
  const click = await $(id).click((e) => {
    e.preventDefault();
    new Promise((resolve, reject) => {
      /* console.log(e.target); */
      let t = $(e.target).parent("tr");
      intercambiarSeleccionados(t);
      resolve();
    });
  });
  return;
}
/***
 * @params id de la tabla que se desea obtener el elemento seleccionado
 * @return retorna un id de la fila seleccionada en el body de la tabla
 */
async function dblclickrowTableSeleccionarSocio(id) {
  $(id).dblclick((e) => {
    let t = $(e.target).parent("tr");
    intercambiarSeleccionados(t, "table-danger");

    let elementoSeleccionado = $(t).attr("id");
    /* console.log("DNI Socio Seleccionado", elementoSeleccionado); */
    registrarDataSocio(elementoSeleccionado);
    consultarCuotasxDniSocio(elementoSeleccionado);

    ocultarAcordion("acordion1");
    mostrarAcordion("acordion2");
  });
}

//Eventos Socios
function cargarDatosSocios(socios) {
  if (Object.keys(socios).length > 0) {
    let template = "";

    socios.forEach((socio) => {
      template += `<tr id="${socio.SOCIO_DNI}">
            <td scope="row">${socio.SOCIO_ID}</td>
            <td>${socio.SOCIO_DNI}</td>
            <td>${socio.SOCIO_NOMBRE}</td>
            <td>${socio.SOCIO_APELLIDO}</td>
            <td>${socio.SOCIO_CATEGORIA}</td>
            <td>${socio.SOCIO_ESTADOSOCIO}</td>
          </tr>`;
    });

    $("#table-Socios>tbody").html(template);
  }
}


/**
 *
 * @param {*} tipobusqueda elemtos get enviado al backend ejem radioChecked("#container_RadioCheck1")
 * @param {*} datoBuscado
 * @param {*} succesFunction funcion a ejecutarse de obtener un una respuesta succes succesFunction(this.socios)
 */
function buscarDatodeSocio(tipobusqueda, datoBuscado, succesFunction) {
  search = datoBuscado;

  $.ajax({
    beforeSend: function () {
      insertarSpinner("spinertablaSocios", "#table-Socios>tbody");
    },
    url: `Handler/Cobro/HandlerRegistrarCobro.php?Busquedasocio=${tipobusqueda}`,
    type: "POST",
    data: { search },
    success: function (response) {
      let res = JSON.parse(response);
      let socios = res.results;

      succesFunction(socios);
    },
    error: function (error) {
      console.log(error);
      if (error.status == 404) {
        console.log("No se encontro un socio");
        console.log(error.responseText);
        let res = JSON.parse(error.responseText);
        console.log(res);
        $("#table-Socios>tbody").html(
          '<tr class=""><td scope="row" colspan="6" class="table-warnnig"><p class="h4 justify-content-center">No se encontraron Socios</p></td></tr>'
        );
        return "";
      }
    },

    complete: function () {
      eliminarSpinner("spinertablaSocios");
    },
  });
}

function registrarDataSocio(socioBuscado) {
  buscarDatodeSocio("DNI", socioBuscado, function (elementos) {
    /* console.log(elementos); */

    elementos.forEach((elemento) => {
      socioSeleccionado = {
        nSocio: elemento.SOCIO_ID,
        nombre: elemento.SOCIO_NOMBRE,
        apellido: elemento.SOCIO_APELLIDO,
        tipoSocio: elemento.SOCIO_CATEGORIA,
        dniSocio: elemento.SOCIO_DNI,
      };
    });

    /* console.log(
      "Datos de Socio Seleccionad registrarDataSocio(socioBuscado)",
      socioSeleccionado
    ); */
  });
}

//Eventos Cuotas
async function consultarCuotasxDniSocio(DniSocio) {
  $.ajax({
    beforeSend: function () {
      insertarSpinner("spinner_t-Cuota", "#t-Cuota>tbody");
    },
    type: "POST",
    url: `Handler/Cobro/HandlerRegistrarCobro.php?BusquedaCuotaAbonadasDni=${true}`,
    data: { DniSocio },

    success: function (response) {
      /* console.log("response1",response); */
      let res = JSON.parse(response);
      /* console.log("res1",res); */
      let cuotas = res.results;
      /* console.log("mostrar datos de las cuotas", cuotas); */
      cargarDatosCuotas(cuotas);
      $("#ConfirmarCuotas").show();
    },
    error: function (error) {
      if (error.status == 404) {
        console.log("no se encontraron cuotas para el socio solicitado");
        console.log(error.responseText);
        let res = JSON.parse(error.responseText);

        $("#t-Cuota>tbody").html(
          '<tr class=""><td scope="row" colspan="7" class="table-warnnig"><p class="h4 text-primary  ">El Socio no posee cuotas Abonadas</p></td></tr>'
        );
      }
    },
  });
}
function calcularCuotaVencida(fechaVencimiento,fechaPago=null) {
  let fv = Date.parse(fechaVencimiento);
  if(typeof(fechaPago)==null){
  let hoy = new Date();
  
  return fv < hoy ? true : false;
}
  let fp=Date.parse(fechaPago)
  return fv < fp ? true : false;


}
function cargarDatosCuotas(cuotas) {
  if (Object.keys(cuotas).length > 0) {
    let template = "";
    cuotas.forEach((cuota) => {
      let estadoCuota = calcularCuotaVencida(cuota.FVENC,cuota.FCOBRO);
      template += `<tr >
        <td scope="row">${cuota.IdCuota}</td>
        <td>${cuota.MesCuota}</td>
        <td>${cuota.CatSocio}</td>
        <td>${cuota.VCUOTA}</td>
        <td>${cuota.RECARGO}</td>
        <td>${cuota.FVENC}</td>
        <td ${
          estadoCuota ? "class='table-danger'" : " 'class='table-succes'' "
        }>${estadoCuota ? "Vencida" : "Vigente"}</td>
        
        <td>${cuota.ESTADOCOBRO}</td>
        <td>${cuota.FCOBRO}</td>
      </tr>`;
    });
    $("#t-Cuota>tbody").html(template);
  }
}

{/* <th scope="col"># Cuota</th>
                                <th scope="col">Mes-Año</th>
                                <th scope="col">Tipo Cuota</th>
                                <th scope="col">$ Cuota</th>
                                <th scope="col">$ Recargo</th>
                                <th scope="col">Fecha Venc</th>
                                <th scope="col">Estado Venc</th>
                                <th scope="col">Estado Cuota</th>
                                <th scope="col">Fecha Pago</th> */}




// mostrar datos de socio por interfaz
async function cargarDatosSociosRegistrarCobro() {
  let hoy = new Date();

  $("#detFact-fecha").html(`Fecha: ${hoy.toLocaleDateString()}`);
  $("#detFact-nSocio").html(`N° Socio: ${socioSeleccionado.nSocio}`);
  $("#detFact-nomApellSocio").html(
    `Nombre y Apellido Socio: ${socioSeleccionado.nombre} ${socioSeleccionado.apellido}`
  );
  $("#detFact-tipoSocio").html(`Tipo Socio: ${socioSeleccionado.tipoSocio}`);
  $("#detFact-dniSocio").html(`DNI Socio: ${socioSeleccionado.dniSocio}`);
}
async function cargarDatosbibliotecarioRegistrarCobro() {
  $("#detFact-idBibliotecario").html(`Id Bibliotecario:: ${bibliotecario.id}`);
  $("#detFact-nomApellBibliotecario").html(
    `Nombre y Apellido Bibliotecario: ${bibliotecario.nombre} ${bibliotecario.apellido}`
  );
}
// mostrar datos de las cuotas por interfaz









//Toast
function mostrarMsgAdvertencia(array) {
  array.forEach((msg) => {
    toastr["warning"](`${msg}`, "Atención!!");
  });

  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "5000",
    timeOut: 5000,
    extendedTimeOut: 3000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  };
}
function mostrarMsgExito(array) {
  array.forEach((msg) => {
    toastr["success"](`${msg}`, "Atención!!");
  });

  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "3000",
    timeOut: 3000,
    extendedTimeOut: 1000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  };
}
function mostrarMsgError(array) {
  array.forEach((msg) => {
    toastr["error"](`${msg}`, "Atención!!");
  });

  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "0",
    timeOut: 10000,
    extendedTimeOut: 3000,
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: false,
  };
}
function resetForm(idForm){
  $(idForm).trigger("reset");
  ocultarInputInicio();
}