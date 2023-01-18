<?php

require_once './Handler/HandlerIndex.php'

?>



<body class="app sidebar-mini pace-done sidenav-toggled">
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
    

    <?php if ($Admin){ 

      require_once('./Inc/menus/menu_auth/admin/admin.php');

      } else if($Bibliotecario){
        require_once('./Inc/menus/menu_auth/librarian/librarian.php');
        
       }else{ require_once('./Inc/menus/menu_auth/socios/partners.php');}?>



  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>

</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="./assets/plugins/DataTables/datatables.js"></script>
<script type="text/javascript" src="js/sweetAlert.js">Saludar()</script>
<script> 
 
function anularReserva(idDetReserva){
  if(confirm('¿Deseas ANULAR la reserva?')){

    /* location.href=`RegistrarReservaLibro.php` */
    location.href=`index.php?AnularReserva=${idDetReserva}`
  }
  

}
function listoParaRetiro(idDetReserva){
  if(confirm('¿El Material se encuentra listo para retirar?')){

    
    location.href=`index.php?ListoRetirar=${idDetReserva}`

  }
}

  function registrarPrestamo(idDetReserva) {
  if(confirm('¿Desea Registrar el Prestamo?')){

    
    location.href=`index.php?RegistrarPrestamo=${idDetReserva}`

  }
}

  $('#tabla-reservas').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
        "language": {

          "sProcessing": "Procesando...",

          "sLengthMenu": "Mostrar _MENU_ registros",

          "sZeroRecords": "No se encontraron resultados",

          "sEmptyTable": "Ningún dato disponible en esta tabla",

          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",

          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",

          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

          "sInfoPostFix": "",

          "sSearch": "Buscar:",

          "sUrl": "",

          "sInfoThousands": ",",

          "sLoadingRecords": "Cargando...",

          "oPaginate": {

            "sFirst": "Primero",

            "sLast": "Último",

            "sNext": "Siguiente",

            "sPrevious": "Anterior"

          },

          "oAria": {

            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

            "sSortDescending": ": Activar para ordenar la columna de manera descendente"

          }
        }
      });

</script>


</html>