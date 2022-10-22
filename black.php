<?php

require_once './Handler/HandlerBlack.php'

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
        <h1><i class="fa fa-dashboard"></i> Black</h1>
        <p>Panel de Pruebas</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Black </h3>
          <p><?php echo $acceso?></p>
          <p><?php echo $_SERVER['REQUEST_METHOD']?></p>
          <p> pruebas de Host</p>
          <p><?php echo $host?></p>
          <p><?php echo $_SERVER['HTTP_HOST']?></p>
          <p> pruebas de $path INFo</p>
          <p><?php echo $path?></p>
          <p><?php echo $_SERVER['PATH_INFO']
?></p>
          <p> pruebas de $filname</p>
          <p><?php echo $filname?></p>
          <p><?php echo $_SERVER['SCRIPT_FILENAME']?></p>
          
          <p> pruebas de $self</p>
          <p><?php echo $self?></p>
          <p><?php echo $_SERVER['PHP_SELF']?></p>
          
          <p> pruebas de $metodoPath()</p>
          <p><?php echo $metodoPath ?></p>
          <p><?php echo get_include_path ();
?></p>
          <p> pruebas de $root()</p>
          <p><?php echo $root ?></p>
          <p><?php echo $_SERVER['DOCUMENT_ROOT'];
?></p>


          <!-- /Form -->
            <form id="form-Prueba" >
              
            <div class="form-group">
                    <label class="control-label">Seleccione un Mes para la cuota</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                    <input id="InputMes" class="form-control " type="month" name="Mes" min="<?php echo $año = date("Y-m"); ?>" required>
                  </div>
            </form>
          <button type="submit" id="prueba" class="btn btn-success">iniciar Prueba</button>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    </div>





  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>


  <script >
    $(document).ready(function(){

      $("#prueba").click(function(e){
        e.preventDefault();
        data=$("#form-Prueba").serialize();
        console.log(data);
        console.log("Envio de Solicitud");
        $.ajax({
        type: "POST",
        url: "Handler/HandlerBlack.php",
        data,
        
        success: function (response) {
          console.log(response)
        }
      });
      })
     


    })

  </script>

</body>

</html>