<?php
require_once('Handler/domicilio/HandlerCRUDdomicilio.php');

?>


<body class="app sidebar-mini pace-done sidenav-toggled">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Registrar Domicilio Completo</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Inicio</li>
        <li class="breadcrumb-item"><a href="#">Registro</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="row align-items-center">
        <div class="tile">
          <h3 class="tile-title">Ingresa los datos solicitados</h3>





          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Los campos con <i class="fa fa-asterisk text-danger" aria-hidden="true"></i> son obligatorios</strong>
            </div>
          </div>
          <div class="tile-body">
            <!-- ************************************ -->
            <!-- *****IMPRIMIR ARRAY EN PANTALA****** -->
            <!-- ************************************ -->

            <?php /* echo '<p>' . print_r($TipoDNI) . '<p>' */  ?>
            
            
            



            <?php /* if(isset($NewUser)){ echo '<p>'.print_r($NewUser) .'<p>'; } else{ echo "nada aqui";} */ ?>
            <!-- ************************************ -->
            <!-- ************************************ -->

            <!-- Formulario -->
            <form method="POST" class="row ">

              <div class="col-md-5" id="div_Selector">
                <!-- TIPO DOMICILO -->

                <div class="form-group">
                  <label class="control-label">1° Seleccione un elemento para registrar</label> <i class="fa fa-asterisk text-danger" aria-hidden="true"></i>
                  <select class="form-control" id="registrarElemento" required name="TipoRegistro" placeholder="Seleccione un elemento para registrar">
                    <option selected disabled hidden>Seleccione un elemento LOCALIDAD/PROVINCIA/PAIS</option>

                    <option value="Ciudad">1-Ciudad</option>
                    <option value="Provincia">2-Provincia</option>
                    <option value="País">3-País</option>

                  </select>
                </div>
              </div>
              <!-- Domicilio -->




            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="row">

      <!-- Paises -->

      <div class="col-md-4" id="list-País">
        <div class="tile">
          <h3 class="tile-title">Paises</h3>

          <div class="tile-body">
            <div class="table-responsive-md">

              <table id="tabla_Paises" class="table 
              table-hover	
              
              
              align-middle">
                <caption>Paises</caption>
                <thead class="">
                  <tr>
                    <th>#id</th>
                    <th>Ciudad</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">

                  <?php for ($i = 0; $i < $Cantpais; $i++) { ?>
                    <tr class="">
                      <td scope="row"><?php echo $i ?></td>
                      <td scope="row"><?php echo $pais[$i]['NOMBRE'] ?></td>
                      <td> <button class="btn btn-sm btn-warning" type="submit" onclick="eliminar({pais:<?php echo $pais[$i]['ID'] ?>})"><i class="fa fa-fw fa-lg fa-trash"></i>Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>

              </table>
            </div>


          </div>
        </div>
      </div>

      <!-- Provincia -->
      <div class="col-md-4" id="list-Provincia">
        <div class="tile">
          <h3 class="tile-title">Provincias</h3>

          <div class="tile-body">
            <div class="table-responsive-md">
              <table id="tabla_Provincia" class="table 
              table-hover	
              
              
              align-middle">
                <caption>Table Name</caption>
                <thead class="">
                  <tr>
                    <th>#id</th>
                    <th>Provincia</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">

                  <?php for ($i = 0; $i < $Cantprovincia; $i++) { ?>
                    <tr class="">
                      <td scope="row"><?php echo $i ?></td>

                      <td scope="row"><?php echo $provincia[$i]['NOMBREPROVINCIA'] ?></td>
                      <td> <button class="btn btn-sm btn-warning" type="submit" name="EliminarProvincia" onclick="eliminar({provincia:<?php echo $provincia[$i]['IDPROVINCIA'] ?>})"><i class="fa fa-fw fa-lg fa-trash"></i>Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Localidades -->

      <div class="col-md-4" id="list-ciudad">
        <div class="tile">
          <h3 class="tile-title">Localidades</h3>

          <div class="tile-body">
            <div class="table-responsive-md">

              <table id="tabla_Localidad" class="table 
              table-hover	
              
              
              align-middle">
                <caption>Table Name</caption>
                <thead class="">
                  <tr>
                    <th>#id</th>
                    <th>Ciudad</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">

                  <?php for ($i = 0; $i < $Cantlocalidad; $i++) { ?>
                    <tr class="">
                      <td scope="row"><?php echo $i ?></td>

                      <td scope="row"><?php echo $localidad[$i]['NOMBRELOCALIDAD'] ?></td>
                      <td> <button class="btn btn-sm btn-warning" type="submit" name="EliminarLocalidad" onclick="eliminar({localidad:<?php echo $localidad[$i]['IDPLOCALIDAD'] ?>})"><i class="fa fa-fw fa-lg fa-trash"></i>Eliminar</button>
                      </td>
                    </tr>
                  <?php } ?>
                  </form>
                </tbody>
                <tfoot>

                </tfoot>
              </table>
            </div>


          </div>
        </div>
      </div>




    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script src="./js/Personalizados/domicilio/crudDomicilio.js">
  </script>
</body>

</html>