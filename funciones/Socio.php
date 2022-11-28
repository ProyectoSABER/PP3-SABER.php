<?php


function MostrarUnoSocioID($IdSocio, $PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
        FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES WHERE S.id_socio= '$IdSocio' and CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Lista['SOCIO_DNI'] = $data['Dni'];
        $Lista['SOCIO_ID'] = $data['ID'];
        $Lista['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista['SOCIO_FECHAALTA'] = $data['FechaAlta'];
        
        
    }

    

    return $Lista;
}

/**
 * Busqueda de socio por Dni
 * @param number $DniSocio proporciona un dni valido
 * @param $PConeccionBD roporciona una conexion a bd mysql
 * @return array  ['SOCIO_DNI','SOCIO_ID','SOCIO_NOMBRE','SOCIO_APELLIDO','SOCIO_CATEGORIA','SOCIO_CUOTA','SOCIO_ESTADOSOCIO','SOCIO_FECHAALTA']
 */
function MostrarUnoSocioDni($DniSocio, $PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
        FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES WHERE S.dni_Socio='$DniSocio' and CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Lista['SOCIO_DNI'] = $data['Dni'];
        $Lista['SOCIO_ID'] = $data['ID'];
        $Lista['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista['SOCIO_FECHAALTA'] = $data['FechaAlta'];
        
    }

    

    return $Lista;
}
/**
 * Busqueda de todos los socios
 * 
 * @param $PConeccionBD roporciona una conexion a bd mysql
 * @return array [number]['SOCIO_DNI','SOCIO_ID','SOCIO_NOMBRE','SOCIO_APELLIDO','SOCIO_CATEGORIA','SOCIO_CUOTA','SOCIO_ESTADOSOCIO','SOCIO_FECHAALTA']
 */

function mostrarTodoSocio($PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
    FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES WHERE CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['SOCIO_DNI'] = $data['Dni'];
        $Lista[$i]['SOCIO_ID'] = $data['ID'];
        $Lista[$i]['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista[$i]['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista[$i]['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista[$i]['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista[$i]['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista[$i]['SOCIO_FECHAALTA'] =$data['FechaAlta'];
        $i++;
    }

    

    return $Lista;
}
/**
 * Busqueda de todos los socios por DNI
 * @param number $DniSocio proporciona un dni valido
 * @param $PConeccionBD roporciona una conexion a bd mysql
 * @return array [number]['SOCIO_DNI','SOCIO_ID','SOCIO_NOMBRE','SOCIO_APELLIDO','SOCIO_CATEGORIA','SOCIO_CUOTA','SOCIO_ESTADOSOCIO','SOCIO_FECHAALTA']
 */

function busquedaTodosSociosDNI($Dni,$PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
    FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES WHERE CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio and S.dni_Socio like '%$Dni%'";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['SOCIO_DNI'] = $data['Dni'];
        $Lista[$i]['SOCIO_ID'] = $data['ID'];
        $Lista[$i]['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista[$i]['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista[$i]['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista[$i]['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista[$i]['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista[$i]['SOCIO_FECHAALTA'] =$data['FechaAlta'];
        $i++;
    }

    

    return $Lista;
}
/**
 * Busqueda de todos los socios por NSocio
 * @param number $NSocio proporciona un Numero socio valido
 * @param $PConeccionBD roporciona una conexion a bd mysql
 * @return array [number]['SOCIO_DNI','SOCIO_ID','SOCIO_NOMBRE','SOCIO_APELLIDO','SOCIO_CATEGORIA','SOCIO_CUOTA','SOCIO_ESTADOSOCIO','SOCIO_FECHAALTA']
 */

function busquedaTodosSociosNumerosocio($NSocio,$PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
    FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES WHERE CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio and S.id_socio like '%$NSocio%'";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['SOCIO_DNI'] = $data['Dni'];
        $Lista[$i]['SOCIO_ID'] = $data['ID'];
        $Lista[$i]['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista[$i]['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista[$i]['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista[$i]['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista[$i]['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista[$i]['SOCIO_FECHAALTA'] =$data['FechaAlta'];
        $i++;
    }

    

    return $Lista;
}
/**
 * Busqueda de todos los socios por Nombre o apellido
 * @param string $DniSocio proporciona un Nombre u apellido valido
 * @param $PConeccionBD roporciona una conexion a bd mysql
 * @return array [number]['SOCIO_DNI','SOCIO_ID','SOCIO_NOMBRE','SOCIO_APELLIDO','SOCIO_CATEGORIA','SOCIO_CUOTA','SOCIO_ESTADOSOCIO','SOCIO_FECHAALTA']
 */

function busquedaTodosSociosNombreApellido($NombreApellido,$PConeccionBD)
{
    $Lista = array();
    $data = array();




    $SQL = "SELECT S.dni_Socio as Dni, S.id_socio as ID,P.nombre_Persona as Nombre, P.apellido_persona as Apellido, CS.nom_CategoriaSocio as Categoria, CS.valorCuota as Cuota, ES.nom_EstadoSocio as EstadoSocio, S.fechaAlta_socio as FechaAlta
    FROM socio as S , categoriasocio as CS ,persona as P, estadosocio as ES 
    WHERE CS.id_CategoriaSocio=S.idcategoria_Socio and P.dni_Persona=S.dni_Socio and ES.id_EstadoSocio=S.id_EstadoSocio  and 
    ( P.nombre_Persona IN (SELECT DISTINCT nombre_Persona from persona WHERE nombre_Persona like '%$NombreApellido%') or  P.apellido_persona IN (SELECT DISTINCT apellido_persona from persona WHERE apellido_persona like '%$NombreApellido%'))";

    $rs = mysqli_query($PConeccionBD, $SQL);
    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['SOCIO_DNI'] = $data['Dni'];
        $Lista[$i]['SOCIO_ID'] = $data['ID'];
        $Lista[$i]['SOCIO_NOMBRE'] = $data['Nombre'];
        $Lista[$i]['SOCIO_APELLIDO'] = $data['Apellido'];
        $Lista[$i]['SOCIO_CATEGORIA'] = $data['Categoria'];
        $Lista[$i]['SOCIO_CUOTA'] = $data['Cuota'];
        $Lista[$i]['SOCIO_ESTADOSOCIO'] = $data['EstadoSocio'];
        $Lista[$i]['SOCIO_FECHAALTA'] =$data['FechaAlta'];
        $i++;
    }

    

    return $Lista;
}



function insertarUnoSocio($DNIPersona, $IDCategoriaSocio, $IDEstadoSocio,  $PConeccionBD)
{



    

    $SQL = "INSERT INTO `socio` (`dni_Socio`, `idcategoria_Socio`, `id_socio`, `id_EstadoSocio`) VALUES ('$DNIPersona','$IDCategoriaSocio', NULL, ' $IDEstadoSocio');";



    $consulta = mysqli_query($PConeccionBD, $SQL);

    return $consulta;
}
function buscarSocioPorIdUsuario($idUser,  $PConeccionBD)
{
  $data = array();
  $query = mysqli_query($PConeccionBD, "SELECT soc.* from usuario usu 
                                        INNER JOIN Persona per ON per.id_usuario = usu.id_Usuario 
                                        INNER JOIN socio soc ON soc.dni_Socio = per.dni_Persona 
                                         WHERE usu.id_Usuario = '$idUser';");
  
  while($row = mysqli_fetch_array($query)){
  		    $data[] = array(
  			$data['socio_id'] = $row['2'],
  			
  		
  		);	

     }

      

    return $data;
}

