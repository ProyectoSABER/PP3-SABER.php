<?php
require_once 'Bibliotecario.php';





function registrarReserva($datos, $ConexionBD, $IdEstadoPrestamo = 1)
{

    $IDSocio = $datos['IDSocio'];
    $IDEJEMPLAR = $datos['IDEJEMPLAR'];
    $IDTIPOPRESTAMO = $datos['IDTIPOPRESTAMO'];

    $Bibliotecario = array();
    $Bibliotecario = conocerBibliotecario($_SESSION['USUARIO_DNI'], $ConexionBD);
    $IDBibliotecario = $Bibliotecario['Bibliotecario_ID'];
    $fechaActual = date("y-m-d");


    $sql = "INSERT INTO `prestamolibro`(`id_socio`) VALUES ('$IDSocio')";

    $consulta = mysqli_query($ConexionBD, $sql);

    if ($consulta) {

        $sql =   "SELECT `idReservaLibro` FROM `prestamolibro` WHERE `id_socio`= '$IDSocio' AND `idReservaLibro` NOT IN (SELECT `id_PrestamoLibro` FROM `detalleprestamolibro`)";
        $rs = mysqli_query($ConexionBD, $sql);

        $data = mysqli_fetch_array($rs);


        if ($data) {
            $IdReserva = $data['idReservaLibro'];
            $sql = "INSERT INTO `detalleprestamolibro`(`id_bibliotecario`, `id_tipoPrestamo`,  `fechaPrestamo`, `id_PrestamoLibro`, `id_EjemplarLibro_Libro`, `Id_estado_PrestamoLibro`) 
            VALUES ('$IDBibliotecario','$IDTIPOPRESTAMO','$fechaActual','$IdReserva','$IDEJEMPLAR','$IdEstadoPrestamo')";
            $consulta = mysqli_query($ConexionBD, $sql);
            if ($consulta) {


                $sql = "UPDATE `ejemplarlibro`SET `id_EstadoLibro` = 2 WHERE `id_EjemplarLibro` ='$IDEJEMPLAR'";
                $consulta = mysqli_query($ConexionBD, $sql);
                return $consulta;
            }


            return $consulta;
        }
        return $data;
    }




    return $consulta;
}
function registrarReservaSocio($datos, $ConexionBD, $IdEstadoReserva = 1)
{

    $IDSocio = $datos['IDSocio'];
    $IDISBN = $datos['IDISBN'];
    $IDEJEMPLAR = $datos['IDEJEMPLAR'];
    $IDTIPOPRESTAMO = $datos['IDTIPOPRESTAMO'];

    $fechaActual = date("y-m-d");


    $sql = "INSERT INTO `reserva`(`id_socio`) VALUES ('$IDSocio')";
    $consulta = mysqli_query($ConexionBD, $sql);

    if ($consulta) {

        $sql =   "SELECT `id_Reserva` FROM `reserva` WHERE `id_socio`= '$IDSocio' AND `id_Reserva` NOT IN (SELECT `id_Reserva` FROM `detallereserva`)";


        $rs = mysqli_query($ConexionBD, $sql);

        $data = mysqli_fetch_array($rs);


        if ($data) {
            $IdReserva = $data['id_Reserva'];

            $sql = "INSERT INTO `detallereserva`( `id_Reserva`, `id_EjemplarLibro_Libro`, `id_EstadoReserva`,`id_TipoPrest`,  `fechaReserva_DetRes`) 
            VALUES ('$IdReserva','$IDEJEMPLAR','$IdEstadoReserva','$IDTIPOPRESTAMO','$fechaActual')";

            $consulta = mysqli_query($ConexionBD, $sql);

            if ($consulta) {


                $sql = "UPDATE `ejemplarlibro`SET `id_EstadoLibro` = 3 WHERE `id_EjemplarLibro` ='$IDEJEMPLAR'";
                $consulta = mysqli_query($ConexionBD, $sql);
                return $consulta;
            } else {

                return $consulta;
            }
        }
        return $data;
    }




    return $consulta;
}


function conocertodosReservasSolicitadasPorSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();


    $DNI = $_SESSION['USUARIO_DNI'];

    $EstadoReserva = 3;



    $sql = "SELECT `DR`.`id_DetalleReserva`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DR`.`id_EstadoReserva`,
    `DR`.`fechaReserva_DetRes`,
    `ER`.`nom_EstRes`,
    `DR`.`id_Reserva`,
    `DR`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DR`.`fechaRetiro_DetRes`,
    `DR`.`id_TipoPrest`,    
    `TP`.`nom_TipoPrestamo`
FROM `detallereserva` as DR, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoreserva` as ER,
`reserva` as R, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DR`.`id_TipoPrest` and `EJ`.`id_EjemplarLibro`= `DR`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `ER`.`id_EstadoReserva`= `DR`.`id_EstadoReserva` and `DR`.`id_EstadoReserva`< '$EstadoReserva' 
and `R`.`id_Reserva`= `DR`.`id_Reserva` and `R`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona` and `P`.`dni_Persona`='$DNI'";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetalleReserva'];
        $Lista[$i]['ID_ISBN'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_RESERVA'] = $data['id_EstadoReserva'];
        $Lista[$i]['ESTADO'] = $data['nom_EstRes'];
        $Lista[$i]['ID_RESERVA'] = $data['id_Reserva'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['SOCIO'] = $data['apellido_persona'] . " " . $data['nombre_Persona'];
        $Lista[$i]['FECHA_RESERVA'] = $data['fechaReserva_DetRes'];
        $Lista[$i]['FECHA_ADEVOLVER'] = calcularFechaDevolucion($data['fechaReserva_DetRes'], 1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaRetiro_DetRes'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_TipoPrest'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}

function anularReservaIdDetalleReserva($IdDetReserva, $PConeccionBD)
{

    // 1 buscar reserva y consultar por id ejemplar de libro. 
    $sql = "SELECT `id_EjemplarLibro_Libro`FROM `detallereserva` WHERE `id_DetalleReserva`='$IdDetReserva'";
    $rs = mysqli_query($PConeccionBD, $sql);

    if ($rs) {
        $data = mysqli_fetch_array($rs);
        $IDEJEMPLAR = $data["id_EjemplarLibro_Libro"];
    }
    // 2 update a detalle reserva
    $sql = "UPDATE `detallereserva` SET `id_EstadoReserva`=5 WHERE `id_DetalleReserva`='$IdDetReserva'";
    $rs = mysqli_query($PConeccionBD, $sql);

    if ($rs && isset($IDEJEMPLAR)) {
        // 3 update a estado prestamo de ejemplar de libro
        $sql = "UPDATE `ejemplarlibro` SET `id_EstadoLibro`='1' WHERE `id_EjemplarLibro`=$IDEJEMPLAR";
        $rs = mysqli_query($PConeccionBD, $sql);
    }
    return $rs;
}

function conocertodosReservasSolicitadasPorTodosSocios($PConeccionBD)
{
    $Lista = array();
    $data = array();

    $sql = "SELECT `DR`.`id_DetalleReserva`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DR`.`id_EstadoReserva`,
    `DR`.`fechaReserva_DetRes`,
    `ER`.`nom_EstRes`,
    `DR`.`id_Reserva`,
    `DR`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DR`.`fechaRetiro_DetRes`,
    `DR`.`id_TipoPrest`,    
    `TP`.`nom_TipoPrestamo`
FROM `detallereserva` as DR, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoreserva` as ER,
`reserva` as R, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DR`.`id_TipoPrest` and `EJ`.`id_EjemplarLibro`= `DR`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `ER`.`id_EstadoReserva`= `DR`.`id_EstadoReserva`
and `R`.`id_Reserva`= `DR`.`id_Reserva` and `R`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona` AND `ER`.`id_EstadoReserva`<3";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetalleReserva'];
        $Lista[$i]['ID_ISBN'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_RESERVA'] = $data['id_EstadoReserva'];
        $Lista[$i]['ESTADO'] = $data['nom_EstRes'];
        $Lista[$i]['ID_RESERVA'] = $data['id_Reserva'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['SOCIO'] = $data['apellido_persona'] . " " . $data['nombre_Persona'];
        $Lista[$i]['FECHA_RESERVA'] = $data['fechaReserva_DetRes'];
        $Lista[$i]['FECHA_ADEVOLVER'] = calcularFechaDevolucion($data['fechaReserva_DetRes'], 1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaRetiro_DetRes'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_TipoPrest'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}
function conocertodasSReservas($PConeccionBD)
{
    $Lista = array();
    $data = array();

    $sql = "SELECT `DR`.`id_DetalleReserva`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DR`.`id_EstadoReserva`,
    `DR`.`fechaReserva_DetRes`,
    `ER`.`nom_EstRes`,
    `DR`.`id_Reserva`,
    `DR`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DR`.`fechaRetiro_DetRes`,
    `DR`.`id_TipoPrest`,    
    `TP`.`nom_TipoPrestamo`
FROM `detallereserva` as DR, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoreserva` as ER,
`reserva` as R, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DR`.`id_TipoPrest` and `EJ`.`id_EjemplarLibro`= `DR`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `ER`.`id_EstadoReserva`= `DR`.`id_EstadoReserva` 
and `R`.`id_Reserva`= `DR`.`id_Reserva` and `R`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona`";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetalleReserva'];
        $Lista[$i]['ID_ISBN'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_RESERVA'] = $data['id_EstadoReserva'];
        $Lista[$i]['ESTADO'] = $data['nom_EstRes'];
        $Lista[$i]['ID_RESERVA'] = $data['id_Reserva'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['SOCIO'] = $data['apellido_persona'] . " " . $data['nombre_Persona'];
        $Lista[$i]['FECHA_RESERVA'] = $data['fechaReserva_DetRes'];
        $Lista[$i]['FECHA_ADEVOLVER'] = calcularFechaDevolucion($data['fechaReserva_DetRes'], 1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaRetiro_DetRes'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_TipoPrest'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}

function listoParaRetirarReserva($idDetReserva, $PConeccionBD){
    $sql="UPDATE `detallereserva` SET `id_EstadoReserva`='2'WHERE `id_DetalleReserva`= $idDetReserva";
    $rs=mysqli_query($PConeccionBD,$sql);
    return $rs;
}
function reservaRetirada($idDetReserva, $PConeccionBD){
    $sql="UPDATE `detallereserva` SET `id_EstadoReserva`='3'WHERE `id_DetalleReserva`= $idDetReserva";
    $rs=mysqli_query($PConeccionBD,$sql);
    return $rs;
}
function reservaDevuelta($idDetReserva, $PConeccionBD){
    $sql="UPDATE `detallereserva` SET `id_EstadoReserva`='4'WHERE `id_DetalleReserva`= $idDetReserva";
    $rs=mysqli_query($PConeccionBD,$sql);
    return $rs;
}
function conocerUnaReserva($idDetReserva,$PConeccionBD)
{
    $Lista = array();
    $data = array();


    $DNI = $_SESSION['USUARIO_DNI'];

    $EstadoReserva = 1;



    $sql = "SELECT `DR`.`id_DetalleReserva`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DR`.`id_EstadoReserva`,
    `DR`.`fechaReserva_DetRes`,
    `ER`.`nom_EstRes`,
    `DR`.`id_Reserva`,
    `DR`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `S`.`id_socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DR`.`fechaRetiro_DetRes`,
    `DR`.`id_TipoPrest`,    
    `TP`.`nom_TipoPrestamo`
FROM `detallereserva` as DR, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoreserva` as ER,
`reserva` as R, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DR`.`id_TipoPrest` and `EJ`.`id_EjemplarLibro`= `DR`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `ER`.`id_EstadoReserva`= `DR`.`id_EstadoReserva` 
and `R`.`id_Reserva`= `DR`.`id_Reserva` and `R`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona` AND `DR`.`id_DetalleReserva`=$idDetReserva";

    $resultado = mysqli_query($PConeccionBD, $sql);
    if($resultado){
    $data = mysqli_fetch_array($resultado);

        $Lista['ID'] = $data['id_DetalleReserva'];
        $Lista['ID_ISBN'] = $data['id_Libro'];
        $Lista['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista['TITULO'] = $data['titulo_libro'];
        $Lista['ID_ESTADO_RESERVA'] = $data['id_EstadoReserva'];
        $Lista['ESTADO'] = $data['nom_EstRes'];
        $Lista['ID_RESERVA'] = $data['id_Reserva'];
        $Lista['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista['DNI'] = $data['dni_Socio'];
        $Lista['ID_SOCIO'] = $data['id_socio'];
        $Lista['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista['SOCIO'] = $data['apellido_persona'] . " " . $data['nombre_Persona'];
        $Lista['FECHA_RESERVA'] = $data['fechaReserva_DetRes'];
        $Lista['FECHA_ADEVOLVER'] = calcularFechaDevolucion($data['fechaReserva_DetRes'], 1);
        $Lista['FECHA_DEVOLUCION'] = $data['fechaRetiro_DetRes'];
        $Lista['ID_TIPOPRESTAMO'] = $data['id_TipoPrest'];
        $Lista['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        
    }

    return $Lista??false;
}

/* //Usamos un if para evalur el isset() 
if(!isset($variable)) { 
    $variable = false; 
} 
// Usamos un operador ternario ? para evaluar el isset() 
$variable = (isset($variable)) ? $variable : false; 
 
//@@ usamos el operador coalescente nulo ?? 
$variable = $variable ?? false;  */