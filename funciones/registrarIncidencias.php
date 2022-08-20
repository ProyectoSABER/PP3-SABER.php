

<?php

function registrarIncidencia($vConexionBD, $vTitulo, $vDescripcion, $vIdUsuario, $vIdPrioridad, $vIdEstado = 1)
{

    $sql_Insert = "INSERT INTO incidencias (titulo_Incidencias, desc_Incidencias, id_Usuario,id_Prioridad, id_Estados) VALUES ('$vTitulo','$vDescripcion',$vIdUsuario,$vIdPrioridad, $vIdEstado)";

    $consulta = mysqli_query($vConexionBD, $sql_Insert);

    return $consulta;
}

?>