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
            </h3> <br><br><br>

<div>
  <canvas id="myChart" style="width: 45px; height: 15px;"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [
      
        <?php  
              
              $SQL ="SELECT categorialibro.categoria_cateLibro AS categorias FROM categorialibro";
              $consulta = mysqli_query($MiConexion,$SQL);
              while ($resultado = mysqli_fetch_assoc($consulta)) {
                echo '["'.$resultado['categorias'].'"],';
              }
             
              ?>
      
      ],
      datasets: [{
        label: 'Cantidad de libros por Genero',
        data: [12, 19, 3, 5, 2, 17, 3, 4, 22, 12],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>



</div>
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
 
 

</body>

</html>