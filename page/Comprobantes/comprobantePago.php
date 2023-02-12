<?php
require_once'../../Handler/comprobantes/HandlerComprobantePago.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <title>S.A.B.E.R Comprobante de Pago</title>
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


  <main class="app-content" >
    <div class="app-title">
      <div>
        <!-- <h1> <i class="fa fa-dashboard"></i>  Imagen del Sistema</h1> -->
        <img src="./images/System/Logo.jpg" alt="Logo Sistema SABER" style="height: 100px;">
      </div>
      
    </div>
    <div class="tile">
      <h3 class="tile-title">Comprobante de Pago Cuota </h3>
      <div class="tile-body">
        <div class="row">
          <div class="col-md-12">
            <div class="container-md-12">
              <div class="row">
                <p class="h6" id="detFact-fecha">Fecha: <?php echo convertir_fecha($res[0]["detalleCobro"]["FECHACOBROCUOTA"])?></p>
              </div>
              <div class="row">

                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-nSocio">N° Socio:<?php echo $res[0]["detalleSocio"]["ID"]?></p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellSocio">Nombre y Apellido Socio: <?php echo $res[0]["detalleSocio"]["NOMBRE"].' '.$res[0]["detalleSocio"]["APELLIDO"]?></p>
                  </div>

                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-tipoSocio">Tipo Socio:<?php echo $res[0]["detalleSocio"]["CATEGORIA"]?></p>

                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-dniSocio">DNI Socio: <?php echo $res[0]["detalleSocio"]["DNI"]?></p>
                  </div>
                </div>
                <div class="col">
                  <div class="row">
                    <p class="h6" id="detFact-idBibliotecario">Id Bibliotecario: <?php echo $res[0]["detalleBibliotecario"]["ID"]?></p>
                  </div>
                  <div class="row">
                    <p class="h6" id="detFact-nomApellBibliotecario">Nombre y Apellido Bibliotecario: <?php echo $res[0]["detalleBibliotecario"]["NOMBRE"].' '.$res[0]["detalleBibliotecario"]["APELLIDO"]?></p>
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
                        <th scope="col">Estado Cuota</th>
                        <th scope="col">$ Cuota</th>
                        <th scope="col">Recargo</th>
                        <th scope="col" class="table-info">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total=0;
                      for ($i=0;$i<$CountDetalle;$i++){
                        
                        ?>
                      <tr class="">
                        <td scope="row"><?php echo $res[$i]["detalleCobro"]["MESANIOCUOTA"] ?></td>
                        <td><?php echo convertir_fecha($res[$i]["detalleCobro"]["FECHAVENCIMIENTO"])?></td>
                        <td><?php echo estadoCuota(convertir_fecha($res[$i]["detalleCobro"]["FECHAVENCIMIENTO"]), convertir_fecha($res[$i]["detalleCobro"]["FECHACOBROCUOTA"] ) )?></td>
                        
                        <td><?php echo $res[$i]["detalleCobro"]["ESTADOCOBROCUOTA"]?></td>
                        <td>$<?php echo $res[$i]["detalleCobro"]["VALORCUOTA"]?></td>
                        <td>$<?php echo $res[$i]["detalleCobro"]["RECARGO"]?></td>
                        
                        <td class="table-info">$<?php echo $subtotal=$res[$i]["detalleCobro"]["VALORCUOTA"]+$res[$i]["detalleCobro"]["RECARGO"];?></td>
                      </tr>
                      <?php 
                      $total+=$subtotal;
                    }?>
                      
                      <tr class="">
                        <td scope="row" colspan="5" class="table-light"></td>

                        <td class="table-success">Total</td>
                        <td class="table-success">$ <?php echo $total?></td>
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
  <script src="./js/jquery-3.6.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="./js/main.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <!-- FontAwesome -->
  <script src="./js/fontawesonKit.js"></script>
  <script>
    $(document).ready(function () {
      window.addEventListener("load", window.print());
    });
  
</script>




</body>

</html>
