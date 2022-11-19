<?php
require_once './Handler/prestamos/HandlerRegistrarPrestamoLibroSocio.php';
/* require_once './Handler/prestamos/HandlerRegistrarPrestamoLibro2.php'; */ 

if(!empty($_GET['ID_ISBN'])){
  $idISBN = $_GET['ID_ISBN'];
}

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
        <h1><i class="fa fa-edit"></i> Registrar Prestamo de Libros CC</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
      
        <div class="tile">
          <h3 class="tile-title">Selecciona el libro que deseas solicitar</h3>
          
          <div class="row">
          <div class="col-md-12">
             
<div class="form-group">
<a href="index.php"><button type="button" class="btn btn-info">
                Solicitados
              </button></a></br>

  
<table id="example" class="display" style="width:100%">
   <thead>
       <tr>
           <th>Titulo</th>
           <th>Subtitulos</th>
           <th>Ubicacion</th>
           <th>Idioma</th>
           <th>Categoria</th>
           <th>Acciones</th>
       </tr>
   </thead>
   <tbody>
     <?php foreach( $Libros as $libro ){
       ?>
            
<tr>
           <td><?php echo $libro['Libro_Titulo']  ?></td>
           <td><?php echo $libro['Libro_Subtitulo']  ?></td>
           <td><?php echo $libro['Libro_UbicacionEstanteria']  ?></td>
           <td><?php echo $libro['Libro_Idioma']  ?></td>
           <td><?php echo $libro['Libro_CategoriaLibro']  ?>
          </td> 
           
           <td>
           <button type="button" onclick="registrarPrestamo('<?php  echo $libro['Libro_ISBN'] ?>','<?php echo $libro['Libro_IdEjemplar']  ?>')" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                </svg>  Solicitar prestamo
          </button>
         
  </tr>
   
       <?php
     }?>
           
   </tbody>
   <tfoot>
     
   </tfoot>
</table>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="POST" name="finalizaModal" action="Handler/Prestamos/HandlerRegistrarPrestamoLibro.php">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Seleccione el tipo de Prestamo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <input type="text" name="registrarPrestamoSocio" id="registrarPrestamoSocio"  value="1" style="visibility:hidden">
   
      <select class="form-select" name="idTipoPrestamo" id="idTipoPrestamo" >
      <?php if(count($TipoPrestamo)>0){
              foreach ($TipoPrestamo as $var) {
                
                echo "<option value=".$var['ID'].">".$var['TipoPrestamo']."</option>";
              }
      }  ?></br>
         
      </select>
          <input type="text" name="idISBN" id="idISBN"  style="visibility:hidden">   
          <input type="text" name="idEJEM" id="idEJEM"  style="visibility:hidden">           
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Confirmar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
     </form>
  </div>
</div>

</main>
</div>
</div>
</div>




  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->
<!--   <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/> -->
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js"></script> -->
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script> -->

<script>

function registrarPrestamo(idISBN,idEJEM){
       
        $("#idISBN").val(idISBN);
        $("#idEJEM").val(idEJEM);
console.log(idISBN);
console.log(idEJEM);
        
    }


$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>


</html>