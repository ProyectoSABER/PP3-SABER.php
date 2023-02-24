$(document).ready(function () {
  // Escucha la apertura del modal
  $(document).on("show.bs.modal", $("myModal"), (e) => {
    let isbnSeleccionado = $(e.relatedTarget).data("isbnlibro");
    buscarYmostrarlibro(isbnSeleccionado);
  });

  /* Datatable */

  $("#tablaLibrosDisponible").DataTable({
    paging: true,
    lengthChange: true,
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
  });

  
  const buscarlibro = async (isbn) => {
    let response = $.post(
      "./Handler/reserva/HandlerRegistrarReserva.php",
      {
        consultarIsbn: isbn,
      },
      function (data, textStatus, jqXHR) {},
      "Json"
    );
    return response;
  };

  const buscarYmostrarlibro = async (isbn) => {
    try {
      data = await buscarlibro(isbn);

      let filaNueva = await generarPlantillaLibro(data.response);

      $("#tablaLibroSeleccionado").find("tbody>tr").remove();
      $("#tablaLibroSeleccionado").find("tbody").append(filaNueva);
      $("#idISBN").val(isbn)
      $("#myModal").find("button[type=submit]").attr('disabled',false)
    } catch (error) {
        console.error(error.msg)

    }
  };
  const generarPlantillaLibro = async (data) => {
    let datos = [
      "Libro_ISBN",
      "Libro_Titulo",
      "Libro_Subtitulo",
      "Libro_NEdicion",
      "Libro_Idioma",
      "Libro_CategoriaLibro",
    ];
    let plantillatd = await iterarEnObjeto(data, datos);
    let resultado = await generarEtiquetaTr(plantillatd);
    return resultado;
  };
  async function iterarEnObjeto(objData, arrayKeys) {
    let plantilla = "";

    for (i = 0; i < arrayKeys.length; i++) {
      plantilla += generarEtiquetaTd(objData[arrayKeys[i]]);
    }
    return plantilla;
  }
  const generarEtiquetaTd = (dataCelda) => {
    return `<td>${dataCelda}</td>`;
  };
  const generarEtiquetaTr = async (dataCelda) => {
    return `<tr>${dataCelda}</tr>`;
  };
  const enviarSolicitudReserva = (data) => {
    return $.post(
      "./Handler/reserva/HandlerRegistrarReserva.php",
      data,
      function (data, textStatus, jqXHR) {},
      "Json"
    );
  };


  /* Escuchar envio Formulario */
  $("#form_modal").submit(function (e) { 
    e.preventDefault();
    let data=$("#form_modal").serializeArray()
    data.push({"name":"registrarPrestamoSocio",value:"registrarPrestamoSocio"})
console.log(data);
    RegistrarSolicitudReserva(data)
  });
 const RegistrarSolicitudReserva=async(data)=>{
    try {
        enviarSolicitudReserva(data)
        const respuesta=await mensajeExito()
        
        location.reload()

    } catch (error) {
        console.error(error)
        mensajeError()
    }
 }
 const mensajeExito = async () => {
    return Swal.fire({
      icon: "success",
      title: "Bien...",
      text: "Registro exitoso.",
      footer: '<a href="index.php">Inicio</a>',
      showConfirmButton: false,
    });

}
    const mensajeError = () => {
        Swal.fire({
          icon: "error",
          title: "OWWSS...",
          text: "No se puedo registrar la reserva, reintente más tarde o pongase en contacto con el administrador.",
          footer: '<a href="index.php">Ok</a>',
          showConfirmButton: false,
        });
      };
  

});
