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

  espera = await btnSeleccionarCuotas("#t-Cuota");
  registraCobroDeCuotas();
}
function limpiarCampos() {
  $("#detFact-fecha").html(`Fecha:`);
  $("#detFact-nSocio").html(`N° Socio:`);
  $("#detFact-nomApellSocio").html(`Nombre y Apellido Socio:`);
  $("#detFact-tipoSocio").html(`Tipo Socio:`);
  $("#detFact-dniSocio").html(`DNI Socio:`);
  //limpiar tabla seleccionar Socios
  $("#table-Socios>tbody").html("")
  $("#search-input").val("");
  //limpiar tabla registrarCobro
  $("#t-cobro>tbody").html("")
  //limpiar tabla SeleccionarCuota
  $("#t-Cuota>tbody").html("")
  //ocultarBotones
  $("#CobrarCuotas").hide();
  $("#ConfirmarCuotas").hide();
}
async function añadirRecargo() {
  $(".recargo").change(function (e) {
    e.preventDefault();

    calcularSubtotal(this);
  });
}
async function btnSeleccionarCuotas(idContenedor) {
  let confirmarCuotas = await $("#ConfirmarCuotas").click(async (e) => {
    
    e.preventDefault();
    const CuotasSeleccionadas = [];
    if ($(idContenedor).find(":checked").length > 0) {
      
      let espera = await $(idContenedor)
        .find(":checked")
        .each(async function (index, element) {
          let iddetalleCuota = $(this).attr("data-idDetalleCuota");
          CuotasSeleccionadas.push(iddetalleCuota);
        });

      espera = await cargarDetalleDePago(CuotasSeleccionadas);
      espera = await cargarDatosSociosRegistrarCobro();
      espera = await cargarDatosbibliotecarioRegistrarCobro();
      $("#CobrarCuotas").show();

      ocultarAcordion("acordion2");
      mostrarAcordion("acordion3");
    } else {
      console.log(
        "colocar objeto toast indicando el error de ningun elemento seleccionado"
      );
      mostrarMsgAdvertencia(["Debe seleccionar las cuotas a cobrar"])
    }
  });
}
//Eventos Interfaz
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
  buscarDatodeBibliotecario();
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
function insertarSpinner(idSpinner, idUbicacion) {
  let template = `<div id="${idSpinner}" class="spinner-border text-primary">
      <span class="visually-hidden">Loading..</span>
    </div>`;
  $(`${idUbicacion}`).html(template);
}
function eliminarSpinner(idSpinner) {
  $(`#${idSpinner}`).remove();
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
     /*  console.log(error); */
      if (error.status == 404) {
       /*  console.log("No se encontro un socio"); */
       /*  console.log(error.responseText); */
        let res = JSON.parse(error.responseText);
       /*  console.log(res); */
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

    elementos.forEach((elemento) => {
      socioSeleccionado = {
        nSocio: elemento.SOCIO_ID,
        nombre: elemento.SOCIO_NOMBRE,
        apellido: elemento.SOCIO_APELLIDO,
        tipoSocio: elemento.SOCIO_CATEGORIA,
        dniSocio: elemento.SOCIO_DNI,
      };
    });

    
  });
}

//Eventos Cuotas
async function consultarCuotasxDniSocio(DniSocio) {
  $.ajax({
    beforeSend: function () {
      insertarSpinner("spinner_t-Cuota", "#t-Cuota>tbody");
    },
    type: "POST",
    url: `Handler/Cobro/HandlerRegistrarCobro.php?BusquedaCuotaDni=${true}`,
    data: { DniSocio },

    success: function (response) {
      let res = JSON.parse(response);
      let cuotas = res.results;
      cargarDatosCuotas(cuotas);
      $("#ConfirmarCuotas").show();
    },
    error: function (error) {
      if (error.status == 404) {
       /*  console.log("no se encontraron cuotas para el socio solicitado"); */
       /*  console.log(error.responseText); */
        let res = JSON.parse(error.responseText);

        $("#t-Cuota>tbody").html(
          '<tr class=""><td scope="row" colspan="7" class="table-warnnig"><p class="h4 text-primary  ">El Socio no posee cuotas Adeudadas</p></td></tr>'
        );
      }
    },
  });
}
function calcularCuotaVencida(fechaVencimiento) {
  let hoy = new Date();
  let fv = Date.parse(fechaVencimiento);
  return fv < hoy ? true : false;
}
function cargarDatosCuotas(cuotas) {
  if (Object.keys(cuotas).length > 0) {
    let template = "";
    cuotas.forEach((cuota) => {
      let estadoCuota = calcularCuotaVencida(cuota.FVENC);
      template += `<tr >
        <td scope="row">${cuota.IdCuota}</td>
        <td>${cuota.MesCuota}</td>
        <td>${cuota.CatSocio}</td>
        <td>${cuota.VCUOTA}</td>
        <td>${cuota.FVENC}</td>
        <td ${
          estadoCuota ? "class='table-danger'" : " 'class='table-succes'' "
        }>${estadoCuota ? "Vencida" : "Vigente"}</td>
        <td >
        <div class="form-check form-switch d-flex justify-content-center">
        <input type="checkbox" class="form-check-input" data-idDetalleCuota="${
          cuota.IdDetCuota
        }"> 
        </div>
        </td>
      </tr>`;
    });
    $("#t-Cuota>tbody").html(template);
  }
}

//Eventos registro de pago de cuotas

//mostrar Cuotas a abonar por interfaz
async function cargarDetalleDePago(cuotas) {
  if (cuotas.length > 0) {
    if(typeof(DetCuotasSeleccionadas)!=="undefined"){
      for (const obj in DetCuotasSeleccionadas) {
        if (Object.hasOwnProperty.call(DetCuotasSeleccionadas, obj)) {
          delete DetCuotasSeleccionadas[obj];
          
        }
        
      }
    }
    let iteracioncuotas = await cuotas.forEach(async (element, index) => {
      let res = await consultarCuotasPorDetalle(element);

      let CuotasSeleccionadas = JSON.parse(res);

      let espera = await cuotasRegistrarCobro(
        CuotasSeleccionadas.results,
        index
      );

      if (index == cuotas.length - 1) {
        //aqui se va enviar la carga a la pantalla una vez que haya finalizado la carga al objeto de Det
        cargarDatosCuotasRegistrarCobro();
        añadirRecargo();
      }
    });
  }
}
async function consultarCuotasPorDetalle(IdDetalleCuota) {
  let result;

  try {
    result = $.ajax({
      beforeSend: function () {
        insertarSpinner("spinner_t-Cobro", `#t-cobro>tbody`);
      },
      type: "POST",
      url: `Handler/Cobro/HandlerRegistrarCobro.php?mostrarDetCuota=${true}`,
      data: { IdDetalleCuota },

      /* success: function (response) {
          let res = JSON.parse(response);
    
          let cuotas = res.results;
          
          calcularCuotaVencida(cuotas.Fvenc);
          CuotasSeleccionadas = {
            idCuota: cuotas.IdCuota,
            idDetalleCuota: cuotas.IdDetCuota,
            mesAño: cuotas.MesCuota,
            tipoCuota: cuotas.CatSocio,
            valorCuota: cuotas.Vcuota,
            fechaVenc: cuotas.Fvenc,
            estadoCuota: calcularCuotaVencida(cuotas.Fvenc) ? "Vencida" : "Vigente",
            recargo: "$0",
          };
          
          return CuotasSeleccionadas
        } */
    });

    return result;
  } catch (error) {
    if (error.status == 404) {
     /*  console.log("no se encontraron cuotas para el detalle Solicitado"); */
     /*  console.log(error.responseText); */
      let res = JSON.parse(error.responseText);
    }
  }
}
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

function cargarDatosCuotasRegistrarCobro() {
  let template = "";
  let total = null;

  for (const element in DetCuotasSeleccionadas) {
    if (Object.hasOwnProperty.call(DetCuotasSeleccionadas, element)) {
      const e = DetCuotasSeleccionadas[element];
      let subtotal = e.valorCuota;
      if (e.estadoCuota == "Vencida") {
        typeof e.recargo == "number"
          ? (subtotal += e.recargo)
          : (subtotal += 0);
      }

      template += `<tr id="${e.idDetalleCuota}">
        <td>${e.mesAño}</td>
        <td>${e.fechaVenc}</td>
        <td>${e.estadoCuota}</td>
        <td class="cuota">${e.valorCuota}</td>
        <td><input placeholder="$" value="${
          e.recargo
        }" type="number" min=0 max=10000 ${
        e.estadoCuota != "Vencida"
          ? 'disabled="true"' + 'hidden="true"'
          : 'class="recargo"'
      } /></td>
        <td  class="subtotal">$${subtotal}</td>
        </tr>`;

      total += subtotal;
    }
  }
  template += `<tr class="">
    <td scope="row" colspan="4" class="table-light"></td>
    
    <td class="table-success">Total</td>
    <td class="table-success" id="Total">$${total}</td>
  </tr>`;

  $(`#t-cobro>tbody`).html(template);
}

function calcularSubtotal(idcelda) {
 
  
 
  let recargo = $(idcelda).val()==""? 0 :parseInt($(idcelda).val());
  let IdFila = $(idcelda).closest("tr");

  let cuotaText = $(IdFila).find(".cuota").text();

  let cuota = parseInt(cuotaText);
  cuota = parseInt(cuota);

  let subtotal = $(IdFila)
    .find(".subtotal")
    .html(`$${cuota + recargo}`);
  calcularTotal();
}

async function calcularTotal() {
  let total = 0;

  $(".subtotal").each(function (index, element) {
    let subtotalString = $(this).text().toString();

    subtotalString = subtotalString.replace(/[^\d,]/g, "");
    subtotal = parseInt(subtotalString);
    total += subtotal;
  });

  $("#Total").text(`$${total}`);
}
function cuotasRegistrarCobro(cuotas, indice) {
  return new Promise((resolve, reject) => {
    calcularCuotaVencida(cuotas.Fvenc);
    DetCuotasSeleccionadas[`${indice}`] = {
      idCuota: cuotas.IdCuota,
      idDetalleCuota: cuotas.IdDetCuota,
      mesAño: cuotas.MesCuota,
      tipoCuota: cuotas.CatSocio,
      valorCuota: parseInt(cuotas.Vcuota),
      fechaVenc: cuotas.Fvenc,
      estadoCuota: calcularCuotaVencida(cuotas.Fvenc) ? "Vencida" : "Vigente",
      recargo: undefined,
    };
    resolve(DetCuotasSeleccionadas);
  });
}

function buscarDatodeBibliotecario() {
  result = $.ajax({
    type: "POST",
    url: `Handler/Cobro/HandlerRegistrarCobro.php?mostrarBibliotecario=${true}`,
    data: {},

    success: function (response) {
      let Solicitudbibliotecario = JSON.parse(response);

      let datoBibliotecario = Solicitudbibliotecario.results;


      bibliotecario = {
        id: datoBibliotecario.idBibliotecario,
        nombre: datoBibliotecario.nombre,
        apellido: datoBibliotecario.apellido,
      };
    },
  });
}

function registraCobroDeCuotas() {
  $("#CobrarCuotas").click((e) => {
    e.preventDefault();
    if (confirm("¿Deseas registrar el cobro de las cuotas seleccionadas?")) {
      let data = {};
      let detalleCobro = {};
      let i;
      $("#t-cobro>tbody")
        .find("tr")
        .each(function (index, element) {
          if ($(element).attr("id") == undefined) {
            return false;
          }
          i = index;

          let idDetalleCuota = $(element).attr("id");

          let valorCuota = $(element)
            .find("td.cuota")
            .text()
            .replace(/[^\d,]/g, "");
         /*  console.log(valorCuota); */
          let recargo=$(element)
          .find("input.recargo")
          .val()
         
       /*  console.log("recargo",recargo); */
          detalleCobro[index] = {
            idDetalleCuota,
            valorCuota,
            recargo:(recargo==undefined||recargo==""? "0" : recargo),
            estadoCobroCuota: "Pagada",
            idResponsableCobro: bibliotecario.id,
            observaciones: null,
          };

         /*  console.log(detalleCobro); */
        });

      data.detalleCobro = detalleCobro;
      data.cobroCuota = {
        fechaCobro: convertDateMysql(),
        idSocio: parseInt(
          $("#detFact-nSocio").text().replace("N° Socio: ", "")
        ),
      };

     /*  console.log(data); */
      registraCobroCuotaEnBd(data);
    }
  });
}

//eventos comprobante de pago
function registraCobroCuotaEnBd(data) {
  result = $.ajax({
    type: "POST",
    url: `Handler/Cobro/HandlerRegistrarCobro.php?RegistrarCobro=${true}`,
    data: {
      data,
    },

    success: function (response) {
      let respuesta = JSON.parse(response);

     /*  console.log(respuesta); */
      incial()
      
      mostrarMsgExito(["Se registro el cobro con exito"])
    },
    error: function (error) {
      if (error.status == 404) {
        let respuesta = JSON.parse(error.responseText);
       /*  console.log(respuesta); */
        mostrarMsgError(["Hubo un error al registrar el cobro, por favor reintente"])
        incial()
        return "";
      }
    },
  });
}

function convertDateMysql() {
  const hoy = new Date();
  const hoyIso = hoy.toISOString();

  let date = hoyIso.split(/T/)[0];
  const dateMysql = `${date} ${hoy.toLocaleTimeString()}`;

  return dateMysql;
}
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