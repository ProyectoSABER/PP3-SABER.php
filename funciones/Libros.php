<?php


function conocerTodosLibros($PConeccionBD)
{
    $Lista = array();
    $data = array();





    $sql = "SELECT L.id_Isbn,L.titulo_libro,L.subtitulo_libro,I.nom_idioma,L.numEdicion_libro,Ed.nom_editorial ,C.categoria_cateLibro,L.fecPublicacion_libro,L.cantidadStock_libro,
    L.fechaIng_libro,P.nom_prove,L.ubiEstanteria_libro ,Pe.nombre_Persona,Pe.apellido_persona
    FROM libro AS L,idioma As I, editorial AS Ed, categorialibro AS C, proveedor AS P, bibliotecario AS B,persona AS Pe
    WHERE I.id_idioma=L.id_idioma AND Ed.id_Editorial=L.edit_libro AND C.id_CateLibro=L.categoria_libro AND P.cuitProveedor=L.prove_libro AND B.id_bibliotecario=L.responsableCarga_libro AND Pe.dni_Persona=B.dni_Bibliotecario";

    $rs = mysqli_query($PConeccionBD, $sql);
    if (!$rs) {
        return false;
    }

    $i = 0;
    while ($data = mysqli_fetch_array($rs)) {

        $Lista[$i]['Libro_ISBN'] = $data['id_Isbn'];
        $Lista[$i]['Libro_Titulo'] = $data['titulo_libro'];
        $Lista[$i]['Libro_Subtitulo'] = $data['subtitulo_libro'];
        $Lista[$i]['Libro_Idioma'] = $data['nom_idioma'];
        $Lista[$i]['Libro_NEdicion'] = $data['numEdicion_libro'];
        $Lista[$i]['Libro_Editorial'] = $data['nom_editorial'];
        $Lista[$i]['Libro_CategoriaLibro'] = $data['categoria_cateLibro'];
        $Lista[$i]['Libro_FechaPublicacion'] = $data['fecPublicacion_libro'];
        $Lista[$i]['Libro_Stock'] = $data['cantidadStock_libro'];
        $Lista[$i]['Libro_FechaIngreso'] = $data['fechaIng_libro'];
        $Lista[$i]['Libro_Proveedor'] = $data['nom_prove'];
        $Lista[$i]['Libro_UbicacionEstanteria'] = $data['ubiEstanteria_libro'];
        $Lista[$i]['Libro_ResponsableCarga'] = $data['nombre_Persona'] . ' ' . $data['apellido_persona'];
        $i++;
    }

    return $Lista;
}






function RegistrarLibro($ISBN, $Titulo, $Subtitulo, $Idioma, $NEdicion, $Editorial, $CategoriaLibro, $FechaPublicacion, $CantEjemplar, $Proveedor, $UbicacionEstanteria, $BibliotecarioID, $PConeccionBD)
{


    $sql = "INSERT INTO `libro` (`id_Isbn`, `titulo_libro`, `subtitulo_libro`, `id_idioma`, `numEdicion_libro`, `edit_libro`, `categoria_libro`, `fecPublicacion_libro`, `cantidadStock_libro`,  `prove_libro`, `ubiEstanteria_libro`, `responsableCarga_libro`) VALUES ('$ISBN', '$Titulo','$Subtitulo', '$Idioma', '$NEdicion', '$Editorial', '$CategoriaLibro', '$FechaPublicacion', '$CantEjemplar', '$Proveedor', '$UbicacionEstanteria', '$BibliotecarioID')";

    $consulta = mysqli_query($PConeccionBD, $sql);

    return $consulta;
}



function conocerUnLibro($ISBN, $PConeccionBD)
{
    $Lista = array();
    $data = array();





    $sql = "SELECT L.id_Isbn,L.titulo_libro,L.subtitulo_libro,I.nom_idioma,L.numEdicion_libro,Ed.nom_editorial ,C.categoria_cateLibro,L.fecPublicacion_libro,L.cantidadStock_libro,L.fechaIng_libro,P.nom_prove,L.ubiEstanteria_libro ,Pe.nombre_Persona,Pe.apellido_persona FROM libro AS L,idioma As I, editorial AS Ed, categorialibro AS C, proveedor AS P, bibliotecario AS B,persona AS Pe WHERE L.id_Isbn='$ISBN' AND I.id_idioma=L.id_idioma AND Ed.id_Editorial=L.edit_libro AND C.id_CateLibro=L.categoria_libro AND P.cuitProveedor=L.prove_libro AND B.id_bibliotecario=L.responsableCarga_libro AND Pe.dni_Persona=B.dni_Bibliotecario";

    $rs = mysqli_query($PConeccionBD, $sql);
    if (!$rs) {
        return false;
    }

    $data = mysqli_fetch_array($rs);

    if (!empty($data)) {

        $Lista['Libro_ISBN'] = $data['id_Isbn'];
        $Lista['Libro_Titulo'] = $data['titulo_libro'];
        $Lista['Libro_Subtitulo'] = $data['subtitulo_libro'];
        $Lista['Libro_Idioma'] = $data['nom_idioma'];
        $Lista['Libro_NEdicion'] = $data['numEdicion_libro'];
        $Lista['Libro_Editorial'] = $data['nom_editorial'];
        $Lista['Libro_CategoriaLibro'] = $data['categoria_cateLibro'];
        $Lista['Libro_FechaPublicacion'] = $data['fecPublicacion_libro'];
        $Lista['Libro_Stock'] = $data['cantidadStock_libro'];
        $Lista['Libro_FechaIngreso'] = $data['fechaIng_libro'];
        $Lista['Libro_Proveedor'] = $data['nom_prove'];
        $Lista['Libro_UbicacionEstanteria'] = $data['ubiEstanteria_libro'];
        $Lista['Libro_ResponsableCarga'] = $data['nombre_Persona'] . ' ' . $data['apellido_persona'];
    }

    return $Lista;
}
