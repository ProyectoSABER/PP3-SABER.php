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

