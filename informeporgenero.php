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
      EN ESTA SECCIÓN ENCONTRARÁS REPRESENTADO EN UN GRÁFICO DE BARRAS 
      LA CANTIDAD DE LIBROS SOLICITADOS SEGÚN SU CATEGORÍA, POR NUESTROS SOCIOS.<BR>
      DE ESTA MANERA EL USUARIO A CARGO, PUEDE VERIFICAR CUAL ES LA MAYOR DEMANDA SEGÚN LA CATEGORÍA.
      </h6></p>
      
    </div>
    <br>

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
              
              $SQL ="
              SELECT COUNT(CAT.id_CateLibro) AS 'cantidad', CAT.categoria_cateLibro AS 'Libro' FROM prestamolibro AS PL
              INNER JOIN detalleprestamolibro AS DPL ON PL.idPrestamoLibro = DPL.id_PrestamoLibro
              INNER JOIN ejemplarlibro AS EJL ON DPL.id_EjemplarLibro_Libro = EJL.id_EjemplarLibro
              INNER JOIN libro AS LIB ON EJL.id_Libro = LIB.id_isbn
              INNER JOIN categorialibro AS CAT ON LIB.categoria_libro = CAT.id_CateLibro
              GROUP BY CAT.id_CateLibro";
              $consulta = mysqli_query($MiConexion,$SQL);
              
              while ($resultado = mysqli_fetch_assoc($consulta)) {
                echo '["'.$resultado['Libro'].'"],';
              }
             
              ?>
      
      ],
      datasets: [{
        label: 'Cantidad de libros por Genero',
        data: [

          <?php
          $SQL ="
          SELECT COUNT(CAT.id_CateLibro) AS 'cantidad', CAT.categoria_cateLibro FROM prestamolibro AS PL
          INNER JOIN detalleprestamolibro AS DPL ON PL.idPrestamoLibro = DPL.id_PrestamoLibro
          INNER JOIN ejemplarlibro AS EJL ON DPL.id_EjemplarLibro_Libro = EJL.id_EjemplarLibro
          INNER JOIN libro AS LIB ON EJL.id_Libro = LIB.id_isbn
          INNER JOIN categorialibro AS CAT ON LIB.categoria_libro = CAT.id_CateLibro
          GROUP BY CAT.id_CateLibro";
          $consulta = mysqli_query($MiConexion,$SQL);
          while ($resultado = mysqli_fetch_assoc($consulta)) {
            echo '['.$resultado['cantidad'].'],';
            
            
          }
          ?>
          
        ],

        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
        borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
        borderWidth: 2
        
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