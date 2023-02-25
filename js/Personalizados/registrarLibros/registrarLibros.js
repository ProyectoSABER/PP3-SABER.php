$(document).ready(function () {
  /**
   * TODO CUANDO SE ELIMINAN LOS DATOS DE AUTORES U OTROS NO SE ACTUALIZA EN LA PAGINA PRINCIPAL
   */
  /* Inicializamos Selectpicker */
  $(".selectpicker").selectpicker();

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

  // uso general registrarAutor, registrarIdioma,registrarEditorial,registrarCategriaDeLibro,registrarProveedor
  async function recargarSelectspicker(idTabla) {
    console.log("refrecando tabla de selectspicker");
    $(`${idTabla}`).selectpicker("refresh");
  }
  async function renderSelectspicker(idTabla) {
    $(`${idTabla}`).selectpicker("render");
  }
  function recargarTablaAjax(idTabla) {
    idTabla.ajax.reload();
  }

  async function generarOption(data) {
    plantilla = "";
    for (const elemeto of data) {
      var el = [];
      for (const llave in elemeto) {
        if (Object.hasOwnProperty.call(elemeto, llave)) {
          el.push(elemeto[llave]);
        }
      }

      plantilla += `<option value="${el[0]}">${el[1]}</option>`;
    }
    console.log("generar Option", plantilla);
    return plantilla;
  }
  async function cargarOption(selectorElemento, plantillaOption) {
    $(`${selectorElemento}`).append(plantillaOption);
    return;
  }
  async function destruirSelectpicker(id) {
    $(`${id}`).selectpicker("destroy");
    return;
  }
  async function vaciarSelect(id) {
    $(`${id} option`).each(function () {
      $(this).remove();
    });

    return;
  }

  function initAutores() {
    //los elementos seleccionadose los cargamos en un input oculto
    $("#select_Autor").change(function (e) {
      $("#hidden_autor").val($("#select_Autor").val());
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
        error: function (jqXHR, exception, error) {
          console.log("Error status: " + jqXHR.status);
          console.log("Exception: " + exception);
          console.log("Error message: " + error);
          $("#TablaProveedores").DataTable().clear().draw();
        },
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
      initComplete: cargaDeButtonDatatableAutores(),
    });
    //btn registrar nuevo Autor
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
        let data = $("#form_ModificarAutores").serializeArray();

        var postAutores = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postAutores.done(function (response) {
          $("#ModificarAutor").modal("hide");
          $("#AutoresModal").modal("show");
          solicitarAutores();

          recargarTablaAjax(tablaAutores);
        });
      }
    });

    //Recargar Select con nuevos Autores
    function solicitarAutores() {
      console.log("solicitando nuevos Autores");
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { ConsultarAutores: "ConsultarAutores" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async function (response) {
          console.log("Solicitando Autores");
          // 1) destruir
          await destruirSelectpicker("#select_Autor");
          //2) vaciar
          await vaciarSelect("#select_Autor");
          //3)Rellenar select
          let res = response.response;
          let plantillaOption = await generarOption(res);
          await cargarOption("#select_Autor", plantillaOption);

          //4)renderizar
          await renderSelectspicker("#select_Autor");
        })
        .fail(async (error) => {
          console.error(error);
        });
    }
    //*Boton Borrar y Editar
    function cargaDeButtonDatatableAutores() {
      $("#TablaAutores tbody").on("click", ".btnEditar", function () {
        let fila = $(this).closest("tr");
        let idAutor = fila.find("td:eq(0)").text();
        let nombreAutor = fila.find("td:eq(1)").text();

        $("#EditarAutor").val(nombreAutor);

        $("#idAutor").val(idAutor);
        $("#AutoresModal").modal("hide");
        $("#ModificarAutor").modal("show");
      });
      //Boton
      $("#TablaAutores tbody").on("click", ".btnBorrar", function () {
        let fila = $(this).closest("tr");
        let EliminarAutor = fila.find("td:eq(0)").text();
        let nombreAutor = fila.find("td:eq(1)").text();
        eliminarautor({ EliminarAutor, nombreAutor });
      });
    }

    //! Mensaje Eliminar registro
    function eliminarautor(data) {
      Swal.fire({
        title: `¿Esta seguro que desea eliminar al autor ${data.nombreAutor}?`,
        text: "Está acción no se podrá deshacer ",
        showDenyButton: true,

        confirmButtonText: "Si, confirmar",
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.post(
            "./Handler/HandlerRegistrarLibro.php",
            data,
            function (data, textStatus, jqXHR) {},
            "json"
          )
            .done(() => {
              solicitarAutores();
              recargarTablaAjax(tablaAutores);
              Swal.fire("Autor Eliminado!", "", "success");
            })
            .fail(() => {
              Swal.fire({
                icon: "error",
                title: "Oops... ",
                text: "El autor no se elimino, (Este error puede ocurrir debido a que el autor se encuentra registrado en algunos libros, Modifiquelos antes de proceder)",
              });
            });
        } else if (result.isDenied) {
          Swal.fire("Cancelo los cambios", "", "info");
        }
      });
    }
  }

  function initIdiomas() {
    $("#ModificarIdioma").validate({
      rules: {
        EditarIdioma: {
          required: true,
        },
      },
      messages: {
        EditarIdioma: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });
    $("#form_nuevosidiomas").validate({
      rules: {
        nuevoIdioma: {
          required: true,
        },
      },
      messages: {
        nuevoIdioma: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });

    //Inicilizacion de datatable
    var tablaIdiomas = $("#TablaIdiomas").DataTable({
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
        data: { ConsultarIdiomas: "ConsultarIdiomas" },
        dataSrc: "response",
      },
      columns: [
        { data: "Idioma_ID" },
        { data: "Idioma_Nombre" },
        {
          defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'  title='Editar' ><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar' title='Borrar'><i class='fa-solid fa-trash'></i></button></div></div>",
        },
      ],
      initComplete: cargaDeButtonDatatableIdioma(),
    });

    //btn registrar nuevo Idioma
    $("#btn_registrarNuevoIdioma").click((e) => {
      e.preventDefault();

      isValid = $("#form_nuevosIdiomas").valid();
      if (isValid) {
        let [{ name, value }] = $("#form_nuevosIdiomas").serializeArray();

        let data = {
          registrarIdioma: "",
          name: value,
        };

        var postIdiomas = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postIdiomas.done(function (response) {
          $("#nuevoIdioma").val("");
          solicitarIdiomas();

          recargarTablaAjax(tablaIdiomas);
        });
      }
    });

    //boton modificar Idioma
    $("#btn_editarIdioma").click((e) => {
      e.preventDefault();

      isValid = $("#form_ModificarIdiomas").valid();

      if (isValid) {
        let data = $("#form_ModificarIdiomas").serializeArray();

        var postIdiomas = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postIdiomas.done(function (response) {
          $("#ModificarIdioma").modal("hide");
          $("#IdiomasModal").modal("show");
          solicitarIdiomas();

          recargarTablaAjax(tablaIdiomas);
        });
      }
    });

    function solicitarIdiomas() {
      console.log("solicitando nuevos Idiomas");
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { ConsultarIdiomas: "ConsultarIdiomas" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async function (response) {
          // 1) destruir
          await destruirSelectpicker("#select_Idioma");
          //2) vaciar
          await vaciarSelect("#select_Idioma");
          //3)Rellenar select

          let res = response.response;
          console.log(res);
          let plantillaOption = await generarOption(res);
          await cargarOption("#select_Idioma", plantillaOption);
          //4)renderizar
          await renderSelectspicker("#select_Idioma");
        })
        .fail(async (error) => {
          console.error(error);
        });
    }

    //Botones del datatable Editar Eliminar
    function cargaDeButtonDatatableIdioma() {
      $("#TablaIdiomas tbody").on("click", ".btnEditar", function () {
        let fila = $(this).closest("tr");
        let idIdioma = fila.find("td:eq(0)").text();
        let nombreIdioma = fila.find("td:eq(1)").text();

        $("#EditarIdioma").val(nombreIdioma);

        $("#idIdioma").val(idIdioma);
        $("#IdiomasModal").modal("hide");
        $("#ModificarIdioma").modal("show");
      });
      $("#TablaIdiomas tbody").on("click", ".btnBorrar", function () {
        let fila = $(this).closest("tr");
        let EliminarIdioma = fila.find("td:eq(0)").text();
        let nombreIdioma = fila.find("td:eq(1)").text();
        eliminaridioma({ EliminarIdioma, nombreIdioma });
      });
    }
    // Mensaje Eliminar registro
    function eliminaridioma(data) {
      Swal.fire({
        title: `¿Esta seguro que desea eliminar al idioma ${data.nombreIdioma}?`,
        text: "Está acción no se podrá deshacer ",
        showDenyButton: true,

        confirmButtonText: "Si, confirmar",
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.post(
            "./Handler/HandlerRegistrarLibro.php",
            data,
            function (data, textStatus, jqXHR) {},
            "json"
          )
            .done(() => {
              solicitarIdiomas()
              recargarTablaAjax(tablaIdiomas);
              Swal.fire("Idioma Eliminado!", "", "success");
            })
            .fail(() => {
              Swal.fire({
                icon: "error",
                title: "Oops... ",
                text: "El idioma no se elimino, (Este error puede ocurrir debido a que el idioma se encuentra registrado en algunos libros, Modifiquelos antes de proceder)",
              });
            });
        } else if (result.isDenied) {
          Swal.fire("Cancelo los cambios", "", "info");
        }
      });
    }
  }
  function initEditoriales() {
    $("#ModificarEditorial").validate({
      rules: {
        EditarEditorial: {
          required: true,
        },
      },
      messages: {
        EditarEditorial: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });
    $("#form_nuevoseditoriales").validate({
      rules: {
        nuevoEditorial: {
          required: true,
        },
      },
      messages: {
        nuevoEditorial: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });

    //Inicilizacion de datatable
    var tablaEditoriales = $("#TablaEditoriales").DataTable({
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
        data: { ConsultarEditoriales: "ConsultarEditoriales" },
        dataSrc: "response",
      },
      columns: [
        { data: "Editorial_ID" },
        { data: "Editorial_Nombre" },
        {
          defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'  title='Editar' ><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar' title='Borrar'><i class='fa-solid fa-trash'></i></button></div></div>",
        },
      ],
      initComplete: cargaDeButtonDatatableEditorial(),
    });

    //btn registrar nuevo Editorial
    $("#btn_registrarNuevoEditorial").click((e) => {
      e.preventDefault();

      isValid = $("#form_nuevosEditoriales").valid();
      if (isValid) {
        let [{ name, value }] = $("#form_nuevosEditoriales").serializeArray();

        let data = {
          registrarEditorial: "",
          name: value,
        };

        var postEditoriales = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postEditoriales.done(function (response) {
          $("#nuevoEditorial").val("");
          solicitarEditoriales();

          recargarTablaAjax(tablaEditoriales);
        });
      }
    });

    //boton modificar Editorial
    $("#btn_editarEditorial").click((e) => {
      e.preventDefault();

      isValid = $("#form_ModificarEditoriales").valid();

      if (isValid) {
        let data = $("#form_ModificarEditoriales").serializeArray();

        var postEditoriales = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postEditoriales.done(function (response) {
          $("#ModificarEditorial").modal("hide");
          $("#EditorialesModal").modal("show");
          solicitarEditoriales();

          recargarTablaAjax(tablaEditoriales);
        });
      }
    });

    function solicitarEditoriales() {
      console.log("solicitando nuevos Editoriales");
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { ConsultarEditoriales: "ConsultarEditoriales" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async function (response) {
          
          // 1) destruir
          await destruirSelectpicker("#select_Editorial");
          //2) vaciar
          await vaciarSelect("#select_Editorial");
          //3)Rellenar select
          let res = response.response;
          let plantillaOption = await generarOption(res);
          await cargarOption("#select_Editorial", plantillaOption);

          //4)renderizar
          await renderSelectspicker("#select_Editorial");
        })
        .fail(async (error) => {
          console.error(error);
        });
    }

    //Botones del datatable Editar Eliminar
    function cargaDeButtonDatatableEditorial() {
      $("#TablaEditoriales tbody").on("click", ".btnEditar", function () {
        let fila = $(this).closest("tr");
        let idEditorial = fila.find("td:eq(0)").text();
        let nombreEditorial = fila.find("td:eq(1)").text();

        $("#EditarEditorial").val(nombreEditorial);

        $("#idEditorial").val(idEditorial);
        $("#EditorialesModal").modal("hide");
        $("#ModificarEditorial").modal("show");
      });
      $("#TablaEditoriales tbody").on("click", ".btnBorrar", function () {
        let fila = $(this).closest("tr");
        let EliminarEditorial = fila.find("td:eq(0)").text();
        let nombreEditorial = fila.find("td:eq(1)").text();
        eliminareditorial({ EliminarEditorial, nombreEditorial });
      });
    }
    // Mensaje Eliminar registro
    function eliminareditorial(data) {
      Swal.fire({
        title: `¿Esta seguro que desea eliminar al editorial ${data.nombreEditorial}?`,
        text: "Está acción no se podrá deshacer ",
        showDenyButton: true,

        confirmButtonText: "Si, confirmar",
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.post(
            "./Handler/HandlerRegistrarLibro.php",
            data,
            function (data, textStatus, jqXHR) {},
            "json"
          )
            .done(() => {
              solicitarEditoriales()
              recargarTablaAjax(tablaEditoriales);
              Swal.fire("Editorial Eliminado!", "", "success");
            })
            .fail(() => {
              Swal.fire({
                icon: "error",
                title: "Oops... ",
                text: "El editorial no se elimino, (Este error puede ocurrir debido a que el editorial se encuentra registrado en algunos libros, Modifiquelos antes de proceder)",
              });
            });
        } else if (result.isDenied) {
          Swal.fire("Cancelo los cambios", "", "info");
        }
      });
    }
  }

  function initCategoriaLibros() {
    $("#ModificarCategoriaLibro").validate({
      rules: {
        EditarCategoriaLibro: {
          required: true,
        },
      },
      messages: {
        EditarCategoriaLibro: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });
    $("#form_nuevoscategoriaLibros").validate({
      rules: {
        nuevoCategoriaLibro: {
          required: true,
        },
      },
      messages: {
        nuevoCategoriaLibro: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });

    //Inicilizacion de datatable
    var tablaCategoriaLibros = $("#TablaCategoriaLibros").DataTable({
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
        data: { ConsultarCategoriaLibros: "ConsultarCategoriaLibros" },
        dataSrc: "response",
      },
      columns: [
        { data: "CatLibro_ID" },
        { data: "CatLibro_Nombre" },
        {
          defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'  title='Editar' ><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar' title='Borrar'><i class='fa-solid fa-trash'></i></button></div></div>",
        },
      ],
      initComplete: cargaDeButtonDatatableCategoriaLibro(),
    });

    //btn registrar nuevo CategoriaLibro
    $("#btn_registrarNuevoCategoriaLibro").click((e) => {
      e.preventDefault();

      isValid = $("#form_nuevosCategoriaLibros").valid();
      if (isValid) {
        let [{ name, value }] = $(
          "#form_nuevosCategoriaLibros"
        ).serializeArray();

        let data = {
          registrarCategoriaLibro: "",
          name: value,
        };

        var postCategoriaLibros = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postCategoriaLibros.done(function (response) {
          $("#nuevoCategoriaLibro").val("");
          solicitarCategoriaLibros();

          recargarTablaAjax(tablaCategoriaLibros);
        });
      }
    });

    //boton modificar CategoriaLibro
    $("#btn_editarCategoriaLibro").click((e) => {
      e.preventDefault();

      isValid = $("#form_ModificarCategoriaLibros").valid();

      if (isValid) {
        let data = $("#form_ModificarCategoriaLibros").serializeArray();

        var postCategoriaLibros = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postCategoriaLibros.done(function (response) {
          $("#ModificarCategoriaLibro").modal("hide");
          $("#CategoriaLibrosModal").modal("show");
          solicitarCategoriaLibros();

          recargarTablaAjax(tablaCategoriaLibros);
        });
      }
    });

    function solicitarCategoriaLibros() {
      console.log("solicitando nuevos CategoriaLibros");
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { ConsultarCategoriaLibros: "ConsultarCategoriaLibros" },
        function (data, textStatus, jqXHR) {},
        "Json"
      ).done(async function (response) {
       

          // 1) destruir
          await destruirSelectpicker("#select_CategoriaLibro");
          //2) vaciar
          await vaciarSelect("#select_CategoriaLibro");
          //3)Rellenar select
          let res = response.response;
          let plantillaOption = await generarOption(res);
          await cargarOption("#select_CategoriaLibro", plantillaOption);

          //4)renderizar
          await renderSelectspicker("#select_CategoriaLibro");
        })
        .fail(async (error) => {
          console.error(error);
        });
    }

    //Botones del datatable Editar Eliminar
    function cargaDeButtonDatatableCategoriaLibro() {
      $("#TablaCategoriaLibros tbody").on("click", ".btnEditar", function () {
        let fila = $(this).closest("tr");
        let idCategoriaLibro = fila.find("td:eq(0)").text();
        let nombreCategoriaLibro = fila.find("td:eq(1)").text();

        $("#EditarCategoriaLibro").val(nombreCategoriaLibro);

        $("#idCategoriaLibro").val(idCategoriaLibro);

        $("#CategoriaLibrosModal").modal("hide");
        $("#ModificarCategoriaLibro").modal("show");
      });
      $("#TablaCategoriaLibros tbody").on("click", ".btnBorrar", function () {
        let fila = $(this).closest("tr");
        let EliminarCategoriaLibro = fila.find("td:eq(0)").text();
        let nombreCategoriaLibro = fila.find("td:eq(1)").text();
        eliminarcategoriaLibro({
          EliminarCategoriaLibro,
          nombreCategoriaLibro,
        });
      });
    }
    // Mensaje Eliminar registro
    function eliminarcategoriaLibro(data) {
      Swal.fire({
        title: `¿Esta seguro que desea eliminar al categoriaLibro ${data.nombreCategoriaLibro}?`,
        text: "Está acción no se podrá deshacer ",
        showDenyButton: true,

        confirmButtonText: "Si, confirmar",
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.post(
            "./Handler/HandlerRegistrarLibro.php",
            data,
            function (data, textStatus, jqXHR) {},
            "json"
          )
            .done(() => {
              solicitarCategoriaLibros()
              recargarTablaAjax(tablaCategoriaLibros);
              Swal.fire("CategoriaLibro Eliminado!", "", "success");
            })
            .fail(() => {
              Swal.fire({
                icon: "error",
                title: "Oops... ",
                text: "El categoriaLibro no se elimino, (Este error puede ocurrir debido a que el categoriaLibro se encuentra registrado en algunos libros, Modifiquelos antes de proceder)",
              });
            });
        } else if (result.isDenied) {
          Swal.fire("Cancelo los cambios", "", "info");
        }
      });
    }
  }
  function initProveedores() {
    (function mostrarCategoriadeProveedores() {
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarCategoriaProveedor: "all" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async (response) => {
          data = response.response;

          let plantilla = await generarOption(data);

          await cargarOption("#CategoriaProveedor", plantilla);
        })
        .fail();
    })();

    (function buscarPais() {
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarPaises: "all" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async (response) => {
          data = response.response;

          let plantilla = await generarOption(data);

          await cargarOption("#pais", plantilla);
        })
        .fail((e) => {
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No Exiten Paises registrados, añada algunos nuevos y luego reintente",
          });
        });
    })();
    (function buscarCategoriaContacto() {
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarCategoriaContacto: "all" },
        function (data, textStatus, jqXHR) {},
        "Json"
      )
        .done(async (response) => {
          data = response.response;

          let plantilla = await generarOption(data);

          await cargarOption("#TipoContacto", plantilla);
        })
        .fail((e) => {
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No Exiten Paises registrados, añada algunos nuevos y luego reintente",
          });
        });
    })();

    //Evento desencadenante mostrar provincias

    $("#pais").change(async function (e) {
      e.preventDefault();
      ocultarElementoEnInterfaz("#Provincia");
      vaciarElementoSelectEnInterfaz("#Provincia");

      if ($(this).val() > 0) {
        try {
          let response = await buscarProvinciaPorPais($(this).val());

          data = response.response;
          mostrarOptionSelect("#Provincia", data);
          mostrarElementoEnInterfaz("#Provincia");
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No existen provicias registradas, añada alguna nuevas y luego reintente",
          });
        }
      }
    });
    //Evento desencadenante mostrar localidad

    $("#Provincia").change(async function (e) {
      e.preventDefault();
      ocultarElementoEnInterfaz("#Localidad");
      vaciarElementoSelectEnInterfaz("#Localidad");

      if ($(this).val() > 0) {
        try {
          let response = await buscarLocalidadPorProvincia($(this).val());

          data = response.response;
          mostrarOptionSelect("#Localidad", data);
          mostrarElementoEnInterfaz("#Localidad");
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No Exiten Localidades registradas, añada alguna nuevas y luego reintente",
          });
        }
      }
    });

    //Evento desencadenante mostrar barrio

    $("#Localidad").change(async function (e) {
      e.preventDefault();
      ocultarElementoEnInterfaz("#Barrio");
      vaciarElementoSelectEnInterfaz("#Barrio");

      if ($(this).val() > 0) {
        try {
          let response = await buscarBarrioPorLocalidad($(this).val());

          data = response.response;
          mostrarOptionSelect("#Barrio", data);
          mostrarElementoEnInterfaz("#Barrio");
        } catch (error) {
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No Exiten Barrios registrados, añada algunos y luego reintente",
          });
        }
      }
    });
    //Evento desencadenante mostrar input Celular E-Mail

    $("#TipoContacto").change(function (e) {
      e.preventDefault();

      $("#contenedorCelular").remove();
      $("#contenedorEmail").remove();
      let elementoseleccionado = $(this).find("option:selected").text();

      if ($(this).val() < 0) {
        console.log("menor a cero");
        return;
      } else if (elementoseleccionado === "E-Mail") {
        insertarPlantillaContactoEmailAppend("#contenedor_contacto");
      } else if (elementoseleccionado === "Celular") {
        insertarPlantillaContactoCelularAppend("#contenedor_contacto");
      }
    });

    async function buscarProvinciaPorPais(idPaisSeleccionado) {
      let res = $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarProvinciaPorPais: idPaisSeleccionado },
        function (data, textStatus, jqXHR) {},
        "Json"
      );

      return res;
    }

    function ocultarElementoEnInterfaz(idElemento) {
      $(idElemento).prop("disabled", true).val("-1");
    }
    function vaciarElementoSelectEnInterfaz(idElemento) {
      $(idElemento)
        .find("option")
        .filter((i) => {
          return i > 0;
        })
        .remove();
    }
    function mostrarElementoEnInterfaz(idElemento) {
      $(idElemento).prop("disabled", false);
    }
    async function mostrarOptionSelect(idSelect, data) {
      let plantilla = await generarOption(data);

      await cargarOption(idSelect, plantilla);
    }
    async function buscarLocalidadPorProvincia(idProvinciaSeleccionada) {
      return $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarLocalidadPorProvincia: idProvinciaSeleccionada },
        function (data, textStatus, jqXHR) {},
        "Json"
      );
    }
    async function buscarBarrioPorLocalidad(idLocalidadSeleccionado) {
      return $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { MostrarBarrioPorLocalidad: idLocalidadSeleccionado },
        function (data, textStatus, jqXHR) {},
        "Json"
      );
    }

    $("#ModificarProveedor").validate({
      rules: {
        EditarProveedor: {
          required: true,
        },
      },
      messages: {
        EditarProveedor: {
          required: "Campo Requerido",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });

    function insertarPlantillaContactoCelularAppend(id) {
      plantillaCelular = `<div id="contenedorCelular" class="col-md-8">
  <div class="row">
    <div class="col-md-5">
      <div class="form-floating mb-3">
        <input type="number" placeholder="CodArea" required name="CodArea" class="form-control" id="CodArea" title="Registre Codigo de area Celular">
        <label for="CodArea">Codigo de Area</label>
      </div>
    </div>
    <div class="col-md-7">
      <div class="form-floating mb-3">
        <input type="number"  placeholder="Celular" required name="Celular" class="form-control" id="Celular" title="Registre un número de celular">
        <label for="Celular">Contacto:(Numero sin el 15)</label>
      </div>
    </div>
  </div>
</div>`;

      $(id).append(plantillaCelular);
      $("#CodArea").rules("add", {
        required: true,
        number: true,
        minlength: 3,
        maxlength: 4,
        messages: {
          minlength: "Minimo de Caracteres 3, Máximo 4",
          maxlength: "Minimo de Caracteres 3, Máximo 4",
        },
      });
      $("#Celular").rules("add", {
        required: true,
        number: true,
        minlength: 6,
        maxlength: 8,
        messages: {
          required: "Registre un número de celular Ejemplo(sin 15)-4578095",
          minlength: "Minimo de Caracteres 6, Máximo 8",
          maxlength: "Maximo de Caracteres 8, minimo 6",
        },
      });
    }
    function insertarPlantillaContactoEmailAppend(id) {
      plantillaCelular = `
<div class="col-md-6" id="contenedorEmail">
  <div class="form-floating mb-3">
    <input type="email"  placeholder="Email" required name="EmailProveedor" class="form-control" id="EmailProveedor" title="Registre un Email  contacto del proveedor ejemplo@ejemplo.com">
    <label for="EmailProveedor" >Contacto:Email</label>
  </div>
</div>`;
      $(id).append(plantillaCelular);
    }

    $("#form_nuevosProveedores").validate({
      rules: {
        cuitProveedor: {
          required: true,
          number: true,
          minlength: 11,
          maxlength: 11,
          min: 20000000000,
        },
        Altura: {
          required: true,
          number: true,
          min: 1,
          max: 9999,
        },
        EmailProveedor: {
          required: true,
          email: true,
        },
      },
      messages: {
        cuitProveedor: {
          required: "Campo Obligatorio Ejemplo 20123456787",
          number: true,
          minlength: "Cantidad minima de cáracteres : 11",
          maxlength: "Cantidad máxima de cáracteres : 11",
          min: "Minimo 20000000000 Ejemplo 20123456787 minimo 20000000000",
        },

        EmailProveedor: {
          requiere: "Ingrese un email",
          email: "Ingrese un email valido (ejemplo@ejemplo.com)",
        },
      },
      errorLabelContainer: "dt",
      wrapper: "div",
    });

    //Inicilizacion de datatable
    var tablaProveedores = $("#TablaProveedores").DataTable({
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
        error: function (jqXHR, exception, error) {
          console.log("Error status: " + jqXHR.status);
          console.log("Exception: " + exception);
          console.log("Error message: " + error);
          $("#TablaProveedores").DataTable().clear().draw();
        },
        method: "POST",
        data: { ConsultarProveedores: "ConsultarProveedores" },

        dataSrc: "response",
      },
      columns: [
        { data: "Proveedor_ID" },
        { data: "Proveedor_Nombre" },
        {
          defaultContent:
            "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'  title='Editar' ><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger btn-sm btnBorrar' title='Borrar'><i class='fa-solid fa-trash'></i></button></div></div>",
        },
      ],
      initComplete: cargaDeButtonDatatableProveedor(),
    });
    //btn registrar nuevo Proveedor

    $("#btn_registrarNuevoProveedor").click(async function (e) {
      e.preventDefault();

      isValid = $("#form_nuevosProveedores").valid();
      if (isValid) {
        data = $("#form_nuevosProveedores").serializeArray();
        data.push({ name: "registrarProveedor", value: "true" });
        console.log("data", data);
        try {
          let response = await registrarProveedor(data);

          console.log(response.response);

          $("#form_nuevosProveedores")[0].reset();

          /* $("#nuevoProveedor").val(""); */
          solicitarProveedores();
          recargarTablaAjax(tablaProveedores);
          Swal.fire({
            icon: "success",
            title: "Registro Exitoso ",
          });
        } catch (error) {
          console.error(error);
          Swal.fire({
            icon: "error",
            title: "Oops... ",
            text: "No se pudo registrar el proveedor",
          });
          solicitarProveedores();
          recargarTablaAjax(tablaProveedores);
        }
      }
    });
    const registrarProveedor = async (data) => {
      let res = $.post(
        "./Handler/HandlerRegistrarLibro.php",
        data,
        function (response) {},
        "Json"
      );

      return res;
    };
    //boton modificar Proveedor
    $("#btn_editarProveedor").click((e) => {
      e.preventDefault();

      isValid = $("#form_ModificarProveedores").valid();

      if (isValid) {
        let data = $("#form_ModificarProveedores").serializeArray();

        var postProveedores = $.post(
          "./Handler/HandlerRegistrarLibro.php",
          data,
          function (response) {}
        );
        postProveedores.done(function (response) {
          $("#ModificarProveedor").modal("hide");
          $("#ProveedoresModal").modal("show");
          solicitarProveedores();

          recargarTablaAjax(tablaProveedores);
        });
      }
    });

    async function solicitarProveedores() {
      console.log("solicitando nuevos Proveedores");
      $.post(
        "./Handler/HandlerRegistrarLibro.php",
        { ConsultarProveedores: "ConsultarProveedores" },
        function (data, textStatus, jqXHR) {},
        "Json"
      ).done(async function (response) {
        

          // 1) destruir
          await destruirSelectpicker("#select_Proveedor");
          //2) vaciar
          await vaciarSelect("#select_Proveedor");
          //3)Rellenar select
          let res = response.response;
          let plantillaOption = await generarOption(res);
          await cargarOption("#select_Proveedor", plantillaOption);

          //4)renderizar
          await renderSelectspicker("#select_Proveedor");
        })
        .fail(async (error) => {
          console.error(error);
        });
    }

    //Botones del datatable Editar Eliminar
    function cargaDeButtonDatatableProveedor() {
      $("#TablaProveedores tbody").on("click", ".btnEditar", function () {
        let fila = $(this).closest("tr");
        let idProveedor = fila.find("td:eq(0)").text();
        let nombreProveedor = fila.find("td:eq(1)").text();

        $("#EditarProveedor").val(nombreProveedor);

        $("#idProveedor").val(idProveedor);

        $("#ProveedoresModal").modal("hide");
        $("#ModificarProveedor").modal("show");
      });
      $("#TablaProveedores tbody").on("click", ".btnBorrar", function () {
        let fila = $(this).closest("tr");
        let EliminarProveedor = fila.find("td:eq(0)").text();
        let nombreProveedor = fila.find("td:eq(1)").text();
        eliminarproveedor({
          EliminarProveedor,
          nombreProveedor,
        });
      });
    }
    // Mensaje Eliminar registro
    function eliminarproveedor(data) {
      Swal.fire({
        title: `¿Esta seguro que desea eliminar al proveedor ${data.nombreProveedor}?`,
        text: "Está acción no se podrá deshacer ",
        showDenyButton: true,

        confirmButtonText: "Si, confirmar",
        denyButtonText: `No, Cancelar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.post(
            "./Handler/HandlerRegistrarLibro.php",
            data,
            function (data, textStatus, jqXHR) {},
            "json"
          )
            .done(() => {
              solicitarProveedores()
              recargarTablaAjax(tablaProveedores);
              Swal.fire("Proveedor Eliminado!", "", "success");
            })
            .fail(() => {
              Swal.fire({
                icon: "error",
                title: "Oops... ",
                text: "El proveedor no se elimino, (Este error puede ocurrir debido a que el proveedor se encuentra registrado en algunos libros, Modifiquelos antes de proceder)",
              });
            });
        } else if (result.isDenied) {
          Swal.fire("Cancelo los cambios", "", "info");
        }
      });
    }
  }

  initIdiomas();
  initAutores();
  initEditoriales();
  initCategoriaLibros();
  initProveedores();

  //iniciamosAutores
});
