

<!DOCTYPE html>
<html lang="es">

<head>

  <title>S.A.B.E.R Comprobante de Pago</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap Core CSS -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">

  <!-- MetisMenu CSS -->
  <link href="../../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css">
  
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">
  
  <link rel="stylesheet" type="text/css" href="../../assets/css/myStyleComprobantePago.css">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">

</head>

<body class="fullscreen">


  <main class="app-content" >
    <div class="app-title">
      <div>
        <h1><!-- <i class="fa fa-dashboard"></i> --> Imagen del Sistema</h1>
        
      </div>
      
    </div>
    <div class="tile">
      <h3 class="tile-title">Comprobante de Pago Cuota </h3>
      <div class="tile-body">
        <div class="row">
          <div class="col-md-12">
            <div class="container-md-12">
              <div class="row">
                <p class="h6" id="detFact-fecha">Fecha:</p>
              </div>
              <div class="row">

                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-nSocio">N° Socio:</p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellSocio">Nombre y Apellido Socio:</p>
                  </div>

                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-tipoSocio">Tipo Socio:</p>

                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-dniSocio">DNI Socio:</p>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-idBibliotecario">Id Bibliotecario:</p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellBibliotecario">Nombre y Apellido Bibliotecario:</p>
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
                        <th scope="col">Mes-Año</th>
                        <th scope="col">fecha Venc</th>
                        <th scope="col">Estado Venc</th>
                        <th scope="col">$ Cuota</th>
                        <th scope="col">Recargo</th>
                        <th scope="col" class="table-info">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="">
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td>R1C3</td>
                        <td class="table-info">R1C3</td>
                      </tr>
                      <tr class="">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td>Item</td>
                        <td class="table-info">Item</td>
                      </tr>
                      <tr class="">
                        <td scope="row" colspan="4" class="table-light"></td>

                        <td class="table-success">Total</td>
                        <td class="table-success">$</td>
                      </tr>

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
  <script src="../../js/jquery-3.6.1.min.js"></script>
  <script src="../../js/popper.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="../../js/main.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- FontAwesome -->
  <script src="../../js/fontawesonKit.js"></script>
  <script>
  window.addEventListener("load", window.print());
</script>




</body>

</html>
