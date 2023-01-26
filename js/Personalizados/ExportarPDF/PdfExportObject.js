    function imprimirConsola(txt){
        console.log(txt);
    }

    cantColumnas=14
     const colSelec=(cantColumnas)=> {
                
                  
                const colForExport = []
                for (let i = 0; i  < cantColumnas; i++) {
                  colForExport.push(i)
                };
                console.log([...colForExport])
                return colForExport
              
            }


    $(function() {
      
     

      var table = $('#Listado-Libros').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "language": {

          "sProcessing": "Procesando...",

          "sLengthMenu": "Mostrar _MENU_ registros",

          "sZeroRecords": "No se encontraron resultados",

          "sEmptyTable": "Ningún dato disponible en esta tabla",

          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",

          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix": "",

          "sSearch": "Buscar:",

          "sUrl": "",

          "sInfoThousands": ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {

            "sFirst": "Primero",

            "sLast": "Último",

            "sNext": "Siguiente",

            "sPrevious": "Anterior"

          },

          "oAria": {

            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

            "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }
        },
        dom: 'Bfrtip',
        buttons: [{
            extend: 'pdfHtml5',
            text: "Abrir PdF",
            className: 'btn btn-primary',
            download: 'open',
            filename: "ListadoLibros",
            orientation: "landscape",
            pageSize: "TABLOID",
            title: "Listado de Libros",
            exportOptions: {
              columns: colSelec 
            },
            customize: function(doc) {
              doc.pageMargins = [25, 100, 25, 25];
              
              doc.header = {
                table: {
                  widths: ['*', '*', '*'],
                  height: ['*', '*', '*'],
                  body: [
                    [{
                      image: 'data:image/jpeg;base64,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',
                      width: 200,
                      rowSpan:6,
                      margin: [25, 10],
                      alignment: "center"
                    },   {}, 'Column 3 row 1'],
                    [{}, {}, "Column 3 row 2"],
                    [{}, {}, "Column 3 row 3"],
                    [{}, {}, "Column 3 row 4"],
                    [{}, {}, "Column 3 row 5"],
                    [{}, {}, "Column 3 row 6"],
                    /* [{}, {}, "Column 3 row 7"], */

                  ]
                },
                layout: 'noBorders' // Quita los bordes de la tabla
                


              }
              doc.footer =
                function(currentPage, pageCount) {
                  return {
                    columns: [{
                      text: 'Parte Izquierda',
                      margin: [50, 0]
                    }, {
                      text: currentPage.toString() + ' of ' + pageCount,
                      alignment: 'right',
                      margin: [50, 0]
                    }]
                  };
                }



            }

          },


        ]
      });

    });
