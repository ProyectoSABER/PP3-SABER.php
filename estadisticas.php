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
          
          
              <div class="table-responsive">
                        <div class="gr1">
                        <h4>Libros mas solicitados por genero</h4>
                        <div style="width: 600px;">
                          <canvas id="myChart"></canvas>
                         </div>
                          </div>
            <br>
                        <div class="gr2">
                            <h4>Perfiles que más libros solicitaron</h4>
                            <div style="width: 500px;">
                            <canvas id="solicitados"></canvas>
                            </div>
                        </div>
              </div>
      </div>
</div>

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script><br><br><br><br>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['historia', 'ciencias', 'quimica', 'idiomas', 'novela', 'ficcion'],
      datasets: [{
        label: 'Libros mas solicitados por Tema',
        data: [19, 12, 3, 5, 2, 3],
        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
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
<script>
    const ctxi = document.getElementById('solicitados');

new Chart(ctxi, {
  type: 'doughnut',
  data: {
    labels: ['Administrador', 'Bibliotecario', 'Docente', 'Alumno', 'Socio Externo'],
    datasets: [{
     
      data: [12, 19, 3, 5, 2],
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
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
 


</body>

</html>



















<!---



<a class="btn btn-primary" href="index.php" role="button">Inicio</a>


      