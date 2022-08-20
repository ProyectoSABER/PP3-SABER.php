-- Active: 1657846978215@@127.0.0.1@3306@saber_bd
/* Obtener todos los usuarios que no se encuentren asociados a una persona */

SELECT U.id_Usuario, U.mail_Usuario
  FROM usuario as U
 WHERE U.id_Usuario NOT IN (SELECT P.id_usuario
                       FROM persona as P);

                       INSERT INTO `usuario`(`mail_Usuario`, `clave_Usuario`, `idTipo_Usuario`, `metodoCifrado_Usuario`) VALUES ('Prueba@gmail.com',MD5('Clave1234'),'4','md5');




                       SELECT per.dni_persona, per.tipoDNI_persona, per.nombre_Persona, per.apellido_Persona, per.foto_socio, dom.nom_calle, dom.alt_calle, barr.nom_barrio, loc.nom_localidad, pro.nom_prov 
        FROM persona as per , domicilio as dom, barrio as barr, localidad as loc, provincia as pro 
        WHERE id_usuario='12' and dom.idDomicilio=id_domicilio or NULL and barr.idBarrio=dom.idBarrio  or NULL and loc.idLocalidad=barr.idLocalidad  or NULL and pro.idProvincia=loc.idProvincia  or NULL;
