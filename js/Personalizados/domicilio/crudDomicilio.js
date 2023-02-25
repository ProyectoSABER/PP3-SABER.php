$(document).ready(function () {
  $("table.table").each(function (index, element) {
    $(element).DataTable({
      paging: true,
      lengthChange: false,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: false,
      responsive: true,
      language: {
        sProcessing: "Procesando...",

        sLengthMenu: "Mostrar _MENU_ registros",

        sZeroRecords: "No se encontraron resultados",

        sEmptyTable: "Ningún dato disponible en esta tabla",

        sInfo:
          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

        sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",

        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",

        sInfoPostFix: "",

        sSearch: "Buscar:",

        sUrl: "",

        sInfoThousands: ",",

        sLoadingRecords: "Cargando...",

        oPaginate: {
          sFirst: "Primero",

          sLast: "Último",

          sNext: "Siguiente",

          sPrevious: "Anterior",
        },

        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",

          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
      dom: "Bfrtip",
    });
  });

  $("#registrarElemento").change(function (e) {
    e.preventDefault();

    let valorSelec = $(this).val();

    $(".Provincia").remove() &&
      $(".Ciudad").remove() &&
      $(".Pais").remove() &&
      $("#button_enviar").remove();

    switch (valorSelec) {
      case "País":
        insertarPlantillaPais();
        break;
      case "Provincia":
        insertarPlantillaProvincia();
        break;
      case "Ciudad":
        insertarPlantillaCiudad();
        break;
    }
  });
});

function eliminar(e = { element: id }) {
  console.log(e);
}
// Mostrar Plantilla de Pais
function insertarPlantillaPais() {
  $("#div_Selector").after(plantillaInsert("Pais"));
}

// Mostrar Plantilla de Ciudad
async function insertarPlantillaCiudad() {
  //buscar paises

  const resultados_pais = await buscarDatos({ Pais: "allow" });
  paises = resultados_pais.response;
  //cargamos las plantilla para pais
  $("#div_Selector").after(plantillaSelect("Pais", paises));
  //Escuchamos los cambios para el select de pais
  $("#select_Pais").change(async function (e) {
    $(".Provincia").remove();
    $("#button_enviar").remove();

    pais_select = $(this).val();
    try {
      const resultados_provincia = await buscarDatos({
        Pais: pais_select,
        Provincia: "allow",
      });
      provincias = resultados_provincia.response;
      $("#div_select_Pais").after(plantillaSelect("Provincia", provincias));

      $("#select_Provincia").change(async function (e) {
        $("#div_select_Provincia").after(plantillaInsert("Ciudad"));
      });
    } catch (error) {
      if (error.status == 404) {
        mostrarMsgError(["No se encontraron Provincias"])
      }
    }
  });
}
// Mostrar Plantilla de Provincia

async function insertarPlantillaProvincia() {
  //buscar paises
  const resultados_pais = await buscarDatos({ Pais: "allow" });
  paises = resultados_pais.response;

  //cargamos las plantilla para pais
  $("#div_Selector").after(plantillaSelect("Pais", paises));
  //Escuchamos los cambios para el select de pais
  $("#select_Pais").change(function (e) {
    $(".Provincia").remove();
    $("#button_enviar").remove();

    pais_select = $(this).val();
    console.log(pais_select);
    //insertamos plantilla de provincia
    $("#div_select_Pais").after(plantillaInsert("Provincia"));
  });
}

const plantillaInsert = (elemeto) => {
  let boton = plantillaBoton(elemeto);
  return `<div class="col-md-5 ${elemeto}" id="div_insert_${elemeto}" ><div class="form-group"><label class="control-label"> Ingrese el/la ${elemeto} a registrar</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i><input class="form-control" required placeholder="${elemeto}" name="${elemeto}"> </div>    </div> ${boton}`;
};

const plantillaSelect = (elemeto, relleno = null) => {
  let option = "";
  if (relleno != null) {
    option = rellenoSelect(relleno);
  }

  plantilla = `<div class="col-md-5 ${elemeto}" id="div_select_${elemeto}">
    <div class="form-group">
    <label class="control-label">Seleccione un/a ${elemeto} para registrar</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
    <select class="form-control" required name="id_${elemeto}" id="select_${elemeto}" placeholder="Seleccione un elemento para registrar">
      <option selected disabled hidden value='-1'>Seleccione un/a ${elemeto}</option>
      ${option}
      
    </select>
  </div>
</div>`;

  return plantilla;
};

const rellenoSelect = (elemento) => {
  console.log("rellenoSelect", elemento);
  let plantilla = "";
  elemento.forEach((element, index) => {
    let { ID: a, NOMBRE: b } = element;
    plantilla += plantillaOption(index + 1, a, b);
  });
  return plantilla;
};

const plantillaOption = (indice, value, nombre) => {
  return `<option value="${value}">${indice}-${nombre}</option>`;
};

const buscarDatos = async (data = { ele: id, type: "buscar" }) => {
  let result;
  try {
    result = $.ajax({
      type: "POST",
      dataType: "json",

      url: "./Handler/domicilio/HandlercrudDomicilio",
      data: data,

      /* success: function (response) {}, */
    });
  } catch (error) {
    if (error.status == 404) {
      let res = error.responseText;

      return res;
    }
  }
  return result;
};

const plantillaBoton = (name) => {
  return `<div class="col-md-2 " id="button_enviar">






<!--Botones-->
<button class="btn btn-primary" type="submit" name="Registrar" value="${name}"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;






</div>`;
};
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