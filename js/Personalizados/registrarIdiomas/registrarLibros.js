$(function () {
  /* Inicializamos Selectpicker */
  $(".selectpicker").selectpicker();
  //los elementos seleccionadose los cargamos en un input oculto
  $("#select_Autor").change(function (e) {
    /* console.log($('#select_Autor').val()); */
    $("#hidden_autor").val($("#select_Autor").val());
    /* console.log("hidden_autor", $('#hidden_autor').val()); */
  });
  /* iniciliazamos el popover con las imagenes */
  $('[data-toggle="popover"]').popover({
    //trigger: 'focus',
    trigger: "hover",
    html: true,
    content: function () {
      return (
        '<img class="img-fluid" src="' +
        $(this).data("img") +
        '" /><br/><label><strong>' +
        $(this).data("popover-content") +
        "</strong></label>"
      );
    },
    title: function () {
      return $(this).data("popover-title");
    },
  });

  //validaciones de formularios
  $("#form_registrarLibro").validate({
    rules: {
      ISBN: {
        required: true,
        digits: true,
        minlength: 13,
        maxlength: 15,
      },
      Titulo: {
        required: true,
      },
      Autor: {
        required: true,
      },
      Idioma: {
        required: true,
      },
      NEdicion: {
        required: true,
        digits: true,
        min: 1,
        max: 10,
      },
      Editorial: {
        required: true,
      },
      CategoriaLibro: {
        required: true,
      },
      FechaPublicacion: {
        required: true,
        dateISO: true,
      },
      CantEjemplar: {
        required: true,
        digits: true,
        min: 1,
      },
      ProveedorLibro: {
        required: true,
      },
      Librero: {
        required: true,
        digits: true,
      },
      Estante: {
        required: true,
        digits: true,
      },
    },
    messages: {
      ISBN: {
        required: "Complete este campo",
        digits: "Solo se permiten Números",
        minlength: "El campo debe de contener de 13 hasta 15 digitos",
        maxlength: "El campo debe de contener de 13 hasta 15 digitos",
      },
      Titulo: {
        required: "Complete este campo",
      },
      Autor: {
        required: "Complete este campo",
      },
      Idioma: {
        required: "Complete este campo",
      },
      NEdicion: {
        required: "Complete este campo",
        digits: "Solo se permiten Números",
        minlength: "El campo requiere un numero del 1 hasta el 10",
        maxlength: "El campo requiere un numero del 1 hasta el 10",
      },
      Editorial: {
        required: "Complete este campo",
      },
      CategoriaLibro: {
        required: "Complete este campo",
      },
      FechaPublicacion: {
        required: "Complete este campo",
        dateISO: "El campo requiere una fecha en formato dd/mm/aaaa",
      },
      CantEjemplar: {
        required: "Complete este campo",
        digits: "Solo se permiten Números",
        min: "Complete este campo valor minimo 1",
      },
      ProveedorLibro: {
        required: "Complete este campo",
      },
      Librero: {
        required: "Complete este campo",
        digits: "Solo se permiten Números",
      },
      Estante: {
        required: "Complete este campo",
        digits: "Solo se permiten Números",
      },
    },
    errorLabelContainer: "dt",
    wrapper: "div",
  });
  $("#form_ModificarAutores").validate({
    rules: {
      nombreAutor: {
        required: true,
      },
    },
    messages: {
      nombreAutor: {
        required: "Campo Requerido",
      },
    },
    errorLabelContainer: "dt",
    wrapper: "div",
  });
  $("#form_nuevosAutores").validate({
    rules: {
      nombreAutor: {
        required: true,
      },
    },
    messages: {
      nombreAutor: {
        required: "Campo Requerido",
      },
    },
    errorLabelContainer: "dt",
    wrapper: "div",
  });
  //Inicilizacion de datatable
  var tablaAutores = $("#TablaAutores").DataTable({
    processing: true,
    paging: true,
    lengthChange: true,
    pageLength: 3,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    language: {
      sProcessing:
        '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Procesando...</span> ',

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
    ajax: {
      url: "./Handler/HandlerRegistrarLibro.php",
      method: "POST",
      data: { ConsultarAutores: "ConsultarAutores" },
      dataSrc: "response",
    },
    columns: [
      { data: "ID" },
      { data: "NOMBRE" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'  title='Editar' ><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar' title='Borrar'><i class='fa-solid fa-trash'></i></button></div></div>",
      },
    ],
    initComplete: cargaDeButtonDatatable(),
  });
//btn registrar usuario
  $("#btn_registrarNuevoAutor").click((e) => {
    e.preventDefault();

    isValid = $("#form_nuevosAutores").valid();
    if (isValid) {
      let [{ name, value }] = $("#form_nuevosAutores").serializeArray();

      let data = {
        registrarAutor: "",
        name: value,
      };

      var postAutores = $.post(
        "./Handler/HandlerRegistrarLibro.php",
        data,
        function (response) {}
      );
      postAutores.done(function (response) {
        $("#nuevoAutor").val("");
        solicitarAutores();

        recargarTablaAjax(tablaAutores);
      });
    }
  });

  //boton modificar Autor
  $("#btn_editarAutor").click((e) => {
    e.preventDefault();

    isValid = $("#form_ModificarAutores").valid();
    
    if (isValid) {
     

      let data =$("#form_ModificarAutores").serializeArray();

      var postAutores = $.post(
        "./Handler/HandlerRegistrarLibro.php",
        data,
        function (response) {}
      );
      postAutores.done(function (response) {

          $("#ModificarAutor").modal("hide")
        $("#AutoresModal").modal("show")
        solicitarAutores();

        recargarTablaAjax(tablaAutores);
      });
    }
  });
  

  async function recargarSelectspicker(idTabla) {
    console.log("refrecando tabla de selectspicker");
    $(`${idTabla}`).selectpicker("refresh");
  }
  function recargarTablaAjax(idTabla) {
    idTabla.ajax.reload();
  }
  function solicitarAutores() {
    console.log("solicitando nuevos Autores");
    $.post(
      "./Handler/HandlerRegistrarLibro.php",
      { ConsultarAutores: "ConsultarAutores" },
      function (data, textStatus, jqXHR) {},
      "JSON"
    ).done(async function (response) {
      await $("#select_Autor").empty();

      let res = response.response;
      let plantillaOption = await generarOption(res);
      await cargarOption("#select_Autor", plantillaOption);

      await recargarSelectspicker(".selectpicker");
    });
  }

  async function generarOption(data) {
    plantilla = "";
    for (const elemeto of data) {
      plantilla += `<option value="${elemeto.ID}">${elemeto.NOMBRE}</option>`;
    }
    return plantilla;
  }
  async function cargarOption(selectorElemento, plantillaOption) {
    $(`${selectorElemento}`).append(plantillaOption);
    return;
  }
  
  
function cargaDeButtonDatatable(){
    
$("#TablaAutores tbody").on('click', '.btnEditar', function (){
    
    let fila = $(this).closest("tr")
    let idAutor=fila.find('td:eq(0)').text()
    let nombreAutor=fila.find('td:eq(1)').text()

    $("#EditarAutor").val(nombreAutor);
    
    $("#idAutor").val(idAutor)
    $("#AutoresModal").modal("hide")
    $("#ModificarAutor").modal("show")

})
$("#TablaAutores tbody").on('click', '.btnBorrar', function (){
    
    let fila = $(this).closest("tr")
    let EliminarAutor=fila.find('td:eq(0)').text()
    let nombreAutor=fila.find('td:eq(1)').text()
    eliminarautor({EliminarAutor,nombreAutor})
    

})

}
// Mensaje Eliminar registro
function eliminarautor(data) {
    Swal.fire({
    title: `¿Esta seguro que desea eliminar al autor ${data.nombreAutor}?`,
    text: "Está acción no se podrá deshacer ",
    showDenyButton: true,
   
    confirmButtonText: 'Si, confirmar',
    denyButtonText: `No, Cancelar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $.post("./Handler/HandlerRegistrarLibro.php", data,
        function (data, textStatus, jqXHR) {
            
        },
        "json"
      ).done(()=>{
        recargarTablaAjax(tablaAutores);
        Swal.fire('Autor Eliminado!', '', 'success')
        
      }).fail(()=>{

        Swal.fire({
            icon: 'error',
            title: 'Oops... ',
            text: 'El autor no se elimino, (Este error puede ocurrir debido a que el autor se encuentra registrado en algunos libros, Modifiquelos antes de proceder)',
            
          })
      });
      
    } else if (result.isDenied) {
      Swal.fire('Cancelo los cambios', '', 'info')
    }
  })}


});
/*  data-bs-toggle='modal' data-bs-target='#ModificarAutor' */