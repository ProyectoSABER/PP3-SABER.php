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
      EN ESTA SECCIÓN ENCONTRARÁS REPRESENTADO EN UN GRÁFICO TIPO DONA
      LA CANTIDAD DE LIBROS SOLICITADOS SEGUN EL TIPO DE PRESTAMO.<BR>
      DE ESTA MANERA EL USUARIO A CARGO, PUEDE VERIFICAR CUAL ES EL LUGAR PREFERIDO DE NUESTROS USUARIOS PARA <BR>
      UTILIZAR LOS LIBROS.

      </h6></p>
      
    </div>
    <br>


 
<div class="container-margenes"  margin-left: 50%>

<div  style="width: 500px;"><canvas id="reservas"></canvas></div><br/>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('reservas');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: [
      
        'uso en biblioteca',
        'uso en aula(Docente)',
        'uso en aula(Alumno)',
        'prestamo a domicilio(Docente)',
        'prestamo a domicilio(No Docente)'
      
      ],
      datasets: [{
    label: 'cantidad de libros',
    data: [150, 50, 100, 75, 21],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(124,252,0)',
      'rgb(54, 162, 235)',
      'rgb(190, 99, 255)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
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