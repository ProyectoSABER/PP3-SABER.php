<?php
require_once './Handler/HandlerIndex.php'
?>


<link rel="stylesheet" href="css/login.css">


<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php require_once('./Inc/menus/navbar.inc.php'); ?>
  <!-- Sidebar menu-->
  <?php require_once('./Inc/menus/sidebar.inc.php'); ?>
  <!-- fin Sidebar menu-->

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Bienvenido <?php echo $_SESSION['USUARIO_NOMBRE'] ?> </h1>
        <p>Es un placer verte de nuevo, renovamos nuestro sitio para mejorar tu experiencia.</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
      </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Sistema de Estadisticas S.A.B.E.R
            </h3> <br>
            

    <div class="referencias">        
      <p><h6>
      EN ESTA SECCIÓN ENCONTRARÁS DE FORMA GRÁFICA, REPRESENTADAS EN UN GRÁFICO TIPO PASTEL <br>
      EL PORCENTAJE DE LIBROS PRESTADOS A LOS DISTINTOS TIPOS DE SOCIOS REGISTRADOS BAJO NUESTRO SISTEMA.
      </h6></p>
      
    </div>

            <head>
             <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
             <script type="text/javascript">
      
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
         
          ['Task', 'Hours per Day'],
          
          <?php  
              
          $SQL ="SELECT COUNT(idPrestamoLibro) AS Cantidad,cs.nom_CategoriaSocio AS Nombre
          FROM prestamolibro  pl
          INNER JOIN socio so ON so.id_socio = pl.id_socio
          INNER JOIN categoriasocio cs ON cs.Id_CategoriaSocio = so.idcategoria_Socio
          GROUP BY cs.Id_CategoriaSocio";
          $consulta = mysqli_query($MiConexion,$SQL);
          while ($resultado = mysqli_fetch_assoc($consulta)) {
            echo '["'.$resultado['Nombre'].'", '.$resultado['Cantidad'].'],';
          }
         
          ?>

        ]);

        var options = {
          title: 'INFORME DE PRESTAMO DE LIBROS SEGÚN TIPO DE SOCIOS'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>






  </head>


  <div id="piechart" style="width: 1050px; height: 800px;"></div>
   

<!-- GRAFICO 3 -->




  <div class="align-items-end">

<div>
  <canvas id="myChart" style="width: 45px; height: 15px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>





</div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
 


</body>

</html>



















<!---



<a class="btn btn-primary" href="index.php" role="button">Inicio</a>


      