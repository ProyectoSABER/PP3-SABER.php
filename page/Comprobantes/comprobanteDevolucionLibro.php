<?php
require_once '../../Handler/comprobantes/HandlerComprobanteDevolucionLibro.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <title>S.A.B.E.R Comprobante de devolución de libros</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap Core CSS -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="./assets/css/bootstrap.css" rel="stylesheet" type="text/css">

  <!-- MetisMenu CSS -->
  <link href="./assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">

  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="./assets/css/main.css">

  <link rel="stylesheet" type="text/css" href="./assets/css/myStyleComprobantePago.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">

</head>

<body class="fullscreen">


  <main class="app-content">
    <div class="app-title">
      <div>
        <!-- <h1> <i class="fa fa-dashboard"></i>  Imagen del Sistema</h1> -->
        <img src="./images/System/Logo.jpg" alt="Logo Sistema SABER" style="height: 100px;">
      </div>

    </div>
    <div class="tile">
      <h3 class="tile-title">Comprobante de Devolucion de Libro </h3>



      <div class="tile-body">
        <div class="row">
          <div class="col-md-12">
            <div class="container-md-12">
              <div class="row">
                <p class="h6" id="detFact-fecha">Fecha Devolucion: <?php echo convertir_fecha($res[0]["FECHADEVOLUCION"]) ?></p>
              </div>
              <div class="row">

                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-nSocio">N° Socio:<?php echo $res[0]["IDSOCIO"] ?></p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellSocio">Nombre y Apellido Socio: <?php echo $res[0]["NOMBRE_SOCIO"] . ' ' . $res[0]["APELLIDO_SOCIO"] ?></p>
                  </div>

                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-tipoSocio">Tipo Socio:<?php echo $res[0]["CATEGORIASOCIO"] ?></p>

                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-dniSocio">DNI Socio: <?php echo $res[0]["DNI"] ?></p>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-idBibliotecario">Id Bibliotecario: <?php echo $res[0]["ID_BIBLIOTECARIO"] ?></p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellBibliotecario">Nombre y Apellido Bibliotecario: <?php echo $res[0]["NOMBRE_BIBLIOTECARIO"] . ' ' . $res[0]["APELLIDO_BIBLIOTECARIO"] ?></p>
                  </div>

                </div>





              </div>
              <div class="row mt-4">
                <div class="row ">
                  <p class="h5">Detalle de cuota</p>
                </div>
                <div class="table-responsive-md mt-1">
                  <table class="table   table-bordered" id="t-cobro">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>ISBN</th>
                        <th>ID Institucional</th>
                        <th>Título</th>
                        <th>Fecha de Prestamo</th>
                        <th>Fecha A devolver Prestamo</th>
                        <th>Fecha de devolucion</th>
                        <th>Tipo Prestamo</th>
                        <th>Estado</th>



                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = 0; $i < $CountDetalle; $i++) { ?>



                        <tr class=<?php echo ($i % 2 == 0) ?  'table-info' : ''; ?>>
                          <td><?php echo $i ?></td>
                          <td><?php echo $res[$i]['ID_LIBRO'] ?></td>
                          <td><?php echo $res[$i]['ID_INST_EJEMPLAR'] ?></td>
                          <td><?php echo $res[$i]['TITULO'] ?></td>
                          <td><?php echo $res[$i]['FECHA_PRESTAMO'] ?></td>
                          
                          <td><?php echo $res[$i]['FECHA_ADEVOLVER']   ?></td>
                          <td><?php echo $res[$i]['FECHADEVOLUCION']  ?></td>
                          <td><?php echo $res[$i]['TIPOPRESTAMO'] ?></td>
                          
                          <td><?php echo $res[$i]['ESTADO'] ?></td>
                        </tr>
                      <?php } ?>


                    </tbody>
                  </table>
                </div>


              </div>

            </div>
          </div>
        </div>
      </div>



    </div>






  </main>
  <!-- Essential javascripts for application to work-->
  <script src="./js/jquery-3.6.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="./js/main.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <!-- FontAwesome -->
  <script src="./js/fontawesonKit.js"></script>
  <script>
    $(document).ready(function() {
      window.addEventListener("load", window.print());
    });
  </script>




</body>

</html>