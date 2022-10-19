$(document).ready(function () {
  cargarTabla();
  $(".cuota-delete").click(function (e) {
    e.preventDefault();

    console.log("presione el boton");
    let IdDetCuota = $(this).attr("data-iddetcuota");
    console.log("id", IdDetCuota);

    cargarModal("#md_EliminarCuotas", IdDetCuota);

    $("#modal_delete").click(function (e) {
      e.preventDefault();
      let id = $(this).parent().find("tbody>tr").attr("id");
      console.log(id);
      if (
        confirm("¿Deseas Eliminar la cuota? Está acción no se podra deshacer")
      ) {
        ajaxEliminarCuota(id);
        cerrarModal("#md_EliminarCuotas");
      }
    });
  });
});

function cerrarModal(idModal) {
  $(idModal).modal("hide");
}
function mostrarModal(idModal) {
  $(idModal).modal("show");
}

function cargarModal(idModal, idData) {
  $.ajax({
    type: "POST",
    url: `./Handler/cuotas/HandlerListadoCuotas.php?mostrarDetCuota=${idData}`,
    success: function (response) {
      let res = JSON.parse(response);

      date = invertirDate(res.MesCuota);
      res.Fvenc = invertirDate(res.Fvenc, "l");
      let row = `<tr id="${res.IdDetCuota}"><td>${date}</td><td>${res.Fvenc}</td><td>${res.CatSocio}</td><td>${res.Vcuota}</td></tr>`;
      $(idModal).find("tbody").html(row);
      mostrarModal("#md_EliminarCuotas");
    },
  });
}
/**
 * Convertir fecha de UNIX a JS
 * @param date ingrese una fecha en formato YYYY/m/d
 * @param  tipofecha ="s" retorna fecha m/YYYY
 * @param  tipofecha ="l" retorna fecha d/m/YYYY
 * @return string newDate
 *
 */
function invertirDate(date, tipofecha = "s") {
  if (tipofecha == "s" || tipofecha == "S") {
    const [año, mes, ...dia] = date.split("-");
    let newDate = `${mes}/${año}`;
    return newDate;
  }
  if (tipofecha == "l" || tipofecha == "L") {
    const [año, mes, dia] = date.split("-");

    let newDate = `${dia}/${mes}/${año}`;
    return newDate;
  }
}

function ajaxEliminarCuota(data) {
  $.ajax({
    type: "DELETE",
    url: `./Handler/cuotas/HandlerListadoCuotas.php?EliminarId=${data}`,

    success: function (response) {
      console.log(response);
    },
  });
}
function cargarTabla() {
  $.ajax({
    type: "POST",
    url: "./Handler/cuotas/HandlerListadoCuotas.php?cargarTabla=true",

    success: function (response) {
      console.log(response);
      let res = JSON.parse(response);
      const { results } = res;
      let row;
      results.forEach((obj, index) => {
        let mesAnio = invertirDate(obj.MesCuota);

        let fVenc = invertirDate(obj.FVENC, "l");
        row += `<tr><td>${index + 1}</td><td>${
          obj.IdCuota
        }</td><td>${mesAnio}</td><td>${obj.CatSocio}</td><td>${
          obj.VCUOTA
        }</td><td>${fVenc}</td><td><button class="btn btn-danger cuota-delete" data-iddetcuota="${
          obj.IdDetCuota
        }">Eliminar</button></td></tr>`;
      });
      $("#tabla-Socios").find("tbody").html(row);
    },
  });
}
