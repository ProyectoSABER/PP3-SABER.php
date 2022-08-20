<?php

require_once './Handler/HandlerIndex.php'

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
        <h1><i class="fa fa-dashboard"></i> Bienvenidos</h1>
        <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      </ul>
    </div>
    

    <?php if ($Admin){ 

      require_once('./Inc/menus/menu_auth/admin/admin.php');

      }else if($Bibliotecario){
        require_once('./Inc/menus/menu_auth/librarian/librarian.php');
        
       }else{ require_once('./Inc/menus/menu_auth/socios/partners.php');}?>



  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>