<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <img class="app-sidebar__user-avatar" src="images/team/<?php echo (!empty($_SESSION['USUARIO_Foto']))? $_SESSION['USUARIO_Foto']  : 'Profile_avatar.png' ;  ?>" alt="<?php echo $_SESSION['USUARIO_NOMBRE'] . $_SESSION['USUARIO_APELLIDO'] ?>">
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
        </ul>
      </li>
      <!-- /SOCIOS -->
      <!-- Cuotas -->
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-dollar-sign"></i><span class="app-menu__label">Cuotas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
        

          <li><a class="treeview-item" href="RegistrarCuotas.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Cuotas</a></li>
        </ul>
      </li>
      <!-- /Cuotas -->

      <!--       <li><a class="app-menu__item" href="BLANK.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">BLANKModal</span></a></li>
 -->

    <?php } else {?>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Prestamos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">

          <li><a class="treeview-item" href="RegistrarPrestamoSocio.php"><i class="app-menu__icon fa fa-edit"></i>Registrar Prestamo</a></li>
          
        </ul>
      </li>

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