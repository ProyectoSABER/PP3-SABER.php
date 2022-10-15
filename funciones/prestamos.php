<?php

function calcularFechaDevolucion($fechaActual,$dias=7){
    
    
    $fechaFechaDevolucion=date("d-m-y",strtotime($fechaActual."+ $dias days"));
    
return $fechaFechaDevolucion;
}

function conocertodosPrestamosActivos($PConeccionBD)
{
    $Lista = array();
    $data = array();


    $EstadoPrestamo=1;


    $sql = "SELECT `DP`.`id_DetallePrestamoLibro`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DP`.`Id_estado_PrestamoLibro`,
    `EP`.`nom_EstadoPrestamo`,
    `DP`.`id_PrestamoLibro`,
    `DP`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DP`.`fechaDevolucion`,
    `DP`.`id_tipoPrestamo`,    
    `TP`.`nom_TipoPrestamo`
FROM `detalleprestamolibro` as DP, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoprestamo` as EP,
`prestamolibro` as PL, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DP`.`id_tipoPrestamo` and `EJ`.`id_EjemplarLibro`= `DP`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `EP`.`id_EstadoPrestamo`= `DP`.`Id_estado_PrestamoLibro` and `DP`.`Id_estado_PrestamoLibro`= '$EstadoPrestamo' 
and `PL`.`idPrestamoLibro`= `DP`.`id_PrestamoLibro` and `PL`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona`
";

    $rs = mysqli_query($PConeccionBD, $sql);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['id_DetallePrestamoLibro'];
        $Lista[$i]['ID_LIBRO'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_PRESTAMO'] = $data['Id_estado_PrestamoLibro'];
        $Lista[$i]['ESTADO'] = $data['nom_EstadoPrestamo'];
        $Lista[$i]['ID_PRESTAMO'] = $data['id_PrestamoLibro'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaDevolucion'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_tipoPrestamo'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}
function conocertodosPrestamosActivosInstitucionales($PConeccionBD)
{
    $Lista = array();
    $data = array();


    $EstadoPrestamo=1;
    


    $sql = "SELECT `DP`.`id_DetallePrestamoLibro`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DP`.`Id_estado_PrestamoLibro`,
    `DP`.`fechaPrestamo`,
    `EP`.`nom_EstadoPrestamo`,
    `DP`.`id_PrestamoLibro`,
    `DP`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DP`.`fechaDevolucion`,
    `DP`.`id_tipoPrestamo`,    
    `TP`.`nom_TipoPrestamo`
FROM `detalleprestamolibro` as DP, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoprestamo` as EP,
`prestamolibro` as PL, `socio` as S,`persona` as P
WHERE `DP`.`id_tipoPrestamo` in ( 1, 2, 3) and `TP`.`id_TPrestamo`= `DP`.`id_tipoPrestamo` and `EJ`.`id_EjemplarLibro`= `DP`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `EP`.`id_EstadoPrestamo`= `DP`.`Id_estado_PrestamoLibro` and `DP`.`Id_estado_PrestamoLibro`= '$EstadoPrestamo' 
and `PL`.`idPrestamoLibro`= `DP`.`id_PrestamoLibro` and `PL`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona`
";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetallePrestamoLibro'];
        $Lista[$i]['ID_LIBRO'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_PRESTAMO'] = $data['Id_estado_PrestamoLibro'];
        $Lista[$i]['ESTADO'] = $data['nom_EstadoPrestamo'];
        $Lista[$i]['ID_PRESTAMO'] = $data['id_PrestamoLibro'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['FECHA_PRESTAMO'] = $data['fechaPrestamo'];
        $Lista[$i]['FECHA_ADEVOLVER'] =calcularFechaDevolucion($data['fechaPrestamo'],1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaDevolucion'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_tipoPrestamo'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}
function conocertodosPrestamosActivosPorSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();

    $DNI=$_SESSION['USUARIO_DNI'];
    

    $EstadoPrestamo=1;
    


    $sql = "SELECT `DP`.`id_DetallePrestamoLibro`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DP`.`Id_estado_PrestamoLibro`,
    `DP`.`fechaPrestamo`,
    `EP`.`nom_EstadoPrestamo`,
    `DP`.`id_PrestamoLibro`,
    `DP`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DP`.`fechaDevolucion`,
    `DP`.`id_tipoPrestamo`,    
    `TP`.`nom_TipoPrestamo`
FROM `detalleprestamolibro` as DP, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoprestamo` as EP,
`prestamolibro` as PL, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DP`.`id_tipoPrestamo` and `EJ`.`id_EjemplarLibro`= `DP`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `EP`.`id_EstadoPrestamo`= `DP`.`Id_estado_PrestamoLibro` and `DP`.`Id_estado_PrestamoLibro`= '$EstadoPrestamo' 
and `PL`.`idPrestamoLibro`= `DP`.`id_PrestamoLibro` and `PL`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona` and `P`.`dni_Persona`='$DNI' ";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetallePrestamoLibro'];
        $Lista[$i]['ID_LIBRO'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_PRESTAMO'] = $data['Id_estado_PrestamoLibro'];
        $Lista[$i]['ESTADO'] = $data['nom_EstadoPrestamo'];
        $Lista[$i]['ID_PRESTAMO'] = $data['id_PrestamoLibro'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['FECHA_PRESTAMO'] = $data['fechaPrestamo'];
        $Lista[$i]['FECHA_ADEVOLVER'] =calcularFechaDevolucion($data['fechaPrestamo'],1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaDevolucion'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_tipoPrestamo'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}
function conocertodosPrestamosSolicitadosPorSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();

    $DNI=$_SESSION['USUARIO_DNI'];
    

    $EstadoPrestamo=4;
    


    $sql = "SELECT `DP`.`id_DetallePrestamoLibro`,   
	`EJ`.`id_Libro`, 
    `EJ`.`Id_InstitucionalLibro`,
    `L`.`titulo_libro`,    
    `DP`.`Id_estado_PrestamoLibro`,
    `DP`.`fechaPrestamo`,
    `EP`.`nom_EstadoPrestamo`,
    `DP`.`id_PrestamoLibro`,
    `DP`.`id_EjemplarLibro_Libro`,
    `S`.`dni_Socio`,
    `P`.`nombre_Persona`,
    `P`.`apellido_persona`,   
    `DP`.`fechaDevolucion`,
    `DP`.`id_tipoPrestamo`,    
    `TP`.`nom_TipoPrestamo`
FROM `detalleprestamolibro` as DP, `tipoprestamo` as TP,`ejemplarlibro` as EJ,`libro` as L , `estadoprestamo` as EP,
`prestamolibro` as PL, `socio` as S,`persona` as P
WHERE `TP`.`id_TPrestamo`= `DP`.`id_tipoPrestamo` and `EJ`.`id_EjemplarLibro`= `DP`.`id_EjemplarLibro_Libro` and `EJ`.`id_Libro`= `L`.`id_Isbn`
and `EP`.`id_EstadoPrestamo`= `DP`.`Id_estado_PrestamoLibro` and `DP`.`Id_estado_PrestamoLibro`= '$EstadoPrestamo' 
and `PL`.`idPrestamoLibro`= `DP`.`id_PrestamoLibro` and `PL`.`id_socio` = `S`.`id_socio` and `S`.`dni_Socio`= `P`.`dni_Persona` and `P`.`dni_Persona`='$DNI' ";

    $resultado = mysqli_query($PConeccionBD, $sql);

    $i = 0;

    while ($data = mysqli_fetch_array($resultado)) {

        $Lista[$i]['ID'] = $data['id_DetallePrestamoLibro'];
        $Lista[$i]['ID_LIBRO'] = $data['id_Libro'];
        $Lista[$i]['ID_INST_EJEMPLAR'] = $data['Id_InstitucionalLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['ID_ESTADO_PRESTAMO'] = $data['Id_estado_PrestamoLibro'];
        $Lista[$i]['ESTADO'] = $data['nom_EstadoPrestamo'];
        $Lista[$i]['ID_PRESTAMO'] = $data['id_PrestamoLibro'];
        $Lista[$i]['ID_EJEMPLAR'] = $data['id_EjemplarLibro_Libro'];
        $Lista[$i]['DNI'] = $data['dni_Socio'];
        $Lista[$i]['NOMBRE_SOCIO'] = $data['nombre_Persona'];
        $Lista[$i]['APELLIDO_SOCIO'] = $data['apellido_persona'];
        $Lista[$i]['FECHA_PRESTAMO'] = $data['fechaPrestamo'];
        $Lista[$i]['FECHA_ADEVOLVER'] =calcularFechaDevolucion($data['fechaPrestamo'],1);
        $Lista[$i]['FECHA_DEVOLUCION'] = $data['fechaDevolucion'];
        $Lista[$i]['ID_TIPOPRESTAMO'] = $data['id_tipoPrestamo'];
        $Lista[$i]['TIPOPRESTAMO'] = $data['nom_TipoPrestamo'];
        $i++;
    }

    return $Lista;
}




