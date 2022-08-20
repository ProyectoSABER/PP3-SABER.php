-- Active: 1657846978215@@127.0.0.1@3306@saber_bd
SELECT L.id_isbn,L.titulo_libro,L.subtitulo_libro,I.nom_idioma,L.numEdicion_libro,Ed.nom_editorial C.categoria_cateLibro,L.fecPublicacion_libro,L.cantidadStock_libro,
L.fechaIng_libro,P.nom_prove,L.ubiEstanteria_libro ,Pe.nombre_Persona,Pe.apellido_persona
FROM libro AS L,idioma As I, editorial AS Ed, categorialibro AS C, proveedor AS P, bibliotecario AS B,persona AS Pe
WHERE I.id_idioma=L.id_idioma AND Ed.id_Editorial=L.edit_libro AND C.id_CateLibro=L.categoria_libro AND P.cuitProveedor=L.prove_libro AND B.id_bibliotecario=L.responsableCarga_libro AND Pe.dni_Persona=B.dni_Bibliotecario;
/* 1 intento */

SELECT 'L.id_isbn',L.titulo_libro,L.subtitulo_libro,I.nom_idioma,L.numEdicion_libro
FROM libro as L , idioma as I
WHERE I.id_idioma=L.id_idioma AND L.id_isbn=1;
/* 2intento */

SELECT L.id_isbn,L.titulo_libro,L.subtitulo_libro,I.nom_idioma,L.numEdicion_libro,Ed.nom_editorial ,C.categoria_cateLibro,L.fecPublicacion_libro,L.cantidadStock_libro,
L.fechaIng_libro,P.nom_prove,L.ubiEstanteria_libro ,Pe.nombre_Persona,Pe.apellido_persona
FROM libro AS L,idioma As I, editorial AS Ed, categorialibro AS C, proveedor AS P, bibliotecario AS B,persona AS Pe
WHERE I.id_idioma=L.id_idioma AND Ed.id_Editorial=L.edit_libro AND C.id_CateLibro=L.categoria_libro AND P.cuitProveedor=L.prove_libro AND B.id_bibliotecario=L.responsableCarga_libro AND Pe.dni_Persona=B.dni_Bibliotecario;


SELECT EJ.id_EjemplarLibro, L.titulo_libro, EJ.id_EstadoLibro, El.nom_EstadoLibro, estadoRegistro_Ejemplar
     FROM ejemplarlibro as EJ,libro AS L ,estadolibro as EL
     WHERE EJ.id_Libro=1 and L.id_Isbn=EJ.id_Libro and EL.id_EstadoLibro=EJ.id_EstadoLibro and EJ.id_EstadoLibro=1 and estadoRegistro_Ejemplar=true;


     SELECT `id_EjemplarLibro`, `id_Libro`, `id_EstadoLibro`, `estadoRegistro_Ejemplar` FROM `ejemplarlibro` WHERE id_EstadoLibro= 1