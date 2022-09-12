<?php

require_once './Handler/socios/HandlerEditarSocio.php'

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
        <h1><i class="fa fa-th-list"></i> Listados</h1>

        <p>Editar Socio</p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="#">Editar Socio</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title"> ID Socio <?php echo $Socio["SOCIO_ID"] ?> </h3>
          <form action="" method="post">

            <!-- DNI -->
            <div class="form-group">
              <label class="control-label">DNI</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $Socio['SOCIO_DNI'] ?>" name="DNI" type="number">
            </div>
            <!-- Nombre -->
            <div class="form-group">
              <label class="control-label">Nombre</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $Socio['SOCIO_NOMBRE'] ?>" name="Nombre" type="txt">
            </div>
            <!-- Apellido -->
            <div class="form-group">
              <label class="control-label">Apellido</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $Socio['SOCIO_APELLIDO'] ?>" name="Apellido" type="txt">
            </div>
            <!-- Categoria -->
            <div class="form-group">
              <label class="control-label">Categoria</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $Socio['SOCIO_CATEGORIA'] ?>" name="Categoria" type="txt">
            </div>
            <!-- Calle -->
            <div class="form-group">
              <label class="control-label">Calle</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $PERSONA['CALLE'] ?>" name="Calle" type="txt">
            </div>
            <!-- AlturaCalle -->
            <div class="form-group">
              <label class="control-label">AlturaCalle</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $PERSONA['ALTURACALLE'] ?>" name="AlturaCalle" type="txt">
            </div>
            <!-- Barrio -->
            <div class="form-group">
              <label class="control-label">Barrio</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $PERSONA['BARRIO'] ?>" name="Barrio" type="txt">
            </div>
            <!-- Localidad -->
            <div class="form-group">
              <label class="control-label">Localidad</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $PERSONA['LOCALIDAD'] ?>" name="Localidad" type="txt">
            </div>
            <!-- Provincia -->
            <div class="form-group">
              <label class="control-label">Provincia</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
              <input class="form-control" placeholder="<?php echo $PERSONA['PROVINCIA'] ?>" name="Provincia" type="txt">
            </div>
            <?php for ($i = 0; $i < $CantContacto; $i++) { ?>
              <!-- TipoContacto -->
              <div class="form-group">
                <label class="control-label">TipoContacto</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <input class="form-control" placeholder="<?php echo $Contacto[$i]['TIPOCONTACTO'] ?>" name="TipoContacto" type="txt">
              </div>
              <!-- Contacto -->
              <div class="form-group">
                <label class="control-label">Contacto</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <input class="form-control" placeholder="<?php echo $Contacto[$i]['CONTACTO'] ?>" name="Contacto" type="txt">
              </div>
            <?php } ?>
        </div>




        <div class="clearfix"></div>


      </div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>