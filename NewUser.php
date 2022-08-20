<?php
require_once('Handler/personas/HandlerRegistrarPersona.php');

?>


<body class="pace-done">
  <!-- Navbar-->
  <!--   -->

  <main class="app-content fullscreen">
    <?php
    (!$EstadoRegistro) ? require_once('inc/newUser/NewUserCarga.php'): require_once('inc/newUser/NewUserMensajeExito.php');
    ?>
    
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>

</html>