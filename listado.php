<?php

require_once('./Inc/session.inc.php');
require_once 'funciones/conexion.php';
require_once 'funciones/convertirFecha.php';

$MiConexion = $ConexionBD;

$Incidencia=array();
require_once 'funciones/select_incidencias.php';
if ($_SESSION['USUARIO_ID_NIVEL']==1){
$Incidencia = Listar_Todas_Incidencias($MiConexion);}
elseif ($_SESSION['USUARIO_ID_NIVEL']==2) {
  $Incidencia = Listar_Incidencias_Usuario($MiConexion,$_SESSION['USUARIO_ID']);

}elseif ($_SESSION['USUARIO_ID_NIVEL']==3) {

  $Incidencia = Listar_NoFinalizadas_Incidencias($MiConexion);

}





$cantRes = count($Incidencia);


require_once('./Inc/menus/head.inc.php');


?>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-list"></i> Listados</h1>
        <!-- si es administrador vera este titulo-->
        <?php if ($_SESSION['USUARIO_ID_NIVEL'] == 1) { ?>
          <p>Listado total de incidencias</p>
        <?php } else if ($_SESSION['USUARIO_ID_NIVEL'] == 3) { ?>
          <!-- si es técnico vera este titulo -->
          <p>Listado de incidencias no finalizadas</p>
        <?php } else { ?>
          <!-- si es usuario normal vera este titulo--->
          <p>Listado de mis incidencias cargadas</p>
        <?php } ?>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Listado de Incidencias</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Incidencias (Nro Total)</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Prioridad</th>
                  <th>Registro</th>
                  <th>Estado</th>
                  <th>Solicitante</th>
                  <th>Area</th>
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>
                <?php for ($i = 0; $i < $cantRes; $i++) { ?>


                
                  <tr class="<?php
                              if ($Incidencia[$i]['Estado_Id'] != 3) {

                                if ($Incidencia[$i]['Id_Prioridad'] == 1) {
                                  echo 'table-danger';
                                } else if ($Incidencia[$i]['Id_Prioridad'] == 2) {
                                  echo 'table-warning';
                                } else if ($Incidencia[$i]['Id_Prioridad'] == 3) {
                                  echo 'table-info';
                                }
                              } else {
                                echo 'table-success';
                              }

                              ?>">
                    <td><?php echo $Incidencia[$i]['Id'] ?></td>
                    <td><?php echo $Incidencia[$i]['Titulo'] ?></td>
                    <td><?php echo $Incidencia[$i]['Descripcion'] ?></td>
                    <td><?php echo $Incidencia[$i]['Prioridad'] ?></td>
                    <td><?php echo convertir_fecha( $Incidencia[$i]['Fecha']) ?></td>
                    <td><?php echo $Incidencia[$i]['Estado'] ?></td>
                    <td><?php echo $Incidencia[$i]['Nombre'] . $Incidencia[$i]['Apellido'] ?></td>
                    <td><?php echo $Incidencia[$i]['Area'] ?></td>
                    <td><a href="#">Ver detalles...</a></td>
                  </tr>
                <?php } ?>



              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>