<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="<?php echo (!empty($_SESSION['USUARIO_Foto']) & $_SESSION['USUARIO_Foto']!="null" ) ? $_SESSION['USUARIO_Foto']  : 'images/team/Profile_avatar.png';  ?>" alt="<?php echo $_SESSION['USUARIO_NOMBRE'] . $_SESSION['USUARIO_APELLIDO'] ?>">
    <div>
      <p class="app-sidebar__user-name"><?php echo $_SESSION['USUARIO_NOMBRE'] . ' ' . $_SESSION['USUARIO_APELLIDO'] ?></p>
      <p class="app-sidebar__user-designation"><?php echo $_SESSION['USUARIO_NOMTIPOUSUARIO'] ?></p>
    </div>
  </div>
  <ul class="app-menu">
    <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>

    <?php if (($_SESSION['USUARIO_NOMTIPOUSUARIO'] == 'Administrador') || $_SESSION['USUARIO_NOMTIPOUSUARIO'] == 'Bibliotecario') { ?>



      <!-- <li><a class="app-menu__item" href="RegistrarPrestamo1.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registrar Prestamo</span></a></li> -->

      <!-- Prestamos -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book-reader"></i><span class="app-menu__label">Prestamos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="RegistrarPrestamo1.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Prestamo</a></li>
          <li><a class="treeview-item" href="RegistrarDevolucion.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Devolucion</a></li>
          <li><a class="treeview-item" href="ListadoPrestamos.php"><i class="app-menu__icon fa fa-th-list"></i>Listado de Prestamos</a></li>
        </ul>
      </li>
      <!-- /Prestamos -->
      <!-- LIBROS -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book "></i><span class="app-menu__label">Libros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="RegistrarLibros.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Libros</a></li>
          <li><a class="treeview-item" href="RegistrarEjemplaresLibros.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Ejemplares</a></li>
          <li><a class="treeview-item" href="ListadoLibros.php"><i class="app-menu__icon fa fa-th-list"></i>Listado de Libros</a></li>
        </ul>
      </li>
      <!-- /LIBROS -->
      <!-- SOCIOS -->

      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-address-card"></i><span class="app-menu__label">Socios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="RegistrarPersona.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Persona</a></li>
          <li><a class="treeview-item" href="UpdatePersona.php"><i class="app-menu__icon fa fa-edit"></i>Actualizar Datos Persona</a></li>
          <li><a class="treeview-item" href="RegistrarSocio.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Socio</a></li>
          <li><a class="treeview-item" href="ListadoSocios.php"><i class="app-menu__icon fa fa-th-list"></i>Listado Socios</a></li>
          <li><a class="treeview-item" href="crudDomicilio.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Localiad/provincia/pais</a></li>
        </ul>
      </li>
      <!-- /SOCIOS -->
      <!-- Cuotas -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-dollar-sign"></i><span class="app-menu__label">Cuotas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          
          
          <li><a class="treeview-item" href="RegistrarCuotas.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Cuotas</a></li>
          <li><a class="treeview-item" href="ListadoCuotas.php"><i class="app-menu__icon fa fa-edit"></i>Listado Cuotas</a></li>
        </ul>
      </li>
      
      
      <!-- /Cuotas -->
      <!-- Cobro de Cuotas -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-cash-register"></i><span class="app-menu__label">Pagos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      
      <ul class="treeview-menu">
      <li><a class="treeview-item" href="RegistrarCobro.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Pago</a></li>
      <li><a class="treeview-item" href="ListadoCobros.php"><i class="app-menu__icon fa fa-edit"></i>Listado Pagos</a></li>
      <li><a class="treeview-item" href="ListadoTodosCobros.php"><i class="app-menu__icon fa fa-edit"></i>Listado Todos los Pagos</a></li>
      <li><a class="treeview-item" href="CuotasNoAbonadas.php"><i class="app-menu__icon fa fa-edit"></i>Listado de Cuotas Sin Abonar</a></li>
      </ul>
 
      <!-- /Estadisticas -->
      
      <li><a class="app-menu__item " href="estadisticas.php"><i class="fa fa-bar-chart "></i><span class="app-menu__label">Estadisticas</span></a></li>
      
      
      
      
      
      <!-- /Black -->
        <!-- Black -->
      <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-dollar-sign"></i><span class="app-menu__label">Black</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">


          <li><a class="treeview-item" href="Black.php"><i class="app-menu__icon fa fa-edit"></i>Black</a></li>
        </ul>
      </li> -->

      <!-- /Black -->

    <?php } else { ?>

      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Prestamos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="RegistrarReservaLibro.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Prestamo (Reserva)</a></li>

        </ul>
      </li>
      <?php if($_SESSION["USUARIO_IDTIPOUSUARIO"]<5){ ?>

      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa-solid fa-cash-register"></i><span class="app-menu__label">Pagos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      
      <ul class="treeview-menu">
      
      <li><a class="treeview-item" href="CuotasAbonadasUsuario.php"><i class="app-menu__icon fa fa-edit"></i>Cuotas abonadas</a></li>
      
      </ul>

      <!-- MISPrestamos -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-book-reader"></i><span class="app-menu__label">Prestamos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="HistorialdePrestamosLibros.php"><i class="app-menu__icon fa fa-th-list"></i>Historial de Prestamos</a></li>
        </ul>
      </li>
    <?php } ?>
                            
    <?php } ?>

    <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
        <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado de incidencias</a></li> -->
    <!--otros listados
                <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado2</a></li>
                <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado3</a></li>            
                -->
  </ul>
  </li>
  </ul>
</aside>