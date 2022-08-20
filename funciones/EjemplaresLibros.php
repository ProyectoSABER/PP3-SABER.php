<?php



function conocertodosEjemplaresUnLibro($ISBN, $PConeccionBD)
{
    $Lista = array();
    $data = array();





    $sql = "SELECT EJ.id_EjemplarLibro, L.titulo_libro, EJ.id_EstadoLibro, El.nom_EstadoLibro,EJ.estadoRegistro_Ejemplar,EJ.id_InstitucionalLibro
     FROM ejemplarlibro as EJ,libro AS L ,estadolibro as EL
     WHERE EJ.id_Libro='$ISBN' and L.id_Isbn=EJ.id_Libro and EL.id_EstadoLibro=EJ.id_EstadoLibro";

    $rs = mysqli_query($PConeccionBD, $sql);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['ID'] = $data['id_EjemplarLibro'];
        $Lista[$i]['TITULO'] = $data['titulo_libro'];
        $Lista[$i]['IDESTADO'] = $data['id_EstadoLibro'];
        $Lista[$i]['ESTADO'] = $data['nom_EstadoLibro'];
        $Lista[$i]['Subtitulo'] = $data['estadoRegistro_Ejemplar'];
        $Lista[$i]['IDINSTEJEMPLAR'] = $data['id_InstitucionalLibro'];
        $i++;
    }

    return $Lista;
}

function conocerEjemplaresDisponiblesUnLibro($ISBN, $PConeccionBD)
{
    $Lista = array();
    $data = array();


    $Disponible = 1;

    $sql = "SELECT EJ.id_EjemplarLibro, L.titulo_libro, EJ.id_EstadoLibro, El.nom_EstadoLibro, estadoRegistro_Ejemplar,EJ.id_InstitucionalLibro
    FROM ejemplarlibro as EJ,libro AS L ,estadolibro as EL
    WHERE EJ.id_Libro='$ISBN' and L.id_Isbn=EJ.id_Libro and EL.id_EstadoLibro=EJ.id_EstadoLibro and EJ.id_EstadoLibro='$Disponible' and estadoRegistro_Ejemplar=true";

    $rs = mysqli_query($PConeccionBD, $sql);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['EJEMPLARLIBRO_ID'] = $data['id_EjemplarLibro'];
        $Lista[$i]['EJEMPLARLIBRO_Titulo'] = $data['titulo_libro'];
        $Lista[$i]['EJEMPLARLIBRO_IDESTADO'] = $data['id_EstadoLibro'];
        $Lista[$i]['EJEMPLARLIBRO_ESTADO'] = $data['nom_EstadoLibro'];
        $Lista[$i]['EJEMPLARLIBRO_EREGISTRO'] = $data['estadoRegistro_Ejemplar'];
        $Lista[$i]['EJEMPLARLIBRO_IDINSTEJEMPLAR'] = $data['id_InstitucionalLibro'];
        $i++;
    }

    return $Lista;
}


function conocerUnEjemplarLibroID($IdEjemplar, $PConeccionBD)
{
    $Lista = array();
    $data = array();





    $sql = "SELECT EJ.id_Libro, L.titulo_libro, EJ.id_EstadoLibro, El.nom_EstadoLibro, estadoRegistro_Ejemplar, EJ.id_InstitucionalLibro
     FROM ejemplarlibro as EJ,libro AS L ,estadolibro as EL
     WHERE EJ.id_EjemplarLibro='$IdEjemplar' and L.id_Isbn=EJ.id_Libro and EL.id_EstadoLibro=EJ.id_EstadoLibro";

    $rs = mysqli_query($PConeccionBD, $sql);

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista['Libro_ISBN'] = $data['id_Libro'];
        $Lista['Libro_Titulo'] = $data['titulo_libro'];
        $Lista['Libro_Titulo'] = $data['id_EstadoLibro'];
        $Lista['Libro_Titulo'] = $data['nom_EstadoLibro'];
        $Lista['Libro_Subtitulo'] = $data['estadoRegistro_Ejemplar'];
        $Lista['Libro_IDINSTEJEMPLAR'] = $data['id_InstitucionalLibro'];

        $i++;
    }

    return $Lista;
}

//FUNCION LISTA----------------
function conocerUnEjemplarLibroIDINST($IdInstEjemplar, $ISBN, $PConeccionBD)
{
    $Lista = array();
    $data = array();





    $sql = "SELECT EJ.id_Libro, L.titulo_libro, EJ.id_EstadoLibro, El.nom_EstadoLibro, estadoRegistro_Ejemplar, EJ.id_InstitucionalLibro
     FROM ejemplarlibro as EJ,libro AS L ,estadolibro as EL
     WHERE EJ.id_InstitucionalLibro='$IdInstEjemplar' and EJ.id_Libro= '$ISBN' and L.id_Isbn=EJ.id_Libro and EL.id_EstadoLibro=EJ.id_EstadoLibro";

    $rs = mysqli_query($PConeccionBD, $sql);


    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Lista['EJLibro_ISBN'] = $data['id_Libro'];
        $Lista['EJLibro_Titulo'] = $data['titulo_libro'];
        $Lista['EJLibro_Titulo'] = $data['id_EstadoLibro'];
        $Lista['EJLibro_Titulo'] = $data['nom_EstadoLibro'];
        $Lista['EJLibro_Subtitulo'] = $data['estadoRegistro_Ejemplar'];
        $Lista['EJLibro_IDINSTEJEMPLAR'] = $data['id_InstitucionalLibro'];
    }

    return $Lista;
}
/* -----/FUNCION LISTA---------*/




function RegistrarUnEjemplarUnLibro($IdInstEjemplar, $ISBN, $IdEstadoLibro, $PConeccionBD)
{


    $sql = "INSERT INTO ejemplarlibro ( id_Libro, id_EstadoLibro,id_InstitucionalLibro) VALUES ('$ISBN','$IdEstadoLibro','$IdInstEjemplar')";

    $consulta = mysqli_query($PConeccionBD, $sql);

    return $consulta;
}
