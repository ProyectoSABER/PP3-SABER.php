<?php
require_once('Handler/personas/HandlerRegistrarPersona.php');

?>


<body class="pace-done">
  <!-- Navbar-->
  <!--   -->

  <main class="app-content fullscreen">
    <?php     (!$EstadoRegistro) ? require_once('inc/newUser/NewUserCarga.php'): require_once('inc/newUser/NewUserMensajeExito.php'); 
    ?>
    
  </main>
  <!-- Essential javascripts for application to work-->
  <?php require_once('./Inc/js/js.inc.php'); ?>
  <script src="./js/bootstrap.js"></script>
  
  <script>
        let tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
          

        })
      </script>
  <script type="text/javascript" src="./js/plugins/jquery.validate.js"></script>
      
      <script>
        $(function() {

          

          $("#form_newUser").validate({
            rules: {

              DNI: {
                required: true,
                digits:true,
                minlength: 8,
                maxlength: 10
              },
              TipoDni: {
                required: true
              },
              NOMBRE: {
                required: true
              },
              Apellido: {
                required: true
              },
              TipoContacto: {
                required: true
              },
              CodigoArea: {
                required: true,
                digits:true,
                minlength: 0,
                maxlength: 4
              },
              Ncelular: {
                required: true,
                digits:true,

                minlength: 8,
                maxlength: 4
              },

            },
            messages: {
              DNI: {
                required: "Campo Obligatorio",
                digits:"El campo requiere un valor numerico",
                minlength: "El campo DNI debe contener entre 8 y 10 Digitos",
                maxlength: "El campo DNI debe contener entre 8 y 10 Digitos"
              },
              TipoDni: {
                required: "Campo Obligatorio",
              },
              NOMBRE: {
                required: "Campo Obligatorio",
              },
              Apellido: {
                required: "Campo Obligatorio",
              },
              TipoContacto: {
                required: "Campo Obligatorio",
              },
              CodigoArea: {
                required: "Campo Obligatorio",
                digits:"El campo requiere un valor numerico",
                minlength: "El campo DNI debe contener entre 0 y 4 Digitos",
                maxlength: "El campo DNI debe contener entre 0 y 4 Digitos"
              },
              Ncelular: {
                required: "Campo Obligatorio",
                digits:"El campo requiere un valor numerico",
                minlength: "El campo DNI debe contener entre 8 y 10 Digitos",
                maxlength: "El campo DNI debe contener entre 8 y 10 Digitos"
              },
              
            },
            errorLabelContainer: "dt",
            wrapper: 'div'
          });
        });
      </script>

</body>

</html>