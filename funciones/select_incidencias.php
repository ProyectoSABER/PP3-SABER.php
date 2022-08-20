<?php

function Listar_Todas_Incidencias($vConexion){


    $Listado=array();


    $SQL="SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
    FROM
    incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
    WHERE
    I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados
    ORDER BY 
    Fecha;";


    $rs = mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['Id']=$data['Id'];
        $Listado[$i]['Titulo']=$data['Titulo'];
        $Listado[$i]['Descripcion']=$data['Descripcion'];
        $Listado[$i]['Nombre']=$data['Nombre'];
        $Listado[$i]['Apellido']=$data['Apellido'];
        $Listado[$i]['Area']=$data['Area'];
        $Listado[$i]['Fecha']=$data['Fecha'];
        $Listado[$i]['Id_Prioridad']=$data['Prioridad_Id'];
        $Listado[$i]['Prioridad']=$data['Prioridad'];
        $Listado[$i]['Estado_Id']=$data['Estado_Id'];        
        $Listado[$i]['Estado']=$data['Estado'];        
        $i++;

    }

    return $Listado;
}
function Listar_Incidencias_Usuario($vConexion,$vIdUsuario){


    $Listado=array();


    $SQL="SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
    FROM
     incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
    WHERE
    I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados AND I.id_Usuario=$vIdUsuario
    ORDER BY 
    Fecha;";


    $rs = mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['Id']=$data['Id'];
        $Listado[$i]['Titulo']=$data['Titulo'];
        $Listado[$i]['Descripcion']=$data['Descripcion'];
        $Listado[$i]['Nombre']=$data['Nombre'];
        $Listado[$i]['Apellido']=$data['Apellido'];
        $Listado[$i]['Area']=$data['Area'];
        $Listado[$i]['Fecha']=$data['Fecha'];
        $Listado[$i]['Id_Prioridad']=$data['Prioridad_Id'];
        $Listado[$i]['Prioridad']=$data['Prioridad'];
        $Listado[$i]['Estado_Id']=$data['Estado_Id'];        
        $Listado[$i]['Estado']=$data['Estado'];        
        $i++;

    }

    return $Listado;
}
function Listar_NoFinalizadas_Incidencias($vConexion){


    $Listado=array();


    $SQL="SELECT I.id_Incidencias AS Id, I.titulo_incidencias AS Titulo, I.desc_incidencias AS Descripcion, U.nomb_Usuario As Nombre, U.apell_Usuario AS Apellido,A.nomb_Area AS Area,fechaCarga_incidencias AS Fecha,I.id_prioridad AS Prioridad_Id, P.descr_Prioridades AS Prioridad, I.id_Estados AS Estado_Id, EI.desc_Estados AS Estado
    FROM
     incidencias I, usuarios U, prioridades P, estados_incidencias EI, areas A
    WHERE
    I.id_Usuario=U.id_Usuario AND U.id_Area=A.id_Area AND I.id_prioridad=P.id_prioridades AND I.id_Estados=EI.id_Estados AND I.id_Estados!=3
    ORDER BY 
    Fecha;";


    $rs = mysqli_query($vConexion, $SQL);

    $i=0;
    while($data=mysqli_fetch_array($rs)){
        $Listado[$i]['Id']=$data['Id'];
        $Listado[$i]['Titulo']=$data['Titulo'];
        $Listado[$i]['Descripcion']=$data['Descripcion'];
        $Listado[$i]['Nombre']=$data['Nombre'];
        $Listado[$i]['Apellido']=$data['Apellido'];
        $Listado[$i]['Area']=$data['Area'];
        $Listado[$i]['Fecha']=$data['Fecha'];
        $Listado[$i]['Id_Prioridad']=$data['Prioridad_Id'];
        $Listado[$i]['Prioridad']=$data['Prioridad'];
        $Listado[$i]['Estado_Id']=$data['Estado_Id'];        
        $Listado[$i]['Estado']=$data['Estado'];        
        $i++;

    }

    return $Listado;
}

